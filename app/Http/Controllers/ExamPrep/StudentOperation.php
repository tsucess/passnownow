<?php

namespace App\Http\Controllers\ExamPrep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ExamPrep\Oex_student;
use App\Models\ExamPrep\Oex_exam_master;
use App\Models\ExamPrep\Oex_question_master;
use App\Models\ExamPrep\Oex_result;
use App\Models\ExamPrep\user_exam;
use App\Models\ExamPrep\Questions;
use App\Models\ExamPrep\Subjects;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamPrep\Admin;
use App\Models\User;
use Symfony\Component\Console\Question\Question;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;



class StudentOperation extends Controller
{
    //student dashboard
    public function dashboard()
    {

        $data['portal_exams'] = Oex_exam_master::select(['oex_exam_masters.*', 'oex_categories.title as cat_name'])
            ->join('oex_categories', 'oex_exam_masters.category', '=', 'oex_categories.id')
            ->orderBy('id', 'desc')->where('oex_exam_masters.status', '1')->get()->toArray();
        return view('admin.dashboard', $data);
    }


    //Exam page
    public function exam()
    {

        $current_user = Auth::user()->id;
        $student_info = user_exam::select(['user_exams.*', 'users.first_name', 'oex_exam_masters.title', 'oex_exam_masters.exam_date'])
            ->join('users', 'users.id', '=', 'user_exams.user_id')
            ->join('oex_exam_masters', 'user_exams.exam_id', '=', 'oex_exam_masters.id')->orderBy('user_exams.exam_id', 'desc')
            ->where('user_exams.user_id', $current_user)
            // ->where('user_exams.user_id', Session::get('id'))
            ->where('user_exams.std_status', '1')
            ->get()->toArray();

        return view('student.exam', ['student_info' => $student_info]);
    }


    //join exam page
    public function start_exam($id)
    {

        $question = Questions::where('subject_unique_id', $id)->get();

        $subject = Subjects::where('id', $id)->get()->first();
        // dd($subject);
        return view('admin.start_exam', ['questions' => $question, 'subject' => $subject]);
    }



    //On submit
    public function submit_questions(Request $request)
    {
        $data = $request->all();
        $yes_ans = 0;
        $no_ans = 0;
        $result = [];
        $userId = Auth::id();

        for ($i = 1; $i <= $request->index; $i++) {
            if (!isset($data['question' . $i])) {
                continue;
            }

            $questionId = $data['question' . $i];
            $questionType = $data['question_type' . $i] ?? 'multiple';
            $userAnswer = $data['ans' . $i] ?? null;

            $question = Questions::find($questionId);
            if (!$question) {
                continue;
            }

            $correctAnswer = $question->ans;
            $correctMark = $question->mark;
            $isCorrect = false;
            $aiScore = null;
            $aiFeedback = null;
            $questionScore = 0;

            // Handle question type
            if (in_array($questionType, ['multiple', 'alternate'])) {
                $isCorrect = ($userAnswer == $correctAnswer);
                if ($isCorrect) {
                    $questionScore = $correctMark;
                    $yes_ans++;
                } else {
                    $no_ans++;
                }
            } elseif ($questionType === 'theory') {
                try {
                    $response = Http::post("http://16.171.198.174:8000/score_result", [
                        'question_id' => $questionId,
                        'type'        => 'theory',
                        'answer'      => $userAnswer,
                        'correct'     => $correctAnswer,
                        'status'      => 'PENDING',
                    ]);

                    if ($response->successful()) {
                        $aiResult = $response->json();
                        $aiScore = $aiResult['score'] ?? null;
                        $aiFeedback = $aiResult['feedback'] ?? null;
                        $isCorrect = $aiScore > 0; // Adjust condition if needed
                        $questionScore = round($aiScore * $correctMark);
                        // Update counters
                        if ($isCorrect) {
                            $yes_ans++;
                        } else {
                            $no_ans++;
                        }
                    } else {
                        $aiFeedback = 'AI scoring failed';
                    }
                } catch (\Exception $e) {
                    Log::error('AI request failed: ' . $e->getMessage());
                    $aiFeedback = 'AI request failed';
                }
            }



            // Add to results
            $result[] = [
                'question_id' => $questionId,
                'type'        => $questionType,
                'answer'      => $userAnswer,
                'correct'     => $correctAnswer,
                'mark'        => $correctMark,
                'score'       => $questionScore,
                'status'      => $questionType === 'theory'
                    ? ($aiScore !== null ? 'YES' : 'PENDING')
                    : ($isCorrect ? 'YES' : 'NO'),
                'ai_score'    => $questionType === 'theory' ? $aiScore : null,
                'ai_feedback' => $questionType === 'theory' ? $aiFeedback : null
            ];
        }


        // Update exam info
        $std_info = user_exam::where('user_id', $userId)
            ->where('exam_id', $request->exam_id)
            ->first();

        if ($std_info) {
            $std_info->exam_joined = 1;
            $std_info->update();
        }

        // dd($std_info);

        // Save results
        Oex_result::create([
            'exam_id'     => $request->exam_id,
            'user_id'     => $userId,
            'yes_ans'     => $yes_ans,
            'no_ans'      => $no_ans,
            'result_json' => json_encode($result)
        ]);

        return redirect()->route('dashboard')->with('status', 'Exam submitted successfully');
    }

    // public function submit_questions(Request $request)
    // {
    //     // dd($request); 
    //     $data = $request->all();
    //     $yes_ans = 0;
    //     $no_ans = 0;
    //     $result = [];

    //     for ($i = 1; $i <= $request->index; $i++) {
    //         if (!isset($data['question' . $i])) {
    //             continue;
    //         }

    //         $questionId = $data['question' . $i];
    //         $questionType = $data['question_type' . $i] ?? 'multiple';
    //         $userAnswer = $data['ans' . $i] ?? null;

    //         $question = Questions::find($questionId);
    //         if (!$question) {
    //             continue;
    //         }

    //         $correctAnswer = $question->ans;
    //         $isCorrect = false;

    //         // Handle question type
    //         if ($questionType === 'multiple' || $questionType === 'alternate') {
    //             $isCorrect = ($userAnswer == $correctAnswer);
    //         } elseif ($questionType === 'theory') {
    //             // Use AI API to get score + feedback
    //             try {
    //                 $response = Http::post("http://16.171.198.174:8000/score_result", [
    //                     'question_id' => $questionId,
    //                     'type'        => 'theory',
    //                     'answer'      => $userAnswer,
    //                     'correct'     => $correctAnswer,
    //                     'status'      => 'PENDING',
    //                 ]);

    //                 if ($response->successful()) {
    //                     $aiResult = $response->json();
    //                     $aiScore = $aiResult['score'] ?? null;
    //                     $aiFeedback = $aiResult['feedback'] ?? null;

    //                     $isCorrect = $aiScore >= 0; // or whatever threshold you want
    //                 } else {
    //                     $aiScore = null;
    //                     $aiFeedback = 'AI scoring failed';
    //                     $isCorrect = false;
    //                 }
    //             } catch (\Exception $e) {
    //                 $aiScore = null;
    //                 $aiFeedback = 'AI request failed';
    //                 $isCorrect = false;
    //             }
    //         }

    //         // } elseif ($questionType === 'theory') {
    //         //     // Remove HTML tags and do basic string compare
    //         //     $cleanCorrect = strtolower(trim(strip_tags($correctAnswer)));
    //         //     $cleanUser = strtolower(trim($userAnswer));
    //         //     $isCorrect = ($cleanCorrect === $cleanUser);
    //         //     // Optional: Instead of marking wrong, mark pending for theory
    //         //     $isCorrect = false; // so manual grading needed
    //         // }

    //         // Update counters
    //         if ($isCorrect) {
    //             $yes_ans++;
    //         } else {
    //             $no_ans++;
    //         }

    //         // Add to results
    //         $result[] = [
    //             'question_id' => $questionId,
    //             'type'        => $questionType,
    //             'answer'      => $userAnswer,
    //             'correct'     => $correctAnswer,
    //             'status'      => $isCorrect ? 'YES' : ($questionType === 'theory' ? 'PENDING' : 'NO'),
    //             'ai_score'    => $questionType === 'theory' ? $aiScore : null,
    //             'ai_feedback' => $questionType === 'theory' ? $aiFeedback : null
    //         ];
    //     }

    //     // Update exam info
    //     $std_info = user_exam::where('user_id', Auth::id())
    //         ->where('exam_id', $request->exam_id)
    //         ->first();
    //     if ($std_info) {
    //         $std_info->exam_joined = 1;
    //         $std_info->update();
    //     }

    //     // Save results
    //     $res = new Oex_result();
    //     $res->exam_id = $request->exam_id;
    //     $res->user_id = Auth::id();
    //     $res->yes_ans = $yes_ans;
    //     $res->no_ans = $no_ans;
    //     $res->result_json = json_encode($result);
    //     $res->save();

    //     return redirect()->route('dashboard'); // adjust as needed
    // }




    //Applying for exam
    public function apply_exam($exam_id, $id)
    {


        $current_user = Auth::user()->id;

        $checkuser = user_exam::where('user_id', $current_user)->where('subject_id', $id)->get()->first();

        if ($checkuser) {
            $arr = array('status' => 'false', 'message' => 'Already applied, see your exam section');
        } else {
            $exam_user = new user_exam();

            $exam_user->user_id = $current_user;
            $exam_user->exam_id = $exam_id;
            $exam_user->subject_id = $id;
            $exam_user->std_status = 1;
            $exam_user->exam_joined = 0;

            $exam_user->save();

            $arr = array('status' => 'true', 'message' => 'Applied successfully', 'reload' => url('/showsubjects/' . $exam_id . '/view'));
        }

        echo json_encode($arr);
    }


    //View Result
    public function view_result(Oex_result $data)
    {


        // dd($data);
        $id = $data->id;
        $exam_id = $data->exam_id;
        $current_user = Auth::user()->id;
        $output['result_info'] = Oex_result::where('id', $id)->where('user_id', $current_user)->get()->first();

        // $users = Admin::where('role', 'user')->get();
        $output['student_info'] = User::where('id', $current_user)->get()->first();

        $output['exam_info'] = Subjects::where('id', $exam_id)->get()->first();
        // dd($output);
        return view('student.view_result', $output);
    }


    //View answer
    public function view_answer(Oex_result $data)
    {
        // $id = $data->id;
        $exam_id = $data->exam_id;
        $output['questions'] = Questions::where('subject_unique_id', $exam_id)->get()->toArray();
        // dd($output);
        return view('student.view_answer', $output);
    }
}

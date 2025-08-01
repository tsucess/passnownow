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
        // dd($request); 
        $data = $request->all();
        $yes_ans = 0;
        $no_ans = 0;
        $result = [];

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
            $isCorrect = false;

            // Handle question type
            if ($questionType === 'multiple' || $questionType === 'alternate') {
                $isCorrect = ($userAnswer == $correctAnswer);
            } elseif ($questionType === 'theory') {
                // Remove HTML tags and do basic string compare
                $cleanCorrect = strtolower(trim(strip_tags($correctAnswer)));
                $cleanUser = strtolower(trim($userAnswer));
                $isCorrect = ($cleanCorrect === $cleanUser);
                // Optional: Instead of marking wrong, mark pending for theory
                $isCorrect = false; // so manual grading needed
            }

            // Update counters
            if ($isCorrect) {
                $yes_ans++;
            } else {
                $no_ans++;
            }

            // Add to results
            $result[] = [
                'question_id' => $questionId,
                'type'        => $questionType,
                'answer'      => $userAnswer,
                'correct'     => $correctAnswer,
                'status'      => $isCorrect ? 'YES' : ($questionType === 'theory' ? 'PENDING' : 'NO')
            ];
        }

        // Update exam info
        $std_info = user_exam::where('user_id', Auth::id())
            ->where('exam_id', $request->exam_id)
            ->first();
        if ($std_info) {
            $std_info->exam_joined = 1;
            $std_info->update();
        }

        // Save results
        $res = new Oex_result();
        $res->exam_id = $request->exam_id;
        $res->user_id = Auth::id();
        $res->yes_ans = $yes_ans;
        $res->no_ans = $no_ans;
        $res->result_json = json_encode($result);
        $res->save();

        return redirect()->route('dashboard'); // adjust as needed
    }



    // public function submit_questions(Request $request)
    // {


    //     $current_user = Auth::user()->id;
    //     $yes_ans = 0;
    //     $no_ans = 0;
    //     $data = $request->all();
    //     dd($data);
    //     $result = array();
    //     for ($i = 1; $i <= $request->index; $i++) {

    //         if (isset($data['question' . $i])) {
    //             $q = Questions::where('id', $data['question' . $i])->get()->first();
    //             if ($q->ans == $data['ans' . $i]) {
    //                 $result[$data['question' . $i]] = 'YES';
    //                 $yes_ans++;
    //             } else {
    //                 $result[$data['question' . $i]] = 'NO';
    //                 $no_ans++;
    //             }
    //         }
    //     }


    //     $std_info = user_exam::where('user_id', $current_user)->where('exam_id', $request->exam_id)->get()->first();
    //     $std_info->exam_joined = 1;
    //     $std_info->update();


    //     $res = new Oex_result();
    //     $res->exam_id = $request->exam_id;
    //     $res->user_id = $current_user;
    //     $res->yes_ans = $yes_ans;
    //     $res->no_ans = $no_ans;
    //     $res->result_json = json_encode($result);

    //     echo $res->save();
    //     return redirect(url('admin.dashboard'));
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
        $id = $data->id;
        $exam_id = $data->exam_id;

        $output['questions'] = Questions::where('exam_id', $id)->get()->toArray();
        // dd($output);
        return view('student.view_answer', $output);
    }
}

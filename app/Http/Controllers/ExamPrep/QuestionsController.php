<?php

namespace App\Http\Controllers\ExamPrep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamPrep\Oex_exam_master;
use App\Models\ExamPrep\Questions;
use Illuminate\Support\Facades\Validator;
use App\Models\ExamPrep\Subjects;
use App\Models\User;
use App\Models\ExamPrep\Oex_result;
use App\Models\ExamPrep\user_exam;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index($id)
    // {
    //      $data['questions']=Questions::where('exam_id',$id)->get()->toArray();
    //     return view('admin.viewquestions',$data);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:' . Questions::class],
            'question' => ['required', 'string', 'max:255'],
            'question_type' => ['required', 'string', 'max:255'],
            'mark' => ['required', 'string', 'max:255'],
            'order' => ['sometimes', 'nullable', 'max:255']
        ]);

        $ans = null;
        $options = null;

        // dd($request->question_type);
        switch ($request->question_type) {
            case 'theory':
                $request->validate([
                    'ans' => ['required', 'string', 'max:10255'],
                ]);
                $ans = $request->ans;
                $options = json_encode(['option1' => 'None']);
                break;

            case 'alternate':
                $request->validate([
                    'ans' => ['required', 'string', 'max:10255'],
                    'option1' => ['required', 'string', 'max:10055'],
                    'option2' => ['required', 'string', 'max:10055'],
                ]);
                $ans = $request->ans == 'option1' ? $request->option1 : $request->option2;
                $options = json_encode(['option1' => $request->option1, 'option2' => $request->option2]);
                break;

            default:
                $request->validate([
                    'ans' => ['required', 'string', 'max:10255'],
                    'option1' => ['required', 'string', 'max:10055'],
                    'option2' => ['required', 'string', 'max:10055'],
                    'option3' => ['required', 'string', 'max:10055'],
                    'option4' => ['required', 'string', 'max:10055'],
                ]);
                $ans = $request->ans == 'option1' ? $request->option1 : ($request->ans == 'option2' ? $request->option2 : ($request->ans == 'option3' ? $request->option3 : $request->option4));
                $options = json_encode([
                    'option1' => $request->option1,
                    'option2' => $request->option2,
                    'option3' => $request->option3,
                    'option4' => $request->option4
                ]);
        }

        $done = Questions::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'question' => $request->question,
            'ans' => $ans,
            'mark' => $request->mark,
            'options' => $options,
            'question_type' => $request->question_type,
            'subject_unique_id' => $request->subject_id,
            'order' => $request->order,
            'status' => 1
        ]);

        $data = $request->sub_id;
        if ($done) {
            return redirect('/viewquestions/' . $data . '/view')->with('success', 'Question uploaded successfully');
        } else {
            return redirect('/viewquestions/' . $data . '/view')->with('error', 'Something went wrong');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Subjects $data, Questions $topics)
    {

        $subject_id = $data->id;
        $sub_id = $data->id;

        $output = Questions::where('subject_unique_id', $sub_id)->orderBy('order', 'asc')->get();

        $subject_name = $data->title;


        return view('admin.viewquestions', ['subject_name' => $subject_name, 'subject_id' => $subject_id, 'sub_id' => $sub_id, 'fetchQuestions' => $output]);
    }


    /**
     * Display the User specified resource.
     */
    public function usershow(Subjects $data)
    {

        $exam_id = $data->id;
        $ex_id = $data->id;
        $output = Questions::where('exam_unique_id', $ex_id)->distinct()->get(['year']);
        $result = [];
        foreach ($output as $key) {
            $result[] = Questions::where('exam_unique_id', $ex_id)->where('year', $key->year)->get();
        }
        return view('admin.showsubjects', ['exam' => $exam_id, 'ex_id' => $ex_id, 'userFetchQuestions' => $result, 'result' => $result]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    // public function showtopics(Subjects $data)
    // {
    //     $sub_id = $data->id;
    //     // dd($sub_id);
    //     $output = Questions::where('subject_unique_id', $sub_id)->distinct()->get(['term']);
    //     $result = [];
    //     foreach ($output as $key) {
    //         $result[] = Questions::where('subject_unique_id', $sub_id)->where('term', $key->term)->get();
    //     }

    //     $resultoutput = Questions::where('subject_unique_id', $sub_id)->get();


    //     return view('admin.learning', ['userFetchTopics' => $result, 'restopics' => $resultoutput]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Questions $data)
    {
        // dd($request);
        $request->validate([
            'edit_question' => ['required', 'string', 'max:255'],
            'edit_question_type' => ['required', 'string', 'max:255'],
            'edit_mark' => ['required', 'string', 'max:255'],
            'edit_order' => ['sometimes', 'nullable', 'max:255']
        ]);

        $ans = null;
        $options = null;

        // dd($request->edit_question_type);
        switch ($request->edit_question_type) {
            case 'theory':
                $request->validate([
                    'edit_ans' => ['required', 'string', 'max:100255'],
                ]);
                $ans = $request->edit_ans;
                $options = json_encode(['option1' => 'None']);
                break;

            case 'alternate':
                $request->validate([
                    'edit_ans' => ['required', 'string', 'max:10255'],
                    'edit_option1' => ['required', 'string', 'max:10055'],
                    'edit_option2' => ['required', 'string', 'max:10055'],
                ]);
                $ans = $request->edit_ans == 'option1' ? $request->edit_option1 : $request->edit_option2;
                $options = json_encode([
                    'option1' => $request->edit_option1,
                    'option2' => $request->edit_option2
                ]);
                break;

            default:
                $request->validate([
                    'edit_ans' => ['required', 'string', 'max:10255'],
                    'edit_option1' => ['required', 'string', 'max:10055'],
                    'edit_option2' => ['required', 'string', 'max:10055'],
                    'edit_option3' => ['required', 'string', 'max:10055'],
                    'edit_option4' => ['required', 'string', 'max:10055'],
                ]);
                $ans = $request->edit_ans == 'option1' ? $request->edit_option1 : ($request->edit_ans == 'option2' ? $request->edit_option2 : ($request->edit_ans == 'option3' ? $request->edit_option3 : $request->edit_option4));
                $options = json_encode([
                    'option1' => $request->edit_option1,
                    'option2' => $request->edit_option2,
                    'option3' => $request->edit_option3,
                    'option4' => $request->edit_option4
                ]);
        }

        $data_id = $request->subject_id;
      
        $subject = Questions::find($request->id);
        // dd($subject);
        if ($subject) {
            $subject->question = $request->edit_question;
            $subject->question_type = $request->edit_question_type;
            $subject->order = $request->edit_order;
            $subject->mark = $request->edit_mark;
            $subject->ans = $ans;
            $subject->options = $options;



            $subject->save();
            return redirect('/viewquestions/' . $data_id . '/view')->with('success', 'Question updated successfully');
        } else {
            return redirect('/viewquestions/' . $data_id . '/view')->with('error', 'Something went wrong');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questions $data)
    {
        // dd($data);
        $done = $data->delete();
        if ($done) {
            return redirect('/viewquestions/' . $data->subject_unique_id . '/view')->with('success', 'Topic deleted successfully');
        } else {
            return redirect('/viewquestions/' . $data->subject_unique_id . '/view')->with('error', 'Something went wrong');
        };
    }







    //Edit question status
    public function question_status($id)
    {
        $p = Questions::where('id', $id)->get()->first();

        if ($p->status == 1)
            $status = 0;
        else
            $status = 1;

        $p1 = Questions::where('id', $id)->get()->first();
        $p1->status = $status;
        $p1->update();
    }


    //Delete questions
    // public function delete_question($id)
    // {

    //     $q = Questions::where('id', $id)->get()->first();
    //     $exam_id = $q->exam_id;
    //     $q->delete();

    //     return redirect(url('admin/add_questions/' . $exam_id));
    // }



    //update questions
    public function update_question($id)
    {

        $data['q'] = Questions::where('id', $id)->get()->toArray();

        return view('admin.update_question', $data);
    }


    //Edit question
    public function edit_question_inner(Request $request)
    {

        $q = Questions::where('id', $request->id)->get()->first();

        $q->questions = $request->question;

        if ($request->ans == 'option_1') {
            $q->ans = $request->option_1;
        } elseif ($request->ans == 'option_2') {
            $q->ans = $request->option_2;
        } elseif ($request->ans == 'option_3') {
            $q->ans = $request->option_3;
        } else {
            $q->ans = $request->option_4;
        }

        $q->options = json_encode(array('option1' => $request->option_1, 'option2' => $request->option_2, 'option3' => $request->option_3, 'option4' => $request->option_4));

        $q->update();

        echo json_encode(array('status' => 'true', 'message' => 'successfully updated', 'reload' => url('admin/add_questions/' . $q->exam_id)));
    }


    public function admin_view_result($id)
    {

        $std_exam = user_exam::where('id', $id)->get()->first();

        $data['student_info'] = User::where('id', $std_exam->user_id)->get()->first();

        $data['exam_info'] = Oex_exam_master::where('id', $std_exam->exam_id)->get()->first();

        $data['result_info'] = Oex_result::where('exam_id', $std_exam->exam_id)->where('user_id', $std_exam->user_id)->get()->first();

        return view('admin.admin_view_result', $data);
    }
}

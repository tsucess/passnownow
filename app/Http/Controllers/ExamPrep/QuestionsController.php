<?php

namespace App\Http\Controllers\ExamPrep;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamPrep\Oex_exam_master;
// use App\Models\ExamPrep\Oex_question_master;
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
    public function index($id)
    {
         $data['questions']=Questions::where('exam_id',$id)->get()->toArray();
        return view('admin.viewquestions',$data);
    }

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
        // dd($request);
        $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:' . Questions::class],
            'title' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'max:10055'],
            'content_type' => ['required', 'string', 'max:255'],
            'term' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer', 'max:255']
        ]);

        $data = $request->sub_id;

        // dd($request);

        $done = Questions::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'url' => $request->url,
            'content' => $request->content,
            'content_type' => $request->content_type,
            'subject_unique_id' => $request->subject_id,
            'term' => $request->term,
            'order' => $request->order
        ]);

        if ($done) {
            return redirect('/viewquestions/' . $data . '/view')->with('success', 'New Topic added successfully');
        } else {
            return redirect('/viewquestions/' . $data . '/view')->with('error', 'Something went wrong');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Subjects $data, Questions $topics)
    {
        // dd($data);

        $subject_id = $data->id;
        $sub_id = $data->id;

        $output = Questions::where('subject_unique_id', $sub_id)->orderBy('term', 'asc')->orderBy('order', 'asc')->get();
        return view('admin.viewquestions', ['subject' => $subject_id, 'sub_id' => $sub_id, 'fetchTopics' => $output]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showtopics(Subjects $data)
    {
        $sub_id = $data->id;
        // dd($sub_id);
        $output = Questions::where('subject_unique_id', $sub_id)->distinct()->get(['term']);
        $result = [];
        foreach ($output as $key ) {
            $result[] = Questions::where('subject_unique_id', $sub_id)->where('term', $key->term)->get(); 
        }
 
            $resultoutput = Questions::where('subject_unique_id', $sub_id)->get();
      

        return view('admin.learning', ['userFetchTopics' => $result, 'restopics' => $resultoutput]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Questions $data)
    {
        // dd($request);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'edit_order' => ['sometimes', 'integer', 'max:255'],
        ]);

        $data_id = $request->subject_id;
      
        $class = Questions::find($request->id);
        // dd($class);
        if ($class) {
            $class->title = $request->title;
            $class->content = $request->content;
            $class->order = $request->edit_order;
            if ($request->term) {
                $class->term = $request->term;
            }
            else
            {
                $class->term = $request->prevterm;
            }


            $class->save();
            return redirect('/viewquestions/' . $data_id . '/view')->with('success', 'Topic updated successfully');
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



/**
 * New Updated code
 */



      //addning questions
    // public function add_questions($id){

    //     $data['questions']=Questions::where('exam_id',$id)->get()->toArray();
    //     return view('admin.add_questions',$data);
    // }


    //adding new questions
    public function add_new_question(Request $request){

        $validator = Validator::make($request->all(),[
            'question'=>'required',
            'option_1'=>'required',
            'option_2'=>'required',
            'option_3'=>'required',
            'option_4'=>'required',
            'ans'=>'required'
        ]);

        if($validator->fails()){
            $arr = array('status'=>'flase','message'=>$validator->errors()->all());

        }else{
           
            $q = new Questions();
            $q->exam_id=$request->exam_id;
            $q->questions=$request->question;

            if($request->ans=='option_1'){
                $q->ans=$request->option_1;
            }elseif($request->ans=='option_2'){
                $q->ans=$request->option_2;
            }elseif($request->ans=='option_3'){
                $q->ans=$request->option_3;
            }else{
                $q->ans=$request->option_4;
            }
            


            $q->status=1;
            $q->options=json_encode(array('option1'=>$request->option_1,'option2'=>$request->option_2,'option3'=>$request->option_3,'option4'=>$request->option_4));

            $q->save();

            $arr = array('status'=>'true','message'=>'successfully added','reload'=>url('admin/add_questions/'.$request->exam_id));
        }

        echo json_encode($arr);
    }



    //Edit question status
    public function question_status($id){
        $p = Questions::where('id',$id)->get()->first();

        if($p->status==1)
            $status=0;
        else
            $status=1;
        
        $p1 = Questions::where('id',$id)->get()->first();
        $p1->status=$status;
        $p1->update();
    }


    //Delete questions
    public function delete_question($id){

        $q=Questions::where('id',$id)->get()->first();
        $exam_id = $q->exam_id;
        $q->delete();

        return redirect(url('admin/add_questions/'.$exam_id));
    }



    //update questions
    public function update_question($id){

        $data['q']=Questions::where('id',$id)->get()->toArray();

        return view('admin.update_question',$data);
    }


    //Edit question
    public function edit_question_inner(Request $request){

        $q=Questions::where('id',$request->id)->get()->first();

        $q->questions = $request->question;

        if($request->ans=='option_1'){
            $q->ans=$request->option_1;
        }elseif($request->ans=='option_2'){
            $q->ans=$request->option_2;
        }elseif($request->ans=='option_3'){
            $q->ans=$request->option_3;
        }else{
            $q->ans=$request->option_4;
        }

        $q->options = json_encode(array('option1'=>$request->option_1,'option2'=>$request->option_2,'option3'=>$request->option_3,'option4'=>$request->option_4));
        
        $q->update();

        echo json_encode(array('status'=>'true','message'=>'successfully updated','reload'=>url('admin/add_questions/'.$q->exam_id)));

    }


    public function admin_view_result($id){
        
        $std_exam = user_exam::where('id',$id)->get()->first();
        
        $data['student_info'] = User::where('id',$std_exam->user_id)->get()->first();

        $data['exam_info'] = Oex_exam_master::where('id',$std_exam->exam_id)->get()->first();

        $data['result_info'] = Oex_result::where('exam_id',$std_exam->exam_id)->where('user_id',$std_exam->user_id)->get()->first();

        return view('admin.admin_view_result',$data);


    }



}

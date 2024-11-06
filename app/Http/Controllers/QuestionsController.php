<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Exams;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adpastquestions');
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
            'description' => ['sometimes', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'order' => ['sometimes', 'integer', 'max:255']
        ]);

        $data = $request->ex_id;

        // dd($request);
        $done = Questions::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'url' => $request->url,
            'exam_unique_id' => $request->exam_id,
            'order' => $request->order
        ]);

        if ($done) {
            return redirect('/adpastquestions/' . $data . '/view')->with('success', 'New Question added successfully');
        } else {
            return redirect('/adpastquestions/' . $data . '/view')->with('error', 'Something went wrong');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Exams $data)
    {

        $exam_id = $data->id;
        $ex_id = $data->id;

        $output = Questions::where('exam_unique_id', $ex_id)->get();
        return view('admin.adpastquestions', ['exam' => $exam_id, 'ex_id' => $ex_id, 'fetchQuestions' => $output]);
    }
    
    /**
     * Display the User specified resource.
     */
    public function usershow(Exams $data)
    {

        $exam_id = $data->id;
        $ex_id = $data->id;
        $output = Questions::where('exam_unique_id', $ex_id)->distinct()->get(['year']);
        $result = [];
        foreach ($output as $key ) {
            $result[] = Questions::where('exam_unique_id', $ex_id)->where('year', $key->year)->get();
        }
        return view('admin.showpastquestions', ['exam' => $exam_id, 'ex_id' => $ex_id, 'userFetchQuestions' => $result, 'result' => $result]);
    }


    /**
     * Display the User specified resource.
     */
    public function showpastquest(Exams $detail, Questions $data)
    {
        
        $exam_id = $data->id;
        $exam_year = $data->year;
        $exam_unique = $data->exam_unique_id;
        // dd($exam_unique);
        $results = Exams::get();
        $output = [];
        foreach ($results as $result) {
            $output[] = Questions::where('exam_unique_id', $result->id)->where('year', $exam_year)->get();
            // print_r($result->id);
        }
     
        // return view('admin.pqlearning', ['yearFetchQuestions' => $result]);
        return view('admin.pqlearning', ['yearFetchQuestions' => $output]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Questions $data)
    {
        // dd($request);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['sometimes', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'edit_order' => ['sometimes', 'integer', 'max:255'],
        ]);

        $data_id = $request->exam_id;
      
        $class = Questions::find($request->id);
        // dd($class);
        if ($class) {
            $class->title = $request->title;
            $class->description = $request->description;
            $class->url = $request->url;
            $class->order = $request->edit_order;

            if ($request->year) {
                $class->year = $request->year;
            }
            else
            {
                $class->year = $request->prevyear;
            }
            $class->save();
            return redirect('/adpastquestions/'.$data_id.'/view')->with('success', 'Question updated successfully');
        } else {
            return redirect('/adpastquestions/'.$data_id.'/view')->with('error', 'Something went wrong');
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
            return redirect('/adpastquestions/'.$data->exam_unique_id.'/view')->with('success', 'Question deleted successfully');
        } else {
            return redirect('/adpastquestions/'.$data->exam_unique_id.'/view')->with('error', 'Something went wrong');
        };
    }
}

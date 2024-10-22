<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subjects;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adquestions');
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
            'url' => ['required', 'string', 'max:255'],
            'order' => ['sometimes', 'integer', 'max:255']
        ]);

        $data = $request->ex_id;

        // dd($request);
        $done = Questions::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'url' => $request->url,
            'exam_unique_id' => $request->exam_id,
            'order' => $request->order
        ]);

        if ($done) {
            return redirect('/adquestions/' . $data . '/view')->with('success', 'New Topic added successfully');
        } else {
            return redirect('/adquestions/' . $data . '/view')->with('error', 'Something went wrong');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Subjects $data, Questions $topics)
    {
        // dd($data);

        $exam_id = $data->id;
        $ex_id = $data->id;

        $output = Questions::where('exam_unique_id', $ex_id)->get();
        return view('admin.adquestions', ['exam' => $exam_id, 'ex_id' => $ex_id, 'fetchQuestions' => $output]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $topics)
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
            'url' => ['required', 'string', 'max:255'],
            'edit_order' => ['sometimes', 'integer', 'max:255'],
        ]);

        $data_id = $request->exam_id;
      
        $class = Questions::find($request->id);
        // dd($class);
        if ($class) {
            $class->title = $request->title;
            $class->url = $request->url;
            $class->order = $request->edit_order;

            $class->save();
            return redirect('/adquestions/' . $data_id . '/view')->with('success', 'Topic updated successfully');
        } else {
            return redirect('/adquestions/' . $data_id . '/view')->with('error', 'Something went wrong');
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
            return redirect('/adquestions/' . $data->exam_unique_id . '/view')->with('success', 'Topic deleted successfully');
        } else {
            return redirect('/adquestions/' . $data->exam_unique_id . '/view')->with('error', 'Something went wrong');
        };
    }
}

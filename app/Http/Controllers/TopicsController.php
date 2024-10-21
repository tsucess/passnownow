<?php

namespace App\Http\Controllers;

use App\Models\Topics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subjects;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.viewtopics');
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
            'unique_id' => ['required', 'string', 'max:255', 'unique:' . Topics::class],
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'order' => ['sometimes', 'integer', 'max:255']
        ]);

        $data = $request->sub_id;

        // dd($request);
        $done = Topics::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'url' => $request->url,
            'subject_unique_id' => $request->subject_id,
            'order' => $request->order
        ]);

        if ($done) {
            return redirect('/viewtopics/' . $data . '/view')->with('success', 'New Topic added successfully');
        } else {
            return redirect('/viewtopics/' . $data . '/view')->with('error', 'Something went wrong');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Subjects $data, Topics $topics)
    {
        // dd($data);

        $subject_id = $data->id;
        $sub_id = $data->id;

        $output = Topics::where('subject_unique_id', $sub_id)->get();
        return view('admin.viewtopics', ['subject' => $subject_id, 'sub_id' => $sub_id, 'fetchTopics' => $output]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topics $topics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topics $data)
    {
        // dd($request);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'edit_order' => ['sometimes', 'integer', 'max:255'],
        ]);

        $data_id = $request->subject_id;
      
        $class = Topics::find($request->id);
        // dd($class);
        if ($class) {
            $class->title = $request->title;
            $class->url = $request->url;
            $class->order = $request->edit_order;

            $class->save();
            return redirect('/viewtopics/' . $data_id . '/view')->with('success', 'Topic updated successfully');
        } else {
            return redirect('/viewtopics/' . $data_id . '/view')->with('error', 'Something went wrong');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topics $data)
    {
        // dd($data);
        $done = $data->delete();
        if ($done) {
            return redirect('/viewtopics/' . $data->subject_unique_id . '/view')->with('success', 'Topic deleted successfully');
        } else {
            return redirect('/viewtopics/' . $data->subject_unique_id . '/view')->with('error', 'Something went wrong');
        };
    }
}

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
            'url' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string', 'max:10055'],
            'content_type' => ['required', 'string', 'max:255'],
            'term' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer', 'max:255']
        ]);

        $data = $request->sub_id;

        // dd($request);

        $done = Topics::create([
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

        $output = Topics::where('subject_unique_id', $sub_id)->orderBy('term', 'asc')->orderBy('order', 'asc')->get();
        return view('admin.viewtopics', ['subject' => $subject_id, 'sub_id' => $sub_id, 'fetchTopics' => $output]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showtopics(Subjects $data)
    {
        $sub_id = $data->id;
        // dd($sub_id);
        $output = Topics::where('subject_unique_id', $sub_id)->distinct()->get(['term']);
        $result = [];
        foreach ($output as $key ) {
            $result[] = Topics::where('subject_unique_id', $sub_id)->where('term', $key->term)->get(); 
        }
 
            $resultoutput = Topics::where('subject_unique_id', $sub_id)->get();
      

        return view('admin.learning', ['userFetchTopics' => $result, 'restopics' => $resultoutput]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topics $data)
    {
        // dd($request);
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'edit_order' => ['sometimes', 'integer', 'max:255'],
        ]);

        $data_id = $request->subject_id;
      
        $class = Topics::find($request->id);
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

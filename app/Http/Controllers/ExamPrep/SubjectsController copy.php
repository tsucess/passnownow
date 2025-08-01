<?php

namespace App\Http\Controllers\ExamPrep;

use App\Http\Controllers\Controller;
use App\Models\ExamPrep\Classes;
use App\Models\ExamPrep\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adsubjects');
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
        //dd($request);
        $data = $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:' . Subjects::class],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'class_id' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        $avatar = $request->file('avatar')->store('upload');

        $done = Subjects::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'description' => $request->description,
            'class_unique_id' => $request->class_id,
            'avatar' => $avatar
        ]);

        if($done) {
            return redirect('/adsubjects')->with('success', 'New Subject Created successfully');
        } else {
            return redirect('/adsubjects')->with('error', 'Something went wrong');
        };
    }







 /**
     * Display the specified subject data resource.
     */
    public function display(Classes $data)
    {
        // dd($data);
       
        $subject_id = $data->id;
        $class_id = $data->title;

        $output = Subjects::where('class_unique_id', $class_id)->orderBy('title', 'asc')->get();
        return view('admin.subject', ['fetchSubjects' => $output]);
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $classdata = Classes::get();
        $output = Subjects::orderBy('class_unique_id', 'asc')->get();
        return view('admin.adsubjects', ['fetchSubjects' => $output, 'fetchClasses' => $classdata]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        // dd($request);


        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'class_id' => ['sometimes', 'nullable', 'max:255'],
            'avatar' => ['sometimes', 'mimes:jpg,png,jpeg', 'max:2048', 'image']
        ]);



        $class = Subjects::find($request->id);
        // dd($class);
        if ($class) {
            $class->title = $request->title;
            $class->description = $request->description;
            if ($request->class_id) {
                $class->class_unique_id = $request->class_id;
            }
            else
            {
                $class->class_unique_id = $request->prevclass;
            }

            if ($request->avatar) {
                // dd($request->prevavatar);
                File::delete(storage_path('app/public/'.$request->prevavatar));
                $avatar = $request->file('avatar')->store('upload');
                $class->avatar = $avatar;
            }
            else
            {
                $class->avatar = $request->prevavatar;
            }
            $class->save();
            return redirect('/adsubjects')->with('success', 'Subjects updated Successfully');
        } else {
            return redirect('/adsubjects')->with('error', 'Something went wrong');
        };
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subjects $data)
    {
        File::delete(storage_path('app/public/'.$data->avatar));
        $done = $data->delete();
        if ($done) {
            return redirect('/adsubjects')->with('success', 'Subject` deleted successfully');
        } else {
            return redirect('/adsubjects')->with('error', 'Something went wrong');
        };
    }
}

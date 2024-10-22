<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.adexams');
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
          //dd($request->input('avatar'));
       $data = $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:' . Exams::class],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'mimes:jpeg,jpg,png', 'max:2048']
        ]);



        $avatar = $request->file('avatar')->store('upload');


        // Add class
        $done = Exams::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'description' => $request->description,
            'avatar' => $avatar
        ]);


        if($done) {
            return redirect('/adexams')->with('success', 'New Exam Information Created successfully');
        } else {
            return redirect('/adexams')->with('error', 'Something went wrong');
        };


    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
        $output = Exams::get();
        // dd($output);
        return view('admin.adexams', ['fetchExams' => $output]);
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
            'avatar' => ['sometimes', 'mimes:jpeg,jpg,png', 'max:2048']
        ]);

        $exam = Exams::find($request->id);
        // dd($class);
        if ($exam) {
            $exam->title = $request->title;
            $exam->description = $request->description;

            if ($request->avatar) {
                // dd($request->prevavatar);
                File::delete(storage_path('app/public/'.$request->prevavatar));
                $avatar = $request->file('avatar')->store('upload');
                $exam->avatar = $avatar;
            }
            else
            {
                $exam->avatar = $request->prevavatar;
            }
            $exam->save();
            return redirect('/adexams')->with('success', 'Exam updated Successfully');
        } else {
            return redirect('/adexams')->with('error', 'Something went wrong');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exams $data)
    {
    
        File::delete(storage_path('app/public/'.$data->avatar));
        $done = $data->delete();
        if ($done) {

            return redirect('/adexams')->with('success', 'Exam deleted successfully');
        } else {
            return redirect('/adexams')->with('error', 'Something went wrong');
        };
    }


}







































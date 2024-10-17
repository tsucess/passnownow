<?php

namespace App\Http\Controllers;

use App\Models\Exams;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.adExams');
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
        //
        //dd($request);
        $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:'.Exams::class],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            // 'subject_image' => ['required|image|mimes:jpeg, jpg, gif, png|max:2048'],
            'avatar' => ['required', 'mimes:jpeg, jpg, png, gif', 'max:2048'],
        ]);



        //dd($request);
        // Add class
        $finish = Exams::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'description' => $request->description,
            'avatar' => $request->avatar,
            // 'class' => $request->class
        ]);






        if ($finish) {
            return redirect('/adexams')->with('success', 'New Exam Information Created successfully');
        } else {
            return redirect('/adexams')->with('error', 'Something went wrong');
        };


    }





    /**
     * Display the specified resource.
     */
    public function show(Exams $exams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exams $exams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exams $exams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exams $exams)
    {
        //
    }


}







































<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.classes');
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:'.Classes::class],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        $avatar = $request->file('avatar')->store('upload');


        // dd($request);
        // Add class
        $done = Classes::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'description' => $request->description,
            'avatar' => $avatar
        ]);

        if ($done) {
            return redirect('/classes')->with('success', 'New Class Created successfully');
        } else {
            return redirect('/classes')->with('error', 'Something went wrong');
        };


    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $output = Classes::get();
        return view('admin.classes', ['fetchClasses' => $output]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'avatar' => ['sometimes', 'mimes:jpg,png,jpeg', 'max:2048', 'image']
        ]);


        $class = Classes::find($request->id);
        if ($class) {
            $class->title = $request->title;
            $class->description = $request->description;

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
        // if ($done) {
            return redirect('/classes')->with('success', 'Class updated Successfully');
            } else {
                return redirect('/classes')->with('error', 'Something went wrong');
            };

    
    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $data)
    {
        File::delete(storage_path('app/public/'.$data->avatar));
        $done = $data->delete();
        if ($done) {
            return redirect('/classes')->with('success', 'Class deleted successfully');
        } else {
            return redirect('/classes')->with('error', 'Something went wrong');
        };

    }
}

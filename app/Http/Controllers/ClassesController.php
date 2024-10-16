<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    // public function create()
    // {
    //     return view('admin.classes');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'unique_id' => ['required', 'string', 'max:255', 'unique:'.Classes::class],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255']
        ]);

        // dd($request);
        // Add class
        $done = Classes::create([
            'unique_id' => $request->unique_id,
            'user_unique_id' => Auth::user()->unique_id,
            'title' => $request->title,
            'description' => $request->description,
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
        $classes = Classes::get();
        return view('admin.classes', ['fetchClasses' => $classes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {

    //     $class = Classes::find($id);
    //     if ($class) {
    //         return response()->json([
    //             'status' => 200,
    //             'employee' => $class
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => 'Employee not found'
    //         ]);
    //     }
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);


        $class = Classes::find($request->id);
        if ($class) {
            $class->title = $request->title;
            $class->description = $request->description;
            $class->save();
        // if ($done) {
            return redirect('/classes')->with('success', 'Class updated Successfully');
            } else {
                return redirect('/classes')->with('error', 'Something went wrong');
            };

        //     return response()->json([
        //         'status' => 200,
        //         'message' => 'Employee updated successfully'
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => 404,
        //         'message' => 'Employee not found'
        //     ]);
        // }

    }







    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $data)
    {
        $done = $data->delete();
        if ($done) {
            return redirect('/classes')->with('success', 'Class deleted successfully');
        } else {
            return redirect('/classes')->with('error', 'Something went wrong');
        };
       
    }
}

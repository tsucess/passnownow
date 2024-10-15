<?php

namespace App\Http\Controllers;

use App\Models\Classes;
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
    public function create()
    {
        return view('admin.classes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('admin.classes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        return view('admin.classes');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        return view('admin.classes');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        return view('admin.classes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        return view('admin.classes');
    }
}

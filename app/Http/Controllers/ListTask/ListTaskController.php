<?php

namespace App\Http\Controllers\ListTask;

use App\Http\Controllers\Controller;
use App\ListTask;
use Illuminate\Http\Request;

class ListTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
          'data' => $request->user->projects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListTask  $listTask
     * @return \Illuminate\Http\Response
     */
    public function show(ListTask $listTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListTask  $listTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListTask $listTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListTask  $listTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListTask $listTask)
    {
        //
    }
}

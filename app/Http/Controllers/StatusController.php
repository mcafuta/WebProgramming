<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuses = Status::where('user_id', $request->user()->id)->byDate()->get();

        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StatusRequest|\Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        Status::create(array_merge($request->all(), [ 'user_id' => $request->user()->id ]));

        return redirect('statuses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Status::findOrFail($id);

        return view('statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StatusRequest|\Illuminate\Http\Request $request
     * @param  int                                                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
        Status::findOrFail($id)->update($request->all());

        return redirect('/statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Status::findOrFail($id)->delete();

        return "success";
    }
}

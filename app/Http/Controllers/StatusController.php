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
        $statuses = Status::mine($request)->byDate()->get();

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
        $request->user()->statuses()->create($this->prepareData($request->all()));

        return redirect('statuses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Status|int $status
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        $this->authorize('update', $status);

        return view('statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StatusRequest|\Illuminate\Http\Request $request
     * @param \App\Status                                               $status
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     *
     */
    public function update(StatusRequest $request, Status $status)
    {
        $this->authorize('update', $status);
        $status->update($this->prepareData($request->all()));

        return redirect('statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Status|int $status
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $this->authorize('delete', $status);
        $status->delete();

        return "success";
    }

    private function prepareData(array $data)
    {
        if ( in_array($data['type'], [ 'income', 'expense' ]) )
            $data['due_date'] = null;

        return $data;
    }
}

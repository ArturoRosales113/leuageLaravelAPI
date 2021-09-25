<?php

namespace App\Http\Controllers;

use App\Models\Referee;
use Illuminate\Http\Request;

use App\Http\Requests\RefereeStoreRequest;
use App\Http\Requests\RefereeCreateRequest;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Referee::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RefereeCreateRequest $request)
    {
        $referee = Referee::create($request->all());
        
        return response()->json($referee, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referee  $referee
     * @return \Illuminate\Http\Response
     */
    public function show(Referee $referee)
    {
        return $referee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referee  $referee
     * @return \Illuminate\Http\Response
     */
    public function edit(Referee $referee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referee  $referee
     * @return \Illuminate\Http\Response
     */
    public function update(RefereeStoreRequest $request, Referee $referee)
    {
        $referee->update($request->all());
        return response()->json($referee, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referee  $referee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referee $referee)
    {
        $referee->delete();
        return response()->json(null, 204);
    }
}

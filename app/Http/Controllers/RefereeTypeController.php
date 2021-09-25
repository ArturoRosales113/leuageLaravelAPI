<?php

namespace App\Http\Controllers;

use App\Models\RefereeType;
use Illuminate\Http\Request;

use App\Http\Requests\RefereeTypeCreateRequest;
use App\Http\Requests\RefereeTypeStoreRequest;

class RefereeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefereeType::all())
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
    public function store(RefereeTypeCreateRequest $request)
    {
        $refereeType = RefereeType::create($request->all());
        
        return response()->json($refereeType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefereeType  $refereeType
     * @return \Illuminate\Http\Response
     */
    public function show(RefereeType $refereeType)
    {
        return $refereeType;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefereeType  $refereeType
     * @return \Illuminate\Http\Response
     */
    public function edit(RefereeType $refereeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefereeType  $refereeType
     * @return \Illuminate\Http\Response
     */
    public function update(RefereeTypeStoreRequest $request, RefereeType $refereeType)
    {
        $refereeType->update($request->all());

        return response()->json($refereeType, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefereeType  $refereeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefereeType $refereeType)
    {
        $refereeType->delete();
        return response()->json(null, 204);
    }
}

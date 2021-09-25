<?php

namespace App\Http\Controllers;

use App\Models\Modalitie;
use Illuminate\Http\Request;

class ModalitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Modalitie::all(),200);
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
    public function store(ModalitieCreateRequest $request)
    {
        $modalitie = Modalitie::create($request->all());
        
        return response()->json($modalitie, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modalitie  $modalitie
     * @return \Illuminate\Http\Response
     */
    public function show(Modalitie $modalitie)
    {
        return $modalitie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modalitie  $modalitie
     * @return \Illuminate\Http\Response
     */
    public function edit(Modalitie $modalitie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modalitie  $modalitie
     * @return \Illuminate\Http\Response
     */
    public function update(ModalitieStoreRequest $request, Modalitie $modalitie)
    {
        $modalitie->update($request->all());

        return response()->json($modalitie, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modalitie  $modalitie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modalitie $modalitie)
    {
        $modalitie->delete();
        return response()->json(null, 204);
    }
}

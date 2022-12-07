<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOriginRequest;
use App\Http\Requests\UpdateOriginRequest;
use App\Models\Origin;
use Illuminate\Http\Request;


class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Origin::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'unique:origins|required|string|min:3'
        ]);


        $origin = Origin::create($validated);
        return $origin;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOriginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOriginRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function show(Origin $origin)
    {
        return $origin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function edit(Origin $origin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOriginRequest  $request
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOriginRequest $request, Origin $origin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Origin $origin)
    {
        //
    }
}

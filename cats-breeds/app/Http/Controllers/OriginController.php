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
    public function update(Request $request, $id)
    {
        $origin = Origin::find($id);
        
        if(!$origin){
            return abort(403, "Record not found!!");
        }

        $validated = $request->validate([
            'name'=> 'required|string|min:3|unique:origins,name,'.$origin->id
        ]);

        return $origin->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $origin = Origin::find($id);
        
        if(!$origin){
            return abort(403, "Record not found!!");
        }

        if($origin->cats()->exists()){
            return abort(403, "Can not delete! There are cats with this category!");
        }

        return $origin->delete();
    }
}

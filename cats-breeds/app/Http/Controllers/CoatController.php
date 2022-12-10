<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoatRequest;
use App\Http\Requests\UpdateCoatRequest;
use App\Models\Coat;
use Illuminate\Http\Request;


class CoatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Coat::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'unique:coats|required|string|min:3'
        ]);


        $coat = Coat::create($validated);
        return $coat;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coat  $coat
     * @return \Illuminate\Http\Response
     */
    public function show(Coat $coat)
    {
        return $coat;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coat  $coat
     * @return \Illuminate\Http\Response
     */
    public function edit(Coat $coat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoatRequest  $request
     * @param  \App\Models\Coat  $coat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coat = Coat::find($id);
        
        if(!$coat){
            return abort(403, "Record not found!!");
        }

        $validated = $request->validate([
            'name'=> 'required|string|min:3|unique:coats,name,'.$coat->id
        ]);

        return $coat->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coat  $coat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coat = Coat::find($id);
        
        if(!$coat){
            return abort(403, "Record not found!!");
        }

        if($coat->cats()->exists()){
            return abort(403, "Can not delete! There are cats with this category!");
        }

        return $coat->delete();
    }
}

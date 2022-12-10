<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBreedRequest;
use App\Http\Requests\UpdateBreedRequest;
use App\Models\Breed;
use Illuminate\Http\Request;


class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Breed::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'unique:breeds|required|string|min:3'
        ]);


        $breed = Breed::create($validated);
        return $breed;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBreedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBreedRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function show(Breed $breed)
    {
        return $breed;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function edit(Breed $breed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBreedRequest  $request
     * @param  \App\Models\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $breed = Breed::find($id);
        
        if(!$breed){
            return abort(403, "Record not found!!");
        }

        $validated = $request->validate([
            'name'=> 'required|string|min:3|unique:breeds,name,'.$breed->id
        ]);

        return $breed->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breed  $breed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $breed = Breed::find($id);
        
        if(!$breed){
            return abort(403, "Record not found!!");
        }

        if($breed->cats()->exists()){
            return abort(403, "Can not delete! There are cats with this category!");
        }

        return $breed->delete();
    }
}

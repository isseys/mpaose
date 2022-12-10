<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatternRequest;
use App\Http\Requests\UpdatePatternRequest;
use App\Models\Pattern;
use Illuminate\Http\Request;


class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pattern::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'unique:patterns|required|string|min:3'
        ]);


        $pattern = Pattern::create($validated);
        return $pattern;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatternRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatternRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function show(Pattern $pattern)
    {
        return $pattern;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function edit(Pattern $pattern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatternRequest  $request
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pattern = Pattern::find($id);
        
        if(!$pattern){
            return abort(403, "Record not found!!");
        }

        $validated = $request->validate([
            'name'=> 'required|string|min:3|unique:patterns,name,'.$pattern->id
        ]);

        return $pattern->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pattern = Pattern::find($id);
        
        if(!$pattern){
            return abort(403, "Record not found!!");
        }

        if($pattern->cats()->exists()){
            return abort(403, "Can not delete! There are cats with this category!");
        }

        return $pattern->delete();
    }
}

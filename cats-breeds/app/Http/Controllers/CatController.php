<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Models\Cat;
use App\Models\Pattern;
use App\Models\Body;
use App\Models\Breed;
use App\Models\Coat;
use App\Models\Origin;
use App\Models\Type;
use Illuminate\Http\Request;


class CatController extends Controller
{
    /**
     * Display a listing of the searched cats.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        return Cat::when($request->description, function($query, $description){
            $query->where('description', 'like', '%'. $description . '%');
        })->when($request->body_id, function($query, $body_id){
            $query->where('body_id', $body_id);
        })->when($request->breed_id, function($query, $breed_id){
            $query->where('breed_id', $breed_id);
        })->when($request->coat_id, function($query, $coat_id){
            $query->where('coat_id', $coat_id);
        })->when($request->origin_id, function($query, $origin_id){
            $query->where('origin_id', $origin_id);
        })->when($request->pattern_id, function($query, $pattern_id){
            $query->where('pattern_id', $pattern_id);
        })->when($request->type_id, function($query, $type_id){
            $query->where('type_id', $type_id);
        })
        ->with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cat::with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pattern(Pattern $pattern)
    {
        return $pattern->cats()->with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function body(Body $body)
    {
        return $body->cats()->with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function breed(Breed $breed)
    {
        return $breed->cats()->with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coat(Coat $coat)
    {
        return $coat->cats()->with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function origin(Origin $origin)
    {
        return $origin->cats()->with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function type(Type $type)
    {
        return $type->cats()->with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->get();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'image'=> 'required|string|min:3',
            'description'=> 'required|string|min:3',
            'body_id'=> 'required|numeric',
            'breed_id'=> 'required|numeric',
            'coat_id'=> 'required|numeric',
            'origin_id'=> 'required|numeric',
            'pattern_id'=> 'required|numeric',
            'type_id'=> 'required|numeric',
        ]);


        $cat = Cat::create($validated);
        return $cat;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'=> 'required|string|min:3',
            'description'=> 'required|string|min:3',
            'body_id'=> 'required|numeric',
            'breed_id'=> 'required|numeric',
            'coat_id'=> 'required|numeric',
            'origin_id'=> 'required|numeric',
            'pattern_id'=> 'required|numeric',
            'type_id'=> 'required|numeric',
        ]);


        $cat = Cat::create($validated);
        return $cat;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {
        return $cat->with([
            'body:name,id',
             'breed:name,id',
             'coat:name,id',
             'origin:name,id',
             'bodyPattern:name,id',
             'type:name,id',
            ])->find($cat->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCatRequest  $request
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatRequest $request, Cat $cat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        //
    }
}

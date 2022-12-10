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

use Illuminate\Support\Arr;


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


        $cat = Cat::where($validated)
            ->first();

        if($cat){
            return abort(403, "Faild to create record! Cat with same features already exists!");
        }


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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCatRequest  $request
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Cat::find($id);
        
        if(!$cat){
            return abort(403, "Record not found!!");
        }

        $validated = $request->validate([
            'image'=> 'required|string|min:3',
            'description'=> 'required|string|min:3',
            'body_id'=> 'numeric',
            'breed_id'=> 'numeric',
            'coat_id'=> 'numeric',
            'origin_id'=> 'numeric',
            'pattern_id'=> 'numeric',
            'type_id'=> 'numeric',
        ]);

        $arraykeys = array_keys($validated);
        if(count($arraykeys) > 3){
            $unshifted = $cat->toArray();
            for($x=0; $x<count($arraykeys); $x++){
                if($arraykeys[$x] != 'image' || $arraykeys[$x] != 'description'){

                    $unshifted[$arraykeys[$x]] = $validated[$arraykeys[$x]];
                }
            }

            $check = Cat::where(Arr::except($unshifted,['id', 'image', 'description', 'created_at', 'updated_at']))->first();
            if($check && $check->id != $cat->id){
                abort(403, "Cat with saame features already exists");
            }
        }

        


        $cat->update($validated);
        return $cat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Cat::find($id);
        
        if(!$cat){
            return abort(403, "Record not found!!");
        }

        return $cat->delete();
        
    }
}

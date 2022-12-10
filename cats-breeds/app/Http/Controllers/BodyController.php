<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBodyRequest;
use App\Http\Requests\UpdateBodyRequest;
use App\Models\Body;
use Illuminate\Http\Request;


class BodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Body::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'unique:bodies|required|string|min:3'
        ]);


        $body = Body::create($validated);
        return $body;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBodyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBodyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Body  $body
     * @return \Illuminate\Http\Response
     */
    public function show(Body $body)
    {
        return $body;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBodyRequest  $request
     * @param  \App\Models\Body  $body
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $body = Body::find($id);
        
        if(!$body){
            return abort(403, "Record not found!!");
        }

        $validated = $request->validate([
            'name'=> 'required|string|min:3|unique:bodies,name,'.$body->id
        ]);

        return $body->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Body  $body
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $body = Body::find($id);
        if(!$body){
            return abort(403, "Record not found!!");
        }

        if($body->cats()->exists()){
            return abort(403, "Can not delete! There are cats with this category!");
        }

        
        

        return $body->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Social::all();

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>'required|string|unique:socials',
        ]);

        if($validator->fails()){
            return[
                'message'=> 'Failed to Save',
                'error(s)' => $validator->errors(),
            ];
        }else{

            $social = new Social;

            $social->name = $request->name;
            $social->save();

            return [
                'message' => 'New Social Function Saved',
                'social' => $social,
            ];

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Social::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' =>'required|string|unique:socials',
        ]);

        if($validator->fails()){
            return[
                'message'=> 'Failed to Update',
                'error(s)' => $validator->errors(),
            ];
        }else{

            $social = Social::find($id);

            $social->name = $request->name;
            $social->save();

            return [
                'message' => 'Social Function Updated',
                'social' => $social,
            ];

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Social::destroy($id);

    }


     /**
     * Search for a specified resource from storage.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */

    public function search($name)
    {
        return Social::where('name', 'like', '%'.$name.'%')->get();
    }
}

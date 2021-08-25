<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Estate::all();
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
            'name' =>'required|string|unique:estates',
            'local_govts_id' =>'required|integer',
        ]);

        if($validator->fails()){
            return[
                'message'=> 'Failed to Update',
                'error(s)' => $validator->errors(),
            ];
        }else{

            $estate = new Estate;

            $estate->name = $request->name;
            $estate->local_govts_id = $request->local_govts_id;
            $estate->save();

            return [
                'message' => 'Estate Updated',
                'estate' => $estate,
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
        return Estate::find($id);

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
            'name' => 'required|string|unique:estates',
            'local_govts_id' =>'integer|required',
        ]);

        if($validator->fails()){
            return [
                'message' => 'Failed to Update',
                'error(s)' => $validator->errors(),
            ];
        }
        else{


            $estate = Estate::find($id);

            $estate->name = $request->name;
            $estate->local_govts_id = $request->local_govts_id;


            $estate->save();
             return [
                 'message' =>'Updated',
                 'estate' => $estate,
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
        return Estate::destroy($id);

    }

     /**
     * Search for a specified resource from storage.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */

    public function search($name)
    {
        return Estate::where('name', 'like', '%'.$name.'%')->get();
    }

    /**
     * Search for a specified resource asssoiated with forgein id.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */

    public function search_lga($local_govts_id)
    {
        return Estate::where('local_govts_id', 'like', '%'.$local_govts_id.'%')->get();
    }
}

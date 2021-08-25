<?php

namespace App\Http\Controllers;

use App\Models\LocalGovt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LgaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LocalGovt::all();
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
            'name' =>'required|string|unique:local_govts',
            'head' =>'required|string',
            'description' => 'required|string',
        ]);

        if($validator->fails()){
            return[
                'message'=> 'Failed to Save',
                'error(s)' => $validator->errors(),
            ];
        }else{

            $lga = new LocalGovt;

            $lga->name = $request->name;
            $lga->head = $request->head;
            $lga->description = $request->description;
            $lga->save();

            return [
                'message' => 'New Local Goverment Saved',
                'lga' => $lga,
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
        return LocalGovt::find($id);

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
            'name' =>'required|string|unique:local_govts',
            'head' =>'required|string',
            'population'=>'integer',
            'description' => 'required|string',
        ]);

        if($validator->fails()){
            return[
                'message'=> 'Failed to Update',
                'error(s)' => $validator->errors(),
            ];
        }else{

            $lga = LocalGovt::find($id);

            $lga->name = $request->name;
            $lga->head = $request->head;
            $lga->description = $request->description;
            $lga->save();

            return [
                'message' => 'Local Goverment Updated',
                'lga' => $lga,
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
        return LocalGovt::destroy($id);

    }

      /**
     * Search for a specified resource from storage.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */

    public function search($name)
    {
        return LocalGovt::where('name', 'like', '%'.$name.'%')->get();
    }
}

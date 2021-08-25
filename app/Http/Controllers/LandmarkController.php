<?php

namespace App\Http\Controllers;

use App\Models\Landmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Landmark::all();

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
            'name' =>'required|string|unique:landmarks',
            'local_govts_id' =>'required|integer',
            'details'=>'required|string',

        ]);

        if($validator->fails()){
            return[
                'message'=> 'Failed to Save',
                'error(s)' => $validator->errors(),
            ];
        }else{

            $landmark = new Landmark;

            $landmark->name = $request->name;
            $landmark->local_govts_id = $request->local_govts_id;
            $landmark->details = $request->details;
            $landmark->save();

            return [
                'message' => 'New Landmark Saved',
                'landmarks' => $landmark,
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
        return Landmark::find($id);
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
            'name' => 'required|string|unique:landmarks',
            'local_govts_id' =>'integer|required',
            'details'=> 'string|required'
        ]);

        if($validator->fails()){
            return [
                'message' => 'Failed to Update',
                'error(s)' => $validator->errors(),
            ];
        }
        else{


            $landmark = Landmark::find($id);

            $landmark->name = $request->name;
            $landmark->local_govts_id = $request->local_govts_id;
            $landmark->details = $request->details;


            $landmark->save();
             return [
                 'message' =>'Landmark Updated',
                 'landmark' => $landmark,
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
        return Landmark::destroy($id);

    }

      /**
     * Search for a specified resource asssoiated with forgein id.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */

    public function search_lga($local_govts_id)
    {
        return Landmark::where('local_govts_id', 'like', '%'.$local_govts_id.'%')->get();
    }
}

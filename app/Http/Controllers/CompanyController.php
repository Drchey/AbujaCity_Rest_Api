<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::all();

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
        $request->validate([
            'name' =>'required|string|unique:companies',
            'social_id'=>'required|integer',
            'local_govts_id' => 'required|integer',
            'description'=>'string',

        ]);

        return Company::create($request->all(),[
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Company::find($id);
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
        $company = Company::find($id);
        $company->update($request->all());
        return $company;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Company::destroy($id);

    }
    /**
     * Search for a specified resource from storage.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */

    public function search($name)
    {
        return Company::where('name', 'like', '%'.$name.'%')->get();
    }

     /**
     * Search for a specified resource asssoiated with forgein id.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */

     public function search_lga($local_govts_id)
     {
         return Company::where('local_govts_id', 'like', '%'.$local_govts_id.'%')->get();
     }

      /**
     * Search for a specified resource asssoiated with forgein id.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */

     public function search_social($social_id)
     {
         return Company::where('social_id', 'like', '%'.$social_id.'%')->get();
     }
}

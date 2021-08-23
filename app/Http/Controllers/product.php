<?php

namespace App\Http\Controllers;

use App\Models\product_model;
use Illuminate\Http\Request;

class product extends basic
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['max:25'],
            'description' => ['max:100'],

        ]);
        $x=new product_model();
        $name=$request->name;
        $description=$request->description;
        $array=array('name'=>$name,'description'=>$description);
        return $this->sendReponse($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id,$name)
    {
       $update= product_model::where('id', $id)
            ->update(['name' => $name]);
       return $this->sendReponse($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete= product_model::where('id', $id)->delete();
      return $this->sendReponse($delete);

    }
}

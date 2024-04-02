<?php

namespace App\Http\Controllers;

use App\Models\Insidences;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insidences = Insidences::all();
        return response()->json(['Message'=>"Success",'status'=>200,'data'=>$insidences],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $insidence = new Insidences();
        $result = $insidence::findOrFail($id);

        return response()->json(['Messagge'=>"Found",'Status'=>200,'data'=>$result],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $resquest,$id)
    {
        $content = $resquest->getContent();
        $decodeContent = json_decode($content,true);
        $formContent = [];

        foreach ($decodeContent as $key => $value) {
            $formContent[$key]=$value;
        }

        return $this->update(new Request($formContent),$id);
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
        $request->validate([
            'CategoryId' => 'exists:Category,id',
            'ReporterName' => 'string|max:255',
            'TypeOfInsidenceId' => 'exists:TypeOfInsidence,id',
            'AreaId' => 'exists:Area,id',
            'VenueSpecific'=> 'string|max:255'
        ]);

        $insidence = Insidences::findOrFail($id);
        $insidence->fill($request->only([
            'CategoryId',
            'ReporterName',
            'TypeOfInsidenceId',
            'AreaId',
            'VenueSpecific',
        ]));
        $insidence->updated_at = now();

        $insidence->save();

        return response()->json(['Message'=>"Success",'status'=>200],200);
    }

}

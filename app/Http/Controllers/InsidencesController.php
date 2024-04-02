<?php

namespace App\Http\Controllers;

use App\Models\Insidences;
use Illuminate\Http\Request;

class InsidencesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Obtener el contenido del cuerpo de la solicitud
        $bodyContent = $request->getContent();

        // Decodificar el contenido del cuerpo de la solicitud de formato JSON a un array asociativo
        $decodedBody = json_decode($bodyContent, true);

        $formData = [];
        foreach ($decodedBody as $key => $value) {
            $formData[$key] = $value;
        }

        // Enviar el formulario a la función store
        return $this->store(new Request($formData));
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
            'CategoryId' => 'required|exists:Category,id',
            'ReporterName' => 'required|string|max:255',
            'TypeOfInsidenceId' => 'required|exists:TypeOfInsidence,id',
            'AreaId' => 'required|exists:Area,id',
            'VenueSpecific'=> 'required|string|max:255'
        ]);

        $insidence = new Insidences();
        $insidence->CategoryId = $request->input('CategoryId');
        $insidence->ReporterName = $request->input('ReporterName');
        $insidence->TypeOfInsidenceId = $request->input('TypeOfInsidenceId');
        $insidence->AreaId = $request->input('AreaId');
        $insidence->VenueSpecific = $request->input('VenueSpecific');

        $insidence->save();

        return response()->json(['message' => 'Data stored successfully']);
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

        return response()->json(['message' => 'Data stored successfully','status'=>200,'result'=>$result,]);
    }
}

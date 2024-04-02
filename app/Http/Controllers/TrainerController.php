<?php

namespace App\Http\Controllers;

use App\Models\Insidences;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $content= $request->getContent();

        $decodedBody = json_decode($content,true);

        $dataFormatted = [];

        foreach ($decodedBody as $key => $value) {
            $dataFormatted[$key] = $value;
        }

        return $this->store(new Request($dataFormatted));
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
            'CreationType' => 'required|int'
        ]);

        if($request->input('CreationType') == 1 || $request->input('CreationType') == '1'){

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

            return response()->json(['message' => 'Data stored successfully'],201);
        }

        $trainer = new Trainer();
        $trainer->Name = $request->input('Name');
        $trainer->LastName = $request->input('LastName');
        $trainer->Email = $request->input('Email');

        $trainer->save();

        return response()->json(['message' => 'Trainer stored successfully']);
    }
}

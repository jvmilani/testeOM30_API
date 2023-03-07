<?php

namespace App\Http\Controllers;

use App\Jobs\PatientCsvQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class ImportPatientController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function uploadCsvFiles(Request $request)
    {
        if ($request->has('FileCSV')) {

            $csv    = file($request->FileCSV);
            $chunks = array_chunk($csv, 1000);
            $header = [];
            $batch  = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $chunk) {
            $data = array_map('str_getcsv', $chunk);
                if($key == 0){
                    $header = $data[0];
                    unset($data[0]);
                }
                $batch->add(new PatientCsvQueue($data, $header));
            }
            return $batch;
        }
        return "please upload csv file";
    }
}
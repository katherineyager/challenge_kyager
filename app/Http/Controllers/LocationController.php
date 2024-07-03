<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CsvImportService;
use App\Models\Location;

class LocationController extends Controller
{
    protected $csvImportService;

    public function __construct(CsvImportService $csvImportService)
    {
        $this->csvImportService = $csvImportService;
    }

    public function import()
    {
        app('App\Services\CsvImportService')->import();
    }

    public function search(Request $request)
    {
        
        $locationsCsv = Location::all();
        if ($locationsCsv->isEmpty()){
            $this->csvImportService->import();
        }
        
        $query = $request->input('query');
        $location  = Location::where('applicant', 'like', '%' . $query . '%')->first();
        $locations = Location::where('applicant', 'like', '%' . $query . '%')->paginate(5);

        $googleMapsApiKey = config('app.google_maps_api_key');

        return view('location.index', compact('location', 'locations','googleMapsApiKey'));
    }
}
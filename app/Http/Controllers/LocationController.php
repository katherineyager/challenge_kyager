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
    
    public function index()
    {
        $locations = Location::all();
        $googleMapsApiKey = config('services.google_maps.api_key');
        return view('location.index', compact('locations','googleMapsApiKey'));
    }

    public function import()
    {
        app('App\Services\CsvImportService')->import();
    }

    public function search(Request $request)
    {
        $locations = Location::all();
        if ($locations->isEmpty()){
            $this->csvImportService->import();
        }
        
        $query = $request->input('query');
        $location = Location::where('applicant', 'like', '%' . $query . '%')->first();
        $googleMapsApiKey = config('services.google_maps.api_key');

        return view('location.index', compact('location', 'locations','googleMapsApiKey'));
    }
}
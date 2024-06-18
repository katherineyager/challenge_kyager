<?php

namespace App\Services;

use App\Models\Location;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;

class CsvImportService
{
    public function import()
    {
        try {
            // Path file csv
            $filePath = base_path('database/seeds/location.csv');

            // Load CSV using PhpSpreadsheet
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();

            $rows = $sheet->toArray();
            
            // skip first line CSV file
            $firstRow = true;
            foreach ($rows as $row) {
                if ($firstRow) {
                    $firstRow = false;
                    continue;
                }

                $locationData = [
                    'locationid' => $row[0],
                    'applicant' => $row[1],
                    'facilitytype' => $row[2],
                    'cnn' => $row[3],
                    'locationdescription' => $row[4],
                    'address' => $row[5],
                    'blocklot' => $row[6],
                    'block' => $row[7],
                    'lot' => $row[8],
                    'permit' => $row[9],
                    'status' => $row[10],
                    'fooditems' => $row[11],
                    'x' => $row[12],
                    'y' => $row[13],
                    'latitude' => $row[14],
                    'longitude' => $row[15],
                    'schedule' => $row[16],
                    'dayshours' => $row[17]
                ];
                // Validate the data
                if (!empty($locationData['applicant']) && is_numeric($locationData['latitude']) && is_numeric($locationData['longitude'])) {
                    Location::updateOrCreate(
                        ['locationid' => $locationData['locationid']],
                        $locationData
                    );
                } else {
                    Log::warning('Invalid data in row: ' . json_encode($row));
                }
            }
        } catch (\Exception $e) {
            // Error Log
            Log::error('Error reading CSV file:' . $e->getMessage());
            throw $e;
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\CalorieIntake;
use App\Services\CSVExport;
use Illuminate\Http\Request;
use App\Charts\CaloriePieChart;
use App\Http\Requests\CalorieRequest;
use App\Repositories\CalorieIntakeInterface;

class DashboardController extends Controller
{
    protected $intakeRepository;

    public function __construct(CalorieIntakeInterface $intakeRepository)
    {
        $this->intakeRepository = $intakeRepository;
    }

    public function index(Request $request){
        $chart = new CaloriePieChart;

        $date = today();
        if($request->date){
            $date = $request->date;
        }

        $breakfast  = CalorieIntake::whereDate('date', $date)->select('breakfast')->first();
        $lunch      = CalorieIntake::whereDate('date', $date)->select('lunch')->first();
        $dinner     = CalorieIntake::whereDate('date', $date)->select('dinner')->first();

        $chart->labels(['Breakfast', 'Lunch', 'Dinner']);
        $chart->dataset('Calorie Intake', 'pie', [$breakfast->breakfast??0, $lunch->lunch??0, $dinner->dinner??0]);

        
        

        
        return view('dashboard')->with(['chart' => $chart]);
    }

    public function create(CalorieRequest $request){
        $this->intakeRepository->create($request->all());
        return redirect()->back()->with('message', 'Data saved successfully.');
    }

    public function downloadDate()
    {
        $intakes = CalorieIntake::get();
        
        $csv = new CSVExport([
            'date', 'breakfast', 'lunch', 'dinner'
        ]);
        foreach($intakes as $intake){
            //return $sunscriber->emailDomain;
            $csv->addRow([
                $intake->date,
                $intake->breakfast,
                $intake->lunch,
                $intake->dinner,
            ]);
        }
        
        // export csv as a download
        $filename = 'Calorie Intake';
        $csv->export($filename);
    }


}

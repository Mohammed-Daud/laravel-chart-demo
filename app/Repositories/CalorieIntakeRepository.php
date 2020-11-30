<?php 
namespace App\Repositories;

use App\CalorieIntake;
use App\Repositories\CalorieIntakeInterface;


class CalorieIntakeRepository implements CalorieIntakeInterface
{
    

    // create a new record in the database
    public function create(array $data)
    {
        // dd($data);
        $intake = new CalorieIntake;
        $intake->date = $data['date'];
        $intake->breakfast = $data['breakfast'];
        $intake->lunch = $data['lunch'];
        $intake->dinner = $data['dinner'];
        $intake->save();
    }

    
}
<?php
namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;
use App\Programm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgrammController extends Controller
{
    protected function addTraining(Request $request, $day) : int
    {
        $exercise_number = $request["day{$day}"];
        $exercises = [];
        for($j = 0; $j < $exercise_number; $j++)
        {
            $exercise = $j + 1;
            $exercises[$j]['name'] = $request["name{$exercise}day{$day}"];
            $exercises[$j]['number'] = $request["number{$exercise}day{$day}"];
            $exercises[$j]['appreaches'] = $request["appreaches{$exercise}day{$day}"];
            $exercises[$j]['time'] = $request["time{$exercise}day{$day}"];
        }
        $training = Training::create(['exercises' => $exercises]);
        return $training->id;
    }

    public function create(Request $request)
    {
        $days = (int)$request['days'];
        $training_days = [1 => NULL,2 => NULL,3 => NULL,4 => NULL,5 => NULL,6 => NULL,7 => NULL];

        for($i = 0; $i < $days; $i++)
        {
            $day = $i + 1;
            $trainingID = $this->addTraining($request, $day);
            $training_days[$day] = $trainingID;
        }
        $user = Auth::user()->id;
        $programm = Programm::create([
            'name' => $request['name'],
            'message' => $request['message'],
            'coach_id' => $user,
            'day_1' => $training_days[1],
            'day_2' => $training_days[2],
            'day_3' => $training_days[3],
            'day_4' => $training_days[4],
            'day_5' => $training_days[5],
            'day_6' => $training_days[6],
            'day_7' => $training_days[7],
            'days' => $days
        ]);

        return $this->findAll();
    }

    public function findAll(){
        $programs = Programm::select('name', 'message', 'days', 'id')->get();
        return view('program_list', compact('programs'));
    }

    public function findBest(Request $request)
    {
        $program = Programm::select(
            DB::raw('count(users.sex) as users_count, 
                programs.name as name,
                programs.id as id'
            )
        )
        ->join('users', 'program_id', '=', 'programs.id')
        ->where('sex', $request['sex'])
        ->groupBy('programs.id')
        ->orderBy('users_count', 'desc')
        ->first();

        return $program;
    }
}

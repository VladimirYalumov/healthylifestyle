<?php

namespace App\Http\Controllers;

use App\Programm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\User;
Use \Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $week_days[1] = Carbon::today()->startOfWeek();
        $week_days[2] = $week_days[1]->copy()->addDay();
        $week_days[3] = $week_days[2]->copy()->addDay();
        $week_days[4] = $week_days[3]->copy()->addDay();
        $week_days[5] = $week_days[4]->copy()->addDay();
        $week_days[6] = $week_days[5]->copy()->addDay();
        $week_days[7] = $week_days[6]->copy()->addDay();

        $today = Carbon::today();

        $week_today = 0;

        switch($today){
            case $week_days[1]:
                $week_today = 1;
                break;
            case $week_days[2]:
                $week_today = 2;
                break;
            case $week_days[3]:
                $week_today = 3;
                break;
            case $week_days[4]:
                $week_today = 4;
                break;
            case $week_days[5]:
                $week_today = 5;
                break;
            case $week_days[6]:
                $week_today = 6;
                break;
            case $week_days[7]:
                $week_today = 7;
                break;
        }

        if($request['programm_days'] != NULL)
        {
            $days = $request['programm_days'] + 1;
            $programm_days = [
                0 => NULL,
                1 => NULL,
                2 => NULL,
                3 => NULL,
                4 => NULL,
                5 => NULL,
                6 => NULL
            ];

            for($i = 0; $i < $days; $i++)
            {
                if ($request["day{$i}"] == 0){
                    $programm_days[0]['time'] = $request["time{$i}"];
                    $programm_days[0]['day'] = 1;
                }
                if ($request["day{$i}"] == 1){
                    $programm_days[1]['time'] = $request["time{$i}"];
                    $programm_days[1]['day'] = 2;
                }
                if ($request["day{$i}"] == 2){
                    $programm_days[2]['time'] = $request["time{$i}"];
                    $programm_days[2]['day'] = 3;
                }
                if ($request["day{$i}"] == 3){
                    $programm_days[3]['time'] = $request["time{$i}"];
                    $programm_days[3]['day'] = 4;
                }
                if ($request["day{$i}"] == 4){
                    $programm_days[4]['time'] = $request["time{$i}"];
                    $programm_days[4]['day'] = 5;
                }
                if ($request["day{$i}"] == 5){
                    $programm_days[5]['time'] = $request["time{$i}"];
                    $programm_days[5]['day'] = 6;
                }
                if ($request["day{$i}"] == 6){
                    $programm_days[6]['time'] = $request["time{$i}"];
                    $programm_days[6]['day'] = 7;
                }
            }

            $userId = Auth::user()->id;

            User::where('id', $userId)
                ->update([
                    'program_id' => $request['programm_ID'],
                    'program_days' => json_encode($programm_days),
                ]);
        }

        if (Auth::user()->program_id != NULL)
        {
            $real_days =[];

            foreach(Auth::user()->program_days as $week_day)
            {
                if ($week_day != NULL)
                {
                    $real_days[] = $week_day;
                }
            }

            $flag_program_today = false;
            foreach($real_days as $key => $real_day)
            {
                if ($real_day['day'] == $week_today)
                {
                    $key ++;
                    $time = $real_day['time'];

                    $user_program = Programm::select(
                        'programs.name as name', 'programs.message as message','training.exercises as exercises'
                        )
                        ->join('users', 'program_id', '=', 'programs.id')
                        ->join('training', 'training.id', '=', "programs.day_{$key}")
                        ->first();

                    $user_program['exercises'] = json_decode($user_program['exercises'], true);

                    return view('home')
                        ->with('week_today', $week_today)
                        ->with('time', $time)
                        ->with('name', $user_program['name'])
                        ->with('exercises', $user_program['exercises'])
                        ->with('message', $user_program['message']);
                }
            }
        }

        return view('home')
            ->with('week_today', $week_today)
            ->with('time', NULL)
            ->with('name', NULL)
            ->with('exercises', NULL)
            ->with('message', NULL);
    }
}

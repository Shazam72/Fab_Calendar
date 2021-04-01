<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Reservation_param;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends UsersController
{
    public function param()
    {
        $validator = Validator::make(request()->all(), [
            "day" => "required",
            "places" => "numeric|required",
            "time_start" => "required",
            "time_end" => "required",
        ]);
        if ($validator->fails())
            return $validator->errors();

        if (request('time_end') > request('time_start')) {
            AdminController::handleOldParam(date('Y-m-d'));
            $isAlready = Reservation_param::where('date', date('Y-m-d', strtotime(Day::where('id', request('day'))->first()->day . ' next week')))->first();
            if (is_null($isAlready)) {
                Reservation_param::create([
                    "date" => date('Y-m-d', strtotime(Day::where('id', request('day'))->first()->day . ' next week')),
                    "day_id" => request('day'),
                    "time_start" => request('time_start'),
                    "time_end" => request('time_end'),
                    "places" => request('places'),
                    "statut_id" => '4'
                ]);
            } else {
                $isAlready->time_start = request('time_start');
                $isAlready->time_end = request('time_end');
                $isAlready->places = request('places');
                $isAlready->save();
            }
        } else
            return json_encode(['error' => "L'heure de fin doit être supérieure a l'heure de début"]);

        return json_encode(['text' => true]);
    }

    public function home()
    {
        $info = [
            'nbApprenant' => User::where('role', 'apprenant')->get(),
            'accountConfirmed' => User::where('role', 'apprenant')->where('statut_id', '2')->get(),
            'accountNotConfirmed' => User::where('role', 'apprenant')->where('statut_id', '1')->get(),
            'accountValidated' => User::where('role', 'apprenant')->where('statut_id', '3')->get(),
            'days' => Day::all(),
        ];
        return view('admin.home')->with($info);
    }

    public function handleAccount($id)
    {

        if (preg_match('#account_validation#', request()->path())) {
            $user=User::where('id',$id)->first();
            $user->statut_id='3';
            $user->save();
            
            return 'valide';
        } else if (preg_match('#account_refuse#', request()->path())) {
            User::where('id',$id)->delete();
            return 'refuse';
        }
    }

    public static function handleOldParam($date)
    {
        DB::table('reservation_params')->where('date', '<', $date)->update(['statut_id' => '5']);
    }
}

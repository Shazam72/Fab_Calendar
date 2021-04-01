<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Reservation_apprenant;
use App\Models\Reservation_param;

class ApprenantController extends UsersController
{
    public function home()
    {
        $info_reservation = [
            'reservations' => $this->oneWeekParam()
        ];
        return view('apprenant.home')->with($info_reservation);
    }

    public function oneWeekParam()
    {

        $reservations = [];
        $databaseReservations = Reservation_param::where('date', '>', date('Y-m-d', strtotime("monday this week")))->limit(7)->get();

        foreach ($databaseReservations as $databaseReservation) {
            array_push($reservations, [
                'id' => $databaseReservation->id,
                'date' => date('d-m-Y', strtotime($databaseReservation->date)),
                'time_start' => $databaseReservation->time_start,
                'time_end' => $databaseReservation->time_end,
                'places' => $databaseReservation->places,
                'day' => substr(strtolower($databaseReservation->day->day), 0, 3),
                'day_french' => ucfirst($databaseReservation->day->day_french),
                'alreadyRes' => $this->myRes($databaseReservation->id) ? true : false,
            ]);
        }

        if (count(end($databaseReservations)) < 6) {
            $length = count(end($databaseReservations));
            $days = Day::all()->toArray();
            for ($i = 6 - $length; $i < 6; $i++) {
                array_push($reservations, [
                    'date' => date('d-m-Y', strtotime('next ' . $days[$i]['day'])),
                    'day' => substr(strtolower($days[$i]['day']), 0, 3),
                    'day_french' => ucfirst($days[$i]['day_french']),
                ]);
            }
        }


        return $reservations;
    }


    public function reserve()
    {
        AdminController::handleOldParam(date('Y-m-d'));
        $isOld = Reservation_apprenant::where('user_id', auth()->user()->id)->where('reservation_param_id', request('res_id'))->get();
        if (count($isOld) == 0) {
            Reservation_apprenant::create([
                'user_id' => auth()->user()->id,
                'reservation_param_id' => request('res_id'),
                'statut_id' => '4',
                'date_reservation' => date('Y-m-d'),
            ]);
            return json_encode('reserved');
        } else
            return json_encode('alreadySaved');
    }
    public function cancel()
    {
        AdminController::handleOldParam(date('Y-m-d'));
        $toCancel = Reservation_apprenant::where('user_id', auth()->user()->id)->where('reservation_param_id', request('res_id'))->delete();
        return json_encode('canceled');
    }


    public function myRes($idResParam)
    {
        return Reservation_apprenant::where('user_id', auth()->user()->id)->where('reservation_param_id', $idResParam)->first();
    }
}

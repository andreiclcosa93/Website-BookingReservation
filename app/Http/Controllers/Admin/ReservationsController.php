<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationsController extends Controller
{
    //utilizatorul creeaza o noua rezervare
    public function createReservation(ReservationRequest $request, $id)
    {

        $reservation = new Reservation;

        //setam cheile straine
        $reservation->room_id=$id;
        $reservation->user_id=Auth::id();

        $reservation->checkin_at=$request->checkin_at;
        $reservation->checkout_at=$request->checkout_at;
        // $reservation->confirmed_at=$request->confirmed_at;
        $reservation->observations=$request->observations;

        $reservation->save();

        return redirect()->back()->with('success','Rezervarea a fost facuta, o puteti vedea si edita in contul DVS');


    }

    //vederea care afiseaza utilizatorului logat rezervarile
    public function viewAccount()
    {
        $user=Auth::user();

        return view('front.account')
            ->with('user',$user);
    }


    //=============================
    // ADMINISTRAREA REZERVARILOR
    //=============================

    public function reservationsList()
    {
        if(request()->has('user_id'))
        {
            $reservations=Reservation::with(['user','room'])
            ->where('user_id',request('user_id'))
            ->orderByDesc('created_at')->paginate()->withQueryString();
        } elseif(request()->has('room_id'))
        {
            $reservations=Reservation::with(['user','room'])
            ->where('room_id',request('room_id'))
            ->orderByDesc('created_at')->paginate()->withQueryString();
        }

        else{
            $reservations=Reservation::with(['user','room'])->orderByDesc('created_at')->paginate();
        }

        return view('admin.reservations.list')
                ->with('reservations',$reservations);

    }

    //filtram rezervarile lunare
    public function filterMonth(Request $request)
    {



        $carbon_date=Carbon::createFromDate($request->month);

        $carbon_month=$carbon_date->month;
        $carbon_year=$carbon_date->year;

        // $grouped=Reservation::whereYear('created_at',$carbon_year)
        // ->whereMonth('created_at', $carbon_month)
        // // ->groupBy('room_id')
        // ->get()
        // ->groupBy('created_at')
        // ->count('id');
        // dd($grouped);


        $reservations = Reservation::whereYear('created_at',$carbon_year)
           ->whereMonth('created_at', $carbon_month)
           ->orderByDesc('created_at')

            ->paginate()->withQueryString();

            return view('admin.reservations.filter')
                ->with('reservations',$reservations)
                ->with('date_filtered',$carbon_date);

    }

    public function confirmReservation($id)
    {
        $reservation=Reservation::findOrFail($id);
        $reservation->confirmed_at=now();
        $reservation->save();
        return back()->with('success', 'Rezervarea a fost confirmata');

    }
    public function cancelReservation($id)
    {
        $reservation=Reservation::findOrFail($id);
        $reservation->confirmed_at=null;
        $reservation->save();
        return back()->with('success', 'Rezervarea a fost anulata');

    }


}

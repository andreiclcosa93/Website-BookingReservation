<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use Carbon\CarbonPeriod;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationsController extends Controller
{
    //utilizatorul creeaza o noua rezervare
    public function createReservation(ReservationRequest $request, $id)
    {
        //verificam disponibilitatea unei camere de tip room_id
        $room_number = Room::select('number')->where('id', $id)->first()->number;
        // dd($room_number);

        $start_date = Carbon::createFromDate($request->checkin_at);
        $end_date = Carbon::createFromDate($request->checkout_at);
        $nr_days = $start_date->diffInDays($end_date);


        // dd($nr_days);
        // dd($start_date->addDay(0) . '-' . $start_date);
        // dd($end_date . ' - ' . $start_date->addDay($nr_days));

        for ($i = 0; $i < $nr_days; $i++) {

            $in = Carbon::createFromDate($request->checkin_at)->addDay($i);
            $out = Carbon::createFromDate($request->checkin_at)->addDay($i + 1);

            $nr_rezs = Reservation::where('room_id', $id)
                ->where('checkout_at', '>=', $in)
                ->where('checkin_at', '<=', $out)
                ->count();

            // dump($in->format('d-M Y') . ' - ' . $out->format('d-M Y') . ' nr. rezervari: ' . $nr_rezs);

            if ($nr_rezs >= $room_number) {
                return back()->with('error', 'Ne pare rau, aceasta camera nu este disponibila in perioada selectata de Dvs. Incercati sa alegeti alt tip de camere pentru aceasta perioada');
            }
        }


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

    //stergerea unei rezervari de catre utilizator
    public function deleteReservation($id)
    {
        $reservation=Reservation::findOrFail($id);
        $reservation->delete();

        return back()->with('success','Rezervarea a fost anulata');
    }


    //=============================
    // ADMINISTRAREA REZERVARILOR - modul rezervari
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


        $rezs=Reservation::with(['room'])->select('room_id',DB::raw('count(*) as total'))
                ->whereMonth('checkin_at',$carbon_month)
                ->whereYear('checkin_at',$carbon_year)
                ->groupBy('room_id')
                ->get();


        // $grouped=Reservation::whereYear('checkin_at',$carbon_year)
        // ->whereMonth('checkin_at', $carbon_month)
        // // ->groupBy('room_id')
        // ->get()
        // ->groupBy('checkin_at')
        // ->count('id');
        // dd($grouped);


        $reservations = Reservation::whereYear('checkin_at',$carbon_year)
           ->whereMonth('checkin_at', $carbon_month)
           ->orderByDesc('checkin_at')

            ->paginate()->withQueryString();

            return view('admin.reservations.filter')
                ->with('reservations',$reservations)
                ->with('date_filtered',$carbon_date)
                ->with('rezs',$rezs);

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

    //stergerea definitiva a unei rezervari

    public function deleteReservationAdmin($id)
    {
        $reservation = Reservation::findOrFail($id)->delete();
        return back()->with('success', 'Rezervarea a fost stearsa din baza de date!');

    }

}

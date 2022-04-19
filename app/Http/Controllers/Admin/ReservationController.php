<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\Reservationmail;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller 
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', compact('reservations'));
    }

    public function status($id)
    {
        $reservation = Reservation::find($id);

        $reservation->status = true;
        $reservation->save();

        Notification::route('mail',$reservation->email)
            ->notify(new Reservationmail());

        Toastr::success('Reservation successfully confirmed :');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Reservation::find($id)->delete();

        Toastr::success('Reservation successfully deleted :)');
        return redirect()->back();
    }
}

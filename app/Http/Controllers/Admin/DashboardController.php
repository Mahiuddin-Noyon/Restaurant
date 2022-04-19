<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Reservation;
use App\Slider;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $sliderCount = Slider::count();
        $reservations = Reservation::where('status',false)->get();
        $contactCount = Contact::count();
        return view('admin.dashboard', compact('categoryCount','sliderCount','reservations','contactCount','itemCount'));
    }
}

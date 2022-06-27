<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        // get owner
        $user = session('user');

        // get restaurant belongs to owner
        $restaurants = Restaurant::where('owner_id', $user['owner_id'])->get();

        $count = 0;

        return view('ManageRestaurant.all-restaurant', [
            'restaurants' => $restaurants,
            'count' => $count
        ]);
    }

    public function create()
    {
        return view('ManageRestaurant.create');
    }

   
    public function store(Request $request)
    {
        // get user
        $user = session('user');

        // get owner id
        $owner_id = $user['owner_id'];

        // create restaurant
        $restaurant = new Restaurant;
        
        $restaurant->owner_id = $owner_id;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->location = $request->location;
        $restaurant->contact_number = '01222';
        $restaurant->opening_time = $request->opening_time;
        $restaurant->closing_time = $request->closing_time;
        
        $restaurant->save();


        return redirect()->route('manage-restaurant.all');

    }

    
    public function show(Restaurant $restaurant)
    {
        //
    }

    
    public function edit(Restaurant $restaurant)
    {
        //
    }

   
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}

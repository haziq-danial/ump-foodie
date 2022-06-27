<?php

namespace App\Http\Controllers;

use App\Models\Menu_list;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuListController extends Controller
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

        return view('ManageRestaurant.menuList', [
            'restaurants' => $restaurants,
            'count' => $count
        ]);
    }

    public function viewMenu($restaurant_id)
    {
        // get restaurant
        $restaurant = Restaurant::find($restaurant_id);

        // get restaurant menu lists
        $menu_lists = Menu_list::where('restaurant_id', $restaurant_id)->get();

        $count = 0;

        return view('ManageRestaurant.menuList', [
            'restaurant_id' => $restaurant->restaurant_id,
            'restaurant_name' => $restaurant->restaurant_name,
            'menu_lists' => $menu_lists,
            'count' => $count
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // create menu list model
        $menu_list = new Menu_list;

        $menu_list->restaurant_id = $request->restaurant_id;
        $menu_list->food_name = $request->food_name;
        $menu_list->category = $request->category;
        $menu_list->price = $request->price;
        $menu_list->food_status = $request->food_status;
        $menu_list->save();
        
        return redirect()->route('manage-menu.view', $request->restaurant_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu_list  $menu_list
     * @return \Illuminate\Http\Response
     */
    public function show(Menu_list $menu_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu_list  $menu_list
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu_list $menu_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu_list  $menu_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu_list $menu_list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu_list  $menu_list
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu_list $menu_list)
    {
        //
    }
}

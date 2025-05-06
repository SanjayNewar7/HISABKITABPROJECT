<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Import the Menu model
use Illuminate\Http\Request;
   use App\Models\MenuItem; // Ensure the model is imported
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function create()
    {
        return view('menu'); // Return the view for adding a menu
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'foodItemName.*' => 'required|string|max:255', // Validate each food name
            'foodCategory.*' => 'required|string|max:255', // Validate each food category
            'itemPrice.*' => 'required|numeric|min:0', // Validate each price
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Loop through each item in the form and save it
        foreach ($request->foodItemName as $index => $foodName) {
            Menu::create([
                'food_name' => $foodName,
                'food_category' => $request->foodCategory[$index],
                'food_price' => $request->itemPrice[$index],
            ]);
        }

        // Flash a success message to the session
        // session()->flash('success', 'Menu items added successfully!');

        // Redirect to the menu view route
        return redirect()->route('menu.viewmenu');
    }

    // public function index()
    // {
    //     $menuItems = DB::table('menu_items')->select('food_item_name', 'food_category', 'food_price')->get();

    //     return view('menu.index', compact('menuItems'));
    // }

    public function viewmenu(){
        $data['menuItems'] = Menu::all();
        return view('viewmenu', $data);
    }
    // public function destroy($id)
    // {
    //     // Find the menu item by ID or fail
    //     $menuItem = MenuItem::findOrFail($id);

    //     // Delete the item
    //     $menuItem->delete();

    //     // Return a response (JSON or redirect)
    //     return response()->json(['success' => 'Item deleted successfully']);
    // }



}

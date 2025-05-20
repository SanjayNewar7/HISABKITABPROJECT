<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Table;
use App\Models\OrderItem as Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddOrderController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $tables = Table::all();
        return view('addorders', compact('menus','tables'));
       
    }

    public function store(Request $request)
    {
    // dd($request->all());
    $request->validate([
        'tableNumber' => 'required|exists:tables,id',
        'foodItem' => 'required|array',
        'foodItem.*' => 'exists:menudb,menu_id',
        'quantity' => 'required|array',
        'quantity.*' => 'integer|min:1',
    ]);

     $tableId = $request->input('tableNumber');
    $foodItems = $request->input('foodItem'); 
    $quantities = $request->input('quantity');

  
    $table = Table::find($tableId);
    if ($table && in_array(strtolower($table->table_status), ['available', 'reserved'])) {
        $table->table_status = 'Occupied';
        $table->save();
    }

    foreach ($foodItems as $index => $menuId) {
        $menu = Menu::find($menuId); 
        if (!$menu) continue;

        $quantity = $quantities[$index];
        $totalAmount = $menu->food_price * $quantity;

        Order::create([
            'table_id'     => $tableId,
            'food_item'    => $menuId, 
            'quantity'     => $quantity,
            'total_amount' => $totalAmount,
        ]);
    }

    return redirect()->back()->with('success', 'Order placed successfully!');
}

public function showNewOrders()
{
    $orders = DB::table('order_items')
        ->select(
            'table_id',
            DB::raw('MIN(created_at) as created_at'),
            DB::raw('COUNT(DISTINCT food_item) as item_count')
        )
        ->groupBy('table_id')
        ->orderBy('created_at', 'desc')
        ->get();

    // Fetch table numbers by ID
    $tables = DB::table('tables')->pluck('table_number', 'id');

    return view('neworders', compact('orders', 'tables'));
}



}




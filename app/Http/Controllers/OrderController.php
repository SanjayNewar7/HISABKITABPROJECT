<?Php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Table;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tableNumber' => 'required|integer|min:1',
            'foodItem' => 'required|array',
            'quantity' => 'required|array',
            'totalAmount' => 'required|array',
        ]);

        // Check if table exists
        $table = Table::where('table_number', $request->tableNumber)->first();

        if (!$table) {
            return back()->withErrors(['tableNumber' => 'Invalid table number.']);
        }

        // Create the order
        $order = Order::create([
            'table_id' => $table->id,
        ]);

        // Create the order items
        foreach ($request->foodItem as $index => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'food_item' => $item,
                'quantity' => $request->quantity[$index],
                'total_amount' => $request->totalAmount[$index],
            ]);
        }

        return redirect()->route('all-orders')->with('success', 'Order added successfully.');
    }
}

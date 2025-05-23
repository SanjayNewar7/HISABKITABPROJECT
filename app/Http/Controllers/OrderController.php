<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Table;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function showCheckout($table_id)
    {
        $orders = OrderItem::where('table_id', $table_id)->get();
        $table = Table::find($table_id);

        $orderItems = [];
        $totalAmount = 0;

        foreach ($orders as $item) {
            $orderItems[] = [
                'name' => $item->food_item,
                'quantity' => $item->quantity,
                'amount' => $item->total_amount,
            ];
            $totalAmount += $item->total_amount;
        }

        return view('checkout', [
            'tableNumber' => $table->table_number ?? 'N/A',
            'table_id' => $table_id,
            'orderItems' => $orderItems,
            'totalAmount' => $totalAmount,
        ]);
    }

    public function submitCheckout(Request $request)
    {
        $tableId = $request->input('table_id');
        $paymentMethod = $request->input('payment_method');
        $totalAmount = $request->input('total_amount');

        Log::info('Checkout Request Data', [
            'table_id' => $tableId,
            'payment_method' => $paymentMethod,
            'total_amount' => $totalAmount,
        ]);

        \DB::beginTransaction();

        try {
            // Validate table exists
            $table = Table::findOrFail($tableId);
            Log::info('Table Found', ['table_id' => $tableId]);

            // Fetch orders
            $orders = OrderItem::where('table_id', $tableId)->get();
            Log::info('Orders Found', ['count' => $orders->count()]);

            // Delete from order_items (even if no orders exist, proceed to update table status)
            OrderItem::where('table_id', $tableId)->delete();
            Log::info('Orders Deleted', ['table_id' => $tableId]);

            // Update table status
            $table->table_status = 'available';
            $table->save();
            Log::info('Table Status Updated', ['table_id' => $tableId, 'status' => 'available']);

            \DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error('Checkout Error: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\MenuItem;

class OrderController extends Controller
{
    // 🛒 USER: create order
    public function store(Request $request)
    {
        $request->validate([
            'menuitem_id' => 'required|exists:menuitems,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Order::create([
            'user_id' => auth()->id(),
            'menuitem_id' => $request->menuitem_id,
            'quantity' => $request->quantity,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Order placed successfully!');
    }

    // 📄 USER: view own orders
    public function myOrders()
    {
        $orders = Order::with('menuitem')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.orders', compact('orders'));
    }

    // 👨‍🍳 STAFF: view all orders
    public function index()
    {
        $orders = Order::with(['menuitem', 'user'])
            ->latest()
            ->get();

        return view('staff.orders.index', compact('orders'));
    }

    // 👨‍🍳 STAFF: update order status
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status; 
        // pending | preparing | ready | completed

        $order->save();

        return redirect()->back()->with('success', 'Order updated!');
    }
}
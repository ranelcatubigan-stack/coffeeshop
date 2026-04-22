<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;

class MenuitemController extends Controller
{
    // 🍽️ Show menu items
    public function index()
    {
        $menuitems = MenuItem::all();

        $orders = Order::with('menuitem')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('dashboard-orders', compact('menuitems', 'orders'));
    }

    // 🛒 Create order
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

        return redirect('dashboard-orders')->with('success', 'Order placed successfully!');
    }

    // 📄 Show user orders
    public function myOrders()
    {
        $orders = Order::with('menuitem')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('dashboard-orders', compact('orders'));
    }
}
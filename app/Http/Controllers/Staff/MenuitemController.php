<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuItemController extends Controller
{
    // 📋 Show all menu items
    public function index()
    {
        $menuitems = MenuItem::latest()->get();
        return view('staff-dashboard', compact('menuitems'));
    }

    // ➕ Show create form

    // 💾 Store new menu item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
        ]);

        MenuItem::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('staff-dashboard')
            ->with('success', 'Menu item added successfully!');
    }

    // ✏️ Edit form
    public function edit($id)
    {
        $menuitem = MenuItem::findOrFail($id);
        return view('staff.menu.edit', compact('menuitem'));
    }

    // 🔄 Update menu item
    public function update(Request $request, $id)
    {
        $menuitem = MenuItem::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
        ]);

        $menuitem->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('staff.menu.index')
            ->with('success', 'Menu item updated successfully!');
    }

    // ❌ Delete menu item
    public function destroy($id)
    {
        $menuitem = MenuItem::findOrFail($id);
        $menuitem->delete();

        return redirect()->back()
            ->with('success', 'Menu item deleted successfully!');
    }
}
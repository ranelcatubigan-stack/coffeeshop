<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">

            <!-- 🛒 CREATE ORDER FORM -->
            <form action="/order" method="POST">
                @csrf

                <label>Menu Item:</label>
                <select name="menuitem_id" required>
                    <option value="">Select Item</option>

                    @foreach($menuitems as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }} - ₱{{ $item->price }}
                        </option>
                    @endforeach
                </select>

                <label>Quantity:</label>
                <input type="number" name="quantity" required min="1">

                <button type="submit">Place Order</button>
            </form>

            <hr>

            <!-- 📄 MY ORDERS TABLE -->
            <table border="1" cellpadding="8">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->menuitem->name ?? 'N/A' }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->status }}</td>

                        <td>
                            {{-- OPTIONAL: VIEW ONLY (recommended for users) --}}
                            <a href="/my-orders">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
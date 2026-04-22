<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">

            {{-- UPDATE ORDER FORM --}}
            <form action="/order-update/{{ $order->id }}" method="POST">
                @csrf
                @method('PUT')

                {{-- MENU ITEM SELECT --}}
                <label>Menu Item:</label>
                <select name="menuitem_id" required>
                    <option value="">Select Item</option>

                    @foreach($menuitems as $item)
                        <option value="{{ $item->id }}"
                            {{ $order->menuitem_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }} - ₱{{ $item->price }}
                        </option>
                    @endforeach
                </select>

                {{-- QUANTITY --}}
                <label>Quantity:</label>
                <input type="number"
                       name="quantity"
                       value="{{ $order->quantity }}"
                       required
                       min="1">

                {{-- UPDATE BUTTON --}}
                <button type="submit">
                    Update Order
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="p-6 space-y-8">

        <!-- 🏷️ PAGE TITLE -->
        <h1 class="text-2xl font-bold">Order Menu ☕</h1>

        <!-- ✅ SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- 🍽️ MENU LIST -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach($menuitems as $item)
                <div class="bg-white shadow rounded-lg p-5 border">

                    <!-- ITEM NAME -->
                    <h2 class="text-xl font-bold">{{ $item->name }}</h2>

                    <!-- PRICE -->
                    <p class="text-gray-600">₱{{ $item->price }}</p>

                    <!-- 🛒 ORDER FORM -->
                    <form method="POST" action="/order" class="mt-4">
                        @csrf

                        <!-- MENU ITEM ID (hidden) -->
                        <input type="hidden" name="menuitem_id" value="{{ $item->id }}">

                        <!-- QUANTITY -->
                        <label class="block text-sm">Quantity</label>
                        <input type="number"
                               name="quantity"
                               value="1"
                               min="1"
                               class="w-full border rounded p-2 mb-3">

                        <!-- ORDER BUTTON -->
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">
                            Order
                        </button>
                    </form>

                </div>
            @endforeach

        </div>

    </div>
</x-app-layout>
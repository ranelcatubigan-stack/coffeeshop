{{-- resources/views/dashboard.blade.php --}}

<x-app-layout>
</div>
    <div class="p-6 space-y-10">

        <!-- 🏠 HERO SECTION -->
        <div class="bg-brown-100 p-10 rounded-xl shadow text-center">
            <h1 class="text-3xl font-bold mb-3">Welcome to Our Coffee Shop ☕</h1>
            <p class="text-gray-600 mb-6">
                Fresh coffee, sweet treats, and special deals just for you.
            </p>

            <!-- 🛒 START ORDER BUTTON -->
            <a href="/menu"
               class="bg-brown-600 text-white px-6 py-3 rounded-lg shadow hover:bg-brown-700 transition">
                Start Order
            </a>
        </div>

        <!-- 📢 PROMO SECTION -->
        <div>
            <h2 class="text-2xl font-bold mb-4">🔥 Current Promos</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Promo 1 -->
                <div class="bg-white p-5 rounded-lg shadow border">
                    <h3 class="font-bold text-lg">Buy 1 Take 1 Coffee</h3>
                    <p class="text-gray-600 mt-2">
                        Enjoy our best-selling coffee with a friend — limited time only!
                    </p>
                </div>

                <!-- Promo 2 -->
                <div class="bg-white p-5 rounded-lg shadow border">
                    <h3 class="font-bold text-lg">Free Muffin Combo</h3>
                    <p class="text-gray-600 mt-2">
                        Get a free muffin when you order any large drink.
                    </p>
                </div>

                <!-- Promo 3 -->
                <div class="bg-white p-5 rounded-lg shadow border">
                    <h3 class="font-bold text-lg">Student Discount</h3>
                    <p class="text-gray-600 mt-2">
                        Show your ID and get 10% off all drinks.
                    </p>
                </div>

            </div>
        </div>

        <!-- 🍽️ SPECIAL DEALS -->
        <div>
            <h2 class="text-2xl font-bold mb-4">⭐ Special Deals</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-yellow-100 p-5 rounded-lg shadow">
                    <h3 class="font-bold">Coffee + Cake Combo</h3>
                    <p class="text-gray-700">Only ₱150 for a perfect afternoon treat.</p>
                </div>

                <div class="bg-yellow-100 p-5 rounded-lg shadow">
                    <h3 class="font-bold">Morning Brew Set</h3>
                    <p class="text-gray-700">Coffee + Sandwich for only ₱120.</p>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>
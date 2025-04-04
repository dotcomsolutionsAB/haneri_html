<?php
    // Get the order ID from the URL
    $orderId = isset($_GET['o_id']) ? $_GET['o_id'] : 'No order ID provided';

    // Display the order ID on the page
    echo "Order ID: " . htmlspecialchars($orderId);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Order Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Tailwind CSS via CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 text-gray-800">

        <div class="max-w-6xl mx-auto px-4 py-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Order Details</h1>
                <button class="bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-700 transition">Print
                    Invoice</button>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-lg shadow p-6 space-y-8">

                <!-- Top Controls -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="text-sm font-medium block mb-1">Payment Status</label>
                        <select
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-indigo-500 focus:outline-none">
                            <option selected>Unpaid</option>
                            <option>Paid</option>
                            <option>Refunded</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">Delivery Status</label>
                        <input type="text" value="Pending"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-indigo-500 focus:outline-none" />
                    </div>
                    <div>
                        <label class="text-sm font-medium block mb-1">Tracking Code (optional)</label>
                        <input type="text"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-indigo-500 focus:outline-none" />
                    </div>
                </div>

                <!-- Customer & Order Info -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Customer -->
                    <div class="flex gap-4">
                        <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=Sample-QR"
                            class="w-32 h-32 border rounded" alt="QR" />
                        <div class="text-sm space-y-1">
                            <p class="text-lg font-semibold">Surendra</p>
                            <p>surendrarockzz535@gmail.com</p>
                            <p>+91 7330700535</p>
                            <p class="pt-2">Tossipudi, est godavari,<br />bicavolu mandal,<br />Rajahmundry, Andhra Pradesh
                                - 533345,<br />India</p>
                        </div>
                    </div>

                    <!-- Order Info -->
                    <div class="text-sm space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Order #</span>
                            <span class="text-indigo-600 font-semibold">20250402-21002674</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Order Status</span>
                            <span
                                class="bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full text-xs font-medium">Pending</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Order Date</span>
                            <span>02-04-2025 09:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Amount</span>
                            <span class="font-medium">₹1,850.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Payment Method</span>
                            <span>Cash on delivery</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Additional Info</span>
                            <span>--</span>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="border-gray-200" />

                <!-- Items Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 text-gray-600 text-left uppercase tracking-wide">
                            <tr>
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Photo</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Delivery Type</th>
                                <th class="px-4 py-3">Qty</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3">
                                    <img src="https://placehold.co/60x60" alt="Product" class="w-14 h-14 border rounded" />
                                </td>
                                <td class="px-4 py-3">
                                    <div class="font-semibold">DongCheng Armature 11E</div>
                                    <div class="text-xs text-gray-500">SKU: DC-AR-11<br />HSN Code: 8467</div>
                                </td>
                                <td class="px-4 py-3">Home Delivery</td>
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3">₹1,568.00</td>
                                <td class="px-4 py-3">₹1,568.00</td>
                            </tr>
                            <!-- Add more rows if needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Totals -->
                <div class="flex justify-end">
                    <div class="text-sm w-full max-w-xs space-y-1">
                        <div class="flex justify-between">
                            <span class="text-gray-700 font-medium">Sub Total</span>
                            <span>₹1,568.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700 font-medium">Shipping</span>
                            <span>₹0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-700 font-medium">Tax</span>
                            <span>₹0.00</span>
                        </div>
                        <hr class="my-2" />
                        <div class="flex justify-between text-base font-bold text-gray-900">
                            <span>Total</span>
                            <span>₹1,568.00</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </body>

</html>

<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>
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
            <button id="printButton"
                class="bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-700 transition">Print
                Invoice</button>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-lg shadow p-6 space-y-8" id="orderDetailsContainer">
            <!-- Order details will be populated here -->
        </div>
    </div>

    <script>
        // Fetch order details from the API
        const token = localStorage.getItem('auth_token');  // Assuming the token is stored in localStorage
        const orderId = new URLSearchParams(window.location.search).get('o_id'); // Get order_id from the URL

        if (!orderId) {
            document.getElementById("orderDetailsContainer").innerHTML = "<p class='text-red-500'>Order ID is missing.</p>";
        } else {
            fetchOrderDetails(orderId);
        }

        // Function to fetch order details
        function fetchOrderDetails(orderId) {
            fetch("<?php echo BASE_URL; ?>/fetch_all", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${token}`,
                },
                body: JSON.stringify({
                    order_id: orderId
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data && data.success) {
                        populateOrderDetails(data.order);
                    } else {
                        // Use sample data if API response does not have order details
                        const sampleData = {
                            customer_name: "Surendra",
                            customer_email: "surendrarockzz535@gmail.com",
                            customer_phone: "+91 7330700535",
                            customer_address: "Tossipudi, est godavari, bicavolu mandal, Rajahmundry, Andhra Pradesh - 533345, India",
                            order_id: "20250402-21002674",
                            order_status: "Pending",
                            order_date: "02-04-2025 09:00 PM",
                            total_amount: "₹1,850.00",
                            payment_method: "Cash on delivery",
                            items: [
                                {
                                    photo: "https://placehold.co/60x60",
                                    description: "DongCheng Armature 11E",
                                    delivery_type: "Home Delivery",
                                    qty: 1,
                                    price: "₹1,568.00",
                                    total: "₹1,568.00"
                                }
                            ],
                            sub_total: "₹1,568.00",
                            shipping: "₹0.00",
                            tax: "₹0.00",
                            total: "₹1,568.00"
                        };

                        populateOrderDetails(sampleData);
                    }
                })
                .catch(error => {
                    console.error("Error fetching order details:", error);
                    document.getElementById("orderDetailsContainer").innerHTML = "<p class='text-red-500'>There was an error loading the order details.</p>";
                });
        }

        // Function to populate the order details
        function populateOrderDetails(order) {
            const orderDetailsHtml = `
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-3xl font-bold">Order Details</h1>
          <button class="bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-700 transition">Print Invoice</button>
        </div>

        <div class="bg-white rounded-lg shadow p-6 space-y-8">
          <!-- Customer & Order Info -->
          <div class="grid md:grid-cols-2 gap-6">
            <!-- Customer -->
            <div class="flex gap-4">
              <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=Sample-QR" class="w-32 h-32 border rounded" alt="QR" />
              <div class="text-sm space-y-1">
                <p class="text-lg font-semibold">${order.customer_name}</p>
                <p>${order.customer_email}</p>
                <p>${order.customer_phone}</p>
                <p class="pt-2">${order.customer_address}</p>
              </div>
            </div>

            <div class="text-sm space-y-2">
              <div class="flex justify-between">
                <span class="text-gray-600">Order #</span>
                <span class="text-indigo-600 font-semibold">${order.order_id}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Order Status</span>
                <span class="bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full text-xs font-medium">${order.order_status}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Order Date</span>
                <span>${order.order_date}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Total Amount</span>
                <span class="font-medium">${order.total_amount}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Payment Method</span>
                <span>${order.payment_method}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Additional Info</span>
                <span>--</span>
              </div>
            </div>
          </div>

          <hr class="border-gray-200" />

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
                ${order.items.map((item, index) => `
                  <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">${index + 1}</td>
                    <td class="px-4 py-3">
                      <img src="${item.photo}" alt="Product" class="w-14 h-14 border rounded" />
                    </td>
                    <td class="px-4 py-3">
                      <div class="font-semibold">${item.description}</div>
                    </td>
                    <td class="px-4 py-3">${item.delivery_type}</td>
                    <td class="px-4 py-3">${item.qty}</td>
                    <td class="px-4 py-3">${item.price}</td>
                    <td class="px-4 py-3">${item.total}</td>
                  </tr>
                `).join('')}
              </tbody>
            </table>
          </div>

          <div class="flex justify-end">
            <div class="text-sm w-full max-w-xs space-y-1">
              <div class="flex justify-between">
                <span class="text-gray-700 font-medium">Sub Total</span>
                <span>${order.sub_total}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-700 font-medium">Shipping</span>
                <span>${order.shipping}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-700 font-medium">Tax</span>
                <span>${order.tax}</span>
              </div>
              <hr class="my-2" />
              <div class="flex justify-between text-base font-bold text-gray-900">
                <span>Total</span>
                <span>${order.total}</span>
              </div>
            </div>
          </div>
        </div>
      `;

            document.getElementById("orderDetailsContainer").innerHTML = orderDetailsHtml;
        }
    </script>

</body>

</html>
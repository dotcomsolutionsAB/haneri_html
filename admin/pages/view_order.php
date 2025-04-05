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
      <button id="printInvoice" class="bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-700 transition">Print Invoice</button>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-lg shadow p-6 space-y-8">

      <!-- Top Controls -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4" id="topControlsContainer">
        <!-- Payment Status, Delivery Status, and Tracking Code (to be filled dynamically) -->
      </div>

      <!-- Customer & Order Info -->
      <div class="grid md:grid-cols-2 gap-6" id="customerOrderInfoContainer">
        <!-- Customer and Order Info to be filled dynamically -->
      </div>

      <!-- Divider -->
      <hr class="border-gray-200" />

      <!-- Items Table -->
      <div class="overflow-x-auto" id="productTableContainer">
        <!-- Products table will be populated dynamically -->
      </div>

      <!-- Totals -->
      <div class="flex justify-end" id="totalsContainer">
        <!-- Totals will be populated dynamically -->
      </div>

    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Assuming the order ID is passed as a query parameter
      const orderId = new URLSearchParams(window.location.search).get('o_id');
      if (orderId) {
        fetchOrderDetails(orderId);  // Fetch order details on page load
      } else {
        console.error('Order ID is missing.');
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
            order_id: orderId,
          }),
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.success && data.data && data.data.length > 0) {
            const order = data.data[0];
            populateOrderDetails(order);
            fetchProductDetails();  // Fetch product details after order details
          } else {
            console.error("No order data found");
            document.getElementById("orderDetailsContainer").innerHTML = "<p class='text-red-500'>No order details available.</p>";
          }
        })
        .catch((error) => {
          console.error("Error fetching order details:", error);
          document.getElementById("orderDetailsContainer").innerHTML = "<p class='text-red-500'>There was an error loading the order details.</p>";
        });
      }

      // Function to fetch product details
      function fetchProductDetails() {
        fetch("../order_detail.json")
          .then((response) => response.json())
          .then((data) => {
            if (data.products && data.products.length > 0) {
              populateProductTable(data.products);
            } else {
              console.error("No products found");
              document.getElementById("productTableContainer").innerHTML = "<p class='text-red-500'>No product details available.</p>";
            }
          })
          .catch((error) => {
            console.error("Error fetching product details:", error);
            document.getElementById("productTableContainer").innerHTML = "<p class='text-red-500'>There was an error loading the product details.</p>";
          });
      }

      // Function to populate order details dynamically
      function populateOrderDetails(order) {
        const user = order.user || {};
        const userName = user.name || "N/A";
        const userEmail = user.email || "N/A";
        const userMobile = user.mobile || "N/A";
        const fullAddress = order.shipping_address || "N/A";

        const addressParts = fullAddress.split(',');
        const name = addressParts[0]?.trim();
        const phone = addressParts[1]?.trim() || userMobile;
        const address = addressParts.slice(2).join(',').trim();

        const email = userEmail !== "N/A" ? userEmail : "Email not available";

        // Populate Customer Info and Order Info dynamically
        document.getElementById("customerOrderInfoContainer").innerHTML = `
          <div class="flex gap-4">
            <img src="https://via.placeholder.com/150" alt="QR Code" class="w-32 h-32 border rounded" />
            <div class="text-sm space-y-1">
              <p class="text-lg font-semibold">${name || userName}</p>
              <p>Email: ${email}</p>
              <p>Phone: ${phone}</p>
              <p class="pt-2">${address}</p>
            </div>
          </div>
          <div class="text-sm space-y-2">
            <div class="flex justify-between">
              <span class="text-gray-600">Order #</span>
              <span class="text-indigo-600 font-semibold">${order.id}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Order Status</span>
              <span class="bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full text-xs font-medium">${order.status}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Order Date</span>
              <span>${new Date(order.created_at).toLocaleString()}</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Total Amount</span>
              <span class="font-medium">₹${order.total_amount}</span>
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
        `;

        // Populate payment and delivery status
        document.getElementById("topControlsContainer").innerHTML = `
          <div>
            <label class="text-sm font-medium block mb-1">Payment Status</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-indigo-500 focus:outline-none">
              <option selected>${order.payment_status}</option>
              <option>Paid</option>
              <option>Refunded</option>
            </select>
          </div>
          <div>
            <label class="text-sm font-medium block mb-1">Delivery Status</label>
            <input type="text" value="${order.delivery_status || 'Pending'}" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-indigo-500 focus:outline-none" />
          </div>
          <div>
            <label class="text-sm font-medium block mb-1">Tracking Code (optional)</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-indigo-500 focus:outline-none" />
          </div>
        `;
      }

      // Function to populate product details dynamically
      function populateProductTable(products) {
        let productsHtml = "";
        products.forEach((product, index) => {
          productsHtml += `
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3">${index + 1}</td>
              <td class="px-4 py-3">
                <img src="${product.photo}" alt="Product" class="w-14 h-14 border rounded" />
              </td>
              <td class="px-4 py-3">
                <div class="font-semibold">${product.name}</div>
                <div class="text-xs text-gray-500">SKU: ${product.sku}<br />HSN Code: ${product.hsn_code}</div>
              </td>
              <td class="px-4 py-3">${product.delivery_type}</td>
              <td class="px-4 py-3">${product.qty}</td>
              <td class="px-4 py-3">₹${product.price}</td>
              <td class="px-4 py-3">₹${product.total}</td>
            </tr>
          `;
        });

        // Insert the populated HTML into the table container
        document.getElementById("productTableContainer").innerHTML = `
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
              ${productsHtml}
            </tbody>
          </table>
        `;
      }
    });
  </script>

</body>
</html>

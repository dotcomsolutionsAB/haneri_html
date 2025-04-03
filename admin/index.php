<?php 
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
?>
<?php include("../configs/auth_check.php"); ?>
<?php include("../configs/config.php"); ?>
<?php include("header.php");?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(function () {
        const a_token = localStorage.getItem("auth_token");
        if (!a_token) {
            console.error("No auth_token found in localStorage");
            return;
        }

        $.ajax({
            url: "<?php echo BASE_URL; ?>/users/admin_dashboard", // ✅ PHP BASE_URL used here
            method: "GET",
            headers: {
                Authorization: "Bearer " + a_token
            },
            success: function (response) {
                console.log("API Response:", response);

                if (response.success) {
                    /****************************************
                     * 1) Display total sales
                     ****************************************/
                    // Safely parse the total sales
                    const totalSales = parseFloat(response.total_sales ?? 0);
                    // Update the text (₹ + total formatted to 2 decimals)
                    $("#all-time-sales").text(`₹${totalSales.toFixed(2)}`);

                    // If you have growth % somewhere in API, set that here:
                    // $("#growth-percentage").text("+2.7%"); // Example static

                    /****************************************
                     * 2) Display order status bars
                     ****************************************/
                    const completed = parseInt(response.order_status_counts?.completed ?? 0);
                    const pending = parseInt(response.order_status_counts?.pending ?? 0);
                    const cancelled = parseInt(response.order_status_counts?.cancelled ?? 0);

                    const totalCount = completed + pending + cancelled;
                    if (totalCount > 0) {
                        const completedPerc = (completed / totalCount) * 100;
                        const pendingPerc   = (pending   / totalCount) * 100;
                        const cancelledPerc = (cancelled / totalCount) * 100;

                        // Dynamically set the width on each bar
                        $("#completed-bar").css("max-width", `${completedPerc}%`);
                        $("#pending-bar").css("max-width", `${pendingPerc}%`);
                        $("#cancelled-bar").css("max-width", `${cancelledPerc}%`);
                    } else {
                        // If all are zero, keep them at 0% or hide
                        $("#completed-bar").css("max-width", "0%");
                        $("#pending-bar").css("max-width", "0%");
                        $("#cancelled-bar").css("max-width", "0%");
                    }

                    /****************************************
                     * 3) Display recent orders (up to 3)
                     ****************************************/
                    const recentOrders = response.recent_orders ?? [];
                    const lastThree = recentOrders.slice(0, 3);

                    // Clear any existing content
                    $("#recent-orders").empty();

                    // For each of the 3 recent orders, build the HTML snippet
                    lastThree.forEach(order => {
                        // You can decide icons or placeholders based on order.status or user_name
                        // For example, we do a generic "ki-shop" icon
                        let iconClass = "ki-shop";

                        // Optionally switch icon based on status or user:
                        if (order.status === "pending")    iconClass = "ki-facebook";
                        if (order.status === "completed")  iconClass = "ki-shop";
                        if (order.status === "cancelled")  iconClass = "ki-instagram";

                        // Determine color arrow: complete => up green, pending => down red, etc.
                        let arrowClass = "ki-arrow-down text-danger";
                        if (order.status === "completed") arrowClass = "ki-arrow-up text-success";
                        if (order.status === "cancelled") arrowClass = "ki-arrow-down text-info";

                        // Build a row
                        const rowHtml = `
                            <div class="flex items-center justify-between flex-wrap gap-2">
                                <div class="flex items-center gap-1.5">
                                    <i class="ki-filled ${iconClass} text-base text-gray-500"></i>
                                    <span class="text-sm font-normal text-gray-900">
                                        ${order.user_name}
                                    </span>
                                </div>
                                <div class="flex items-center text-sm font-medium text-gray-800 gap-6">
                                    <span class="lg:text-right">
                                        $${parseFloat(order.amount).toLocaleString()}
                                    </span>
                                    <span class="lg:text-right">
                                        <i class="ki-filled ${arrowClass}"></i>
                                        ${capitalize(order.status)}
                                    </span>
                                </div>
                            </div>
                        `;
                        // Append to the container
                        $("#recent-orders").append(rowHtml);
                    });

                    // If there's no recent orders, optionally show a "No orders" message
                    if (lastThree.length === 0) {
                        $("#recent-orders").html(`
                            <div class="text-sm text-gray-500">
                                No recent orders to display.
                            </div>
                        `);
                    }

                    // Helper function to capitalize statuses if needed
                    function capitalize(str) {
                        return str.charAt(0).toUpperCase() + str.slice(1);
                    }

                    // Set your other existing counters:
                    $("#total-products").text(response.data?.total_products ?? 0);
                    $("#total-orders").text(response.data?.total_orders ?? 0);
                    $("#total-brands").text(response.data?.total_brands ?? 0);
                    $("#total-categories").text(response.data?.total_categories ?? 0);


                    // **) Build the earnings line chart
                    if (response.success && response.year_records) {
                        const monthNames = ["January","February","March","April","May","June",
                                            "July","August","September","October","November","December"];
                        const shortMonths = ["Jan","Feb","Mar","Apr","May","Jun",
                                            "Jul","Aug","Sep","Oct","Nov","Dec"];

                        // Convert object to array of numbers
                        const monthlyData = monthNames.map(m => parseFloat(response.year_records[m] || 0));

                        const options = {
                            chart: {
                                type: 'line',
                                height: 220,
                                toolbar: { show: false },
                                zoom: { enabled: false }
                            },
                            stroke: { curve: 'smooth', width: 3 },
                            series: [{ name: 'Sales', data: monthlyData }],
                            xaxis: {
                                categories: shortMonths,
                                labels: { style: { colors: '#6B7280', fontSize: '12px' } }
                            },
                            yaxis: {
                                labels: {
                                    style: { colors: '#6B7280', fontSize: '12px' },
                                    formatter: function (val) {
                                        return `₹${val}`;
                                    }
                                }
                            },
                            colors: ['#3b82f6'],  // line color
                            grid: {
                                borderColor: '#E5E7EB', // light gray grid lines
                                strokeDashArray: 4
                            },
                            tooltip: {
                                y: {
                                    formatter: function (val) {
                                        // e.g. 35000 => "₹35,000"
                                        return `₹${val.toLocaleString()}`;
                                    }
                                }
                            }
                        };

                        const chart = new ApexCharts(document.querySelector("#earning_chart"), options);
                        chart.render();
                    }

                } else {
                    console.error("API returned success=false", response);
                }
            },

            error: function (xhr, status, error) {
                console.error("AJAX error:", error);
                console.log("XHR Response:", xhr.responseText);
            }
        });
    });
</script>


            <!-- End of Header -->
            <!-- Content -->
            <main class="grow content pt-5" id="content" role="content">
                <!-- Container -->
                <div class="container-fixed" id="content_container">
                </div>
                <!-- End of Container -->
                <!-- Container -->
                <div class="container-fixed">
                    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
                        <div class="flex flex-col justify-center gap-2">
                            <h1 class="text-xl font-medium leading-none text-gray-900">
                                Dashboard
                            </h1>
                            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                                Central Hub for Personal Customization
                            </div>
                        </div>
                        <!-- <div class="flex items-center gap-2.5">
                            <a class="btn btn-sm btn-light" href="html/demo1/public-profile/profiles/default.html">
                                View Profile
                            </a>
                        </div> -->
                    </div>
                </div>
                <!-- End of Container -->
                <!-- Container -->
                <div class="container-fixed">
                    <div class="grid gap-5 lg:gap-7.5">

                        <!-- begin: grid -->
                        <div class="grid lg:grid-cols-3 gap-y-5 lg:gap-7.5 items-stretch">
                            <div class="lg:col-span-1">
                                <div class="grid grid-cols-2 gap-5 lg:gap-7.5 h-full items-stretch">
                                    <style>
                                        .channel-stats-bg {
                                            background-image: url('assets/media/images/2600x1600/bg-3.png');
                                        }

                                        .dark .channel-stats-bg {
                                            background-image: url('assets/media/images/2600x1600/bg-3-dark.png');
                                        }
                                    </style>
                                    
                                    <!-- product count box -->
                                    <div class="card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                                        <img alt="" class="w-14 mt-4 ms-5" src="../images/default/df001.png" />
                                        <div class="flex flex-col gap-1 pb-4 px-5">
                                            <span class="text-3xl font-semibold text-gray-900" id="total-products">
                                                00
                                            </span>
                                            <span class="text-2sm font-normal text-gray-700">
                                                Total Products
                                            </span>
                                        </div>
                                    </div>

                                    <!-- orders count box -->
                                    <div class="card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                                        <img alt="" class="w-14 mt-4 ms-5" src="../images/default/df001.png" />
                                        <div class="flex flex-col gap-1 pb-4 px-5">
                                            <span class="text-3xl font-semibold text-gray-900" id="total-orders">
                                                00
                                            </span>
                                            <span class="text-2sm font-normal text-gray-700">
                                                Total Orders
                                            </span>
                                        </div>
                                    </div>

                                    <!-- brands count box -->
                                    <div class="card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                                        <img alt="" class="w-14 mt-4 ms-5" src="../images/default/df001.png" />
                                        <div class="flex flex-col gap-1 pb-4 px-5">
                                            <span class="text-3xl font-semibold text-gray-900" id="total-brands">
                                                00
                                            </span>
                                            <span class="text-2sm font-normal text-gray-700">
                                                Total Brands
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Categories count box -->
                                    <div class="card flex-col justify-between gap-6 h-full bg-cover rtl:bg-[left_top_-1.7rem] bg-[right_top_-1.7rem] bg-no-repeat channel-stats-bg">
                                        <img alt="" class="w-14 mt-4 ms-5" src="../images/default/df001.png" />
                                        <div class="flex flex-col gap-1 pb-4 px-5">
                                            <span class="text-3xl font-semibold text-gray-900" id="total-categories">
                                                00
                                            </span>
                                            <span class="text-2sm font-normal text-gray-700">
                                                Total Categories
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="lg:col-span-2">
                                <style>
                                    .entry-callout-bg {
                                        background-image: url('assets/media/images/2600x1600/2.png');
                                    }

                                    .dark .entry-callout-bg {
                                        background-image: url('assets/media/images/2600x1600/2-dark.png');
                                    }
                                </style>
                                <div class="card h-full h-full">
                                    <div class="card-body p-10 bg-[length:80%] rtl:[background-position:-70%_25%] [background-position:175%_25%] bg-no-repeat entry-callout-bg">
                                        <div class="flex flex-col justify-center gap-4">
                                            <div class="flex -space-x-2">
                                                <div class="flex">
                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-10"
                                                        src="assets/media/avatars/300-4.png" />
                                                </div>
                                                <div class="flex">
                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-10"
                                                        src="assets/media/avatars/300-1.png" />
                                                </div>
                                                <div class="flex">
                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-10"
                                                        src="assets/media/avatars/300-2.png" />
                                                </div>
                                                <div class="flex">
                                                    <span
                                                        class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-10 text-success-inverse text-xs ring-success-light bg-success">
                                                        S
                                                    </span>
                                                </div>
                                            </div>
                                            <h2 class="text-1.5xl font-semibold text-gray-900">
                                                Connect Today & Join
                                                <br />
                                                the
                                                <a class="link" href="#">
                                                    KeenThemes Network
                                                </a>
                                            </h2>
                                            <p class="text-sm font-normal text-gray-700 leading-5.5">
                                                Enhance your projects with premium themes and
                                                <br />
                                                templates. Join the KeenThemes community today
                                                <br />
                                                for top-quality designs and resources.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-footer justify-center">
                                        <a class="btn btn-link" href="html/demo1/account/home/get-started.html">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: grid -->

                        <!-- begin: grid 2nd grid-->
                        <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
                            <div class="lg:col-span-1">
                                <div class="card h-full">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Last Highlights Of Orders
                                        </h3>
                                    </div>
                                    <div class="card-body flex flex-col gap-4 p-5 lg:p-7.5 lg:pt-4">
                                        <!-- Total Sales Amount -->
                                        <div class="flex flex-col gap-0.5">
                                            <span class="text-sm font-normal text-gray-700">
                                                All time sales
                                            </span>
                                            <div class="flex items-center gap-2.5">
                                                <span class="text-3xl font-semibold text-gray-900" id="all-time-sales">
                                                    ₹00.00
                                                </span>
                                                <span class="badge badge-outline badge-success badge-sm" id="growth-percentage">
                                                    +0%
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Showing the percentage of the sales report -->
                                        <div class="flex items-center gap-1 mb-1.5">
                                            <!-- Completed bar -->
                                            <div class="bg-success h-2 w-full max-w-[0%] rounded-sm" id="completed-bar"></div>
                                            <!-- Pending bar -->
                                            <div class="bg-brand h-2 w-full max-w-[0%] rounded-sm" id="pending-bar"></div>
                                            <!-- Cancelled bar -->
                                            <div class="bg-info h-2 w-full max-w-[0%] rounded-sm" id="cancelled-bar"></div>
                                        </div>

                                        <div class="flex items-center flex-wrap gap-4 mb-1">
                                            <!-- Completed label -->
                                            <div class="flex items-center gap-1.5">
                                                <span class="badge badge-dot size-2 badge-success"></span>
                                                <span class="text-sm font-normal text-gray-800">Complete</span>
                                            </div>
                                            <!-- Pending label -->
                                            <div class="flex items-center gap-1.5">
                                                <span class="badge badge-dot size-2 badge-danger"></span>
                                                <span class="text-sm font-normal text-gray-800">Pending</span>
                                            </div>
                                            <!-- Cancelled label -->
                                            <div class="flex items-center gap-1.5">
                                                <span class="badge badge-dot size-2 badge-info"></span>
                                                <span class="text-sm font-normal text-gray-800">Cancel</span>
                                            </div>
                                        </div>

                                        <div class="border-b border-gray-300">
                                        </div>

                                        <!-- Last three orders container -->
                                        <div class="grid gap-3" id="recent-orders">
                                            <!-- We'll dynamically populate or replace these rows in JS -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <div class="card h-full">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Earnings
                                        </h3>
                                        <div class="flex gap-5">
                                            <label class="switch switch-sm">
                                                <input class="order-2" name="check" type="checkbox" value="1" />
                                                <span class="switch-label order-1">
                                                    Referrals only
                                                </span>
                                            </label>
                                            <select class="select select-sm w-28" name="select">
                                                <option value="1">
                                                    1 month
                                                </option>
                                                <option value="2">
                                                    3 month
                                                </option>
                                                <option value="3">
                                                    6 month
                                                </option>
                                                <option selected="" value="4">
                                                    12 month
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body flex flex-col justify-end items-stretch grow px-3 py-1">
                                        <div id="earning_chart">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: grid -->


                        <!-- begin: grid -->
                        <!-- <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
                            <div class="lg:col-span-1">
                                <div class="card h-full">
                                    <div class="card-body lg:p-7.5 lg:pt-6 p-5">
                                        <div class="flex items-center justify-between flex-wrap gap-5 mb-7.5">
                                            <div class="flex flex-col gap-1">
                                                <span class="text-1.5xl font-semibold text-gray-900">
                                                    Team Meeting
                                                </span>
                                                <span class="text-sm font-semibold text-gray-800">
                                                    09:00 - 09:30
                                                </span>
                                            </div>
                                            <img alt="" class="size-7" src="assets/media/brand-logos/zoom.svg" />
                                        </div>
                                        <p class="text-sm font-normal text-gray-800 leading-5.5 mb-8">
                                            Team meeting to discuss strategies, outline
                                            <br />
                                            project milestones, define key goals, and
                                            <br />
                                            establish clear timelines.
                                        </p>
                                        <div class="flex rounded-lg bg-gray-100 gap-10 p-5">
                                            <div class="flex flex-col gap-5">
                                                <div
                                                    class="flex items-center gap-1.5 text-sm font-normal text-gray-800">
                                                    <i class="ki-filled ki-geolocation text-base text-gray-500">
                                                    </i>
                                                    Location
                                                </div>
                                                <div class="text-sm font-medium text-gray-800 pt-1.5">
                                                    Amsterdam
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-5">
                                                <div
                                                    class="flex items-center gap-1.5 text-sm font-normal text-gray-800">
                                                    <i class="ki-filled ki-users text-base text-gray-500">
                                                    </i>
                                                    Team
                                                </div>
                                                <div class="flex -space-x-2">
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                            src="assets/media/avatars/300-4.png" />
                                                    </div>
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                            src="assets/media/avatars/300-1.png" />
                                                    </div>
                                                    <div class="flex">
                                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                            src="assets/media/avatars/300-2.png" />
                                                    </div>
                                                    <div class="flex">
                                                        <span
                                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-success-inverse text-4xs ring-success-light bg-success">
                                                            +10
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer justify-center">
                                        <a class="btn btn-link" href="">
                                            Join Meeting
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <div class="grid">
                                    <div class="card card-grid h-full min-w-full">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Teams
                                            </h3>
                                            <div class="input input-sm max-w-48">
                                                <i class="ki-filled ki-magnifier">
                                                </i>
                                                <input placeholder="Search Teams" type="text" />
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div data-datatable="true" data-datatable-page-size="5">
                                                <div class="scrollable-x-auto">
                                                    <table class="table table-border" data-datatable-table="true">
                                                        <thead>
                                                            <tr>
                                                                <th class="w-[60px]">
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-check="true" type="checkbox" />
                                                                </th>
                                                                <th class="min-w-[280px]">
                                                                    <span class="sort asc">
                                                                        <span class="sort-label">
                                                                            Team
                                                                        </span>
                                                                        <span class="sort-icon">
                                                                        </span>
                                                                    </span>
                                                                </th>
                                                                <th class="min-w-[135px]">
                                                                    <span class="sort">
                                                                        <span class="sort-label">
                                                                            Rating
                                                                        </span>
                                                                        <span class="sort-icon">
                                                                        </span>
                                                                    </span>
                                                                </th>
                                                                <th class="min-w-[135px]">
                                                                    <span class="sort">
                                                                        <span class="sort-label">
                                                                            Last Modified
                                                                        </span>
                                                                        <span class="sort-icon">
                                                                        </span>
                                                                    </span>
                                                                </th>
                                                                <th class="min-w-[135px]">
                                                                    <span class="sort">
                                                                        <span class="sort-label">
                                                                            Members
                                                                        </span>
                                                                        <span class="sort-icon">
                                                                        </span>
                                                                    </span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="1" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Product Management
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Product development & lifecycle
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    21 Oct, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-4.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-1.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-2.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <span
                                                                                class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-success-inverse ring-success-light bg-success">
                                                                                +10
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="2" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Marketing Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Campaigns & market analysis
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label indeterminate">
                                                                            <i class="rating-on ki-solid ki-star text-base leading-none"
                                                                                style="width: 50.0%">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    15 Oct, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-4.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <span
                                                                                class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] uppercase text-warning-inverse ring-warning-light bg-warning">
                                                                                g
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="3" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            HR Department
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Talent acquisition, employee welfare
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    10 Oct, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-4.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-1.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-2.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <span
                                                                                class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-info-inverse ring-info-light bg-info">
                                                                                +A
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="4" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Sales Division
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Customer relations, sales strategy
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    05 Oct, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-24.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-7.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="5" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Development Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Software development
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label indeterminate">
                                                                            <i class="rating-on ki-solid ki-star text-base leading-none"
                                                                                style="width: 50.0%">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    01 Oct, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-3.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-8.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-9.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <span
                                                                                class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-danger-inverse ring-danger-light bg-danger">
                                                                                +5
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="6" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Quality Assurance
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Product testing
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    25 Sep, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-6.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-5.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="7" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Finance Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Financial planning
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    20 Sep, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-10.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-11.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-12.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <span
                                                                                class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-primary-inverse ring-primary-light bg-primary">
                                                                                +8
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="8" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Customer Support
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Customer service
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label indeterminate">
                                                                            <i class="rating-on ki-solid ki-star text-base leading-none"
                                                                                style="width: 50.0%">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    15 Sep, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-13.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-14.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="9" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            R&D Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Research & development
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    10 Sep, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-15.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-16.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="10" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Operations Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Operations management
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    05 Sep, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-17.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-18.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-19.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="11" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            IT Support
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Technical support
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    01 Sep, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-20.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-21.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="12" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Legal Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Legal support
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    25 Aug, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-22.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-23.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="13" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Logistics Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Supply chain
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label indeterminate">
                                                                            <i class="rating-on ki-solid ki-star text-base leading-none"
                                                                                style="width: 50.0%">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    20 Aug, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-24.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-25.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="14" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Procurement Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Supplier management
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    15 Aug, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-26.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-27.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-28.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <span
                                                                                class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-info-inverse ring-info-light bg-info">
                                                                                +3
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input class="checkbox checkbox-sm"
                                                                        data-datatable-row-check="true" type="checkbox"
                                                                        value="15" />
                                                                </td>
                                                                <td>
                                                                    <div class="flex flex-col gap-2">
                                                                        <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                            href="#">
                                                                            Training Team
                                                                        </a>
                                                                        <span
                                                                            class="text-2sm text-gray-700 font-normal leading-3">
                                                                            Employee training
                                                                        </span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="rating">
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label checked">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                        <div class="rating-label">
                                                                            <i
                                                                                class="rating-on ki-solid ki-star text-base leading-none">
                                                                            </i>
                                                                            <i
                                                                                class="rating-off ki-outline ki-star text-base leading-none">
                                                                            </i>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    10 Aug, 2024
                                                                </td>
                                                                <td>
                                                                    <div class="flex -space-x-2">
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-29.png" />
                                                                        </div>
                                                                        <div class="flex">
                                                                            <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]"
                                                                                src="assets/media/avatars/300-30.png" />
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div
                                                    class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                                    <div class="flex items-center gap-2 order-2 md:order-1">
                                                        Show
                                                        <select class="select select-sm w-16" data-datatable-size="true"
                                                            name="perpage">
                                                        </select>
                                                        per page
                                                    </div>
                                                    <div class="flex items-center gap-4 order-1 md:order-2">
                                                        <span data-datatable-info="true">
                                                        </span>
                                                        <div class="pagination" data-datatable-pagination="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- end: grid -->
                    </div>
                </div>
                <!-- End of Container -->
            </main>
            <!-- End of Content -->


            
<!-- Footer -->
<?php include("footer.php");?>


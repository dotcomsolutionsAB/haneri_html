<base href="../">
<?php 
    $current_page = "Show Users"; // Dynamically set this based on the page
?>
<?php include("header1.php"); ?>
    <!-- End of Header -->
        <!-- Content -->
        <main class="grow content pt-5" id="content" role="content">
            <!-- Container -->
            <div class="container-fixed" id="content_container">
            </div>
            <!-- Container -->
            <div class="container-fixed">
                <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
                    <div class="flex flex-col justify-center gap-2">
                        <h1 class="text-xl font-medium leading-none text-gray-900">
                            Users (14)
                        </h1>
                        <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                            Overview of all users and brands.
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <a class="btn btn-sm btn-light" href="#">
                            Import Users
                        </a>
                        <a class="btn btn-sm btn-primary" href="#">
                            Add User
                        </a>
                    </div>
                </div>
            </div>
            <!-- End of Container -->
            <!-- Container -->
            <div class="container-fixed">
                <div class="grid gap-5 lg:gap-7.5">
                    <div class="card card-grid min-w-full">
                        <div class="card-header py-5 flex-wrap gap-2">
                            <h3 class="card-title">
                                Users
                            </h3>
                            <div class="flex gap-6">
                                <div class="relative">
                                    <i
                                        class="ki-filled ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 start-0 -translate-y-1/2 ms-3">
                                    </i>
                                    <input class="input input-sm pl-8" data-datatable-search="#members_table"
                                        placeholder="Search Members" type="text" />
                                </div>
                                <label class="switch switch-sm">
                                    <input class="order-2" name="check" type="checkbox" value="1" />
                                    <span class="switch-label order-1">
                                        Active Users
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div data-datatable="true" data-datatable-page-size="10">
                                <div class="scrollable-x-auto">
                                    <table class="table table-border" data-datatable-table="true"
                                        id="members_table">
                                        <thead>
                                            <tr>
                                                <th class="w-[60px] text-center">
                                                    <input class="checkbox checkbox-sm" data-datatable-check="true"
                                                        type="checkbox" />
                                                </th>
                                                <th class="min-w-[300px]">
                                                    <span class="sort asc">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Member
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="text-gray-700 font-normal min-w-[220px]">
                                                    Roles
                                                </th>
                                                <th class="min-w-[165px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Location
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[165px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Status
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="min-w-[165px]">
                                                    <span class="sort">
                                                        <span class="sort-label text-gray-700 font-normal">
                                                            Recent activity
                                                        </span>
                                                        <span class="sort-icon">
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="w-[60px]">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="1" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-3.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Tyler Hero
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                26 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Editor
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/estonia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Estonia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Current session
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="2" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-2.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Esther Howard
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                639 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Chat
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Tester
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/malaysia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Malaysia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    -
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="3" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-11.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Jacob Jones
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                125 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Visitor
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Developer
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/ukraine.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Ukraine
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-primary">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 9:53 am
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="4" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-2.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Cody Fisher
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                81 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Designer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Analyst
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/canada.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Canada
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-danger">
                                                        Deleted
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Current session
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="5" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-5.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Leslie Alexander
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                203 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Chat
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Scrum Master
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/india.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            India
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Month ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="6" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-6.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Brooklyn Simmons
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                45 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Developer
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/spain.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Spain
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 3:45 pm
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="7" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-7.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Darlene Robertson
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                108 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Editor
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Tester
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/germany.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Germany
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    2 days ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="8" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-8.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Jerome Bell
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                91 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Scrum Master
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/france.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            France
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Week ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox" value="9" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-9.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Devon Lane
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                56 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Developer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/japan.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Japan
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-danger">
                                                        Deleted
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 11:00 am
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="10" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-10.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Jane Cooper
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                47 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Designer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/south-korea.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            South Korea
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    3 days ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="11" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-12.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Ronald Richards
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                64 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Chat
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/brazil.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Brazil
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Month ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="12" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-13.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Kathryn Murphy
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                78 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Tester
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Scrum Master
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/united-kingdom.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            United Kingdom
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 10:30 am
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="13" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-14.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Jacob Smith
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                92 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/australia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Australia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Week ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="14" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-15.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Kristin Watson
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                102 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Designer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Visitor
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/italy.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Italy
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 8:00 am
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="15" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-16.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Cameron Williamson
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                58 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Editor
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Analyst
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/russia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Russia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-danger">
                                                        Deleted
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    2 days ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="16" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-17.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Courtney Henry
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                75 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Chat
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/india.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            India
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Month ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="17" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-18.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Ralph Edwards
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                109 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Scrum Master
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/spain.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Spain
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Week ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="18" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-19.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Arlene McCoy
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                84 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Developer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Tester
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/canada.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Canada
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-danger">
                                                        Deleted
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 1:00 pm
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="19" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-20.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Theresa Webb
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                56 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Designer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Analyst
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/malaysia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Malaysia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Week ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="20" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-21.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Guy Hawkins
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                68 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/estonia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Estonia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 3:00 pm
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="21" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-22.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Floyd Miles
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                43 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Chat
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Tester
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/ukraine.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Ukraine
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 11:45 am
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="22" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-23.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Devon Lane
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                91 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Visitor
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Developer
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/india.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            India
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-danger">
                                                        Deleted
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Month ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="23" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-24.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Ronald Richards
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                78 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Designer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Analyst
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/france.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            France
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Week ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="24" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-25.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Kathryn Murphy
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                85 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Scrum Master
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/japan.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Japan
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 4:00 pm
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="25" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-26.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Jacob Smith
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                92 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Developer
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/south-korea.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            South Korea
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-danger">
                                                        Deleted
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Week ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="26" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-27.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Kristin Watson
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                102 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Chat
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Visitor
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/italy.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Italy
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 8:00 am
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="27" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-28.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Cameron Williamson
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                58 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Analyst
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/russia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Russia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    2 days ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="28" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-29.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Courtney Henry
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                75 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Designer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/spain.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Spain
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Month ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="29" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-30.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Ralph Edwards
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                109 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Scrum Master
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/canada.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Canada
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-danger">
                                                        Deleted
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Week ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="30" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-31.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Arlene McCoy
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                84 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Developer
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/malaysia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Malaysia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 1:00 pm
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="31" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-32.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Theresa Webb
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                56 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Designer
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Analyst
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/estonia.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Estonia
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-warning">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Week ago
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="32" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-33.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                68 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Admin
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Scrum Master
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/ukraine.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            Ukraine
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-danger">
                                                        Deleted
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 3:00 pm
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <input class="checkbox checkbox-sm"
                                                        data-datatable-row-check="true" type="checkbox"
                                                        value="33" />
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-2.5">
                                                        <div class="">
                                                            <img class="h-9 rounded-full"
                                                                src="assets/media/avatars/300-34.png" />
                                                        </div>
                                                        <div class="flex flex-col gap-0.5">
                                                            <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                href="#">
                                                                Floyd Miles
                                                            </a>
                                                            <span class="text-xs text-gray-700 font-normal">
                                                                43 tasks
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex flex-wrap gap-2.5 mb-2">
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Support
                                                        </span>
                                                        <span class="badge badge-sm badge-light badge-outline">
                                                            Visitor
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex items-center gap-1.5">
                                                        <img alt="flag" class="h-4 rounded-full"
                                                            src="assets/media/flags/india.svg" />
                                                        <span class="leading-none text-gray-800 font-normal">
                                                            India
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-sm badge-outline badge-success">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="text-gray-800 font-normal">
                                                    Today, 11:45 am
                                                </td>
                                                <td class="w-[60px]">
                                                    <div class="menu" data-menu="true">
                                                        <div class="menu-item" data-menu-item-offset="0, 10px"
                                                            data-menu-item-placement="bottom-end"
                                                            data-menu-item-placement-rtl="bottom-start"
                                                            data-menu-item-toggle="dropdown"
                                                            data-menu-item-trigger="click|lg:click">
                                                            <button
                                                                class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                                                <i class="ki-filled ki-dots-vertical">
                                                                </i>
                                                            </button>
                                                            <div class="menu-dropdown menu-default w-full max-w-[175px]"
                                                                data-menu-dismiss="true">
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-search-list">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            View
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-file-up">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Export
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-pencil">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Edit
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-copy">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Make a copy
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-separator">
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link" href="#">
                                                                        <span class="menu-icon">
                                                                            <i class="ki-filled ki-trash">
                                                                            </i>
                                                                        </span>
                                                                        <span class="menu-title">
                                                                            Remove
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
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
                    <?php include("../admin_inc/faq.php"); ?>
                </div>
            </div>
            <!-- End of Container -->
        </main>
        <!-- End of Content -->
    <!-- Footer -->
<?php include("footer1.php"); ?>
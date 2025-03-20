<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php include("../../configs/config.php"); ?>
<?php 
    $current_page = "Add Category"; // Dynamically set this based on the page
?>
<?php include("header1.php"); ?>

            <!-- End of Header -->
            <!-- Content -->
            <main class="grow content pt-5" id="content" role="content">
                <!-- Container -->
                <div class="container-fixed" id="content_container">
                </div>
                <!-- End of Container -->
                
                <!-- Container -->
                <div class="container-fixed">
                    <div class="grid gap-5 grid-cols-1 lg:gap-7.5 xl:w-[68.75rem] mx-auto">
                        <div class="card pb-2.5">
                            <div class="card-header" id="basic_settings">
                                <h3 class="card-title">
                                    General Settings
                                </h3>
                            </div>
                            <div class="card-body grid gap-5">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <!-- Category Name -->
        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">Category Name</label>
            <input class="input" type="text" id="categoryName" placeholder="Category Name">
        </div>

        <!-- Sort Number -->
        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">Sort Number</label>
            <input class="input" type="text" id="sortNumber" placeholder="Sort Number">
        </div>

        <!-- Description -->
        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">Description</label>
            <div class="card pb-2.5">
                <textarea class="note-codable text-edit" id="description" aria-multiline="true"></textarea>
            </div>
        </div>

        <!-- Parent Category Name -->
        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">Parent Category</label>
            <select class="select" id="parentCategory">
                <option value="">Loading categories...</option>
            </select>
        </div>

        <!-- Category Logo -->
        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-2.5">
            <label class="form-label max-w-56">Photo</label>
            <div class="flex items-center justify-between flex-wrap grow gap-2.5">
                <span class="text-2sm">150x150px JPEG, PNG Image</span>
                <input type="file" id="photo" accept=".png, .jpg, .jpeg">
            </div>
        </div>
    </div>

    <div class="flex justify-end gap-5">
        <button class="btn btn-primary" id="saveCategory">Save Category</button>
    </div>
</div>
                        </div>
                    </div>
                </div>
                <!-- End of Container -->
            </main>
            <!-- End of Content -->
            <!-- Footer -->
<?php include("footer1.php"); ?>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const parentCategorySelect = document.querySelector("#parentCategory");
        const saveButton = document.querySelector("#saveCategory");
        const categoryNameInput = document.querySelector("#categoryName");
        const sortNumberInput = document.querySelector("#sortNumber");
        const descriptionInput = document.querySelector("#description");
        const photoInput = document.querySelector("#photo");

        const apiUrl = "https://haneri.dotcombusiness.in/api/categories";
        const token = localStorage.getItem('auth_token'); // Replace with actual token

        // Fetch categories for parent dropdown
        function fetchCategories() {
            fetch(apiUrl, {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${token}` 
                    // "Authorization": authToken,
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data && data.data) {
                    parentCategorySelect.innerHTML = ""; // Clear existing options

                    // Default option
                    const defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.textContent = "Select Parent Category";
                    parentCategorySelect.appendChild(defaultOption);

                    // Populate dropdown with only parent categories
                    data.data.forEach(category => {
                        if (category.parent_id === null) {
                            const option = document.createElement("option");
                            option.value = category.parent_id || "0"; // Use parent_id or 0 if null
                            option.textContent = category.name;
                            parentCategorySelect.appendChild(option);
                        }
                    });
                }
            })
            .catch(error => {
                console.error("Error fetching categories:", error);
            });
        }

        // Function to submit form data
        function submitCategory() {
            const formData = {
                name: categoryNameInput.value.trim(),
                parent_id: parentCategorySelect.value !== "" ? parentCategorySelect.value : null,
                photo: photoInput.files.length > 0 ? photoInput.files[0].name : null,
                custom_sort: sortNumberInput.value.trim() || 0,
                description: descriptionInput.value.trim() || null
            };

            console.log("Submitting Data:", formData); // Debugging

            fetch(apiUrl, {
                method: "POST",
                headers: {
                    Authorization: `Bearer ${token}` 
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(formData)
            })
            .then(async response => {
                const text = await response.text(); // Read raw response
                console.log("Raw Response:", text); // Debugging

                try {
                    return JSON.parse(text); // Try parsing JSON
                } catch (error) {
                    throw new Error("Invalid JSON response: " + text);
                }
            })
            .then(data => {
                console.log("Success Response:", data);
                if (data.message) {
                    alert(data.message); // Show success message
                    fetchCategories(); // Refresh dropdown
                }
            })
            .catch(error => {
                console.error("Error submitting category:", error);
                alert("Error submitting category: " + error.message);
            });
        }

        // Event listener for save button
        saveButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default form submission
            submitCategory();
        });

        // Load categories on page load
        fetchCategories();
    });
</script> -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const parentCategorySelect = document.querySelector("#parentCategory");
        const saveButton = document.querySelector("#saveCategory");
        const categoryNameInput = document.querySelector("#categoryName");
        const sortNumberInput = document.querySelector("#sortNumber");
        const descriptionInput = document.querySelector("#description");
        const photoInput = document.querySelector("#photo");

        const apiUrl = "https://haneri.dotcombusiness.in/api/categories";
        const authToken = localStorage.getItem('auth_token'); // Replace with actual token

        /** FETCH CATEGORIES **/
        function fetchCategories() {
            fetch(apiUrl, {
                method: "GET",
                headers: {
                    "Authorization": authToken,
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data && data.data) {
                    parentCategorySelect.innerHTML = ""; // Clear existing options

                    // Default option
                    const defaultOption = document.createElement("option");
                    defaultOption.value = "";
                    defaultOption.textContent = "Select Parent Category";
                    parentCategorySelect.appendChild(defaultOption);

                    // Populate dropdown with only parent categories
                    data.data.forEach(category => {
                        if (category.parent_id === null) {
                            const option = document.createElement("option");
                            option.value = category.name; // Use category name as value
                            option.textContent = category.name;
                            parentCategorySelect.appendChild(option);
                        }
                    });
                }
            })
            .catch(error => {
                console.error("Error fetching categories:", error);
            });
        }

        /** SUBMIT CATEGORY **/
        function submitCategory() {
            const formData = {
                name: categoryNameInput.value.trim(),
                parent_id: parentCategorySelect.value !== "" ? parentCategorySelect.value : null,
                photo: photoInput.files.length > 0 ? photoInput.files[0].name : null,
                custom_sort: sortNumberInput.value.trim() || 0,
                description: descriptionInput.value.trim() || null
            };

            console.log("Submitting Data:", formData); // Debugging

            fetch(apiUrl, {
                method: "POST",
                headers: {
                    "Authorization": authToken,
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                console.log("Success Response:", data);
                if (data.message) {
                    alert(data.message); // Show success message
                    fetchCategories(); // Refresh dropdown
                }
            })
            .catch(error => {
                console.error("Error submitting category:", error);
                alert("Error submitting category: " + error.message);
            });
        }

        // Event listener for save button
        saveButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default behavior
            submitCategory();
        });

        // Load categories on page load
        fetchCategories();
    });
</script>


<style>
    .text-edit{
        width: 100%;
        min-height: 120px;
        border: 1px solid rgba(128, 128, 128, 0.34);
        border-radius: 10px;
        background: #fcfcfc;
        padding: 2px 10px;
        text-align: justify;
    }
</style>
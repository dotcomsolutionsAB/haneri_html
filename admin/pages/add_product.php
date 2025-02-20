<base href="../">
<?php include("../../configs/auth_check.php"); ?>
<?php 
    $current_page = "Add Product"; // Dynamically set this based on the page
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
                    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
                        <div class="flex flex-col justify-center gap-2">
                            <h1 class="text-xl font-medium leading-none text-gray-900">
                                Settings - Plain
                            </h1>
                            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                                Clean, Efficient User Experience
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <a class="btn btn-sm btn-light" href="#">
                                Public Profile
                            </a>
                            <a class="btn btn-sm btn-primary" href="#">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End of Container -->
                <!-- Container -->
                <div class="container-fixed">
                    <div class="grid gap-5 grid-cols-2 lg:gap-7.5 xl:w-[68.75rem] mx-auto">
                        <div class="col-span-1">
                            <div class="card pb-2.5">
                                <div class="card-header" id="basic_settings">
                                    <h3 class="card-title">
                                        General Settings
                                    </h3>
                                    <div class="flex items-center gap-2">
                                        <label class="switch switch-sm">
                                            <span class="switch-label">
                                                Publish
                                            </span>
                                            <input checked="" name="check" type="checkbox" value="1">
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body grid gap-5">
                                    
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">
                                            Product Name
                                        </label>
                                        <input class="input" type="text" value="Haneri AirElite AEW1">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Stock
                                            
                                        </label>
                                        <input class="input" placeholder="99999" type="text" value="">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">
                                            Weight(in kgs)
                                        </label>
                                        <input class="input" type="text" value="13.5 kg">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">
                                            Minimum Purchase Qty
                                        </label>
                                        <input class="input" placeholder="" type="text" value="5">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Price</label>
                                        <input class="input" type="text" value="1199.00 /-">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Tax</label>
                                        <input class="input" type="text" value="156.04 /-">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Category</label>
                                        <select class="select">
                                            <option>Category 1</option>
                                            <option>Category 2</option>
                                            <option>Category 3</option>
                                        </select>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Brands</label>
                                        <input class="input" placeholder="ABCD" type="text" value="">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Tags</label>
                                        <input class="input" type="text" value="ab, xyx, aoo">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Description</label>
                                        <textarea class="note-codable text-edit" aria-multiline="true"></textarea>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-2.5">
                                        <label class="form-label max-w-56">
                                            Photo
                                        </label>
                                        <div class="flex items-center justify-between flex-wrap grow gap-2.5">
                                            <span class="text-2sm">
                                                150x150px JPEG, PNG Image
                                            </span>
                                            <div class="image-input size-16" data-image-input="true">
                                                <input accept=".png, .jpg, .jpeg" name="avatar" type="file">
                                                <input name="avatar_remove" type="hidden">
                                                <div class="btn btn-icon btn-icon-xs btn-light shadow-default absolute z-1 size-5 -top-0.5 -end-0.5 rounded-full" data-image-input-remove="" data-tooltip="#image_input_tooltip" data-tooltip-trigger="hover">
                                                    <i class="ki-filled ki-cross">
                                                    </i>
                                                </div>
                                                <span class="tooltip hidden" id="image_input_tooltip" style="z-index: 100;">
                                                    Click to remove or revert
                                                </span>
                                                <div class="image-input-placeholder image-input-empty:border-gray-300" style="background-image:url(assets/media/avatars/blank.png)">
                                                    <div class="image-input-preview" style="background-image:url(assets/media/avatars/300-2.png)">
                                                    </div>
                                                    <div class="flex items-center justify-center cursor-pointer h-5 left-0 right-0 bottom-0 bg-dark-clarity absolute">
                                                        <svg class="fill-light opacity-80" height="12" viewBox="0 0 14 12" width="14" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.6665 2.64585H11.2232C11.0873 2.64749 10.9538 2.61053 10.8382 2.53928C10.7225 2.46803 10.6295 2.36541 10.5698 2.24335L10.0448 1.19918C9.91266 0.931853 9.70808 0.707007 9.45438 0.550249C9.20068 0.393491 8.90806 0.311121 8.60984 0.312517H5.38984C5.09162 0.311121 4.799 0.393491 4.5453 0.550249C4.2916 0.707007 4.08701 0.931853 3.95484 1.19918L3.42984 2.24335C3.37021 2.36541 3.27716 2.46803 3.1615 2.53928C3.04584 2.61053 2.91234 2.64749 2.7765 2.64585H2.33317C1.90772 2.64585 1.49969 2.81486 1.19885 3.1157C0.898014 3.41654 0.729004 3.82457 0.729004 4.25002V10.0834C0.729004 10.5088 0.898014 10.9168 1.19885 11.2177C1.49969 11.5185 1.90772 11.6875 2.33317 11.6875H11.6665C12.092 11.6875 12.5 11.5185 12.8008 11.2177C13.1017 10.9168 13.2707 10.5088 13.2707 10.0834V4.25002C13.2707 3.82457 13.1017 3.41654 12.8008 3.1157C12.5 2.81486 12.092 2.64585 11.6665 2.64585ZM6.99984 9.64585C6.39413 9.64585 5.80203 9.46624 5.2984 9.12973C4.79478 8.79321 4.40225 8.31492 4.17046 7.75532C3.93866 7.19572 3.87802 6.57995 3.99618 5.98589C4.11435 5.39182 4.40602 4.84613 4.83432 4.41784C5.26262 3.98954 5.80831 3.69786 6.40237 3.5797C6.99644 3.46153 7.61221 3.52218 8.1718 3.75397C8.7314 3.98576 9.2097 4.37829 9.54621 4.88192C9.88272 5.38554 10.0623 5.97765 10.0623 6.58335C10.0608 7.3951 9.73765 8.17317 9.16365 8.74716C8.58965 9.32116 7.81159 9.64431 6.99984 9.64585Z" fill="">
                                                            </path>
                                                            <path d="M7 8.77087C8.20812 8.77087 9.1875 7.7915 9.1875 6.58337C9.1875 5.37525 8.20812 4.39587 7 4.39587C5.79188 4.39587 4.8125 5.37525 4.8125 6.58337C4.8125 7.7915 5.79188 8.77087 7 8.77087Z" fill="">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="btn btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid gap-3 grid-cols-span-1">
                            <div class="card pb-2.5">
                                <div class="card-header" id="password_settings">
                                    <h3 class="card-title">Discount</h3>
                                    <div class="flex items-center gap-2">
                                        <label class="switch switch-sm">
                                            <span class="switch-label">
                                                Active
                                            </span>
                                            <input checked="" name="check" type="checkbox" value="1">
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body grid gap-5">
                                    
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount Title</label>
                                        <select class="select">
                                            <option>Title 1</option>
                                            <option>Title 2</option>
                                            <option>Title 3</option>
                                        </select>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount Type</label>
                                        <select class="select">
                           
                                            <option>Flat</option>
                                            <option>Percent</option>
                                        </select>
                                    </div><div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="form-label max-w-56">Discount (₹/%)</label>
                                        <input class="input" type="text" value="1199.00 /-">
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="btn btn-primary">
                                            Save Discount
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card pb-2.5">
                                <div class="card-header" id="password_settings">
                                    <h3 class="card-title">Offer Status</h3>
                                </div>
                                <div class="card-body grid gap-5">
                                    <div class="rounded-xl border p-4 flex items-center justify-between gap-2.5">
                                        <div class="flex items-center gap-3.5">
                                            <div class="relative size-[45px] shrink-0">
                                                <svg class="w-full h-full stroke-gray-300 fill-gray-100" fill="none" height="48" viewBox="0 0 44 48"
                                                    width="44" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 
                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 
                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                        fill="">
                                                    </path>
                                                    <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 
                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 
                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                        stroke="">
                                                    </path>
                                                </svg>
                                                <div
                                                    class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                    <i class="ki-filled ki-category text-lg text-gray-500">
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-1">
                                                <span
                                                    class="flex items-center gap-1.5 leading-none font-medium text-sm text-gray-900">Featured</span>
                                                <span class="text-2sm text-gray-700">If you enable this, this product will be granted as a featured
                                                    product.</span>
                                            </div>
                                        </div>
                                        <div class="switch switch-sm">
                                            <input checked="" name="param" type="checkbox" value="1">
                                        </div>
                                    </div>
                                    <div class="rounded-xl border p-4 flex items-center justify-between gap-2.5">
                                        <div class="flex items-center gap-3.5">
                                            <div class="relative size-[45px] shrink-0">
                                                <svg class="w-full h-full stroke-gray-300 fill-gray-100" fill="none" height="48" viewBox="0 0 44 48"
                                                    width="44" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 
                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 
                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                        fill="">
                                                    </path>
                                                    <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 
                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 
                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                        stroke="">
                                                    </path>
                                                </svg>
                                                <div class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                    <i class="ki-filled ki-category text-lg text-gray-500">
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-1">
                                                <span class="flex items-center gap-1.5 leading-none font-medium text-sm text-gray-900">Todays
                                                    Deal</span>
                                                <span class="text-2sm text-gray-700">If you enable this, this product will be granted as a todays
                                                    deal product.</span>
                                            </div>
                                        </div>
                                        <div class="switch switch-sm">
                                            <input checked="" name="param" type="checkbox" value="1">
                                        </div>
                                    </div>
                                    <div class="rounded-xl border p-4 flex items-center justify-between gap-2.5">
                                        <div class="flex items-center gap-3.5">
                                            <div class="relative size-[45px] shrink-0">
                                                <svg class="w-full h-full stroke-gray-300 fill-gray-100" fill="none" height="48" viewBox="0 0 44 48"
                                                    width="44" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506 
                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937 
                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                        fill="">
                                                    </path>
                                                    <path d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506 
                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937 
                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                        stroke="">
                                                    </path>
                                                </svg>
                                                <div class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                    <i class="ki-filled ki-category text-lg text-gray-500">
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-1">
                                                <span class="flex items-center gap-1.5 leading-none font-medium text-sm text-gray-900">Flash
                                                    Deal</span>
                                                <span class="text-2sm text-gray-700">If you enable this, this product will be granted as a todays
                                                    deal product.</span>
                                            </div>
                                        </div>
                                        <div class="switch switch-sm">
                                            <input checked="" name="param" type="checkbox" value="1">
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="btn btn-primary">
                                            Save Deals
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body flex flex-col lg:py-6 lg:gap-7.5 gap-7">
                                    <div class="flex justify-end gap-2.5">
                                        <button class="btn btn-light">
                                            Deactivate Instead
                                        </button>
                                        <button class="btn btn-danger">
                                            Delete Product
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid gap-3 grid-cols-span-2">
                            <div class="card pb-2.5">
                                <!-- Description -->
                                <textarea class="note-codable text-edit" aria-multiline="true"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Container -->
            </main>
            <!-- End of Content -->
            <!-- Footer -->
<?php include("footer1.php"); ?>

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
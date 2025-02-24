<?php include("header.php"); ?>

<?php include("configs/config.php"); ?> 

<main class="main main-test checkout_page">
    <div class="container checkout-container padding_top_100">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li>
                <a href="cart.php">Shopping Cart</a>
            </li>
            <li class="active">
                <a href="checkout.php">Checkout</a>
            </li>
            <!-- <li class="disabled"> -->
            <li>
                <a href="order-complete.php">Order Complete</a>
            </li>
        </ul>

        <div class="row">
           
            <div class="col-lg-7">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Billing details</h2>
                        <div class="addresses">
                            <div class="address">                            
                                <button data-toggle="collapse" data-target="#collapseNew" aria-expanded="true" aria-controls="collapseNew" class="btn btn-link btn-toggle">SHOW ADDRESS</button>
                                
                                <div id="collapseNew" class="collapse">
                                    <div class="address_box">
                                        Address 1
                                        <div class="add_box_1">
                                            <div class="col-lg-5">
                                                <p>Name</p>
                                                <p>Contact No</p>
                                                <p>Email</p>
                                                <input type="text" name="is_default"> true
                                            </div>
                                            <div class="col-lg-5">
                                                <p>Address 1</p>
                                                <p>Address 2</p>
                                                <p>
                                                    <span>Country</span>
                                                    <span>State</span>
                                                    <span>City</span>
                                                </p>
                                                <p>Postal Code</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="selects">
                                                    <input type="radio" name="address_select" class="sel">
                                                </div>                                                
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="address_box">
                                        Address 1
                                        <div class="add_box_1">
                                            <div class="col-lg-5">
                                                <p>Name</p>
                                                <p>Contact No</p>
                                                <p>Email</p>
                                                <input type="text" name="is_default"> true
                                            </div>
                                            <div class="col-lg-5">
                                                <p>Address 1</p>
                                                <p>Address 2</p>
                                                <p>
                                                    <span>Country</span>
                                                    <span>State</span>
                                                    <span>City</span>
                                                </p>
                                                <p>Postal Code</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="selects">
                                                    <input type="radio" name="address_select" class="sel">
                                                </div>                                                
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .selects{
                                height: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }
                            .selects .sel{
                                width: 40px;
                                height: 40px;
                            }
                            .address_box{
                                /* background: antiquewhite; */
                                /* padding: 5px 15px; */
                                border-radius: 10px;
                                margin-bottom: 15px;
                            }
                            .add_box_1{
                                display: flex;
                                justify-content: space-between;
                                padding: 15px 0px;
                                background: #f4f4f4;
                                border-radius: 10px;
                            }
                        </style>
                        <form action="#" id="checkout-form">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mt-0">
                                    <input type="checkbox" class="custom-control-input" id="different-shipping">
                                    <label class="custom-control-label" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour" for="different-shipping" aria-expanded="true">
                                        Ship to a Add address?
                                    </label>
                                </div>
                            </div>

                            <div id="collapseFour" class="collapse" style="">
                                <div class="shipping-info">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name<abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Contact No <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Address 2 (optional)</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="select-custom">
                                        <label>Country / Region <span class="required">*</span></label>
                                        <select name="orderby" class="form-control">
                                            <option value="" selected="selected">India</option>
                                            <option value="1">Australia</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-1 pb-2">
                                        <label>Address 1<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" placeholder="House number and street name" required="">
                                    </div>

                                    

                                    <div class="form-group">
                                        <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" required="">
                                    </div>

                                    <div class="select-custom">
                                        <label>State / County <abbr class="required" title="required">*</abbr></label>
                                        <select name="orderby" class="form-control">
                                            <option value="" selected="selected">Mumbai</option>
                                            <option value="1">Delhi</option>
                                            <option value="2">West Bengal</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pincode <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="order-comments">Order notes (optional)</label>
                                <textarea class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." required></textarea>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End .col-lg-8 -->

            <div class="col-lg-5">
                <div class="order-summary">
                    <h3>YOUR ORDER</h3>

                    <table class="table table-mini-cart">
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-col">
                                    <h3 class="product-title">
                                        Haneri AirElite AEW1 ×
                                        <span class="product-qty">4</span>
                                    </h3>
                                </td>

                                <td class="price-col">
                                    <span>₹ 1,040.00</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="product-col">
                                    <h3 class="product-title">
                                        Haneri AirElite AEW1 ×
                                        <span class="product-qty">2</span>
                                    </h3>
                                </td>

                                <td class="price-col">
                                    <span>₹ 418.00</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="cart-subtotal">
                                <td>
                                    <h4>Subtotal</h4>
                                </td>

                                <td class="price-col">
                                    <span>₹ 1,458.00</span>
                                </td>
                            </tr>
                            <tr class="order-shipping">
                                <td class="text-left" colspan="2">
                                    <h4 class="m-b-sm">Shipping</h4>

                                    <div class="form-group form-group-custom-control">
                                        <div class="custom-control custom-radio d-flex">
                                            <input type="radio" class="custom-control-input" name="radio" checked />
                                            <label class="custom-control-label">Free Shipping</label>
                                        </div>
                                        <!-- End .custom-checkbox -->
                                    </div>
                                </td>

                            </tr>

                            <tr class="order-total">
                                <td>
                                    <h4>Total</h4>
                                </td>
                                <td>
                                    <b class="total-price"><span>₹ 1,603.80</span></b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="payment-methods">
                        <h4 class="mb-3">Payment Methods</h4>
                        
                        <div class="payment-option border rounded p-3 d-flex align-items-center justify-content-between">
                            <!-- Payment Method Name -->
                            <span class="fw-bold fs-6">
                                Razorpay
                            </span>
                            
                            <!-- Payment Method Icon -->
                            <span class="rounded-circle d-inline-block ms-3 overflow-hidden" style="width: 80px; height: 40px;">
                                <img src="assets/images/payments/razorpay.png" 
                                    class="w-100 h-100 object-fit-cover" 
                                    alt="Razorpay" />
                            </span>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                        Place order
                    </button>
                </div>
                <!-- End .cart-summary -->
            </div>
            <!-- End .col-lg-4 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->
</main>
<!-- End .main -->


<link rel="stylesheet" href="assets/css/style.min.css">
<?php include("footer.php"); ?>

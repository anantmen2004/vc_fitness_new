<?php
  $total = $this->cart->total();
?>

<div id="main"> 
  <!-- main-content starts here -->
  <div id="main-content">
    <section id="primary" class="content-full-width">
      <div class="dt-sc-hr-invisible-small"></div>
      <div class="dt-sc-hr-invisible-normal"></div>
      
      <!-- Pricintable type3 starts here -->
      <div class="fullwidth-section">
        <div class="container">
          <h3 class="border-title"> <span> Checkout</span> </h3>
          <form id="confirmOrder">
          <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordian" href="<?php echo ($customer_id)?"":"#mens" ?>"> <span class="badge pull-right"><i class="fa fa-plus"></i></span> Setp 1: Checkout Options </a> </h4>
              </div>
              <div class="panel-collapse collapse <?php echo ($customer_id)?"":"in" ?>" id="mens" aria-expanded="true">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <h2>New Customer</h2>
                      <p>Checkout Options:</p>
                      <div class="radio">
                        <label>
                          <input type="radio" name="account" value="register" checked="checked">
                          Register Account</label>
                      </div>
                      <!-- <div class="radio">
                        <label>
                          <input type="radio" name="account" value="guest">
                          Guest Checkout</label>
                      </div> -->
                      <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                      <a href="<?php echo base_url('Auth/rgisterView');?>"><input type="button" value="Continue" id="button-account" data-loading-text="Loading..." class="btn btn-primary pull-left"></a>
                    </div>
                    <form id="loginForm">
                    <div class="col-sm-6">

                      <h2>Returning Customer</h2>
                      <p>I am a returning customer</p>
                      <div class="col-sm-12 col-sm-offset-0 alert_msg"></div>
                      <br/>
                      <div class="form-group">
                        <label class="control-label" for="input-email">E-Mail</label>
                        <input type="text" name="email" value="" placeholder="E-Mail" id="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="input-password">Password</label>
                        <input type="password" name="password" value="" placeholder="Password" id="password" class="form-control">
                        <a href="<?php echo base_url('auth/forgotPassView') ?>">Forgotten Password ?</a></div>
                      <input type="button" value="Login" onclick="loginAction('redirectToCheckOut')" id="button-login" data-loading-text="Loading..." class="btn btn-primary pull-left">
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordian" href="#two"> <span class="badge pull-right"><i class="fa fa-plus"></i></span> Step 2: Account & Billing Details </a> </h4>
              </div>
              <!-- <?php echo (!empty($accIn)?"in":""); ?> after login from chekout-->
              <div id="two" class="panel-collapse collapse <?php echo ($customer_id)?"in":"" ?>">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <fieldset id="account">
                        <legend>Your Personal Details</legend>
                        <!-- <div class="form-group" style="display: none;">
                          <label class="control-label">Customer Group</label>
                          <div class="radio">
                            <label>
                              <input type="radio" name="customer_group_id" value="1" checked="checked">
                              Default</label>
                          </div>
                        </div> -->
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-firstname">First Name</label>
                          <input type="text" name="firstname" placeholder="First Name" id="input-payment-firstname" value="<?php echo (empty($userExist)?"":$userExist[0]['firstname']);?>" class="form-control">
                        </div>
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-lastname">Last Name</label>
                          <input type="text" name="lastname" value="<?php echo (empty($userExist)?"":$userExist[0]['lastname']); ?>" placeholder="Last Name" id="input-payment-lastname" class="form-control">
                        </div>
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-email">E-Mail</label>
                          <input type="text" value="<?php echo (empty($userExist)?"":$userExist[0]['email']); ?>" placeholder="E-Mail" id="input-payment-email" class="form-control">
                        </div>
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-telephone">Mobile No</label>
                          <input type="text" onkeyup="javascript:return check_isnumeric(event,this,1,11);" name="telephone" value="<?php echo (empty($userExist)?"":$userExist[0]['telephone']);?>" placeholder="Mobile No" id="input-payment-telephone" class="form-control">
                        </div>
                        <div class="form-group" style="display:none;">
                          <label class="control-label" for="input-payment-fax">Fax</label>
                          <input type="text" name="fax" value="<?php echo (empty($userExist)?"":$userExist[0]['fax']);?>" placeholder="Fax" id="input-payment-fax" class="form-control">
                        </div>
                      </fieldset>
                      <!-- <fieldset>
                        <legend>Your Password</legend>
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-password">Password</label>
                          <input type="password" name="password" value="" placeholder="Password" id="input-payment-password" class="form-control">
                        </div>
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-confirm">Password Confirm</label>
                          <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-payment-confirm" class="form-control">
                        </div>
                      </fieldset> -->
                    </div>
                    <div class="col-sm-6">
                      <fieldset id="address">
                        <legend>Your Address</legend>
                        <div class="form-group">
                          <label class="control-label" for="input-payment-company">Building / Apt/ Company</label>
                          <input type="text" name="address_1" value="<?php echo (empty($userExist)?"":$userExist[0]['address_1']);?>" placeholder="Building / Apt/ Company" id="input-payment-company" class="form-control">
                        </div>
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-address-1">Wing / Floor / Plot No</label>
                          <input type="text" name="address_2" value="<?php echo (empty($userExist)?"":$userExist[0]['address_2']);?>" placeholder="Wing / Floor / Plot No" id="input-payment-address-1" class="form-control">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="input-payment-address-2">Landmark</label>
                          <input type="text" name="Landmark" value="" placeholder="Landmark" id="input-payment-address-2" class="form-control">
                        </div>
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-city">City</label>
                          <input type="text" name="city" value="<?php echo (empty($userExist)?"":$userExist[0]['city']);?>" placeholder="City" id="input-payment-city" class="form-control">
                        </div>
                        <div class="form-group required">
                          <label class="control-label" for="input-payment-postcode">Pincode</label>
                          <input type="text" onkeyup="javascript:return check_isnumeric(event,this,1,6);" name="pincode" value="<?php echo (empty($userExist)?"":$userExist[0]['postcode']);?>" placeholder="Pincode" id="input-payment-postcode" class="form-control">
                        </div>
                        <div class="form-group required" style="display:none;">
                          <label class="control-label" for="input-payment-country">Country</label>
                          <select name="country_id" id="input-payment-country" class="form-control">
                            <option value=""> --- Please Select --- </option>
                            <option value="244">Aaland Islands</option>
                            <option value="1">Afghanistan</option>
                            <option value="2">Albania</option>
                            <option value="238">Zambia</option>
                            <option value="239">Zimbabwe</option>
                          </select>
                        </div>
                        <div class="form-group required" style="display:none;">
                          <label class="control-label" for="input-payment-zone">Region / State</label>
                          <select name="zone_id" id="input-payment-zone" class="form-control">
                            <option value=""> --- Please Select --- </option>
                            <option value="1475">Andaman and Nicobar Islands</option>
                            <option value="1476">Andhra Pradesh</option>
                            <option value="1477">Arunachal Pradesh</option>
                            <option value="1478">Assam</option>
                          </select>
                        </div>
                      </fieldset>
                      <!-- <fieldset id="otp_div" style="display:none;">
                        <legend>Verify Mobile number</legend>
                        <div class="form-group">
                          <input type="button" value="Generate OTP" name="Generate OTP" id="generate_otp" class="btn btn-primary">
                          <button type="button" data-toggle="tooltip" id="resend_otp" data-id="0" style="display:none;" title="" class="btn btn-primary" data-original-title="Resend OTP"><i class="fa fa-refresh"></i></button>
                          <input type="button" value="Validate OTP" style="display:none;" name="Validate Otp" id="validate_otp" class="btn btn-primary">
                          <div class="col-sm-4" id="otp-text" styel="display:none;">
                            <input type="text" styel="display:none;" name="otp" value="" placeholder="Enter OTP here" id="input-otp" class="form-control">
                          </div>
                        </div>
                      </fieldset>
                      <fieldset id="otp_message" style="display:none;">
                        <div class="col-sm-10" id="otp-text" styel="display:none;">
                          <legend id="otp_msg"></legend>
                        </div>
                        <input type="hidden" name="otp_status" value="" id="otp_status">
                      </fieldset> -->
                    </div>
                  </div>
                  
                  <div class="row">
                   <div class="container">
                     <div class="col-md-12">
                   <div class="col-md-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="shipping_address" id="shipping_address" value="1" checked="checked">
                      My delivery and billing addresses are the same.</label>
                  </div>
                  
                  </div>
                   <div class="col-md-8">
                  <div class="buttons">
                    <div class="pull-right">I have read and agree to the <a href="#" class="agree"><b>Terms &amp; Conditions</b></a> &nbsp;
                      <input type="checkbox" name="termsConditions" id="termsConditions"  />

                      &nbsp;<input type="button" value="Continue" id="confirmAddress" data-loading-text="Loading..." class="btn btn-primary" onclick="confirmCustAddress()">
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
                   </div>
                  
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordian" href="#three"> <span class="badge pull-right"><i class="fa fa-plus"></i></span> Step 3: Delivery Method </a> </h4>
              </div>
              <div id="three1" class="panel-collapse collapse ">
                <div class="panel-body">
                  <p>Please select the preferred shipping method to use on this order.</p>
                  <p><strong>Flat Rate</strong></p>
                  <div class="radio">
                    <label>
                      <input type="radio" name="shipping_method" value="flat.flat" checked="checked">
                      Flat Shipping Rate - Rs.00.00/-</label>
                    <br>
                    <br>
                    <div class="col-md-6"><i class="fa fa-calendar"></i> &nbsp;Delivery Slot 
                     <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                    </div>
                    <div class="col-md-6">
                    <select id="batch" name="batch">
                      <option value="1">11AM-2PM</option>
                      <option value="2">6PM-9PM</option>
                    </select>
                     </div>
                    </div>
                  <b>
                   <br>
                    <br>
                   
                   <div class="buttons">
                    <div class="pull-left"> <span class="fa fa-calendar"></span> <span id="batch_date">01/07/2017</span> <span id="batch_time">11AM-2PM</span> </div>
                    <div class="pull-right">
                      <input type="button" value="Continue" id="button-shipping-method" data-loading-text="Loading..." class="btn btn-primary" onclick="confirmDeliveryMethod()">
                    </div>
                  </div>
                  </b></div>

              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordian" href="#four"> <span class="badge pull-right"><i class="fa fa-plus"></i></span> Step 4: Payment Method </a> </h4>
              </div>
              <div id="four1" class="panel-collapse collapse">
                <div class="panel-body">
                  <p>Please select the preferred payment method to use on this order.</p>
                  <div class="radio">
                    <label>
                      <input type="radio" name="payment_method" value="cod" checked="checked">
                      Cash On Delivery </label>
                  </div>
                  <p><strong>Add Comments About Your Order</strong></p>
                  <p>
                    <textarea name="comment" rows="8" class="form-control"></textarea>
                  </p>
                  <div class="buttons">
                    <div class="pull-right">I have read and agree to the <a href="#" class="agree"><b>Terms Conditions</b></a>
                      <input type="checkbox" name="payTermsConditions" id="payTermsConditions" value="1" checked="checked">

                      &nbsp;
                      <input type="button" value="Continue" id="button-payment-method" data-loading-text="Loading..." class="btn btn-primary" onclick="confirmPaymentMethod()">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordian" href="#five"> <span class="badge pull-right"><i class="fa fa-plus"></i></span> Step 5: Confirm Order </a> </h4>
              </div>
              <div id="five1" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <td class="text-left">Product Name</td>
                          <td class="text-left">Model</td>
                          <td class="text-right">Quantity</td>
                          <td class="text-right">Unit Price</td>
                          <td class="text-right">Total</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            foreach ($this->cart->contents() as $items):
                              $name = $items['name'];
                              $name = str_replace("comma",",","$name");
                              $name = str_replace("leftRound","( ","$name"); 
                              $name = str_replace("rightRound"," )","$name");
                        ?>
                        <tr>
                          <td class="text-left"><a href="http://localhost/vc_fitness.git/index.php?route=product/product&amp;product_id=1458"><?php echo $name;?></a></td>
                          <td class="text-left"></td>
                          <td class="text-right"><?php echo $items['qty'] ?></td>
                          <td class="text-right"><?php echo $items['price'];?></td>
                          <td class="text-right"><?php echo $items['subtotal'];?></td>
                        </tr>
                        <?php 
                          endforeach; 
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="4" class="text-right"><strong>Sub-Total:</strong></td>
                          <td class="text-right"><?php echo $total;?></td>
                        </tr>
                        <tr>
                          <td colspan="4" class="text-right"><strong>Flat Shipping Rate:</strong></td>
                          <td class="text-right">Rs.00.00/-</td>
                        </tr>
                        <tr>
                          <td colspan="4" class="text-right"><strong>Total:</strong></td>
                          <td class="text-right"><?php echo $total;?></td>
                          <input type="hidden" name="total" value="<?php echo $total;?>">
                        </tr>
                        <tr>
                          <!-- <td class="text-left"><b>Shipping Batch : <i>11AM-2PM</i></b></td> -->
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="buttons">
                    <div class="pull-right">
                      <input type="button" value="Confirm Order" id="button-confirm" class="btn btn-primary" data-loading-text="Loading..." onclick="confirmOrder()">
                    </div>
                  </div>
                    
                </div>
              </div>
            </div>
          </div>
          </form>

        </div>
      </div>
      
      <!-- support starts here -->
      <div class="dt-sc-hr-invisible-large"></div>
    </section>
  </div>
  <!-- main-content ends here --> 
</div>
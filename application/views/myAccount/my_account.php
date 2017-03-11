<div id="main">
  <!-- main-content starts here -->
  <div id="main-content">
   <section id="primary" class="content-full-width">
      <div class="dt-sc-hr-invisible"></div>
        <div class="fullwidth-section dt-sc-paralax full-pattern3">
          <div class="container">
              <h3 class="border-title"> <span>Welcome XYZ </span> </h3>
           	<div class="intro-text type2 animate" data-animation="fadeInUp" data-delay="100">
              	<div class="dt-sc-one first">
	                                	  <!--Horizontal Tab-->
        <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
                <li>My Account Information</li>
                <li>My Orders</li>
                <!-- <li>Horizontal 3</li> -->
            </ul>
            <div class="resp-tabs-container hor_1">
                <div>
                    <p>
                        <!--vertical Tabs-->

                        <div id="ChildVerticalTab_1">
                            <ul class="resp-tabs-list ver_1">
                                <li>Edit your account information</li>                                
                                <li>Modify your address book entries</li>
                                <li>Change your password</li>
                                <li>Modify your wish list</li>
                            </ul>
                            <div class="resp-tabs-container ver_1">
                                <div>
                                     <h4>Your Personal Details</h4>
                                      <form id="updateBasicInfo" role="form" enctype="multipart/form-data" class="form-horizontal">
                                      <fieldset>
                                      <div class="col-sm-6 col-sm-offset-0 updateBasicInfo"></div>
                                      <div class="form-group required">
                                        <input type="hidden" name="customer_id" value="<?php echo empty($userData)?"":$userData[0]['customer_id']?>" placeholder="First Name" id="input-firstname1" class="form-control">
                                          <input type="text" name="firstname" value="<?php echo empty($userData)?"":$userData[0]['fname']?>" placeholder="First Name" id="input-firstname1" class="form-control">
                                       </div>
                                        <div class="form-group required">
                                       <input type="text" name="lastname" value="<?php echo empty($userData)?"":$userData[0]['lname']?>" placeholder="Last Name" id="input-lastname1" class="form-control">
                                        </div>
                                        <div class="form-group required">
               <input type="email" value="<?php echo empty($userData)?"":$userData[0]['email']?>" placeholder="E-Mail" id="input-email" class="form-control" readonly>
           </div>

            <div class="form-group required">
           <input type="tel"  value="<?php echo empty($userData)?"":$userData[0]['telephone']?>" placeholder="Telephone" id="input-telephone" class="form-control" readonly>
           </div>
           <div class="form-group required">
           <input type="tel" name="telephone2" value="<?php echo empty($userData)?"":$userData[0]['telephone2']?>" placeholder="Telephone" id="input-telephone" class="form-control">
           </div>

           <div class="form-group required">
           <input type="text" name="fax" value="<?php echo empty($userData)?"":$userData[0]['fax']?>" placeholder="Fax" id="input-fax" class="form-control">
           </div>
              </fieldset>
        <button class="dt-sc-button small" type="submit" onclick="updateBasicInfo()">Submit</button>
                  <!-- <a href="about.html" class="dt-sc-button small pull-right" data-hover="Read More">Continue</a> -->
    </form>
</div>
                                
                                <div>
                                    <h4>Address Book Entries</h4>
                                    <form id="updateAddressinfo" enctype="multipart/form-data" class="form-horizontal">
                                      <fieldset>
                                      <div class="col-sm-6 col-sm-offset-0 updateAddressinfo"></div>
                                      <div class="form-group required">
                                        <input type="hidden" name="address_id" value="<?php echo empty($userData)?"":$userData[0]['address_id']?>" placeholder="First Name" id="input-firstname" class="form-control">
                                          <input type="text" name="firstname" value="<?php echo empty($userData)?"":$userData[0]['firstname']?>" placeholder="First Name" id="input-firstname" class="form-control">
                                       </div>
                                        <div class="form-group required">
                                       <input type="text" name="lastname" value="<?php echo empty($userData)?"":$userData[0]['lastname']?>" placeholder="Last Name" id="input-lastname" class="form-control">
                                        </div>
                                         <div class="form-group">
                                       <input type="text" name="company" value="<?php echo empty($userData)?"":$userData[0]['company']?>" placeholder="Company" id="input-company" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                       <input type="text" name="address_1" value="<?php echo empty($userData)?"":$userData[0]['address_1']?>" placeholder="Address 1" id="input-address-1" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                       <input type="text" name="address_2" value="<?php echo empty($userData)?"":$userData[0]['address_2']?>" placeholder="Address 2" id="input-address-2" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                       <input type="text" name="city" value="<?php echo empty($userData)?"":$userData[0]['city']?>" placeholder="City" id="input-city" class="form-control">
                                        </div>
                                        <div class="form-group">
                                        <input type="text" name="postcode" value="<?php echo empty($userData)?"":$userData[0]['postcode']?>" placeholder="Post Code" id="input-postcode" class="form-control">
                                        </div>

                                        <div class="form-group required">
                                            <select name="country_id" id="input-country" class="">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="99" selected="selected">India</option>
                                            </select> 
                                        </div>

                                        <div class="form-group">
                                       <select name="zone_id" id="input-zone" class=""><option value=""> --- Please Select --- </option><option value="1475">Andaman and Nicobar Islands</option><option value="1476">Andhra Pradesh</option><option value="1477">Arunachal Pradesh</option><option value="1478">Assam</option><option value="1479">Bihar</option><option value="1480">Chandigarh</option><option value="1481">Dadra and Nagar Haveli</option><option value="1482">Daman and Diu</option><option value="1483">Delhi</option><option value="1484">Goa</option><option value="1485">Gujarat</option><option value="1486">Haryana</option><option value="1487">Himachal Pradesh</option><option value="1488">Jammu and Kashmir</option><option value="1489">Karnataka</option><option value="1490">Kerala</option><option value="1491">Lakshadweep Islands</option><option value="1492">Madhya Pradesh</option><option value="1493" selected="selected">Maharashtra</option><option value="1494">Manipur</option><option value="1495">Meghalaya</option><option value="1496">Mizoram</option><option value="1497">Nagaland</option><option value="1498">Orissa</option><option value="1499">Pondicherry</option><option value="1500">Punjab</option><option value="1501">Rajasthan</option><option value="1502">Sikkim</option><option value="1503">Tamil Nadu</option><option value="1504">Tripura</option><option value="1505">Uttar Pradesh</option><option value="1506">West Bengal</option></select>
                                        </div>
              </fieldset>

                  <a onclick="updateAddressinfo()" class="dt-sc-button small pull-right" data-hover="Read More">Update</a>
                                      </form>
 

                                 </div>




<!--********************* Change Password******************-->
<div>
<h4>Your Password</h4>
 <form id="resetPassForm" enctype="multipart/form-data" class="form-horizontal">
<fieldset>
<div class="col-sm-6 col-sm-offset-0 updatePassword"></div>
<div class="form-group required">
<input type="hidden" name="customer_id" value="<?php echo empty($userData)?"":$userData[0]['customer_id']?>" placeholder="Password" id="customer_id" class="form-control">
<input type="password" name="password" value="" placeholder="Password" id="password" class="form-control">
</div>
<div class="form-group required">
<input type="password" name="repassword" value="" placeholder="Password Confirm" id="repassword" class="form-control">
</div>
</fieldset>
<a onclick="updatePassword()" class="dt-sc-button small pull-right" data-hover="Read More">Update</a>
</form>
</div>
<!--***************************************-->












                                <div>
                                    <h4>My Wish List</h4>
                                    <p> 
                                        <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-center">Image</td>
            <td class="text-left">Product Name</td>
            <td class="text-left">Model</td>
            <!-- <td class="text-right">Stock</td> -->
            <td class="text-right">Unit Price</td>
            <td class="text-right">Action</td>
          </tr>
        </thead>
        <tbody>
        <?php 
        if($wishlist):
            foreach ($wishlist as $key => $items):
              //echo"<pre>";print_r($items);
        ?>
                    <tr>
            <td class="text-center"><a href="#"><img src="<?php echo base_url()."public/images/".$items[0]['image'];?>" alt=" " title=" "></a>
              </td>
            <td class="text-left"><a href="#S"><?php echo $items[0]['name']; ?></a></td>
            <td class="text-left"><?php echo $items[0]['model']; ?></td>
            <!-- <td class="text-right">2-3 Days</td> -->
            <td class="text-right">              <div class="price">
                                Rs.<?php echo round($items[0]['price']); ?>/-                              </div>
              </td>
            <td><button type="button" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add to Cart" onclick="addToCart('<?php echo $items[0]['product_id'];?>','<?php echo $items[0]['price'];?>','<?php echo $items[0]['name'];?>','<?php echo $items[0]['image'];?>','<?php echo $items[0]['meta_title'];?>','<?php echo "delWish" ?>')" id="row1_<?php echo $items[0]['product_id'];?>"><i class="fa fa-shopping-cart"></i></button>

              <button  data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove" id="row_<?php echo $items[0]['product_id'];?>"><a onclick="removeWishlistItem('<?php echo $items[0]['product_id'];?>')"><i class="fa fa-times"></i></a></button>

              </td>
          </tr>
                    
          <?php 
              endforeach; 
              else:
          ?>
              <tr><td colspan="6" style="text-align: center;"><h3>Your Wishlist is Empty</h3></td><tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <a href="about.html" class="dt-sc-button small pull-right" data-hover="Read More">Continue</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </p>
                 </div>
                <div>
                     <p>
                        <!--vertical Tabs-->

                        <div id="ChildVerticalTab_2">
                            <ul class="resp-tabs-list ver_2">
                                <li>View your order history</li>
                                <!-- <li>Your Reward Points</li>
                                <li>View your return requests</li>
                                <li>Your E-Wallet</li> -->
                            </ul>
                            <div class="resp-tabs-container ver_2">
                                <div>
                                    <h4>Order History</h4>
                                    <p>
                                    <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-center">Order ID</td>
              <td class="text-center">Order Status</td>
              <td class="text-center">Date Added</td>
              <!-- <td class="text-center">Shipping Time</td> -->
              <!-- <td class="text-center">No. of Products</td> -->
              <td class="text-center">Customer</td>
              <td class="text-center">Total</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($myOrders as $key => $value):

          ?>
            <tr>
              <td class="text-center"><?php echo $value['order_id'];?></td>
              <td class="text-center"><?php echo $value['status'];?></td>
              <td class="text-center"><?php echo date("d-m-Y",strtotime($value['date_added']));?></td>
              <!-- <td class="text-center">11AM-2PM</td> -->
              <!-- <td class="text-center"><?php echo $value['quantity'];?></td> -->
              <td class="text-center"><?php echo $value['firstname'];?>&nbsp;<?php echo $value['lastname'];?></td>
              <td class="text-center">Rs.<?php echo round($value['total']);?>/-</td>
              <td class="text-center"><a href="<?php echo base_url().'my_account/myOrders/'.$value['order_id']; ?>" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="View"><i class="fa fa-eye"></i></a></td>
            </tr>
        <?php endforeach;?>


                      </tbody>
        </table>
                                    </p>
                                  <a href="about.html" class="dt-sc-button small pull-right" data-hover="Read More">Continue</a>
                                </div>
                                <!-- <div>
                                    <h4>Your Reward Points</h4>
                                    <p>Your total number of reward points is: <b>0</b>.</p>
                                    <p><div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-left">Date Added</td>
              <td class="text-left">Description</td>
              <td class="text-right">Points</td>
            </tr>
          </thead>
          <tbody>
                        <tr>
              <td class="text-center" colspan="3">You do not have any reward points!</td>
            </tr>
                      </tbody>
        </table>
      </div></p>
      <a href="about.html" class="dt-sc-button small pull-right" data-hover="Read More">Continue</a>
                                </div> -->
                                <!-- <div>
                                    <h4>Product Returns</h4>
                                    <p>
                                      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-right">Return ID</td>
            <td class="text-left">Status</td>
            <td class="text-left">Date Added</td>
            <td class="text-right">Order ID</td>
            <td class="text-left">Customer</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
                    <tr>
            <td class="text-right">#8</td>
            <td class="text-left">Awaiting Products</td>
            <td class="text-left">01/03/2017</td>
            <td class="text-right">101</td>
            <td class="text-left">Rahul Kumbhare</td>
            <td><a href="return-information.html" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="View"><i class="fa fa-eye"></i></a></td>
          </tr>
                    <tr>
            <td class="text-right">#7</td>
            <td class="text-left">Awaiting Products</td>
            <td class="text-left">01/03/2017</td>
            <td class="text-right">101</td>
            <td class="text-left">Rahul Kumbhare</td>
            <td><a href="return-information.html" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="View"><i class="fa fa-eye"></i></a></td>
          </tr>
                  </tbody>
      </table>
      <a href="my-account.html" class="dt-sc-button small pull-right" data-hover="Read More">Continue</a>
                                    </p>
                                </div> -->
                                <!-- <div>
                                    <h4>Your E-Wallet</h4>
                                    <p>Your current balance is: <b>Rs.0.00/-</b>.</p>
                                    <p>
                                    <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-left">Date Added</td>
              <td class="text-left">Description</td>
              <td class="text-right">Amount (INR)</td>
            </tr>
          </thead>
          <tbody>
                        <tr>
              <td class="text-center" colspan="5">You do not have any transactions!</td>
            </tr>
                      </tbody>
        </table>
      </div>
      <a href="about.html" class="dt-sc-button small pull-right" data-hover="Read More">Continue</a>
                                    </p>
                                </div> -->
                            </div>
                        </div>
                    </p>
                 </div>
                <!--  <div>
                     <p>
                       

                        <div id="ChildVerticalTab_3">
                            <ul class="resp-tabs-list ver_3">
                                <li>Responsive Tab 1</li>
                                <li>Responsive Tab 2</li>
                                <li>Responsive Tab 3</li>
                                <li>Long name Responsive Tab 4</li>
                            </ul>
                            <div class="resp-tabs-container ver_3">
                                <div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
                                </div>
                                <div>
                                    <p>Lorem ipsum dolor sit amet, lerisque commodo. Nam porta cursus lectusconsectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales sce. Proin nunc erat, gravida a facilisis quis, ornare id lectus</p>
                                </div>
                                <div>
                                    <p>Suspendisse blandit velit Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravid urna gravid eget erat suscipit in malesuada odio venenatis.</p>
                                </div>
                                <div>
                                    <p>d ut ornare non, volutpat vel tortor. InLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.t in malesuada odio venenatis.</p>
                                </div>
                            </div>
                        </div>
                    </p>
                    <p>Tab 2 Container</p>
                </div>
                <div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.
                    <br>
                    <br>
                    <p>Tab 3 Container</p>
                </div> -->
            </div>
        </div>
                                    </div>
                                    
                                </div>
                            </div>
						</div>
                           
                        <!-- welcome-txt ends here -->
                        <div class="dt-sc-hr-invisible-small"></div>
                     </section>
				</div>
                <!-- main-content ends here -->
                
            </div>
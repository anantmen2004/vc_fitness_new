
            
            <div id="main">
                <!-- main-content starts here -->
                <div id="main-content">
                     <section id="primary" class="content-full-width">
                        <div class="dt-sc-hr-invisible"></div>
                          <div class="fullwidth-section dt-sc-paralax full-pattern3">
                            <div class="container">
                                <h3 class="border-title"> <span>Order Information </span> </h3>
                              <div class="intro-text type2 animate" data-animation="fadeInUp" data-delay="100">
                                  <div class="dt-sc-one first">
                                  <!-- order-detail -->
                                       <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" colspan="2">Order Details</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left" style="width: 50%;">              <b>Order ID:</b> #<?php echo empty($myOrders)?"":$myOrders[0]['order_id']; ?><br>
              <b>Date Added:</b> <?php echo date("d-m-Y",strtotime($myOrders[0]['date_added']));?></td>
            <td class="text-left">              <b>Payment Method:</b> <?php echo empty($myOrders[0]['payment_method'])?"":$myOrders[0]['payment_method'];?><br>
                                          <b>Shipping Method:</b> <?php echo empty($myOrders[0]['shipping_method'])?"":$myOrders[0]['shipping_method'];?><br> <b>Shipping Rate:</b>                      <br>
                                          <?php
                                          $batch = " ";
                                            if(!empty($myOrders[0]['batch_id']) && $myOrders[0]['batch_id'] == 1){
                                              $batch = "11AM-2PM ";
                                            }
                                            else if(!empty($myOrders[0]['batch_id']) && $myOrders[0]['batch_id'] == 2)
                                            {
                                              $batch = "2PM-7pm ";
                                            }
                                          ?>
                      <b>Shipping Time : </b> <?php echo $batch; ?>                   </td>
          </tr>
        </tbody>
      </table>
      <!-- order-detail end -->
      <!-- payment-address -->
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" style="width: 50%;">Payment Address</td>
                        <td class="text-left">Shipping Address</td>
                      </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left"><?php echo empty($myOrders[0]['firstname'])?"":$myOrders[0]['firstname'];?>&nbsp;<?php echo empty($myOrders[0]['lastname'])?"":$myOrders[0]['lastname']?><br><?php echo empty($myOrders[0]['payment_address_1'])?"":$myOrders[0]['payment_address_1'];?><br><?php echo empty($myOrders[0]['payment_address_2'])?"":$myOrders[0]['payment_address_2'];?><br><?php echo empty($myOrders[0]['payment_city'])?"":$myOrders[0]['payment_city'];?><br><?php echo empty($myOrders[0]['payment_postcode'])?"":$myOrders[0]['payment_postcode'];?></td>
                        <td class="text-left"><?php echo empty($myOrders[0]['firstname'])?"":$myOrders[0]['firstname'];?>&nbsp;<?php echo empty($myOrders[0]['lastname'])?"":$myOrders[0]['lastname']?><br><?php echo empty($myOrders[0]['shipping_address_1'])?"":$myOrders[0]['shipping_address_1'];?><br><?php echo empty($myOrders[0]['shipping_address_2'])?"":$myOrders[0]['shipping_address_2'];?><br><?php echo empty($myOrders[0]['shipping_city'])?"":$myOrders[0]['shipping_city'];?><br><?php echo empty($myOrders[0]['shipping_postcode'])?"":$myOrders[0]['shipping_postcode'];?></td>
                      </tr>
        </tbody>
      </table>
       <!-- payment-address-end -->
       <!-- total -->
       <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-left">Product Name</td>
              <td class="text-left">Model</td>
              <td class="text-right">Quantity</td>
              <td class="text-right">Price</td>
              <td class="text-right">Total</td>
                            <td style="width: 20px;"></td>
                          </tr>
          </thead>
          <tbody>


          <?php foreach ($myOrders as $key => $value):

          ?>
                        <tr>
              <td class="text-left"><?php echo $value['name'];?>                                <br>
                &nbsp;<small> <?php echo $value['model'];?></small>
                </td>
              <td class="text-left"><?php echo $value['model'];?></td>
              <td class="text-right"><?php echo $value['quantity'];?></td>
              <td class="text-right">Rs.<?php echo round($value['price']);?>/-</td>
              <td class="text-right">Rs.<?php echo round($value['total']);?>/-</td>
              <td class="text-right" style="white-space: nowrap;">                <a onClick="addToCart('<?php echo $value['product_id'];?>','<?php echo $value['price'];?>','<?php echo $value['name'];?>','<?php echo $value['image'];?>','<?php echo $value['meta_title'];?>')" id="addToCart" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Reorder"><i class="fa fa-shopping-cart"></i></a>
                                <a href="<?php echo base_url().'my_account/order_return/'.$value['order_id'] ?>" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Return"><i class="fa fa-reply"></i></a></td>
            </tr>

          <?php endforeach; ?>
                                  </tbody>
          <tfoot>
                        <tr>
              <td colspan="3"></td>
              <td class="text-right"><b>Total</b></td>
              <td class="text-right">Rs.<?php echo round($value['order_total']);?>/-</td>
                            <td></td>
                          </tr>
                      </tfoot>
        </table>
      </div>
       <!-- total-end -->
       <!-- order-history 
       <h4>Order History</h4>
       <!-- <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left">Date Added</td>
            <td class="text-left">Order Status</td>
            <td class="text-left">Comment</td>
          </tr>
        </thead>
        <tbody>
                    <tr>
            <td class="text-left">01/03/2017</td>
            <td class="text-left">Pending</td>
            <td class="text-left"></td>
          </tr>
                  </tbody>
      </table>
       
         <div class="buttons clearfix">
          <div class="pull-left"><a href="my-account.html" class="dt-sc-button small">Back</a></div>
          <div class="pull-right">
           <a href="#" class="dt-sc-button small pull-right" data-hover="Read More">Submit</a>
          </div>
        </div> -->

        
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
            
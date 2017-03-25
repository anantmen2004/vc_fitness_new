         
            <div id="main">
                <!-- main-content starts here -->
                <div id="main-content">
                     <section id="primary" class="content-full-width">
                        <div class="dt-sc-hr-invisible"></div>
                          <div class="fullwidth-section dt-sc-paralax full-pattern3">
                            <div class="container">
                                <h3 class="border-title"> <span>Product Return </span> </h3>
                             	<div class="intro-text type2 animate" data-animation="fadeInUp" data-delay="100">
                                	<div class="dt-sc-one first">
                                  <p>Please complete the form below to request an RMA number.</p>
                                  <!-- Order Information -->
	                               <form id="order_return" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
          <h4>Order Information</h4>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="<?php echo empty($myOrders[0]['firstname'])?"":$myOrders[0]['firstname'];?>" placeholder="First Name" id="input-firstname" class="form-control">
              <input type="hidden" name="customer_id" value="<?php echo empty($myOrders[0]['customer_id'])?"":$myOrders[0]['customer_id'];?>" placeholder="First Name" id="input-customer_id" >
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="lastname" value="<?php echo empty($myOrders[0]['lastname'])?"":$myOrders[0]['lastname'];?>" placeholder="Last Name" id="input-lastname" class="form-control">
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
            <div class="col-sm-10">
              <input type="text" name="email" value="<?php echo empty($myOrders[0]['email'])?"":$myOrders[0]['email'];?>" placeholder="E-Mail" id="input-email" class="form-control">
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
            <div class="col-sm-10">
              <input type="text" name="telephone" value="<?php echo empty($myOrders[0]['telephone'])?"":$myOrders[0]['telephone'];?>" placeholder="Telephone" id="input-telephone" class="form-control">
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-order-id">Order ID</label>
            <div class="col-sm-10">
              <input type="text" name="order_id" value="<?php echo empty($myOrders[0]['order_id'])?"":$myOrders[0]['order_id'];?>" placeholder="Order ID" id="input-order-id" class="form-control">
              <input type="hidden" name="product_id" value="<?php echo empty($myOrders[0]['product_id'])?"":$myOrders[0]['product_id'];?>" placeholder="First Name" id="input-product_id" >
                          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-date-ordered">Order Date</label>
            <div class="col-sm-3">
              <div class="input-group date"><input type="text" name="date_ordered" value="<?php echo empty($myOrders[0]['date_added'])?"":date("d-m-Y",strtotime($myOrders[0]['date_added']))?>" placeholder="Order Date" data-date-format="YYYY-MM-DD" id="input-date-ordered" class="form-control"><span class="input-group-btn">
                <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                </span></div>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <h4>Product Information &amp; Reason for Return</h4>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-product">Product Name</label>
            <div class="col-sm-10">
              <input type="text" name="product" value="<?php echo empty($myOrders[0]['name'])?"":$myOrders[0]['name'];?>" placeholder="Product Name" id="input-product" class="form-control">
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-model">Product Code</label>
            <div class="col-sm-10">
              <input type="text" name="model" value="<?php echo empty($myOrders[0]['model'])?"":$myOrders[0]['model'];?>" placeholder="Product Code" id="input-model" class="form-control">
                          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
            <div class="col-sm-10">
              <input type="text" name="quantity" value="<?php echo empty($myOrders[0]['quantity'])?"":$myOrders[0]['quantity'];?>" placeholder="Quantity" id="input-quantity" class="form-control">
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label">Reason for Return</label>
            <div class="col-sm-10">
                                          <div class="radio">
                <label class="reason_id"> 
                  <input type="radio" name="return_reason_id" class="return_reason_id" value="1" required>
                  Dead On Arrival</label>
              </div>
                                                        <div class="radio" >
                <label class="reason_id">
                  <input type="radio" name="return_reason_id" class="return_reason_id" value="4" >
                  Faulty, please supply details</label>
              </div>
                                                        <div class="radio">
                <label class="reason_id">
                  <input type="radio" name="return_reason_id" class="return_reason_id" value="3" >
                  Order Error</label>
              </div>
                                                        <div class="radio">
                <label class="reason_id">
                  <input type="radio" name="return_reason_id" class="return_reason_id" value="5" >
                  Other, please supply details</label>
              </div>
                                                        <div class="radio">
                <label class="reason_id">
                  <input type="radio" name="return_reason_id" class="return_reason_id"  value="2" >
                  Received Wrong Item</label>
              </div>
                                                      </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label">Product is opened</label>
            <div class="col-sm-10">
              <label class="radio-inline">
                                <input type="radio" name="opened" value="1">
                                Yes</label>
              <label class="radio-inline">
                                <input type="radio" name="opened" value="0" checked="checked">
                                No</label>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-comment">Faulty or other details</label>
            <div class="col-sm-10">
              <textarea name="comment" rows="10" placeholder="Faulty or other details" id="input-comment" class="form-control"></textarea>
            </div>
          </div>
                  </fieldset>
                <div class="buttons clearfix">
          <div class="pull-left"><a href="my-account.html" class="dt-sc-button small">Back</a></div>
          <div class="pull-right">
           <a onclick="return_order()" class="dt-sc-button small pull-right" data-hover="Read More">Submit</a>
          </div>
        </div>
              </form>
                                  <!-- Order Information end -->

    
      

         
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
           
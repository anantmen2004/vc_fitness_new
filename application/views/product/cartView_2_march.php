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
             <h3 class="border-title"> <span> Shopping Cart</span> </h3>
                   
                 <form class="shopping-cart" action="#">
                <div>
                     <section>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    foreach ($this->cart->contents() as $items):
                                ?>
                                    <tr>
                                        <td class="product-in-table">
                                            <img class="img-responsive" src="<?php echo base_url()."public/images/".$items['image'];?>" alt="">
                                            <div class="product-it-in">
                                            <?php 
                                              $name = $items['name'];
                                              $name = str_replace("comma",",","$name");
                                              $name = str_replace("leftRound","( ","$name"); 
                                              $name = str_replace("rightRound"," )","$name");
                                            ?>
                                                <h3><?php echo $name; ?></h3>
                                                <span><?php echo empty($items['desc'])?"":$items['desc']; ?></span>
                                            </div>    
                                        </td>
                                        <td>&#x20B9;<?php echo $items['price'] ?></td>
                                        <td>                                            
                                          <div class="sp-quantity">
                                              <div class="sp-minus fff ddd" id="" onClick="subTotal('<?php echo $items['id'];?>','<?php echo $items['price'];?>','<?php echo $items['rowid'];?>','minus')">-</div>
                                              <div class="sp-input">
                                                  <input type="text" class="quntity-input" id="qty_<?php echo $items['id'];?>" value="<?php echo $items['qty'] ?>" readonly/>
                                              </div>
                                              <div class="sp-plus fff ddd" id="" onClick="subTotal('<?php echo $items['id'];?>','<?php echo $items['price'];?>','<?php echo $items['rowid'];?>','plus');">+</div>
                                          </div>
                                        </td>
                                        <td class="shop-red"><input type="text" class="totalAmt-input" id="subTotal_<?php echo $items['id'];?>" value="<?php echo $items['subtotal']; ?>" readonly/>
                                        </td>
                                        <td>
                                            <button type="button" class="close" id="row_<?php echo $items['id'];?>"><a onclick="removeCardItem('<?php echo $items['rowid'];?>','<?php echo $items['id'];?>')"><span>&times;</span><a><span class="sr-only">Close</span></button>
                                        </td>
                                    </tr>
                                  <?php 
                                    endforeach; 
                                  ?>
                                  </tbody>
                            </table>
                        </div>
                    </section>
                    <div class="container">
     <div class="col-md-12" >
      <h2>Would you like to do next ?</h2>
      <p>Choose id you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
 </div>
                    <div class="container">
                      <div class="panel-group category-products" id="accordian"><!--category-productsr-->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      Use Cuopen Code
                    </a>
                  </h4>
                </div>
                <div id="mens" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>Enter your coupon code</p>
                                        <div class="col-md-8">
                                <input class="form-control margin-bottom-10" name="code" type="text">
                                </div>
                                 <div class="col-md-4">
                                <button type="button" class="btn-cw">Apply Coupon</button>
                                </div>
                  </div>
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      Use Discount Voucher
                    </a>
                  </h4>
                </div>
                <div id="womens" class="panel-collapse collapse">
                  <div class="panel-body">
                                    <p>Enter your Voucher code</p>
                    <div class="col-md-8">
                                <input class="form-control margin-bottom-10" name="code" type="text">
                                </div>
                                 <div class="col-md-4">
                                <button type="button" class="btn-cw">Apply Voucher</button>
                                </div>
                  </div>
                </div>
              </div>
            </div>
                    </div>
                    
                    <div class="coupon-code">
                        <div class="row">
                             <div class="col-sm-3 col-sm-offset-9">
                                <ul class="list-inline total-result">
                                    <li>
                                        <h4>Total:</h4>
                                        <div class="total-result-in">
                                            <span><input type="text" class="totalAmt-input" id="total" value="<?php echo $total; ?>" readonly/></span>
                                        </div>    
                                    </li>    
                                    <li>
                                        <h4>Shipping:</h4>
                                        <div class="total-result-in">
                                            <span class="text-right"><input type="text" class="totalAmt-input" id="shippingCharges" value="0" readonly/></span>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="total-price">
                                        <h4>Grand Total:</h4>
                                        <div class="total-result-in">
                                            <span><input type="text" class="totalAmt-input" id="grandTotal" value="<?php echo $total; ?>" readonly/></span>
                                        </div>
                                    </li>
                                    <li class="total-price">                                        
                                        <a href="<?php echo base_url('product/checkOut');?>"><button type="button" class="btn-cw" data-toggle="tooltip" title="Checkout">Checkout</button> </a>
                                        <a href="<?php echo base_url('product/productView');?>"><button type="button" class="btn-cw" data-toggle="tooltip" title="Continue Shopping"> Continue Shopping</button> </a>
                                    </li>
                                </ul>
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
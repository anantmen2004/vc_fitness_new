<div id="main"> 
      <!-- main-content starts here -->
      <div id="main-content">
        <section id="primary" class="content-full-width">
          <div class="dt-sc-hr-invisible-small"></div>
          <div class="dt-sc-hr-invisible-normal"></div>
         
          <!-- Pricintable type3 starts here -->
          <div class="fullwidth-section">
             <div class="container">
             <h3 class="border-title"> <span> Fitness Products</span> </h3>
                  <section id="secondary-left" class="secondary-sidebar secondary-has-left-sidebar">
                            
                            
                             <aside class="widget widget_categories">
                                <div class="widgettitle">
                                  <h3>Categories</h3>
                                    <span></span>
                                </div>
                            <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
              <?php
                  $cnt = 1;
                  foreach ($cat as $key => $value):
                    if($value['parent_id'] == 0):
              ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $value['category_id'] ?>">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      <?php echo $value['name'];?>
                    </a>
                  </h4>
                </div>
            
              
                <div id="<?php echo $value['category_id'] ?>" class="panel-collapse <?php echo ($cnt == 1 )? "active" : "collapse" ?>">
                  <div class="panel-body">
                    <ul>
                    <?php 
                      foreach ($cat as $key1 => $value1):
                      if($value1['parent_id'] != 0 && $cat[$key]['category_id'] == $value1['parent_id'] ):
                    ?>

                    <li><a href="<?php echo base_url('product/productView/').$value1['category_id'];?>"><?php echo $value1['name'];?></a></li>
                    <?php 
                      endif; 
                      endforeach; 
                    ?>
                    </ul>
                  </div>
                </div>
                
              </div>
            <?php endif; $cnt++; endforeach; ?>
                            
                            </aside>
                            <!-- <aside class="widget widget_categories">
                                <div class="widgettitle">
                                  <h3>Categories</h3>
                                    <span></span>
                                </div>
                                <ul>
                                    <li class="cat-item"><a title="#" href="#">Corporate<span> 2</span></a></li>
                                    <li class="cat-item"><a title="#" href="#">Design<span> 3</span></a></li>
                                    <li class="cat-item"><a title="#" href="#">Learning<span> 2</span></a></li>
                                    <li class="cat-item"><a title="#" href="#">Tools<span> 1</span></a></li>
                                    <li class="cat-item"><a title="#" href="#">Training<span> 3</span></a></li>
                                </ul>
                           </aside> -->
                             
                             <aside class="widget widget_popular_entries">
                                <div class="widgettitle">
                                  <h3>Latest Gallery</h3>
                                    <span></span>
                                </div>
                                <div class="recent-gallery-widget">
                                    <ul>
                                    <?php $galCnt=1; foreach ($gallery as $key => $value) :
                                    if($galCnt < 3):

                                    ?>
                                        <li>
                                            <a class="entry-thumb" href="#"><img alt="gallery-img" src="<?php echo base_url().'public/images/'.$value['img_path']?>"></a>
                                            <h6><a href="#"><?php echo $value['title']; ?></a></h6>
                                            <p><?php echo $value['description']; ?></p>
                                        </li>
                                      <?php $galCnt++; endif; endforeach;?>
                                    </ul>
                                </div>
                            </aside>
                            <!-- <aside class="widget widget_archive">
                                <div class="widgettitle">
                                  <h3>Archives</h3>
                                    <span></span>
                                </div>
                                <ul>
                                    <li><a href="#">Feb 2014<span> 5</span></a></li>
                                    <li><a href="#">May 2014<span> 1</span></a></li>
                                    <li><a href="#">Mar 2014<span> 3</span></a></li>
                                    <li><a href="#">Jan 2014<span> 4</span></a></li>
                                    <li><a href="#">Dec 2014<span> 2</span></a></li>
                                </ul>
                            </aside> -->
                            <!-- <aside class="widget widget_social_profile">
                                <div class="widgettitle">
                                  <h3>Social Widget</h3>
                                    <span></span>
                                </div>                
                                <ul class="dt-sc-social-icons">
                                    <li class="facebook"><a href="#" class="fa fa-facebook"></a></li>
                                    <li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
                                    <li class="flickr"><a href="#" class="fa fa-flickr"></a></li>
                                    <li class="youtube"><a href="#" class="fa fa-youtube"></a></li>
                                </ul>
                          </aside> -->
                             
                        </section>
            
            <section id="primary" class="page-with-sidebar page-with-left-sidebar">
                <!--<div class="tpl-blog-holder apply-isotope">-->
                  <div class="dt-sc-one-column column">
                       
                   
                  <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
              <div id="picture-frame">
      <img src="<?php echo base_url()."public/images/".$products[0]['image'];?>" data-src="<?php echo base_url()."public/images/".$products[0]['image'];?>" />
    </div>
            </div>
          <div class="details col-md-6">
            <h3 class="product-title"><?php echo $products[0]['name'];?></h3>
            <div class="rating">
              <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </div>
              <span class="review-no">41 reviews</span>
            </div>
            <p class="product-description"><?php echo $products[0]['description'];?></p>
            <h4 class="price">current price: <span><?php echo $products[0]['price'];?></span></h4>
            <p class="vote"><strong>51%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
            <!--<h5 class="sizes">sizes:
              <span class="size" data-toggle="tooltip" title="small">s</span>
              <span class="size" data-toggle="tooltip" title="medium">m</span>
              <span class="size" data-toggle="tooltip" title="large">l</span>
              <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
            </h5>-->
            <!--<h5 class="colors">colors:
              <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
              <span class="color green"></span>
              <span class="color blue"></span>
            </h5>-->
                    <h5 class="colors">Quantity:
                    <span class="color"> 
                      <div class="sp-quantity">
                         <div class="sp-minus fff ddd">-</div>
                        <div class="sp-input">
                            <input type="text" class="quntity-input" value="1" id="quntity_<?php echo $products[0]['product_id'];?>"/>
                        </div>
                        <div class="sp-plus fff ddd">+</div>
                      </div>
                    </span>
                         </h5>
                          <div class="dt-sc-hr-invisible-small"></div>
                           <div class="dt-sc-clear"></div>
                        <div class="action">

              <button class="btn-cart1 pull-right" type="button" data-toggle="tooltip" title="Add To Cart" onClick="addToCart('<?php echo $products[0]['product_id'];?>','<?php echo $products[0]['price'];?>','<?php echo $products[0]['name'];?>','<?php echo $products[0]['image'];?>','<?php echo $products[0]['meta_title'];?>')" id="addToCart" ><i class="fa fa-cart-arrow-down"></i> &nbsp;Add To Cart</button>
              <button class="btn-cw pull-right" type="button" data-toggle="tooltip" title="Wishlist" onclick="addToWishlist('<?php echo $products[0]['product_id'];?>','<?php echo $customer_id;?>')"><span class="fa fa-heart"></span></button>
              
                            <!-- <button class="btn-cw pull-left" type="button" data-toggle="tooltip" title="Compare"><span class="fa fa-bar-chart"></span></button>
                            <button class="btn-cart1 pull-left" type="button" data-toggle="tooltip" title="Buy Now"><i class="fa fa-check"></i> &nbsp;Buy Now</button> -->
            </div>
          </div>
        </div>
      </div>
    </div>
          <hr>
                                              
      
    
    <div class="container">
  <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>NEW  </h2>
    </div>
  </div>
</div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="recommended_items"><!--recommended_items-->
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
               
                <?php 
                    $count = count($newProduct);
                     $flag = 0;
                    for($j=0;$j<4;$j++) { 
                      
                      ?>
                         <div class="<?php echo ($j==0) ?  'item active' : 'item'?>"> 
                        <?php    $count = count($newProduct);
                            for($i=0;$i<4;$i++) { 
                           
                        ?>
                          <div class="col-sm-3">
                            <div class="product-image-wrapper">
                              <div class="single-products">
                              
                                <div class="productinfo text-center">
                                  <img src="<?php echo base_url().'public/images/'.$newProduct[$flag]['image']?>" alt="" />
                                  <h2>&#x20B9;<?php echo round($newProduct[$flag]['price']);?></h2>
                                  <p><?php echo $newProduct[$flag]['name']; ?></p>
                                  <a href="#" class="btn-cart" onClick="addToCart('<?php echo $newProduct[$flag]['product_id'];?>','<?php echo $newProduct[$flag]['price'];?>','<?php echo $newProduct[$flag]['name'];?>','<?php echo $newProduct[$flag]['image'];?>','<?php echo $newProduct[$flag]['meta_title'];?>')"><i class="fa fa-shopping-cart"></i>&nbsp;Add to cart</a>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                      
                           <?php $flag++;}?>

                    </div>
               
                <?php }?>

              </div>
               <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>      
            </div>
          </div>
      </div>
   </div>
  </section>
            </div>
          </div>
          
          <!-- support starts here -->
          <div class="dt-sc-hr-invisible-large"></div>
        </section>
      </div>
      <!-- main-content ends here --> 
    </div>
<?php 
	$str = $_SERVER['REQUEST_URI'];
	$check = stripos($str,"allProductView");
	if($check)
	{
		$function = "allProductView";
	}
	else
	{
		$function = "productView";
	}
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
											<a href="<?php echo base_url('product/allProductView/').$value['category_id'];?>"><?php echo $value['name'];?></a>
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
            <form action="<?php echo base_url('product/productSearching') ?>" method="post">
							<div class="input-group">
							
								<div class="input-group-btn search-panel">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
												<span id="search_concept">All Categories</span> <span class="caret"></span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li><a href="#contains">Contains</a></li>
											<li><a href="#its_equal">It's equal</a></li>
											<li><a href="#greather_than">Greather than ></a></li>
											<li><a href="#less_than">Less than < </a></li>
											<li class="divider"></li>
											<li><a href="#all">Anything</a></li>
										</ul>
								</div>
								<input type="hidden" name="search_param" value="all" id="search_param">
								<!-- <?php echo $_SERVER['REQUEST_URI'];?> -->
								<!-- <?php $currCatId=$this->uri->segment(3); ?>
								<?php $currPageNo =$this->uri->segment(4);?>
								<input type="text" name="currCatId" value="<?php echo empty($currCatId)?"":$currCatId;?>" id="aaaa">
								<input type="text" name="currPageNo" value="<?php echo empty($currPageNo)?"":$currPageNo;?>" id="aaaa">   -->       
								<input type="text" class="form-control" name="search_value" placeholder="Search term...">
								<span class="input-group-btn">
										<button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
								</span>
							
						</div>
            </form>
														<div class="dt-sc-clear"></div>
					 <hr>
																						 <div class="well well-sm">
				<strong><?php echo empty($products)?"":$products[0]['catName'] ?></strong>
				<div class="btn-group pull-right">
						<a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-th-list">
						</span>&nbsp;&nbsp;List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
								class="fa fa-th"></span>&nbsp;&nbsp;Grid</a>
				</div>
		</div>
		<div id="products" class="row list-group">

		<?php 
					if(!empty($products)):
					foreach ($products as $key => $value):
		?>
				<div class="item  col-xs-12 col-lg-4">
					<span class="thumbnail">
						<img src="<?php echo base_url()."public/images/".$value['image'];?>" alt="...">
						<h4><a href="<?php echo base_url().'product/productDetails/'.$value['product_id'];?>"><?php echo $value['name'];?></a></h4>
						<p>&#x20B9;<?php echo $value['price'];?></p>
							 <div class="row">
							<div class="col-md-6 col-sm-6">
							<div class="ratings">

										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>   
										<span class="fa fa-star"></span>   

							</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="pull-right">
								<?php if(isset($value['customer_id'])): if($value['customer_id'] == $customer_id && $customer_id != ""): ?>
									<a data-toggle="tooltip" title="Remove From Wishlist" onclick="removeWishlistItem('<?php echo $value['product_id'];?>')"><span class="fa fa-heart wishListheart" id="wishListheart12_<?php echo $value['product_id'];?>" ></span></a>
								<?php else: ?>
									<a data-toggle="tooltip" title="Wishlist" onclick="addToWishlist('<?php echo $value['product_id'];?>','<?php echo $customer_id;?>')"><span class="fa fa-heart" id="wishListheart_<?php echo $value['product_id'];?>"></span></a>
								<?php endif; else: ?>
                  <a data-toggle="tooltip" title="Wishlist" onclick="addToWishlist('<?php echo $value['product_id'];?>','<?php echo $customer_id;?>')"><span class="fa fa-heart" id="wishListheart_<?php echo $value['product_id'];?>"></span></a>
                <?php endif; ?>
									<a href="<?php echo base_url().'product/productDetails/'.$value['product_id'];?>" data-toggle="tooltip" title="Details"><span class="fa fa-search-plus"></span></a>
									<!-- <a href="" data-toggle="tooltip" title="Compare"><span class="fa fa-bar-chart"></span></a> -->
								</div>
							</div>
						</div>
						<hr class="line">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="sp-quantity">
									<div class="sp-minus fff ddd">-</div>
									<div class="sp-input">
											<input type="text" class="quntity-input" value="1" id="quntity_<?php echo $value['product_id'];?>"/>
									</div>
									<div class="sp-plus fff ddd">+</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<a href="#" data-toggle="tooltip" title="Add To Cart"><button class="btn-cart1 right" onClick="addToCart('<?php echo $value['product_id'];?>','<?php echo $value['price'];?>','<?php echo $value['name'];?>','<?php echo $value['image'];?>','<?php echo $value['meta_title'];?>')" id="addToCart"><i class="fa fa-cart-arrow-down"></i>&nbsp;Buy Item</button></a>
							</div>
							
						</div>
				</span>
				</div>
			<?php 
					endforeach;
					else:
			?>
				<div class="item  col-xs-12 col-lg-4">

									<?php echo "Sorry...! try somthing else..";?>

				</div>
			<?php 
					endif;
			?>
		</div>
		<div class="col-md-12 col-sm-12" >
			<div class="row" style="text-align: center">
			
			<?php if($pageno > 1): $prePage = $pageno - 2; ?>
					<div class="pagination current" style="padding-left:2%;padding-right: 2%;">
							<a href="<?php echo base_url().'product/'.$function.'/'.$catId.'/'.$prePage ?>" >Previous</a>
					</div>
			<?php endif; ?>  
			
			<?php for($i=1; $i<=$total_page; $i++ ){ ?>
				<div class="pagination" style="">
						<a href="<?php echo base_url().'product/'.$function.'/'.$catId.'/'.$i ?>" ><?php echo $i ?></a>
				</div>
			<?php  } ?>
			<?php if($pageno < $total_page): $postPage = $pageno + 3; ?>
					<div class="pagination" style="padding-left:2%;padding-right: 2%;">
						<a href="<?php echo base_url().'product/productView/'.$catId.'/'.$pageno?>" >Next</a>
					</div>
			<?php endif; ?>
			</div>
		</div>

		<div class="container">
			<div class="row" id="slider-text">
				<div class="col-md-6" >
					<h2>NEW COLLECTION</h2>
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
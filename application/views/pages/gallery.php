<div id="main"> 
      <!-- main-content starts here -->
      <div id="main-content">
        <section id="primary" class="content-full-width">
          <div class="dt-sc-hr-invisible-small"></div>
          <div class="dt-sc-hr-invisible-normal"></div>
         
          <!-- Pricintable type3 starts here -->
          <div class="fullwidth-section">
             <div class="container">
             <h3 class="border-title"> <span> Gallery </span> </h3>
               <div class="column dt-sc-one-column first">
                <div class="dt-sc-clear"> </div>
                   <div class="dt-sc-sorting-container">
                   <a class="first active-sort" data-filter="*" href="<?php echo base_url().'gallery/index/' ?>">ALL</a>
                   <?php foreach ($gallery_type as $key => $value):

                   ?>
                      <a class="first active-sort" data-filter="*" href="<?php echo base_url().'gallery/index/'.$value['gallery_type_id'] ?>"><?php echo (isset($gallery_type)?$value['name']:"")?></a>
                  <?php endforeach; ?>
                  </div>
                            <div class="dt-sc-portfolio-container">
                            <?php foreach ($gallery as $key => $value):
                            ?>
                              <div class="portfolio dt-sc-one-third column flexibility agility">
                                    <div class="portfolio-thumb">
                                        <img src="<?php echo base_url()."public/images/".$value['img_path'];?>" alt="" title="">
                                        <div class="image-overlay">
                                            <div class="fig-content-wrapper">
                                                <div class="fig-overlay">
                                                  <p>
                                                      <a href="<?php echo base_url().'public/images/'.$value['img_path']?>" data-gal="prettyPhoto[gallery]" class="zoom"><span class="fa fa-plus"> </span></a>
                                                      
                                                  </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portfolio-detail">
                                        <div class="portfolio-title">
                                            <h4><a href="gallery-detail.html"><?php echo $value['title'] ?></a></h4>
                                            <!-- <p><a href="#">Events</a></p> -->
                                        </div>
                                        <div class="views" onclick="galleryLike('<?php echo $value['id']?>','<?php echo $customer_id; ?>')">
                                            <span><i id="like_<?php echo $value['id']?>"class="fa <?php echo (!empty($customer_id) && $value['customer_id'] == $customer_id)?"fa-heart":"fa-heart-o" ?>"></i><br><a class="likeThis" id="likeCount_<?php echo $value['id']?>"><?php echo empty($value['cnt'])?"0":$value['cnt']; ?> Likes</a></span>
                                        </div>
                                    </div>
                                </div>
                              <?php endforeach; ?>
                            </div>
              </div>
            </div>
          </div>
          
          <!-- support starts here -->
          <div class="dt-sc-hr-invisible-large"></div>
        </section>
      </div>
      <!-- main-content ends here --> 
    </div>
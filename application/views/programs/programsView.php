<!-- <?php echo $programId ?> -->
<div id="main"> 
      <!-- main-content starts here -->
      <div id="main-content">
        <section id="primary" class="content-full-width">
          <div class="dt-sc-hr-invisible-small"></div>
          <div class="dt-sc-hr-invisible-normal"></div>
          <!-- Pricintable type3 starts here -->
          <div class="fullwidth-section">
            <div class="container">
              <h3 class="border-title"> <span> Programs </span> </h3>
              <div class="column dt-sc-one-column first">
                <div class="dt-sc-clear"> </div>
                <div class='dt-sc-tabs-vertical-container'>
                  <ul class='dt-sc-tabs-vertical-frame1'><!--class='dt-sc-tabs-vertical-frame'-->
                  <?php foreach ($programs as $key => $value) : ?>
                    <li class="current"><a class="<?php echo ($value['program_id']==$programId)?"current":""?>" href="<?php echo base_url()."Programs/programView/".$value['program_id']?>" > <?php echo $value['program_name'] ?> </a></li>
                  <?php endforeach; ?>
                  </ul>
                  <div class="dt-sc-tabs-vertical-frame1-content">
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                      <?php if(!empty($trainings)): ?>
                      <?php 
                        $cnt=count($trainings);
                        for($i=0; $i<$cnt;$i++): 
                          if($i<3):
                      ?>
                        <li role="presentation" class=""> <!--href="#home"--> <a onclick="getTrainingContent('<?php echo $trainings[$i]['training_id']?>')" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"> <span class="text"><?php echo $trainings[$i]['training_name'] ?></span> </a> </li>
                       
                        <?php else: ?>
                            <li role="presentation" class="dropdown"> <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents"> <span class="text">More</span> <span class="caret"> </span> </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                            <?php for($j=$i; $j<$cnt;$j++): if($j>=3):?>
                              <li> <a onclick="getTrainingContent('<?php echo $trainings[$j]['training_id']?>')" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1"> <span><?php echo $trainings[$j]['training_name'] ?></span> </a> </li>
                            <?php endif; endfor;?></ul>
                          </li>                             
                          <?php break; ?>
                        <?php endif; endfor;?>

                      </ul>
                      <div id="myTabContent" class="tab-content">
                          <?php echo $trainings[0]['content']; ?>
                      </div>
                    <?php endif; ?>
                    </div>

  <!--****************************************************-->
                  </div>
                  
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

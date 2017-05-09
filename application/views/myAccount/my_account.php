<!-- <script src="<?php echo base_url();?>public/js/jwplayer.js"></script>  -->
<style type="text/css">
  video::-internal-media-controls-download-button {
    display:none;
}

video::-webkit-media-controls-enclosure {
    overflow:hidden;
}

video::-webkit-media-controls-panel {
    width: calc(100% + 30px); /* Adjust as needed */    
}
/*video::-webkit-media-controls-fullscreen-button {
    display: none;
}*/
</style>
<div id="main">
  <div id="main-content">
   <section id="primary" class="content-full-width">
    <div class="dt-sc-hr-invisible"></div>
    <div class="fullwidth-section dt-sc-paralax full-pattern3">
      <div class="container">
        <h3 class="border-title"> <span>Welcome 
          <?php foreach($userData as $key => $value) : ?>
            <?php echo $value['fname'].' '. $value['lname']; ?> 
          <?php endforeach; ?>
        </span> </h3>
        <div class="intro-text type2 animate" data-animation="fadeInUp" data-delay="100">
         <div class="dt-sc-one first">
          <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
              <li>My Account Information</li>
              <li>My Orders</li>
              <li>My Packages</li>
              <li>My Package History</li>
            </ul>
            <div class="resp-tabs-container hor_1">
              <div>
                <p> <div id="ChildVerticalTab_1">
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
                        foreach ($wishlist as $key => $items):  ?>
                      <tr>
                        <td class="text-center"><a href="#"><img src="<?php echo base_url()."public/images/".$items[0]['image'];?>" alt=" " title=" "></a>
                        </td>
                        <td class="text-left"><a href="#S"><?php echo $items[0]['name']; ?></a></td>
                        <td class="text-left"><?php echo $items[0]['model']; ?></td>
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
      <div id="ChildVerticalTab_2">
        <ul class="resp-tabs-list ver_2">
          <li>View your order history</li>
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
                    <td class="text-center">Customer</td>
                    <td class="text-center">Total</td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($myOrders as $key => $value):  ?>
                  <tr>
                    <td class="text-center"><?php echo $value['order_id'];?></td>
                    <td class="text-center"><?php echo $value['status'];?></td>
                    <td class="text-center"><?php echo date("d-m-Y",strtotime($value['date_added']));?></td>
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
      </div>
    </div>
  </p>
</div>
<div>
 <p>

  <div id="ChildVerticalTab_3">
    <ul class="resp-tabs-list ver_3">    
    <?php $pack_cnt=COUNT($packdata); ?>
    <?php for ($i=0; $i < $pack_cnt; $i++) : ?>     
      <?php if($i==0) {for ($j=0; $j < $pack_cnt; $j++) : ?> 

    <li><?php echo $packdata[$j]['package_name']; ?></li>
      <?php endfor;} ?>

  <!-- <?php //endforeach; ?> -->
    </ul>
    <div class="resp-tabs-container ver_3">
      <div>
       <h4>My Package Details</h4>
       <p>
         <form id="mypackageInfo_<?php echo $i; ?>" role="form" enctype="multipart/form-data" class="form-horizontal">
          <fieldset>

            <div class="form-group required">
              <input type="hidden" name="package_id" value="<?php echo $packdata[$i]['package_id']; ?>" placeholder="id" id="package_id" class="form-control" readonly>
               <label class="col-sm-3">Package Name</label>
               <div class="col-sm-9">
              <input type="text" name="package_name" value="<?php echo $packdata[$i]['package_name']; ?>" placeholder="Package Name" id="package_name" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group required">
             <label class="col-sm-3">Package Amount</label>
               <div class="col-sm-9">
             <input type="text" name="package_amount" value="<?php echo $packdata[$i]['amount']; ?>" placeholder="Package Amount" id="package_amount" class="form-control" readonly="" readonly>
             </div>
           </div>
           <div class="form-group required">
            <label class="col-sm-3">Package Duration</label>
              <div class="col-sm-9">
             <input type="text" name="package_duration" value="<?php echo $packdata[$i]['duration']; ?> Months" placeholder="Package Duration" id="package_duration" class="form-control" readonly="" readonly>
             </div>
           </div>
           <div class="form-group required">
            <label class="col-sm-3">Package Description</label>
              <div class="col-sm-9">
            <textarea  name="package_description" value="" placeholder="Package Description" readonly><?php echo $packdata[$i]['package_details']; ?></textarea>
            </div>
          </div>

            <div class="form-group required">
            <label class="col-sm-3">No. of Call Sessions</label>
              <div class="col-sm-9">
             <input type="text" name="package_call[]" value="<?php echo $packdata[$i]['package_call']; ?>" placeholder="Video Call" id="package_call" class="form-control" readonly="" readonly>
             </div>
           </div>

          <div> 
            <h4>Training Type</h4>
            
            <div>  <!-- class="video" -->
              <ul style="list-style-type: none;">
              
              <?php $train_cnt1=COUNT($trainarr[$i]); ?>
               <?php for ($k=0; $k < $train_cnt1; $k++) : ?>
                <li class="Training_type"><h4><?php echo $trainarr[$i][$k]['training_name']; ?>
                <span class="pull-right"><img src="<?php echo base_url();?>public/images/arrow-down2.png"></span></h4>
      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
         <?php if($workout[0]['reg_workout']=='NO') : ?>
            <li class="active"> 
              <a href="#tab_default_B<?php echo $i; ?><?php echo $k; ?>" data-toggle="tab">
              Basic </a> 
            </li>
         <?php endif; ?> 
            <li class="<?php echo ($workout[0]['reg_workout']=='YES') ? "active" : "" ?>">
              <a href="#tab_default_R<?php echo $i; ?><?php echo $k; ?>" data-toggle="tab">
              Regular </a>
            </li>
          </ul>
          <div class="tab-content">
          <?php if($workout[0]['reg_workout']=='NO') : ?> 
            <div class="tab-pane <?php echo ($k < 1) ? "active" : "" ?>" id="tab_default_B<?php echo $i; ?><?php echo $k; ?>" onc>
              <ul class="ul9_<?php echo $k; ?>" style="list-style-type: none;">
                  <?php $video_cnt2=COUNT($basic_video[$i][$k]); ?>
                      <?php for ($v=0; $v < $video_cnt2; $v++) : ?>
                        <?php $path= base_url()."public/video/".$basic_video[$i][$k][$v]['video_path']; ?>
                    <li class="col-md-4">

                      <image class="youtube-btn-training" type="button" onclick="basicvideo('<?php echo $i;?><?php echo $k;?><?php echo $v; ?>','<?php echo $path; ?>')" data-toggle="modal" src="<?php echo base_url()."public/images/video-buttonn.png"; ?>" style="background: url('<?php echo base_url()."public/images/vc.png"; ?>')"><b><?php echo $basic_video[$i][$k][$v]["video_name"];?></b></image>
                    
                    </li>     
                  <?php endfor; ?>
              </ul>  

            </div>
           <?php endif; ?> 
            <div class="tab-pane <?php echo ($workout[0]['reg_workout']=='YES') ? "active" : "" ?>" id="tab_default_R<?php echo $i; ?><?php echo $k; ?>">
                <ul class="ul9_<?php echo $k; ?>" style="list-style-type: none;">
                  <?php $video_cnt3=COUNT($video[$i][$k]); ?>
                      <?php for ($r=0; $r < $video_cnt3; $r++) : ?>
                        <?php $path= base_url()."public/video/".$video[$i][$k][$r]['video_path']; ?>
                    <li class="col-md-4">

                    <?php 
                      $num_days = $packdata[$i]['duration'] * 30;
                      $num_video = ($video_cnt3 / $num_days);
                       
                      /********* claculate no of days from package start date**********/
                      $start_date = $packdata[$i]['start_date'];    
                      $date = new DateTime($start_date);
                      $now = new DateTime();
                      $month =  $date->diff($now)->format("%m");
                      $days =  $date->diff($now)->format("%d");
                      /*****************************************************************/
                      $total_days = (30 * $month) + $days;
                      //print_r($total_days);
                      $total  = $num_video * $total_days;
                      $show_cnt = ceil($total);
                      //print_r($show_cnt);

                     
                      //return false;

                     ?>

                    <image type="button" onclick="<?php echo ($r < $show_cnt) ? "regularvideo('$i$k$r','$path')" : "wanning_msg()" ?>" data-toggle="modal" src="<?php echo base_url()."public/images/video-buttonn.png"; ?>" class="youtube-btn-training" style="background: url('<?php echo base_url()."public/images/vc.png"; ?>')"><b><?php echo $video[$i][$k][$r]["video_name"];?></b></image>
                         
                    </li>
                   <?php endfor; ?>
                  </ul> 
            </div>
          </div>
        </div>
      </div>
                </li>
              <?php endfor; ?>

            </ul>
          </div>
        </div>

        <div><h3>Schedule Online Training Date Time</h3>
        <div class="alert_msg"></div>
           <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td class="text-center">Date</td>
                    <td class="text-center">Hours</td>
                    <td class="text-center">Minutes</td>
                    <!-- <td class="text-center">AM/PM</td> -->
                    <td class="text-center">Status</td>
                    <td class="text-center">Missed Session Video</td>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $val=$packdata[$i]['package_call'];
                $call_cnt = 1; for($p=0; $p<$val; $p++) : 

                    if(!empty($call_data[$i][$p]['time'])){
                    $time = $call_data[$i][$p]['time'];
                    // $timestring = explode(" ", $time);
                    // $ampm = $timestring[1];
                    $timestring2 = explode(":", $time);
                    $hour = $timestring2[0];
                    $min = $timestring2[1];
                  }
                  else{
                    $hour = ""; $min=""; $ampm="";
                  }
                  if(!empty($call_data[$i][$p]['status'])){
                    $status = $call_data[$i][$p]['status'];
                  }
                  else{
                      $status="";
                  }

                  if(!empty($call_data[$i][$p]['call_no'])){
                    $call_no = $call_data[$i][$p]['call_no'];
                  }
                  else{
                    $call_no = "";
                  }

                  if(!empty($call_data[$i][$p]['date'])){
                    $date = $call_data[$i][$p]['date'];
                  }
                  else{
                    $date = "";
                  }

                  if(!empty($call_data[$i][$p]['video_id'])){
                    $video_id = $call_data[$i][$p]['video_id'];
                  }
                  else{
                    $video_id = 0;
                  }
                  ?>

                  <tr>
                    <td class="text-center">

                    <input type="hidden" name="packcall[]" value="<?php echo empty($call_data[$i][$p])? $call_cnt : $call_data[$i][$p]['call_no']; ?>" id="pack_call"  readonly> 

                    <input type="text" name="pack_sub_id" value="<?php echo $packdata[$i]['package_id']; ?>" id="pack_sub_id"  readonly>

                    <input type="text" date-date-format=""   class="pickdate" id="packagecall" name="date1[]" placeholder="Select Date" value="<?php echo empty($call_data[$i][$p]['date'])? "" : $call_data[$i][$p]['date']; ?>" <?php echo (!empty($status) && $status== 2)?"disabled":"";?>/>

                    </td>
                    <td class="text-center">
                      <select id="hour" name="hour[]" style="height:34px; padding: 3px 0px 0px 10px; width: 100px;"<?php echo (!empty($status) && $status== 2)?"disabled":"";?> >

                        <?php for($r=01; $r<24 ; $r++) : ?>
                            <option value="<?php echo $r;?>" <?php echo (!empty($hour)&& $hour == $r)?"selected":""?>><?php echo $r; ?></option>
                        <?php endfor; ?>
                      </select>
                    </td>

                    <td class="text-center">
                      <select id="minute" name="minute[]" style="height:34px; padding: 3px 0px 0px 10px;width: 100px;" <?php echo (!empty($status) && $status== 2)?"disabled":"";?> >
                       <option value="00">00</option>
                          <?php for($r=01; $r<61 ; $r++) : ?>
                            <option value="<?php echo $r;?>" <?php echo (!empty($min)&& $min == $r)?"selected":""?>><?php echo $r; ?></option>
                          <?php endfor; ?>
                       </select>
                    </td>
                    <!-- <td class="text-center">
                      <select id="pm" name="pm[]" style="height:34px; padding: 3px 0px 0px 10px; margin-top: 5px;" <?php echo (!empty($status) && $status== 2)?"disabled":"";?> >

                        <option value="AM" <?php echo (!empty($ampm)&& $ampm == "AM")?"selected":""?>>AM</option>
                        <option value="PM" <?php echo (!empty($ampm)&& $ampm == "PM")?"selected":""?>>PM</option>
                     
                   </select>
                    </td> -->
                    <td class="text-center">
                       <select id="callstatus" name="call_status[]" style="height:34px; padding: 3px 0px 0px 20px; width: 150px;" <?php echo (!empty($status) && $status== 2)?"disabled":"";?> >
                        <option>---select---</option>
                        <option value="1" <?php echo (!empty($status)&& $status == "1")?"selected":""?>>Pending</option>
                        <option id="completehide" value="2" <?php echo (!empty($status)&& $status == "2")?"selected":""?> hidden >Complete</option >
                        <option value="3" <?php echo (!empty($status)&& $status == "3")?"selected":""?>>Reschedule</option>
                        <option value="4" <?php echo (!empty($status)&& $status == "4")?"selected":""?>>Cancel</option>
                      </select>
                    </td>
                    <td>
                    <?php if($video_id != 0) : ?>
                         <?php $path= base_url()."public/video/".$call_data[$i][$p]['video_path']; ?>

                      <a onclick="sessionvideo('<?php echo $i;?><?php echo $p;?>','<?php echo $path; ?>')" class="dt-sc-button small pull-left" data-toggle="modal">Play</a>
                      
                    <?php endif; ?>
                    </td>
                    
                  </tr>
                <?php $call_cnt++; endfor; ?>
              </tbody>
            </table>
          <?php if(!empty($checkIp)): ?>
            <div>
            <button type="button" name="callsubmit" id="callsubmit" value="Submit" class="dt-sc-button small" onclick="videocall('<?php echo $i; ?>')">Submit</button>
          </div>
        <?php endif; ?>
        </div>
          </fieldset>
        </form>
      </p>
    </div>
  </div>
<?php endfor; ?>
</div>
</div>

<!-- **********************************package history starts**************************-->

<div>
 <p>

  <div id="ChildVerticalTab_4">
    <ul class="resp-tabs-list ver_4">    
    <?php $cnt=COUNT($packhistory); ?>
    <?php for ($i=0; $i < $cnt; $i++) : ?>     
      <?php if($i==0) {for ($j=0; $j < $cnt; $j++) : ?> 

    <li><?php echo $packhistory[$j]['package_name']; ?></li>
      <?php endfor;} ?>

  <!-- <?php //endforeach; ?> -->
    </ul>
    <div class="resp-tabs-container ver_4">
      <div>
       <h4>My Package Details</h4>
       <p>
         <form id="mypackageInfo_<?php echo $i; ?>" role="form" enctype="multipart/form-data" class="form-horizontal">
          <fieldset>

            <div class="form-group required">
              <input type="hidden" name="package_id" value="<?php echo $packhistory[$i]['package_id']; ?>" placeholder="id" id="package_id" class="form-control" readonly>
               <label class="col-sm-3">Package Name</label>
               <div class="col-sm-9">
              <input type="text" name="package_name" value="<?php echo $packhistory[$i]['package_name']; ?>" placeholder="Package Name" id="package_name" class="form-control" readonly>
              </div>
            </div>
            <div class="form-group required">
             <label class="col-sm-3">Package Amount</label>
               <div class="col-sm-9">
             <input type="text" name="package_amount" value="<?php echo $packhistory[$i]['amount']; ?>" placeholder="Package Amount" id="package_amount" class="form-control" readonly="" readonly>
             </div>
           </div>
           <div class="form-group required">
            <label class="col-sm-3">Package Duration</label>
              <div class="col-sm-9">
             <input type="text" name="package_duration" value="<?php echo $packhistory[$i]['duration']; ?> Months" placeholder="Package Duration" id="package_duration" class="form-control" readonly="" readonly>
             </div>
           </div>
           <div class="form-group required">
            <label class="col-sm-3">Package Description</label>
              <div class="col-sm-9">
            <textarea  name="package_description" value="" placeholder="Package Description" readonly><?php echo $packhistory[$i]['package_details']; ?></textarea>
            </div>
          </div>

            <div class="form-group required">
            <label class="col-sm-3">No. of Call Sessions</label>
              <div class="col-sm-9">
             <input type="text" name="package_call" value="<?php echo $packhistory[$i]['package_call']; ?>" placeholder="Video Call" id="package_call" class="form-control" readonly="" readonly>
             </div>
           </div>

          <div> 
            <h4>Training Type</h4>
            <div class="video"> 
              <ul style="list-style-type: none;">
              
              <?php $cnt1=COUNT($trainarr1[$i]); ?>
               <?php for ($k=0; $k < $cnt1; $k++) : ?>
                <li class="Training_type"><h5><?php echo $trainarr1[$i][$k]['training_name']; ?>
                <span class="pull-right"><img src="<?php echo base_url();?>public/images/arrow-down2.png"></span></h5>
                </li>
              <?php endfor; ?>

            </ul>
          </div>
        </div>

<div onload="setupPlayer();">
          <h4>Schedule Video Call</h4>
          <div class="alert_msg"></div>

              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td class="text-center">Date</td>
                    <td class="text-center">Hours</td>
                    <td class="text-center">Status</td>
                  </tr>
                </thead>
                <tbody>
                <?php $val=COUNT($callnumber1[$i]); ?>
            
            <?php $call_cnt = 1; for($p=0; $p<$val; $p++) : ?>
           <?php 
           //echo "<pre> status";print_r($callnumber1[$i][$p]['status']);exit;
               if(!empty($callnumber1[$i][$p]['time'])){
                    $time = $callnumber1[$i][$p]['time'];
                    $timestring = explode(" ", $time);
                    if(!empty($timestring[1])){$ampm = $timestring[1];} else { $ampm ="";}
                    $timestring2 = explode(":", $timestring[0]);
                    $hour = $timestring2[0];
                    $min = $timestring2[1];
                  }
                  else{
                    $hour = ""; $min=""; $ampm="";
                  }

                  if(!empty($callnumber1[$i][$p]['status'])){
                    $status = $callnumber1[$i][$p]['status'];
                  }
                  else{
                      $status="";
                  }

                  if(!empty($callnumber1[$i][$p]['call_no'])){
                    $call_no = $callnumber1[$i][$p]['call_no'];
                  }
                  else{
                    $call_no = "";
                  }

                  if(!empty($callnumber1[$i][$p]['date'])){
                    $date = $callnumber1[$i][$p]['date'];
                  }
                  else{
                    $date = "";
                  }
           ?>
           <tr>

             <td><input type="text" date-date-format=""  class="pickdate" id="packagecall" name="date1[]"  value="<?php echo (!empty( $callnumber1[$i][$p]['date'])) ? $callnumber1[$i][$p]['date'] : ""; ?>" disabled/>
             </td>

             <td><input type="text"  id="time" value="<?php echo (!empty($hour))?"$hour":""; echo ":"; echo (!empty($min))?"$min":""; echo " "; echo (!empty($ampm))?"$ampm":""  ?>" disabled/></td>
             <td><input type="text"  id="status" value="<?php if(!empty($status) && $status==2): echo "Complete"; endif; ?>" disabled/></td>
           </tr>

           <?php $call_cnt++; endfor; ?>
                </tbody>
              </table>
        </div>
          </fieldset>
        </form>
      </p>
    </div>
  </div>
<?php endfor; ?>
</div>
</div>
<!-- history end-->
</div>
</p>
</div>
<div class="dt-sc-hr-invisible-small"></div>
</section>
</div>
</div>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    var i;
    
    for( i=1;  i<10 ; i++)
    {
     $(".ul9_"+i).hide();
    }
 
    $("li.Training_type").click(function(){
      $(this).find('ul').toggle();
    });
  });

</script> -->
<!-- Basic video Modal-->
 <?php $pack_cnt=COUNT($packdata); ?>
    <?php for ($i=0; $i < $pack_cnt; $i++) : ?> 
         <?php $train_cnt1=COUNT($trainarr[$i]); ?>
               <?php for ($k=0; $k < $train_cnt1; $k++) : ?>
                  <?php $video_cnt2=COUNT($basic_video[$i][$k]); ?>
                      <?php for ($v=0; $v < $video_cnt2; $v++) : ?>
                  
                        <div id="myModal_BV<?php echo $i;?><?php echo $k;?><?php echo $v; ?>" class="modal fade">
                          <div class="modal-dialog" style=" width: 800px; margin-top: 110px;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" onclick="basicvideostop('<?php echo $i;?><?php echo $k;?><?php echo $v; ?>')" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title"><?php echo $basic_video[$i][$k][$v]['video_name']; ?></h4>
                            </div>
                            <div class="modal-body">
                              <video id="BVfitnessVideo_<?php echo $i;?><?php echo $k;?><?php echo $v; ?>" width="800" height="300" controls="false" autoplay>
                              
                              </video> 
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endfor; ?>
                <?php endfor; ?>
          <?php endfor; ?>

<script type="text/javascript">
function basicvideo(bid,path)
{
  $("#myModal_BV"+bid).modal('show');
  $("#BVfitnessVideo_"+bid).html('<source src="'+path+'" type="video/mp4">');
}
</script>          
<script type="text/javascript">
  function basicvideostop(id)
  {
      $("#myModal_BV"+id).on('hidden.bs.modal', function()
      {
        $("#BVfitnessVideo_"+id).each(function() 
        {
          this.pause();
        });
      }) 
  }
</script>

<!-- Regular video Modal-->
 <?php $pack_cnt=COUNT($packdata); ?>
    <?php for ($i=0; $i < $pack_cnt; $i++) : ?> 
         <?php $train_cnt1=COUNT($trainarr[$i]); ?>
               <?php for ($k=0; $k < $train_cnt1; $k++) : ?>
                 <?php $video_cnt3=COUNT($video[$i][$k]); ?>
                      <?php for ($r=0; $r < $video_cnt3; $r++) : ?>
                  
                        <div id="myModal_RV<?php echo $i;?><?php echo $k;?><?php echo $r; ?>" class="modal fade">
                          <div class="modal-dialog" style=" width: 800px; margin-top: 110px;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" onclick="regularvideostop('<?php echo $i;?><?php echo $k;?><?php echo $r; ?>')" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title"><?php echo $video[$i][$k][$r]['video_name']; ?></h4>
                            </div>
                            <div class="modal-body">
                              <video id="RVfitnessVideo_<?php echo $i;?><?php echo $k;?><?php echo $r; ?>" width="800" height="300" controls="false" autoplay>
                              
                              </video> 
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endfor; ?>
                <?php endfor; ?>
          <?php endfor; ?>

<script type="text/javascript">
function regularvideo(rid,path)
{
  $("#myModal_RV"+rid).modal('show');
  $("#RVfitnessVideo_"+rid).html('<source src="'+path+'" type="video/mp4">');
}
</script>          
<script type="text/javascript">
  function regularvideostop(id)
  {
      $("#myModal_RV"+id).on('hidden.bs.modal', function()
      {
        $("#RVfitnessVideo_"+id).each(function() 
        {
          this.pause();
        });
      }) 
  }
</script>

<!-- Miss session play video Modal-->
 <?php $pack_cnt=COUNT($packdata); ?>
    <?php for ($i=0; $i < $pack_cnt; $i++) : ?> 
         <?php $sessioncnt=$packdata[$i]['package_call']; ?>
               <?php for ($k=0; $k < $sessioncnt; $k++) : ?>
                  
                        <div id="myModal_PV<?php echo $i;?><?php echo $k;?>" class="modal fade">
                          <div class="modal-dialog" style=" width: 800px; margin-top: 110px;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" onclick="sessionvideostop('<?php echo $i;?><?php echo $k;?>')" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title"><?php echo $call_data[$i][$k]['video_name']; ?></h4>
                            </div>
                            <div class="modal-body">
                              <video id="PVfitnessVideo_<?php echo $i;?><?php echo $k;?>" width="800" height="300" controls="false" autoplay>
                              
                              </video> 
                            </div>
                          </div>
                        </div>
                      </div>
          
                <?php endfor; ?>
          <?php endfor; ?>

<script type="text/javascript">
function sessionvideo(pid,path)
{
  $("#myModal_PV"+pid).modal('show');
  $("#PVfitnessVideo_"+pid).html('<source src="'+path+'" type="video/mp4">');
}
</script>          
<script type="text/javascript">
  function sessionvideostop(id)
  {
      $("#myModal_PV"+id).on('hidden.bs.modal', function()
      {
        $("#PVfitnessVideo_"+id).each(function() 
        {
          this.pause();
        });
      }) 
  }
</script>
<script type="text/javascript">
function wanning_msg(){
  alert("Opps..! Please Complete your current Week training");
}
</script>
<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <!-- <button type="submit" form="form-category" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button> -->
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo "Schedule Call"; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo "Package Name"; ?></h3>
      </div>
      <div class="panel-body">
        <!-- <form class="form-horizontal"> -->
  <?php $cnt = COUNT($scheduler_description);?>
    <?php for($i=0; $i<$cnt; $i++):?>
          <ul class="nav nav-tabs">
            <?php if($i==0) {$flag=0;for($j=0; $j<$cnt; $j++): ?>
            <li class="<?php echo ($flag==0)?'active':''?>" ><a href="#tab-general_<?php echo $flag;?>" data-toggle="tab" style="background-color: <?php echo ($scheduler_description[$j]['status']==1)?'#f24a24':'#94fc9d'; ?>"><?php echo $scheduler_description[$j]['package_name'];?></a></li>
          <?php $flag++; endfor;}?>
          </ul>
          <div class="tab-content">
          <?php if($i==0) {$flag_con=0;for($j=0; $j<$cnt; $j++){ ?>
            <div class="tab-pane <?php echo ($flag_con==0)?'active':''?>" id="tab-general_<?php echo $flag_con;?>">

              <ul class="nav nav-tabs" id="language">
                <?php foreach ($languages as $language) { ?>
                <li><a href="#language<?php echo $flag_con; ?>" data-toggle="tab"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                <?php } ?>
              </ul>

              <div class="tab-content">
                <?php foreach ($languages as $language) { ?>
                <div class="tab-pane active" id="language<?php echo $flag_con; ?>">

                  <div class="form-group active">
                    <label class="col-sm-2 control-label" for=""><?php echo "Customer Name"; ?></label>
                    <div class="col-sm-4">
                      <input type="text"  value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['fname'] : '';?> <?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['lname'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      
                    </div>

                    <label class="col-sm-2 control-label" for=""><?php echo "Package Name"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['package_name'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      <!-- <input type="hidden" name="package_id" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['package_id'] : '';?>" placeholder="" id="" class="form-control" readonly/> -->
                    </div>
                  </div>
<br/>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for=""><?php echo "No of Video Call"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['package_call'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      
                    </div>

                    <label class="col-sm-2 control-label" for=""><?php echo "Package Date"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['entry_date'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                    </div>
                  </div>

          <br/>


                  <div class="form-group">
                      <label class="col-sm-2 control-label" for=""><?php echo "Package Start date"; ?>
                        
                      </label>

                      <div class="col-sm-4">
                        <input type="text" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['start_date'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                        
                      </div>

                      <label class="col-sm-2 control-label" for=""><?php echo "Package End Date"; ?>
                        
                      </label>    
                      <div class="col-sm-4">
                         <input type="text" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['end_date'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      </div>
                  </div>
        <br/>

                  <div class="form-group">
                     <label class="col-sm-2 control-label" for=""><?php echo "Package duration"; ?></label>
                        <div class="col-sm-4">
                          <input type="text" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['duration'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                        </div>

                     <label class="col-sm-2 control-label" for=""><?php echo "Customer Comment"; ?></label>
                        <div class="col-sm-4">
                        <textarea placeholder="" id="" class="form-control" readonly><?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['comment'] : '';?></textarea>
                        </div>
                  </div>
<br/>
                  <h3 style="text-align: center;">Schedule Customer Call</h3>
                  <div class="form-group">
                  <div class="col-sm-12 ">
                    <table class="table table-bordered">
                          <tr>
                              <th>Call No</th>
                              <th>Date</th>
                              <th>Time</th> 
                              <th>Comment</th> 
                              <th>Video</th> 
                              <th>Status</th>
                              <th style="width:15%;">Action</th>
                          </tr>
                          <?php 
                              $form_id = 1;
                              if(isset($call)){
                              foreach($call as $key => $value){
                              if($scheduler_description[$j]['package_id']==$value['package_id']){
                          ?>  
                          <tr>
                          <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="<?php echo $j;?><?php echo $form_id;?>">
                              <td style="width:100px;">
                                 <input type="text" class="form-control" name="call_no" id="call_no" value="<?php echo $value['call_no']?>" readonly/>
                                 <input type="hidden" name="package_id" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['package_id'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                                 <input type="hidden" name="customer_id" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['customer_id'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                              </td>
                              <td>
                                  <div class="input-group date">
                                    <input type="text" name="date" value="<?php echo $value['date']?>" placeholder="" data-date-format="YYYY-MM-DD" id="date" class="form-control" />
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                  </div>
                              </td>
                               <td>
                                  <div class="input-group time">
                                    <input type="text" name="time" value="<?php echo $value['time']?>" placeholder="" data-date-format="HH:mm" id="time" class="form-control" />
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                    </span>
                                  </div>
                              </td>
                              <td>
                                  <div class="input-group time">
                                    <textarea placeholder="comment for self understanding" id="" name="admin_comment" class="form-control" ><?php echo isset($value['admin_comment']) ? $value['admin_comment'] : '';?></textarea>
                                  </div>
                              </td>
                              <td>
                              
                                   <select class="form-control" name="video_id" id="stat">
                                   <option value="0">Select Video</option> 
                                   <?php foreach($video as $key => $value2){?>
                                      <option value="<?php echo $value2['video_id'];?>" <?php echo ($value2['video_id'] == $value['video_id'])? "selected":""?> ><?php echo $value2['video_name'];?></option>
                                      <<!-- option value="1" <?php echo ($value['status'] == "1")? "selected":""?> >Pending</option>
                                      <option value="2" <?php echo ($value['status'] == "2")? "selected":""?>  >Complete</option>
                                      <option value="3" <?php echo ($value['status'] == "3")? "selected":""?>>Reschedule</option>
                                      <option value="4" <?php echo ($value['status'] == "4")? "selected":""?> >Cancel</option> -->
                                      <?php } ?>
                                  </select>
                              </td>
                              <td>
                                  <select class="form-control" name="status" id="stat">
                                    <option value="" <?php echo ($value['status'] == "")? "selected":""?> >Status</option>
                                    <option value="1" <?php echo ($value['status'] == "1")? "selected":""?>>Pending</option>
                                    <option value="2" <?php echo ($value['status'] == "2")? "selected":""?>>Complete</option>
                                    <option value="3" <?php echo ($value['status'] == "3")? "selected":""?>>Reschedule</option>
                                    <option value="4" <?php echo ($value['status'] == "4")? "selected":""?>>Cancel</option>
                                  </select>
                              </td>
                              <td>
                                <button type="submit" form="<?php echo $j;?><?php echo $form_id; ?>" data-toggle="tooltip" title="Submit New dates" class="btn btn-primary">Submit</button>

                                <button type="button" form="<?php echo $j;?><?php echo $form_id; ?>" data-toggle="tooltip" onclick="call_start('<?php echo $j;?><?php echo $form_id; ?>')" title="Call Start" class="btn btn-primary">Start</button>

                              
                              </td>
                              </form>
                              <?php $form_id++; ?>
                              </tr>
                              <?php } }
                              }?>
                          </tr>
                      </table>
                    </div>
                    </div>
                  </div>


                </div>
                <?php } ?>
              </div>

<?php $flag_con++;
       }

    } ?>
 </div>


           
          </div>
          

<?php endfor;?>
        <!-- </form> -->
      </div>
    </div>
  </div>
<script type="text/javascript">
<?php foreach ($languages as $language) { ?>
$('#input-description<?php echo $language['language_id']; ?>').summernote({
  height: 300
});
<?php } ?>
</script> 
<script type="text/javascript">
$('input[name=\'path\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=scheduler/scheduler/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        json.unshift({
          category_id: 0,
          name: '<?php echo $text_none; ?>'
        });

        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['category_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'path\']').val(item['label']);
    $('input[name=\'parent_id\']').val(item['value']);
  }
});
</script> 
  <script type="text/javascript">
$('input[name=\'filter\']').autocomplete({
  'source': function(request, response) {
    $.ajax({
      url: 'index.php?route=catalog/filter/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response($.map(json, function(item) {
          return {
            label: item['name'],
            value: item['filter_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    $('input[name=\'filter\']').val('');

    $('#category-filter' + item['value']).remove();

    $('#category-filter').append('<div id="category-filter' + item['value'] + '"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="category_filter[]" value="' + item['value'] + '" /></div>');
  }
});

$('#category-filter').delegate('.fa-minus-circle', 'click', function() {
  $(this).parent().remove();
});
</script> 
<script type="text/javascript">
$('#language a:first').tab('show');
</script></div>

<script type="text/javascript">
   $('.date').datetimepicker({
      pickTime: false
    });

    $('.time').datetimepicker({
      pickDate: false
    });

    $('.datetime').datetimepicker({
      pickDate: true,
      pickTime: true
    });
</script>
<script type="text/javascript">
  function call_start(id){
    //alert(id);
    var formData = $("#"+id).serialize();
    //alert(formData);
    //var path = '<?php echo $call_start;?>';
    //alert('index.php?route=scheduler/scheduler/call_start/autocomplete&token=<?php echo $token; ?>');
    $.ajax({
        type:'POST',
        url: 'index.php?route=scheduler/scheduler/call_start/autocomplete&token=<?php echo $token; ?>',
        //dataType: 'json',
        data:formData,
        success:function(resp)
         { 
          // alert(resp);
          // console.log(resp);
          if(resp == 0)
          {
            alert("Somthing goes wrong..!")
          }
          else
          {
            window.open(
                  'http://www.pkfood.in:8443/'+resp+'',
                  '_blank' // <- This is what makes it open in a new window.
                );
          }
        }   
        });
  }
</script>
<?php echo $footer; ?>
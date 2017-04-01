<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-category" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
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
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
  <?php $cnt = COUNT($scheduler_description);?>
<?php for($i=0; $i<$cnt; $i++):?>


          <ul class="nav nav-tabs">

            <?php if($i==0) for($j=0; $j<$cnt; $j++):?>
            <li class="<?php echo ($j==0)?'active':''?>" ><a href="#tab-general_<?php echo $j;?>" data-toggle="tab"><?php echo $scheduler_description[$j]['package_name']; ?></a></li>
          <?php endfor;?>
          </ul>
          <div class="tab-content">
          <?php if($i==0) for($j=0; $j<$cnt; $j++){?>
            <div class="tab-pane " id="tab-general_<?php echo $j;?>">

              <ul class="nav nav-tabs" id="language">
                <?php foreach ($languages as $language) { ?>
                <li><a href="#language<?php echo $j; ?>" data-toggle="tab"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                <?php } ?>
              </ul>

              <div class="tab-content">
                <?php foreach ($languages as $language) { ?>
                <div class="tab-pane active" id="language<?php echo $j; ?>">

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for=""><?php echo "Customer Name"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" name="package_name_<?php echo $j;?>" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['fname'] : '';?> <?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['lname'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      <input type="hidden" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['customer_id'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                    </div>

                    <label class="col-sm-2 control-label" for=""><?php echo "Package Name"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" name="package_name_<?php echo $j;?>" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['package_name'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      <input type="hidden" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['package_id'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for=""><?php echo "No of Video Call"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" name="package_name_<?php echo $j;?>" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['package_call'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      
                    </div>

                    <label class="col-sm-2 control-label" for=""><?php echo "Package Date"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" name="package_name_<?php echo $j;?>" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['entry_date'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for=""><?php echo "Package Start date"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" name="package_name_<?php echo $j;?>" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['start_date'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      
                    </div>

                    <label class="col-sm-2 control-label" for=""><?php echo "Package End Date"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" name="package_name_<?php echo $j;?>" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['end_date'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for=""><?php echo "Package duration"; ?></label>
                    <div class="col-sm-4">
                      <input type="text" name="package_name_<?php echo $j;?>" value="<?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['duration'] : '';?>" placeholder="" id="" class="form-control" readonly/>
                      
                    </div>

                    <label class="col-sm-2 control-label" for=""><?php echo "Customer Comment"; ?></label>
                    <div class="col-sm-4">
                    <textarea placeholder="" id="" class="form-control" readonly><?php echo isset($scheduler_description[$j]) ? $scheduler_description[$j]['comment'] : '';?></textarea>
                    
                    </div>
                  </div>
                  <h3 style="text-align: center;">Schedule Customer Call</h3>
                  <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-1">
                    <table class="table table-bordered">
                          <tr>
                              <th>Call No</th>
                              <th>Date</th>
                              <th>Time</th> 
                              <th>Status</th>
                          </tr>
                          <?php 
                              $call = $scheduler_description[$j]['package_call'];

                              for($t=1; $t<=$call; $t++){
                          ?>
                          <tr id="">
                              <td style="width:100px;">
                                 <input type="text" class="form-control" id=" call_no" value="<?php echo $t?>" readonly/>
                              </td>
                              <td>
                                  <div class="input-group date">
                                    <input type="text" name="date_available" value="<?php echo ''; ?>" placeholder="<?php echo '';?>" data-date-format="YYYY-MM-DD" id="input-date-available" class="form-control" />
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                  </div>
                              </td>
                               <td>
                                    <div class="input-group time">
                                      <input type="text" name="" value="" placeholder="" data-date-format="HH:mm" id="" class="form-control" />
                                      <span class="input-group-btn">
                                      <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                      </span>
                                    </div>
                              </td>
                              <td>
                                   <select class="form-control" id="stat">
                                      <option value="">Status</option>
                                      <option value="0">Pending</option>
                                      <option value="1">Confirm</option>
                                      <option value="2">Reschedule</option>
                                      <option value="3">Cancel</option>
                                  </select>
                              </td>
                              </tr>
                              <?php }?>
                          </tr>
                      </table>
                    </div>
                    </div>
                  </div>


                </div>
                <?php } ?>
              </div>


 </div>

<?php } ?>
           
          </div>
          

<?php endfor;?>
        </form>
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
      url: 'index.php?route=catalog/category/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
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
<?php echo $footer; ?>
<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><!-- <a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>  -->
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-primary" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-category').submit() : false;">Start Session</button>
      </div>
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
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
      <div class="panel-body">
        <div class="well">
          <div class="row">
           <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="input-name"><?php echo "Date From"; ?></label>
                <div class="input-group date">
                  <input type="text" name="date_from" value="" placeholder="<?php echo '';?>" data-date-format="YYYY-MM-DD" id="input-date-available" class="form-control" />
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label" for="input-price"><?php echo "Time From"; ?></label>
                <div class="input-group time">
                  <input type="text" name="time_from" value="" placeholder="" data-date-format="HH:mm" id="" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span>
                </div>
              </div>
              
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="input-model"><?php echo "Date To"; ?></label>
                <div class="input-group date">
                  <input type="text" name="date_to" value="" placeholder="<?php echo '';?>" data-date-format="YYYY-MM-DD" id="input-date-available" class="form-control" />
                  <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                  </span>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label" for="input-quantity"><?php echo "Time To"; ?></label>
                <div class="input-group time">
                  <input type="text" name="time_to" value="" placeholder="" data-date-format="HH:mm" id="" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span>
                </div>
              </div>
            </div> 
            <div class="col-sm-1 col-sm-offset-9 ">
              <!-- <button type="button" id="button-filter" class="btn btn-danger pull-right"><i class="fa fa-search"></i> <?php echo "Reset"; ?></button> -->
              <a href="<?php echo $reset; ?>" data-toggle="tooltip" title="Reset" class="btn btn-default"><i class="fa fa-reply"></i></a>
            </div>
            <div class="col-sm-2">
              <button type="button" id="button-filter" class="btn btn-primary pull-right"><i class="fa fa-search"></i> <?php echo "Filter"; ?></button>
            </div>
          </div>
        </div>
        <form action="<?php echo $call_session_start; ?>" method="post" enctype="multipart/form-data" id="form-category">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-left"><?php if ($sort == 'name') { ?>
                    <a  class=""><?php echo $column_name; ?></a>
                    <?php } else { ?>
                    <a ><?php echo $column_name; ?></a>
                    <?php } ?></td>

                  <td class="text-left">
                    <a >Call No.</a>
                  </td>
                  <td class="text-left">
                    <a >Date</a>
                  </td>
                  <td class="text-left">
                   <a > Time</a>
                  </td>
                    
                  <td class="text-right">
                    <a  class=""><?php echo "Call Status" ?></a>
                    </td>
                  <!-- <td class="text-right"><?php echo $column_action; ?></td> -->
                </tr>
              </thead>
              <tbody>
                <?php if (isset($customer)) { ?>
                <?php foreach ($customer as $customer) { ?>
                <tr>
                  <td class="text-center"><?php if (in_array($customer['sr_no'], $selected)) { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $customer['sr_no']; ?>" checked="checked" />
                    <?php } else { ?>
                    <input type="checkbox" name="selected[]" value="<?php echo $customer['sr_no']; ?>" />
                    <?php } ?></td>
                  <td class="text-left"><?php echo $customer['fname']; ?> <?php echo $customer['lname']; ?></td>
                  
                  <td class="text-right"><?php echo $customer['call_no']; ?></td>
                  <td class="text-right"><?php echo $customer['date']; ?></td>
                  <td class="text-right"><?php echo $customer['time']; ?></td>
                  <td class="text-right"><?php echo $customer['status']; ?></td>
                  <!-- <td class="text-right"><a href="<?php echo $customer['edit']; ?>" data-toggle="tooltip" title="<?php echo "View Customer Call" ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td> -->
                </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="4"><?php echo $text_no_results; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </form>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
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
 <script type="text/javascript"><!--
$('#button-filter').on('click', function() {
  
  url = 'index.php?route=onetomany/onetomany&token=<?php echo $token; ?>';
// alert(url);
  var date_from = $('input[name=\'date_from\']').val();

  if (date_from) {
    url += '&date_from=' + encodeURIComponent(date_from);
  }

  var date_to = $('input[name=\'date_to\']').val();

  if (date_to) {
    url += '&date_to=' + encodeURIComponent(date_to);
  }

  var time_from = $('input[name=\'time_from\']').val();

  if (time_from) {
    url += '&time_from=' + encodeURIComponent(time_from);
  }

  var time_to = $('input[name=\'time_to\']').val();

  if (time_to) {
    url += '&time_to=' + encodeURIComponent(time_to);
  }

  location = url;
});
//--></script>
<?php echo $footer; ?>
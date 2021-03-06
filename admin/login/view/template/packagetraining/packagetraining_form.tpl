<!-- print_r($packagetraining_description[1]['gallery_type_id']);exit; -->
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
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab"><?php echo $tab_general; ?></a></li>
            <li><a href="#tab-data" data-toggle="tab"><?php echo $tab_data; ?></a></li>
            <!-- <li><a href="#tab-design" data-toggle="tab"><?php echo $tab_design; ?></a></li> -->
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
              <ul class="nav nav-tabs" id="language">
                <?php foreach ($languages as $language) { ?>
                <li><a href="#language<?php echo $language['language_id']; ?>" data-toggle="tab"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a></li>
                <?php } ?>
              </ul>
              <div class="tab-content">
                <?php foreach ($languages as $language) { ?>
                <div class="tab-pane" id="language<?php echo $language['language_id']; ?>">

                  <!-- <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_name; ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="packagetraining_description[<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($packagetraining_description[$language['language_id']]) ? $packagetraining_description[$language['language_id']]['name'] : ''; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />
                      <?php if (isset($error_name[$language['language_id']])) { ?>
                      <div class="text-danger"><?php echo $error_name[$language['language_id']]; ?></div>
                      <?php } ?>
                    </div>
                  </div> -->

                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_package_type; ?></label>
                    <div class="col-sm-10">
                      <select name="packagetraining_description[<?php echo $language['language_id']; ?>][package_id]" id="religion" class="form-control">
                      <option value="0">Please Select Program</option>
                      <?php foreach ($package_types as $type) { ?>
                      print_r($packagetraining_description[1][package_id]);exit;
                          <?php if(isset($packagetraining_description[1][package_id]) && $packagetraining_description[1][package_id]== $type['package_id']){ ?>
                          <option value="<?php echo $type['package_id']?>" selected><?php echo $type['package_name']?></option>
                      <?php } else {?>
                          <option value="<?php echo $type['package_id']?>"><?php echo $type['package_name']?></option>
                      <?php } }?>
                       </select>
                       <?php if (isset($error_name[$language['language_id']])) { ?>
                      <div class="text-danger"><?php echo $error_name[$language['language_id']]; ?></div>
                      <?php } ?>
                    </div>
                  </div>


                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_training_type; ?></label>
                    <div class="col-sm-10">
                      <select name="packagetraining_description[<?php echo $language['language_id']; ?>][training_id]" id="religion" class="form-control">
                      <option value="0">Please Select Program</option>
                      <?php foreach ($training_types as $type) { ?>
                      print_r($packagetraining_description[1][training_id]);exit;
                          <?php if(isset($packagetraining_description[1][training_id]) && $packagetraining_description[1][training_id]== $type['training_id']){ ?>
                          <option value="<?php echo $type['training_id']?>" selected><?php echo $type['training_name']?></option>
                      <?php } else {?>
                          <option value="<?php echo $type['training_id']?>"><?php echo $type['training_name']?></option>
                      <?php } }?>
                       </select>
                    </div>
                  </div>

                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_video_type; ?></label>
                    <div class="col-sm-10">
                      <select name="packagetraining_description[<?php echo $language['language_id']; ?>][video_id]" id="religion" class="form-control">
                      <option value="0">Please Select Program</option>
                      <?php foreach ($video_types as $type) { ?>
                      print_r($packagetraining_description[1][video_id]);exit;
                          <?php if(isset($packagetraining_description[1][video_id]) && $packagetraining_description[1][video_id]== $type['video_id']){ ?>
                          <option value="<?php echo $type['video_id']?>" selected><?php echo $type['video_name']?></option>
                      <?php } else {?>
                          <option value="<?php echo $type['video_id']?>"><?php echo $type['video_name']?></option>
                      <?php } }?>
                       </select>
                    </div>
                  </div>


                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
<?php foreach ($languages as $language) { ?>
$('#input-description<?php echo $language['language_id']; ?>').summernote({
  height: 300
});
<?php } ?>
//--></script> 
  <script type="text/javascript"><!--
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
//--></script> 
  <script type="text/javascript"><!--
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
//--></script> 
  <script type="text/javascript"><!--
$('#language a:first').tab('show');
//--></script></div>
<?php echo $footer; ?>
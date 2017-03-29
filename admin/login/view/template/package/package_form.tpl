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
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_name; ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="package_description[<?php echo $language['language_id']; ?>][name]" value="<?php echo isset($package_description[$language['language_id']]) ? $package_description[$language['language_id']]['name'] : ''; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />
                      <input type="hidden" id="package_id" value="<?php echo $package_description[$language['language_id']]['package_id'];?>">
                      
                      <?php if (isset($error_name[$language['language_id']])) { ?>
                      <div class="text-danger"><?php echo $error_name[$language['language_id']]; ?></div>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_1m_amount; ?></label>
                    <div class="col-sm-3">
                      <input type="text" name="package_description[<?php echo $language['language_id']; ?>][package_amount]" value="<?php echo isset($package_description[$language['language_id']]) ? $package_description[$language['language_id']]['package_amount'] : ''; ?>" placeholder="<?php echo $entry_1m_amount; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />
                      <?php if (isset($error_amount[$language['language_id']])) { ?>
                      <div class="text-danger"><?php echo $error_amount[$language['language_id']]; ?></div>
                      <?php } ?>
                    </div>

                    <label class="col-sm-4 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_3m_amount; ?></label>
                    <div class="col-sm-3">
                      <input type="text" name="package_description[<?php echo $language['language_id']; ?>][package_3m_amount]" value="<?php echo isset($package_description[$language['language_id']]) ? $package_description[$language['language_id']]['package_3m_amount'] : ''; ?>" placeholder="<?php echo $entry_3m_amount; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />
                      <?php if (isset($error_3m_amount[$language['language_id']])) { ?>
                      <div class="text-danger"><?php echo $error_3m_amount[$language['language_id']]; ?></div>
                      <?php } ?>
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_6m_amount; ?></label>
                    <div class="col-sm-3">
                      <input type="text" name="package_description[<?php echo $language['language_id']; ?>][package_6m_amount]" value="<?php echo isset($package_description[$language['language_id']]) ? $package_description[$language['language_id']]['package_6m_amount'] : ''; ?>" placeholder="<?php echo $entry_6m_amount; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />
                      <?php if (isset($error_name[$language['language_id']])) { ?>
                      <!-- <div class="text-danger"><?php echo $error_name[$language['language_id']]; ?></div> -->
                      <?php } ?>
                    </div>


                    <label class="col-sm-4 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_1y_amount; ?></label>
                    <div class="col-sm-3">
                      <input type="text" name="package_description[<?php echo $language['language_id']; ?>][package_1y_amount]" value="<?php echo isset($package_description[$language['language_id']]) ? $package_description[$language['language_id']]['package_1y_amount'] : ''; ?>" placeholder="<?php echo $entry_1y_amount; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_package_type; ?></label>
                    <div class="col-sm-3">
                      <select name="package_type" id="input-package_type" class="form-control">
                        <?php if ($package_type == 1) { ?>
                        <option value="1" selected="selected"><?php echo $text_normal; ?></option>
                        <option value="2"><?php echo $text_optional; ?></option>
                        <?php } else { ?>
                        <option value="1"><?php echo $text_normal; ?></option>
                        <option value="2" selected="selected"><?php echo $text_optional; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                     <label class="col-sm-4 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo "Number of One to One Call"; ?></label>
                    <div class="col-sm-3">
                      <input type="text" name="package_description[<?php echo $language['language_id']; ?>][package_call]" value="<?php echo isset($package_description[$language['language_id']]) ? $package_description[$language['language_id']]['package_call'] : ''; ?>" placeholder="<?php echo 'Number of One to One Call'; ?>" id="input-name<?php echo $language['language_id']; ?>" class="form-control" />
                    </div>

                  </div>

                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name<?php echo $language['language_id']; ?>"><?php echo $entry_training_type; ?></label>
                    <div class="col-sm-4">
                      <select id="training_id" class="form-control">
                      <option value="0">Please Select Program</option>
                      <?php foreach ($training_types as $type) { ?>
                          <?php if(isset($packagetraining_description[1][training_id]) && $packagetraining_description[1][training_id]== $type['training_id']){ ?>
                          <option value="<?php echo $type['training_id']?>" selected><?php echo $type['training_name']?></option>
                      <?php } else {?>
                          <option value="<?php echo $type['training_id']?>"><?php echo $type['training_name']?></option>
                      <?php } }?>
                       </select>
                    </div>

                    <div class="col-sm-1" style="background-color:#1e91cf;padding:0.8%" onclick="add_new_training_row()">
                        <a style="color:white;text-align: center; padding-left: 20px;">Add</a>
                    </div>
                  </div>
                  <!-- <div class="col-sm-12" id="training_types_div">                   

                    </div> -->

                    <!-- <div class="col-sm-12"> -->
                    <?php if(!empty($package_training_types)){ 
                        $pack_cnt = 1;
                    ?>
                      <?php foreach ($package_training_types as $types) { ?>
                      <?php if(isset($package_training_types[0]['training_id'])) { ?>
                      <div class="form-group" id="row_id_<?php echo $pack_cnt;?>">
                        <div class="col-sm-4 col-sm-offset-2">
                          <input class="form-control" type="text" value="<?php echo $types['training_name']?>" readonly/>
                          <input class="form-control" type="hidden" name="training_id[]" value="<?php echo $types['training_id']?>" readonly/>
                        </div>
                        <?php $id = $package_description[$language['language_id']]['package_id'];?>
                        <?php $tran_id = $types["training_id"];?>
                        <div class="col-sm-1" style="background-color:#f56b6b;padding:0.8%" onclick="remove_training('<?php echo $id;?>','<?php echo $tran_id;?>','<?php echo $pack_cnt;?>')">
                        <a style="color:white;text-align: center; padding-left: 20px;">Remove</a>
                      </div>
                      </div>
                      <?php } ?>
                      
                    <?php $pack_cnt++; }} ?>
                    <div id="training_types_div">                   

                    </div>

                    
                    
                  

                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-description<?php echo $language['language_id']; ?>"><?php echo $entry_description; ?></label>
                    <div class="col-sm-10">
                      <textarea name="package_description[<?php echo $language['language_id']; ?>][description]" placeholder="<?php echo $entry_description; ?>" id="input-description<?php echo $language['language_id']; ?>" class="form-control"><?php echo isset($package_description[$language['language_id']]) ? $package_description[$language['language_id']]['description'] : ''; ?></textarea>
                    </div>
                  </div>
                  
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="tab-pane" id="tab-data">
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo $entry_image; ?></label>
                <div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo $thumb; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
                  <input type="hidden" name="image" value="<?php echo $image; ?>" id="input-image" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                <div class="col-sm-10">
                  <select name="status" id="input-status" class="form-control">
                    <?php if ($status) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                  </select>
                </div>
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


<script type="text/javascript">
  var data = '';
  //var cnt = '<?php echo $pack_id ?>';
  var cnt = 1;
  function add_new_training_row(){
    var id = $("#training_id").val();
    if(id != 0)
    {
    $.ajax({
        type:'POST',
        url: 'index.php?route=package/package/get_training&token=<?php echo $token; ?>&training_id=' +  encodeURIComponent(id),
        data:'id='+id,
        dataType: 'json',
        success:function(resp)
        {
          ///alert(resp);
          //console.log(resp);
          data += '<div class="form-group" id="row_id_'+cnt+'"><div class="col-sm-4 col-sm-offset-2"><input class="form-control" type="text" value="'+resp.training_name+'" readonly/><input class="form-control" type="hidden" name="training_id[]" value="'+resp.training_id+'" readonly/></div>';
          // data += '<div class="col-sm-2"><button class="btn btn-danger">Remove</div></div>';
          data += '<div class="col-sm-1" style="background-color:#f56b6b;padding:0.8%" onclick="remove_new_training('+cnt+')"> <a style="color:white;text-align: center; padding-left: 20px;">Remove</a></div></div>';
           $("#training_types_div").html(data);
           cnt++;
           $("#training_id").val(0);
        }
      });
    }
    else
    {
      alert("Please Select Training");
    }
  }
</script>
<script type="text/javascript">
  function remove_training(pack_id, training_id,pack_cnt)
  {
    //alert(pack_id);alert(training_id);
    if(pack_id != 0)
    {
      var ans = confirm("Are you sure? You want to delete item.");

      if(ans == true)
      {

      $.ajax({
        type:'POST',
        url: 'index.php?route=package/package/delete_training&token=<?php echo $token; ?>&training_id=' +  encodeURIComponent(training_id),
        data:'pack_id='+pack_id+'&training_id='+training_id,
        
        success:function(resp)
        {
          // alert(resp);
          $("#row_id_"+pack_cnt).remove();
          
        }
      });
    }
    }
  }
  function remove_new_training(id)
  {
    $("#row_id_"+id).remove();
  }

</script>


<?php echo $footer; ?>
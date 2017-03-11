<div id="main"> 
  <div id="main-content">
    <section id="primary" class="content-full-width">
      <div class="dt-sc-hr-invisible-small"></div>
      <div class="dt-sc-hr-invisible-normal"></div>
      <div class="fullwidth-section">
        <div class="container">
          <h3 class="border-title"> <span> Enroll Your Package</span> </h3>
          <form id="confirmPackageForm">
          <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">

                <div id="two" class="">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <fieldset id="account">
                        <legend>Details</legend>     
                        <div class="col-sm-12 col-sm-offset-0 alert_msg"></div>                   
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="input-payment-firstname">Customer Name</label>
                          <input type="text"  placeholder="First Name" id="input-payment-firstname" value="<?php echo (empty($name)?"":$name);?>" class="form-control" readonly>
                          <input type="hidden" name="package_customer_id" id="package_customer_id" value="<?php echo (empty($customer_id)?"":$customer_id);?>" class="form-control" readonly>
                        </div>
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="input-payment-lastname">Package Name</label>
                          <input type="text"  placeholder="First Name" id="package_name" value="<?php echo (empty($package)?"":$package[0]['package_name']);?>" class="form-control" readonly>
                          <input type="hidden" name="package_id" placeholder="First Name" id="package_id" value="<?php echo (empty($package)?"":$package[0]['package_id']);?>" >
                        </div>
                        <div class="row">
                          <div class="form-group col-sm-3">
                            <label class="control-label" for="input-payment-lastname">Package Per Month</label>
                            <input type="text"  placeholder="First Name"  value="<?php echo (empty($package)?"":$package[0]['package_amount']);?>" class="form-control" readonly>
                         </div>
                         <div class="form-group col-sm-3">
                            <label class="control-label" for="input-payment-lastname">Package 3 Month</label>
                            <input type="text"  placeholder="First Name" value="<?php echo (empty($package)?"":$package[0]['package_3m_amount']);?>" class="form-control" readonly>
                         </div>
                         <div class="form-group col-sm-3">
                          <label class="control-label" for="input-payment-lastname">Package 6 Month</label>
                            <input type="text"  placeholder="First Name" value="<?php echo (empty($package)?"":$package[0]['package_6m_amount']);?>" class="form-control" readonly>
                        </div>
                        <div class="form-group col-sm-3">
                          <label class="control-label" for="input-payment-lastname">Package Per Year</label>
                            <input type="text"  placeholder="First Name" value="<?php echo (empty($package)?"":$package[0]['package_1y_amount']);?>" class="form-control" readonly>
                        </div>
                      </div>
                        <div class="form-group required col-sm-6" style="">
                          <label class="control-label" for="input-payment-country">Duration</label>
                          <select name="package_duration" id="package_duration" class="form-control" onchange="showDate()">
                            <option value="">Please Select</option>
                            <option value="1">1 Month</option>
                            <option value="3">3 Month</option>
                            <option value="6">6 Month</option>
                            <option value="12">1 Year</option>
                          </select>
                        </div>
                        <div class="form-group required col-sm-3 durationDate" style="display: none;">
                          <label class="control-label" for="input-payment-lastname">Start Date</label>
                          
                          <input type="text" data-date-format="dd-mm-yyyy" id="package_stratDate" name="package_stratDate" value="" class="date-picker"/>
                       
                        </div>
                        <div class="form-group required col-sm-3 durationDate" style="display: none;">
                          <label class="control-label" for="input-payment-lastname">End Date</label>
                          <input type="text" name="package_endDate" placeholder="End Date" id="package_endDate" class="form-control" readonly>
                        </div>
                        <div class="row dt-sc-buy-now col-sm-12 " >
                        <p><strong>Add Comments About Your Package</strong></p>
                        <p>
                          <textarea name="package_comment" rows="5" class="form-control"></textarea>
                        </p>
                        </div>
                         <div class="row dt-sc-buy-now col-sm-2 col-sm-offset-5"  onclick="confirmPackage()">
                              <a class="dt-sc-button medium" target="_blank" data-hover="Submit">Submit</a>
                        </div>
                      
                     </fieldset>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
     </section>
  </div>
</div>
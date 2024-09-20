<style>
    .admin_package {
  height: 60vh;
  overflow: scroll;
}

.sticky-div {
  position: relative;
  top: 0;
  bottom: 30px;
  background-color: #0000;
  padding: 10px; 
  z-index: 100; 
}
    </style>
<section id="content">
   <div class="container"> 
        <div class="tile">
            <div class="t-header">
                <div class="th-title"><?php echo "(".CURRENCY_SYMBOL.$employee_budget." ".lang('budget').") ".$client_name." - ".lang('set_shop'); ?></div>
            </div>
            <div class="t-body tb-padding">
                <div role="tabpanel">
                    <ul class="tab-nav tab-nav-right" role="tablist">
                        <li  class="active"><a href="#under" aria-controls="under" role="tab" data-toggle="tab" aria-expanded="false"><?php echo lang('under_the_budget'); ?> (<?php echo addZero($under_the_budget_products['data']['total_records']); ?>)</a></li>
                        <li role="presentation" class=""><a href="#within" aria-controls="within" role="tab" data-toggle="tab" aria-expanded="false"><?php echo lang('within_the_budget'); ?> (<?php echo addZero($within_the_budget_products['data']['total_records']+@$packages['data']['total_records']); ?>)</a></li>
                        <li role="presentation"><a href="#above" aria-controls="above" role="tab" data-toggle="tab" aria-expanded="true"><?php echo lang('above_the_budget'); ?> (<?php echo addZero($above_the_budget_products['data']['total_records']); ?>)</a></li>
                    </ul>
                    <input type="hidden" name="user_guid" value="<?php echo $user_guid; ?>">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="under">
                            <div class="admin_package">
                            <div class="row">
                                <?php if($under_the_budget_products['data']['total_records']) { foreach($under_the_budget_products['data']['records'] as $product) { ?>
                                    <div class="col-sm-6 col-md-3" data-product="<?php echo $product['product_guid']; ?>">
                                        <div class="thumbnail">
                                            <img src="<?php echo $product['product_main_photo']; ?>" alt="product" class="img-responsive">
                                            <div class="caption">
                                                <h4><?php echo $product['category_name']; ?> - <?php echo $product['product_name']; ?></h4>
                                                <p><?php echo CURRENCY_SYMBOL."".$product['min_price']."-".$product['max_price']; ?></p>
                                                <div class="clearfix"></div>
                                                <div class="m-t-10">
                                                    <div class="checkbox cr-alt">
                                                        <label>
                                                            <input type="checkbox" value="<?php echo $product['product_guid']; ?>" name="under_budget_products[]" class="under_budget_products">
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>
                            </div>
                                </div>
                            <?php if($under_the_budget_products['data']['total_records']) { ?>
                                <div class="sticky-div">
                                <center><button class="btn btn-success create-package col-sm-6 col-md-3" type="button"><?php echo lang('create_package'); ?></button></center>
</div>
                                
                            <?php } ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="within">
                            <div class="admin_package">
                            <div class="row">
                                <?php if($within_the_budget_products['data']['total_records']) { foreach($within_the_budget_products['data']['records'] as $product) { ?>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="thumbnail">
                                            <img src="<?php echo $product['product_main_photo']; ?>" alt="product" class="img-responsive">
                                            <div class="caption">
                                                <h4><?php echo $product['category_name']; ?> - <?php echo $product['product_name']; ?></h4>
                                                <p><?php echo CURRENCY_SYMBOL."".$product['min_price']."-".$product['max_price']; ?></p>
                                                <div class="clearfix"></div>
                                                <div class="m-t-10" style="display: flex;">
                                                    <div class="checkbox cr-alt">
                                                        <label>
                                                            <input type="checkbox" value="<?php echo $product['product_guid']; ?>" name="within_budget_products[]" class="within_budget_products" <?php if(!empty($product['shop_product_info']['shop_product_id'])) {echo "checked";} ?>>
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                    <div style="cursor:pointer;" class="m-r-5"><i class="heart fa <?php if($product['shop_product_info']['client_status'] == 'Liked') {echo "fa-heart";} else {echo "fa-heart-o";} ?>" ></i></div>
                                                </div>
                                                <div class="m-t-10" style="display: flex;">
                                                    <div class="form-group">
                                                        <label><?php echo lang('quantity'); ?></label>                                                            
                                                        <input type="number" min="1" class="form-control validate-no within_budget_product_quantities" value="<?php echo @$product['shop_product_info']['quantity']; ?>" name="within_budget_product_quantities[]" placeholder="<?php echo lang('quantity'); ?>" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>
                            </div>
                            <?php if($packages['data']['total_records']) { ?>
                                <hr/>
                                <div class="row">
                                    <div class="col-12 w-100 t-header">
                                        <div class="th-title"><?php echo lang('packages'); ?> (<?php echo addZero($packages['data']['total_records']); ?>)</div>
                                    </div>
                                    <?php foreach($packages['data']['records'] as $package) { ?>
                                        <div class="col-xs-6 col-md-3">
                                            <div class="thumbnail">
                                                <div class="images">
                                                    <?php foreach($package['products']['data']['records'] as $product) { ?>
                                                        <img src="<?php echo $product['product_main_photo']; ?>" alt="product" class="img-responsive">
                                                    <?php } ?>
                                                </div>
                                                <div class="caption">
                                                    <h4 title="<?php echo $package['no_of_products']." ".lang('products'); ?>"><?php echo $package['package_name']; ?> (<?php echo addZero($package['no_of_products']); ?>)</h4>
                                                    <p><?php echo lang('quantity').": ".$package['quantity']; ?></p>
                                                    <div class="clearfix"></div>
                                                    <div class="m-t-10" style="display: flex;">
                                                       
                                                        <div style="cursor:pointer;" class="m-r-5"><i class="heart fa <?php if($package['client_status'] == 'Liked') {echo "fa-heart";} else {echo "fa-heart-o";} ?>" ></i></div>
                                                         <div style="cursor:pointer;font-size:25px;" onclick="showConfirmationBox('<?php echo lang('are_you_sure'); ?>','<?php echo lang('are_you_sure_delete'); ?>  <?php echo lang('package'); ?>?','<?php echo lang('yes'); ?>','<?php echo lang('no'); ?>','../delete_package/<?php echo $package['package_guid']; ?>')" title="<?php echo lang('delete'); ?>" class="m-r-10"><i class="fa fa-trash" ></i></div>
                                                         <?php if($product['shop_product_info']['client_status'] != 'Liked'){ ?>
                                                         <div style="cursor:pointer;" class="m-r-5">
                                                            <i class="heart fa fa-edit editpackage" data-id="<?php echo $package['package_guid']; ?>"></i>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                                                    </div>
                            <?php if($within_the_budget_products['data']['total_records']) { ?>
                                <div class="sticky-div">
                                <center><button class="btn btn-success set-shop col-sm-6 col-md-3" type="button"><?php echo lang('set_shop'); ?></button></center>
                            </div>
                                <?php } ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="above">
                             <div class="admin_package">
                            <div class="row">
                                <?php if($above_the_budget_products['data']['total_records']) { foreach($above_the_budget_products['data']['records'] as $product) { ?>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="thumbnail">
                                            <img src="<?php echo $product['product_main_photo']; ?>" alt="product" class="img-responsive">
                                            <div class="caption">
                                                <h4><?php echo $product['category_name']; ?> - <?php echo $product['product_name']; ?></h4>
                                                <p><?php echo CURRENCY_SYMBOL."".$product['min_price']."-".$product['max_price']; ?></p>
                                                <div class="clearfix"></div>
                                                <div class="m-t-10 above-section" style="display: flex;">
                                                    <div class="form-group <?php if(empty($product['shop_product_info']['shop_product_id'])) {echo "hidden";} ?>">
                                                        <input type="number" min="1" class="form-control validate-no additional_prices" value="<?php echo @$product['shop_product_info']['above_budget_price']; ?>" name="additional_price[]" placeholder="<?php echo lang('price')." (".CURRENCY_SYMBOL.") "; ?>" autocomplete="off">
                                                    </div>
                                                    <div class="checkbox cr-alt">
                                                        <label>
                                                            <input type="checkbox" value="<?php echo $product['product_guid']; ?>" name="above_budget_products[]" class="above_budget_products" <?php if(!empty($product['shop_product_info']['shop_product_id'])) {echo "checked";} ?>>
                                                            <i class="input-helper"></i>
                                                        </label>
                                                    </div>
                                                    <div style="cursor:pointer;" class="m-r-5"><i class="heart fa <?php if($product['shop_product_info']['client_status'] == 'Liked') {echo "fa-heart";} else {echo "fa-heart-o";} ?>" ></i></div>
                                                </div>
                                                <div class="m-t-10" style="display: flex;">
                                                    <div class="form-group">
                                                        <label><?php echo lang('quantity'); ?></label>
                                                        <input type="number" min="1" class="form-control validate-no above_budget_product_quantities" value="<?php echo @$product['shop_product_info']['quantity']; ?>" name="above_budget_product_quantities[]" placeholder="<?php echo lang('quantity'); ?>" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>
                            </div>
                                </div>
                            <?php if($above_the_budget_products['data']['total_records']) { ?>
                                <div class="sticky-div">
                                <center><button class="btn btn-success set-shop col-sm-6 col-md-3" type="button"><?php echo lang('set_shop'); ?></button></center>
                            </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Package View -->
<div class="modal" id="view_package" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-cyan m-b-20"> 
                <button type="button" class="close white-clr" data-dismiss="modal">X</button>
                <h4 class="modal-title white-clr"><?php echo lang('create_package'); ?></h4>
            </div>
            <div class="modal-body">               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo lang('package_name'); ?></label>
                            <input type="text" class="form-control" name="package_name" placeholder="<?php echo lang('package_name'); ?>" maxlength="150" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo lang('quantity'); ?></label>
                            <input type="number" min="1" class="form-control validate-no" name="quantity" placeholder="<?php echo lang('quantity'); ?>" maxlength="10" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="control-label"><?php echo lang('description'); ?></label>
                        <textarea class="form-control" id="package-description" rows="3"></textarea>
                    </div>
                </div> 
                <hr> 
                <div class="row package-products">

                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-primary submit-package"><?php echo lang('submit'); ?></button>
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
            
        </div>
    </div>

</div>
</div>

<div class="modal" id="edit_package1" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <form id="update-packakge"  method="post"  action="<?php echo base_url() ?>admin/clients/update-package" >
    <input type="hidden" id="user_token" value="<?php echo $this->input->get('token'); ?>" name="user_token">
    <input type="hidden" id="guid" value="" name="guid">
    <input type="hidden" id="type" value="update" name="type">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-cyan m-b-20"> 
                <button type="button" class="close white-clr" data-dismiss="modal">X</button>
                <h4 class="modal-title white-clr"><?php echo lang('create_package'); ?></h4>
            </div>
            <div class="modal-body">               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo lang('package_name'); ?></label>
                            <input type="text" class="form-control" id="package_name" name="package_name" placeholder="<?php echo lang('package_name'); ?>" maxlength="150" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo lang('quantity'); ?></label>
                            <input type="number" min="1" class="form-control validate-no" id="package_amount" name="quantity" placeholder="<?php echo lang('quantity'); ?>" maxlength="10" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="control-label"><?php echo lang('description'); ?></label>
                        <textarea class="form-control" id="package_description" name="package_description"  rows="3"></textarea>
                    </div>
                </div> 
                <hr> 
                <div class="row package-products">

                </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary submit-package1"><?php echo lang('submit'); ?></button>
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
            
        </div>
    </div>
    </form>
</div>
</div>

<!-- <div class="modal" id="edit_package1" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-cyan m-b-20">
                <button type="button" class="close white-clr" data-dismiss="modal">X</button>
                <h4 class="modal-title white-clr">
                    <?php echo lang('create_package'); ?>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label">
                                <?php echo lang('package_name'); ?>
                            </label>
                            <input type="text" class="form-control" name="package_name"
                                placeholder="<?php echo lang('package_name'); ?>" maxlength="150" autocomplete="off">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row package-products">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary submit-package">
                    <?php echo lang('submit'); ?>
                </button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                    <?php echo lang('close'); ?>
                </button>
            </div>
        </div>
    </div>
</div> -->
<!-- Include jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- Include Bootstrap JS (Bootstrap 4/5) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

<script>
$(document).ready(function() {
    // Event listener for click
    let api_url = "<?php echo ADMIN_API_URL; ?>";
    $('.editpackage').on('click', function() {
        console.log(api_url);
        var dataId = $(this).data('id');
        console.log(dataId);
        // AJAX request
        $.ajax({
            url: api_url + 'clients/create_package',
            type: 'POST',
            data: { package_id: dataId, type: "edit" },
            beforeSend: function (xhr) {
                ajaxindicatorstart();
                xhr.setRequestHeader('Accept', 'application/vvv.website+json;version=1');
                xhr.setRequestHeader('Authorization', get_login_session_key());
            },
            success: function(response) {
                console.log('Success:', response); 
                ajaxindicatorstop();
                $("#package_name").val(response.data[0].package_name);
                $("#package_amount").val(response.data[0].quantity);
                $("#package_description").val(response.data[0].package_description);
                $("#guid").val(response.data[0].package_guid);
                $("#type").val('update');
                $("#edit_package1").modal("show");
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);  // Log the error response
                console.error('Status:', status);  // Log the error status
                console.error('Error:', error);    // Log the error object
                alert('An error occurred. Please check the console for details.');
            }
        });
    });
});
</script>

<!-- <script>
   $(document).ready(function() {

    $(document).on('click', '.editpackage', function(e) {
        e.preventDefault();
      alert("Test");
        //let id = $(this).data('id');
       // alert(id);
        // Get the data-id from the clicked button
        var dataId = $(this).data('id');
        
        $.ajax({
            url: ADMIN_API_URL + "clients/getdata",
            // url: 'get-data',  // For CodeIgniter 3
            type: 'POST',
            data: {
                id: dataId,
                <?php //csrf_token(); ?>: '<?php //csrf_hash(); ?>'  // CSRF protection in CodeIgniter 4
            },
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    console.log(response.data);
                    alert("Data fetched successfully!");
                } else {
                    console.log(response.message);
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert("An error occurred!");
            }
        });
    });
});
</script> -->
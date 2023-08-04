<style>
     .popup-cropped-image , .crop-popup-image , #old_popup_image, #popup_image,
     .banner-cropped-image , .crop-banner-image , #old_banner_image , #banner_image{
        display: none;
    }


    .crop-popup-image , .try-another-popup , .crop-banner-image , .try-another-banner {
        background: #00BCD4;
        color: white;
        margin: 20px 10px;
    }
</style>

<section id="content">
    <div class="container">
        <div class="tile">
            <div class="t-header">
                <div class="th-title"><?php echo lang('edit_client'); ?></div>
            </div>
            <div class="t-body tb-padding">
                <form role="form" method="post" class="edit-client-form" enctype="multipart/form-data">
                    <input type="hidden" name="user_guid" value="<?php echo $details['user_guid']; ?>">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('company_name'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $details['client_configs']['company_name'];?>" name="company_name" placeholder="<?php echo lang('company_name'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('contact_name'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $details['client_configs']['contact_name'];?>" name="contact_name" placeholder="<?php echo lang('contact_name'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('contact_number'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $details['client_configs']['contact_number'];?>" name="contact_number" placeholder="<?php echo lang('contact_number'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('employee_budget'); ?> (<?php echo CURRENCY_SYMBOL; ?>)</label>
                                <input type="text" class="form-control validate-no" value="<?php echo $details['employee_budget'];?>" readonly placeholder="<?php echo lang('employee_budget'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('client')." ".lang('first_name'); ?></label>
                                <input type="text" value="<?php echo $details['first_name'];?>" class="form-control" name="first_name" placeholder="<?php echo lang('first_name'); ?>" maxlength="30" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('client')." ".lang('last_name'); ?></label>
                                <input type="text" value="<?php echo $details['last_name'];?>" class="form-control" name="last_name" placeholder="<?php echo lang('last_name'); ?>" maxlength="30" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('email_address'); ?></label>
                                <input type="email" class="form-control" readonly="" value="<?php echo $details['email'];?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('password'); ?></label>
                                <input type="text" class="form-control" name="password" placeholder="<?php echo lang('password'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('shop_title'); ?></label>
                                <input type="text" class="form-control" name="shop_title" value="<?php echo $details['client_configs']['shop_title'];?>" placeholder="<?php echo lang('shop_title'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('theme_color'); ?></label>
                                <input type="color" class="form-control" name="theme_color" value="<?php echo $details['client_configs']['theme_color'];?>" placeholder="<?php echo lang('theme_color'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('delivery_method'); ?></label>
                                <select class="form-control chosen-select" name="delivery_method">
                                    <option value=""><?php echo lang('delivery_method'); ?></option>
                                    <option value="Pickup" <?php if($details['delivery_method'] == "Pickup") echo "selected"; ?>><?php echo lang('pickup'); ?></option>
                                    <option value="Door to Door" <?php if($details['delivery_method'] == "Door to Door") echo "selected"; ?>><?php echo lang('door_to_door'); ?></option>
                                    <option value="Both" <?php if($details['delivery_method'] == "Both") echo "selected"; ?>><?php echo lang('both'); ?> (<?php echo lang('pickup')." & ".lang('door_to_door'); ?>)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('select_status'); ?></label>
                                <select class="form-control chosen-select" name="user_status">
                                    <option  value=""><?php echo lang('select_status'); ?></option>
                                    <option <?php if($details['user_status'] == "Pending") echo "selected"; ?> value="Pending"><?php echo lang('pending'); ?></option>
                                    <option <?php if($details['user_status'] == "Verified") echo "selected"; ?> value="Verified"><?php echo lang('verified'); ?></option>
                                    <option <?php if($details['user_status'] == "Blocked") echo "selected"; ?> value="Blocked"><?php echo lang('blocked'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('deadline'); ?></label>
                                <input type="text" id="deadline" class="form-control" name="deadline" placeholder="<?php echo lang('deadline'); ?>" value="<?php echo $details['deadline'];?>" autocomplete="off">
                            </div>
                        </div> 
                        

                        <input type="hidden" name="old_company_logo" value="<?php echo $details['client_configs']['company_logo']; ?>">
                        <div class="col-sm-3">
                            <label class="control-label"><?php echo lang('company_logo'); ?></label><br/>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;">
                                <img src="<?php echo base_url().'uploads/company/'.$details['client_configs']['company_logo']; ?>" class="img-responsive"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new"><?php echo lang('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo lang('change'); ?></span>
                                        <input type="hidden" value=""><input type="file" name="company_logo">
                                    </span>
                                    <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><?php echo lang('remove'); ?></a>
                                </div>
                            </div>
                        </div>

                        <!-- upload popup image -->

                        <!-- <input type="hidden" name="old_popup_image" value="<?php echo $details['client_configs']['popup_image']; ?>">
                        <div class="col-sm-2">
                            <label class="control-label"><?php echo lang('popup_image'); ?></label><br/>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;">
                                <img src="<?php echo base_url().'uploads/company/'.$details['client_configs']['popup_image']; ?>" class="img-responsive"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new"><?php echo lang('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo lang('change'); ?></span>
                                        <input type="hidden" value=""><input type="file" name="popup_image">
                                    </span>
                                    <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><?php echo lang('remove'); ?></a>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-sm-3">
                            <div class="row popup-cropper-row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="control-label"><?php echo lang('popup_image'); ?></label>
                                    <div>
                                        <img class="popup-main-image" src="<?php echo base_url().'uploads/company/'.$details['client_configs']['popup_image']; ?>" alt="" >
                                        <img class="popup-cropped-image" src="" alt="" >
                                        <div>
                                            <button type="button" class="btn crop-popup-image">Crop Image</button>
                                            <button type="button" class="btn try-another-popup">Try Another</button>
                                        </div>
                                        <input type="file" name="popup_image" id="popup_image" accept="image/*"/>
                                        <input type="hidden" name="old_popup_image" id="old_popup_image" value="<?=$details['client_configs']['popup_image']?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        

                        <!-- end  -->

                        <!-- upload banner image -->
                        <div class="col-sm-3">
                            <div class="row banner-cropper-row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="control-label"><?php echo lang('banner_image'); ?></label>
                                    <div>
                                        <img class="banner-main-image" src="<?php echo base_url().'uploads/company/'.$details['client_configs']['banner_image']; ?>" alt="" >
                                        <img class="banner-cropped-image" src="" alt="" >
                                        <div>
                                            <button type="button" class="btn crop-banner-image">Crop Image</button>
                                            <button type="button" class="btn try-another-banner">Try Another</button>
                                        </div>
                                        <input type="file" name="banner_image" id="banner_image" accept="image/*"/>
                                        <input type="hidden" name="old_banner_image" id="old_banner_image" value="<?=$details['client_configs']['banner_image']?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- upload banner image ends here -->

                        <div class="col-sm-8 pickup-address-section <?php if($details['delivery_method'] == 'Door to Door') {echo "hidden"; } ?>">
                            <label class="control-label"><?php echo lang('pickup_addresses'); ?></label><br/>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pickup_addresses[]" placeholder="<?php echo lang('pickup_addresses'); ?>" maxlength="500" autocomplete="off" value="<?php echo @$details['pickup_addresses'][0]['pickup_address']; ?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="javascript:void(0);" style="width:80px;" class="btn btn-primary add-more-address"><?php echo lang('add_more'); ?></a>
                                    </div>
                                </div>
                            <div class="more-pickup-address">
                                <?php 
                                if($details['pickup_addresses'] != NULL && $details['pickup_addresses'] != null){
                                    $address_length = (count($details['pickup_addresses']) >= 4) ? count($details['pickup_addresses']) : 4;
                                   
                                    for ($i=1; $i < $address_length; $i++) { ?>
                                        <div class="row m-t-10"><div class="col-sm-8"><input type="text" class="form-control" name="pickup_addresses[]" placeholder="<?php echo lang('pickup_addresses'); ?>" maxlength="500" autocomplete="off" value="<?php echo @$details['pickup_addresses'][$i]['pickup_address']; ?>"></div><div class="col-sm-4"><a href="javascript:void(0);" style="width:80px;" class="btn btn-danger remove-address"><?php echo lang('remove'); ?></a></div></div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 text-center m-t-20">
                            <button class="btn btn-primary client-edit" ><?php echo lang('submit'); ?></button>
                             <button type="button" class="btn btn-danger" onclick="window.location.href='list'"><?php echo lang('cancel'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    var popupCropper;
    var bannerCropper;
        
    // popup script starts here
    $(document).on("input" , "#popup_image" , function(e){
        let element = e.target;
        let file = element.files[0];
        let reader = new FileReader();
        let mainImage = document.querySelector(".popup-main-image");
        let mainCropBtn = document.querySelector(".crop-popup-image");
        reader.onload = function(){
            mainImage.setAttribute('src' , reader.result );
            mainImage.style.display = "block";
            popupCropper = new Cropper(mainImage , {
                viewMode: 1,
                aspectRatio: 1,
            })
        }

        reader.readAsDataURL(file);

        this.style.display = "none";

        mainCropBtn.style.display = "block";
      })

                               


      $(document).on("click" , ".crop-popup-image" , function(e){
        let element = e.target.classList.contains("crop-popup-image") ? e.target : e.target.closest(".crop-popup-image");
        let mainCropData =  popupCropper.getCropBoxData();
        let mainInputFile = document.getElementById("popup_image");
        let mainCroppedImage = document.querySelector(".popup-cropped-image");
        let mainImage = document.querySelector(".popup-main-image");
        let tryAnother= document.querySelector(".try-another-popup");

        if (mainCropData.width > 0 && mainCropData.height > 0) {
            let canvas = popupCropper.getCroppedCanvas(); 
        
            let url = canvas.toDataURL('image/jpeg', 0.92);

            let blob = dataURLtoBlob(url);

            let timestamp = new Date().getTime();

            let fileName = `${timestamp}_popup_cropped_image.jpg`;

            let file = new File([blob], fileName , { type: 'image/jpeg' });

            let dataTransfer = new DataTransfer();

            dataTransfer.items.add(file);

            mainInputFile.files = dataTransfer.files;

            mainCroppedImage.setAttribute("src" , url);

            mainCroppedImage.style.display = "block";

            mainImage.setAttribute("src" , "");

            mainImage.style.display ="none";

            popupCropper.destroy();

            tryAnother.style.display = "block";

            element.style.display = "none";
        }
      })



      $(document).on("click" , ".try-another-popup" , function(e){
        let element = e.target.classList.contains(".try-another-popup") ? e.target : e.target.closest(".try-another-popup");
        let mainInputFile = document.getElementById("popup_image");
        let mainCroppedImage = document.querySelector(".popup-cropped-image");
        let mainImage = document.querySelector(".popup-main-image");

        element.style.display = "none";
        mainImage.setAttribute("src" ,"");
        mainCroppedImage.setAttribute("src","");
        mainCroppedImage.style.display ="none";
        mainImage.style.display ="none";
        mainInputFile.value = "";
        mainInputFile.style.display = "block"
      })




      //banner script starts here
    $(document).on("input" , "#banner_image" , function(e){
        let element = e.target;
        let file = element.files[0];
        let reader = new FileReader();
        let mainImage = document.querySelector(".banner-main-image");
        let mainCropBtn = document.querySelector(".crop-banner-image");
        reader.onload = function(){
            mainImage.setAttribute('src' , reader.result );
            mainImage.style.display = "block";
            bannerCropper = new Cropper(mainImage , {
                viewMode: 1,
                aspectRatio: 1,
            })
        }

        reader.readAsDataURL(file);

        this.style.display = "none";

        mainCropBtn.style.display = "block";
      })

                               


      $(document).on("click" , ".crop-banner-image" , function(e){
        let element = e.target.classList.contains("crop-banner-image") ? e.target : e.target.closest(".crop-banner-image");
        let mainCropData =  bannerCropper.getCropBoxData();
        let mainInputFile = document.getElementById("banner_image");
        let mainCroppedImage = document.querySelector(".banner-cropped-image");
        let mainImage = document.querySelector(".banner-main-image");
        let tryAnother= document.querySelector(".try-another-banner");

        if (mainCropData.width > 0 && mainCropData.height > 0) {
            let canvas = bannerCropper.getCroppedCanvas(); 
        
            let url = canvas.toDataURL('image/jpeg', 0.92);

            let blob = dataURLtoBlob(url);

            let timestamp = new Date().getTime();

            let fileName = `${timestamp}_banner_cropped_image.jpg`;

            let file = new File([blob], fileName , { type: 'image/jpeg' });

            let dataTransfer = new DataTransfer();

            dataTransfer.items.add(file);

            mainInputFile.files = dataTransfer.files;

            mainCroppedImage.setAttribute("src" , url);

            mainCroppedImage.style.display = "block";

            mainImage.setAttribute("src" , "");

            mainImage.style.display ="none";

            bannerCropper.destroy();

            tryAnother.style.display = "block";

            element.style.display = "none";
        }
      })



      $(document).on("click" , ".try-another-banner" , function(e){
        let element = e.target.classList.contains(".try-another-banner") ? e.target : e.target.closest(".try-another-banner");
        let mainInputFile = document.getElementById("banner_image");
        let mainCroppedImage = document.querySelector(".banner-cropped-image");
        let mainImage = document.querySelector(".banner-main-image");

        element.style.display = "none";
        mainImage.setAttribute("src" ,"");
        mainCroppedImage.setAttribute("src","");
        mainCroppedImage.style.display ="none";
        mainImage.style.display ="none";
        mainInputFile.value = "";
        mainInputFile.style.display = "block"
      })


       // Convert data URL to Blob
       function dataURLtoBlob(dataURL) {
            var arr = dataURL.split(',');
            var mime = arr[0].match(/:(.*?);/)[1];
            var bstr = atob(arr[1]);
            var n = bstr.length;
            var u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new Blob([u8arr], { type: mime });
        }


      //popup script ends here
</script>
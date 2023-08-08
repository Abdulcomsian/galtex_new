<style>
    .popup-main-image , .popup-cropped-image , .crop-popup-image , .try-another-popup , 
    .banner-main-image , .banner-cropped-image , .crop-banner-image , .try-another-banner{
        display: none;
    }

    .crop-popup-image , .try-another-popup , .crop-banner-image , .try-another-banner {
        background: #00BCD4;
        color: white;
        margin: 20px 10px;
        display: none;
    }
</style>


<section id="content">
    <div class="container"> 
        <div class="tile">
            <div class="t-header">
                <div class="th-title"><?php echo lang('add_new_client'); ?></div>
            </div>
            <div class="t-body tb-padding">
                <form role="form" method="post" class="add-new-client-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('company_name'); ?></label>
                                <input type="text" class="form-control" name="company_name" placeholder="<?php echo lang('company_name'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('contact_name'); ?></label>
                                <input type="text" class="form-control" name="contact_name" placeholder="<?php echo lang('contact_name'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('contact_number'); ?></label>
                                <input type="text" class="form-control" name="contact_number" placeholder="<?php echo lang('contact_number'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('employee_budget'); ?> (<?php echo CURRENCY_SYMBOL; ?>)</label>
                                <input type="number" class="form-control validate-no" name="employee_budget" placeholder="<?php echo lang('employee_budget'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <!-- <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php //echo lang('client')." ".lang('first_name'); ?></label>
                                <input type="text" class="form-control" name="first_name" placeholder="<?php //echo lang('first_name'); ?>" maxlength="30" autocomplete="off">
                            </div>
                        </div> -->
                            <!-- <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label"><?php //echo lang('client')." ".lang('last_name'); ?></label>
                                    <input type="text" class="form-control" name="last_name" placeholder="<?php //echo lang('last_name'); ?>" maxlength="30" autocomplete="off">
                                </div>
                            </div> -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('email_address'); ?></label>
                                <input type="email" class="form-control" name="email" placeholder="<?php echo lang('email_address'); ?>" maxlength="250" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('password'); ?></label>
                                <input type="text" class="form-control" name="password" placeholder="<?php echo lang('password'); ?>" autocomplete="off" value="<?php echo mt_rand(); ?>">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"><?php //echo lang('shop_title'); ?></label>
                                <input type="text" class="form-control" name="shop_title" placeholder="<?php //echo lang('shop_title'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php //echo lang('theme_color'); ?></label>
                                <input type="color" class="form-control" name="theme_color" placeholder="<?php //echo lang('theme_color'); ?>" autocomplete="off">
                            </div>
                        </div> -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('delivery_method'); ?></label>
                                <select class="form-control chosen-select" name="delivery_method">
                                    <option value=""><?php echo lang('delivery_method'); ?></option>
                                    <option value="Pickup"><?php echo lang('pickup'); ?></option>
                                    <option value="Door to Door"><?php echo lang('door_to_door'); ?></option>
                                    <option value="Both"><?php echo lang('both'); ?> (<?php echo lang('pickup')." & ".lang('door_to_door'); ?>)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('deadline'); ?></label>
                                <input type="datetime-local" id="deadline" class="form-control" name="deadline" placeholder="<?php echo lang('deadline'); ?>" min="<?= date('Y-m-d\TH:i') ?>" autocomplete="off">


                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label class="control-label"><?php echo lang('company_logo'); ?></label><br/>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px; border:1px solid #cfcfcf"></div>
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

                           <!-- POPUP START -->
                        <div class="col-sm-2">
                            <label class="control-label"><?php echo lang('popup_image'); ?></label><br/>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new"><?php echo lang('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo lang('change'); ?></span>
                                        <input type="hidden" value=""><input type="file" name="popup_image">
                                    </span>
                                    <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><?php echo lang('remove'); ?></a>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="row popup-cropper-row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="control-label"><?php //echo lang('popup_image'); ?></label>
                                <div>
                                    <img class="popup-main-image" src="" alt="" >
                                    <img class="popup-cropped-image" src="" alt="" >
                                    <button type="button" class="btn crop-popup-image">Crop Image</button>
                                    <button type="button" class="btn try-another-popup">Try Another</button>
                                    <input type="file" name="popup_image" id="popup_image" accept="image/*"/>
                                </div>
                            </div>
                        </div> -->



                        <!-- POPUP END -->

                        <!-- banner starts here -->
                        <div class="col-sm-12">
                            <div style="display: flex;">
                                <div class="mx-2">
                                    <label class="control-label"><?php echo lang('banner_image'); ?></label><br/>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new"><?php echo lang('select_image'); ?></span>
                                                <span class="fileinput-exists"><?php echo lang('change'); ?></span>
                                                <input type="hidden" value=""><input type="file" name="banner_image">
                                            </span>
                                            <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><?php echo lang('remove'); ?></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mx-2">
                                    <label class="control-label"><?php echo lang('mobile_cover_image'); ?></label><br/>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-info btn-file">
                                                <span class="fileinput-new"><?php echo lang('select_image'); ?></span>
                                                <span class="fileinput-exists"><?php echo lang('change'); ?></span>
                                                <input type="hidden" value=""><input type="file" name="cover_image">
                                            </span>
                                            <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><?php echo lang('remove'); ?></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!-- <div class="row banner-cropper-row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="control-label"><?php echo lang('banner_image'); ?></label>
                                <div>
                                    <img class="banner-main-image" src="" alt="" >
                                    <img class="banner-cropped-image" src="" alt="" >
                                    <button type="button" class="btn crop-banner-image">Crop Image</button>
                                    <button type="button" class="btn try-another-banner">Try Another</button>
                                    <input type="file" name="banner_image" id="banner_image" accept="image/*"/>
                                </div>
                            </div>
                        </div> -->

                        <!-- banner ends here -->


                        <div class="col-sm-8 pickup-address-section hidden">
                            <label class="control-label"><?php echo lang('pickup_addresses'); ?></label><br/>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pickup_addresses[]" placeholder="<?php echo lang('pickup_address'); ?>" maxlength="500" autocomplete="off">
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="javascript:void(0);" style="width:80px;" class="btn btn-primary add-more-address"><?php echo lang('add_more'); ?></a>
                                    </div>
                                </div>
                            <div class="more-pickup-address">
                                <div class="row m-t-10"><div class="col-sm-8"><input type="text" class="form-control" name="pickup_addresses[]" placeholder="<?php echo lang('pickup_address'); ?>" maxlength="500" autocomplete="off"></div><div class="col-sm-4"><a href="javascript:void(0);" style="width:80px;" class="btn btn-danger remove-address"><?php echo lang('remove'); ?></a></div></div>
                                <div class="row m-t-10"><div class="col-sm-8"><input type="text" class="form-control" name="pickup_addresses[]" placeholder="<?php echo lang('pickup_address'); ?>" maxlength="500" autocomplete="off"></div><div class="col-sm-4"><a href="javascript:void(0);" style="width:80px;" class="btn btn-danger remove-address"><?php echo lang('remove'); ?></a></div></div>
                                <div class="row m-t-10"><div class="col-sm-8"><input type="text" class="form-control" name="pickup_addresses[]" placeholder="<?php echo lang('pickup_address'); ?>" maxlength="500" autocomplete="off"></div><div class="col-sm-4"><a href="javascript:void(0);" style="width:80px;" class="btn btn-danger remove-address"><?php echo lang('remove'); ?></a></div></div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 text-center m-t-20">
                            <button type="submit" class="btn btn-primary client-add" ><?php echo lang('submit'); ?></button>
                            <button type="button" class="btn btn-danger reset-btn"><?php echo lang('reset'); ?></button>
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
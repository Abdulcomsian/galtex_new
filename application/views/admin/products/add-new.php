<style>
    .gallery-image-list{
        margin : 30px 0px;
    }

    .cropper-image{
        max-width : 400px;
    }

    .crop-gallery-image{
        display: none!important;
    }

    img.gallery-item-image {
        width: 200px;
    }

    .product-main-image{
        display: none;
    }

    button.btn.crop-main-image , button.try-another{
        background: #00BCD4;
        color: white;
        margin: 20px 10px;
        display: none;
    }

    .main-cropped-image{
        display: none;
        width: 450px;
    }
</style>
<section id="content">
    <div class="container"> 
        <div class="tile">
            <div class="t-header">
                <div class="th-title"><?php echo lang('add_new_product'); ?></div>
            </div>
            <div class="t-body tb-padding">
                <form class="add-new-product-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('product_name'); ?></label>
                                <input type="text" class="form-control" name="product_name" placeholder="<?php echo lang('product_name'); ?>" maxlength="200" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('select_category'); ?></label>
                                <select class="form-control chosen-select" name="product_category_id">
                                    <option value=""><?php echo lang('select_category'); ?></option>
                                    <?php if($categories['data']['total_records'] > 0) { foreach($categories['data']['records'] as $value) { ?>
                                        <option value="<?php echo $value['category_guid']; ?>"><?php echo $value['category_name']; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('min_price'); ?> (<?php echo CURRENCY_SYMBOL; ?>)</label>
                                <input type="number" min="0" class="form-control validate-no" name="min_price" placeholder="<?php echo lang('min_price'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('max_price'); ?> (<?php echo CURRENCY_SYMBOL; ?>)</label>
                                <input type="number" min="0" class="form-control validate-no" name="max_price" placeholder="<?php echo lang('max_price'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('warranty'); ?></label>
                                <input type="text" class="form-control" name="warranty" placeholder="<?php echo lang('warranty'); ?>" maxlength="200" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('product_descprition'); ?></label>
                                <textarea id="product-description" name="product_descprition" class="form-control" rows="6" placeholder="<?php echo lang('product_descprition'); ?>"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label class="control-label"><?php echo lang('gallery_images'); ?></label><br/>
                            <div id="gallery-items">

                            </div>
                            <div id="gallery-image">

                            </div>
                            <button class="btn add-more-image" type="button" style="background-color: #00bcd4; color:white;">
                                Add Image
                            </button>
                        </div>
                        <!-- <div class="col-sm-12">
                            <label class="control-label"><?php //echo lang('gallery_images'); ?></label><br/>
                            <div id="dZUpload" class="dropzone">
                                <div class="dz-default dz-message" data-dz-message><span><?php //echo lang('drop_gallery_images'); ?></span></div>
                            </div>
                            <p><?php //echo lang('image_dimension'); ?></p>
                            <p style="color:red;"><?php //echo lang('max_4_gallery_images'); ?></p>
                        </div> -->
                        <!-- <div class="col-sm-4">
                            <label class="control-label"><?php //echo lang('main_photo'); ?></label><br/>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new"><?php //echo lang('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php //echo lang('change'); ?></span>
                                        <input type="hidden" value=""><input type="file" name="product_main_photo">
                                    </span>
                                    <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><?php //echo lang('remove'); ?></a>
                                </div>
                            </div>
                        </div> -->


                        <div class="row main-cropper-row">
                            <div class="col-sm-4">
                                <label class="control-label"><?php echo lang('main_photo'); ?></label>
                                <div>
                                    <img class="product-main-image" src="" alt="" >
                                    <img class="main-cropped-image" src="" alt="" >
                                    <button type="button" class="btn crop-main-image">Crop Image</button>
                                    <button type="button" class="btn try-another">Try Another</button>
                                    <input type="file" name="product_main_photo" id="product_main_photo" accept="image/*"/>
                                </div>
                            </div>
                        </div>



                        <div class="form-group col-sm-12 text-center m-t-20">
                            <button type="button" class="btn btn-primary" id="submit-product"><?php echo lang('submit'); ?></button>
                            <button type="button" class="btn btn-danger reset-btn"><?php echo lang('reset'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        
        var cropper = [];
        var mainCropper;

        $("#product-description").summernote({
        placeholder: 'לכתוב תיאור מוצר',
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      $(document).on("click" , ".add-more-image" , function(){
        galleryImageBox = document.querySelector("#gallery-image");
        galleryImageList = galleryImageBox.querySelectorAll(".gallery-image-list");

        if(galleryImageList.length >= 3)
        {
            toastr.error("Only 3 Images Are Allowed For The Gallery");
        }else{
            let html = `<div class="gallery-image-list my-3 mb-3">
                            <input type="file" class="crop-file" accept="image/*">
                        </div>`;
            galleryImageBox.insertAdjacentHTML("beforeend" , html);
        }
      })


    
            $(document).on("change" , ".crop-file" , function(e){
            let element = e.target;
            let file = element.files[0];
            let galleryListBox = element.closest(".gallery-image-list");

            
            let reader = new FileReader();

            reader.onload = function () {

                let randomKey = generateRandomString(10)
                
                let html = `<div class="row">
                                <div class="col-8">
                                    <img class="cropper-image"  src="${reader.result}" alt="Gallery Image">
                                    <button type="button" class="cropButton" data-key="${randomKey}">Crop Image</button>
                                </div>
                            </div>`;

                galleryListBox.insertAdjacentHTML("beforeend" , html);

                galleryListBox.querySelector(".crop-file").remove();

                let cropperImage = galleryListBox.querySelector('.cropper-image');

                currentCropper = new Cropper(cropperImage, {
                        viewMode: 1,
                        aspectRatio: 1,
                    });

                cropper.push( { key : randomKey , cropper:currentCropper} );

            }

            
            reader.readAsDataURL(file);
            
        })


      $(document).on("click" , ".cropButton" , function(e){
        let currentRow =e.target.closest(".row"); 
        let key = e.target.classList.contains(".cropButton") ? e.target.dataset.key : e.target.closest(".cropButton").dataset.key;



        let currentCropper = cropper.find(eachCropper => {
                return key == eachCropper.key;
        })

        let cropData = currentCropper.cropper.getCropBoxData();
       
        // let cropData = cropper[currentIndex].getCropBoxData();
        
        if (cropData.width > 0 && cropData.height > 0) {
            let canvas = currentCropper.cropper.getCroppedCanvas(); 
        
            let url = canvas.toDataURL('image/jpeg', 0.92);
            
            //new code starts here
            let blob = dataURLtoBlob(url);

            let timestamp = new Date().getTime();
            let fileName = `cropped_image.jpg`;

            let file = new File([blob], 'cropped_image.jpg', { type: 'image/jpeg' });

            // Create a FileList object containing the File
            let dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);

            // Create a new input element with the FileList
            let newInput = document.createElement('input');
            newInput.setAttribute('type', 'file');
            newInput.setAttribute('class', 'crop-gallery-image d-none');
            newInput.setAttribute('name', 'product_gallery_images[]');
            newInput.files = dataTransfer.files;
            // <input type="file" class="crop-gallery-image d-none" value="${url}"/>
            //new code ends here
            currentRow.innerHTML ="";
            let html = `<div>
                            <div class="col-8">
                                <img src="${url}" class="gallery-item-image"/>
                            </div>
                            <div class="col-4 image-holder">
                                <button type="button" class="btn btn-danger remove-gallery-item-image" data-key="${currentCropper.key}">Remove Image</button>
                            </div>
                        </div>`;
            currentRow.innerHTML = html;
            currentRow.querySelector(".image-holder").appendChild(newInput);
        }
      })


      $(document).on("click" , ".remove-gallery-item-image" , function(e){
        let element = e.target;
        let key = e.target.classList.contains(".remove-gallery-item-image") ? e.target.dataset.key : e.target.closest(".remove-gallery-item-image").dataset.key;
        let currentIndex = $(".remove-gallery-item-image").index(this);
        element.closest(".gallery-image-list").remove();
        // console.log(cropper);
        let newCropper = cropper.filter(eachCropper => {
            return key != eachCropper.key;
        })
        console.log(newCropper);
        cropper = newCropper

      })
/////////////////////////////////////////////////////////////////////////////////////////////////////////
      $(document).on("input" , "#product_main_photo" , function(e){
        let element = e.target;
        let file = element.files[0];
        let reader = new FileReader();
        let mainImage = document.querySelector(".product-main-image");
        let mainCropBtn = document.querySelector(".crop-main-image");
        reader.onload = function(){
            mainImage.setAttribute('src' , reader.result );
            mainImage.style.display = "block";
            mainCropper = new Cropper(mainImage , {
                viewMode: 1,
                aspectRatio: 1,
            })
        }

        reader.readAsDataURL(file);

        this.style.display = "none";

        mainCropBtn.style.display = "block";
      })


      $(document).on("click" , ".crop-main-image" , function(e){
        let element = e.target.classList.contains("crop-main-image") ? e.target : e.target.closest(".crop-main-image");
        let mainCropData =  mainCropper.getCropBoxData();
        let mainInputFile = document.getElementById("product_main_photo");
        let mainCroppedImage = document.querySelector(".main-cropped-image");
        let mainImage = document.querySelector(".product-main-image");
        let tryAnother= document.querySelector(".try-another");

        if (mainCropData.width > 0 && mainCropData.height > 0) {
            let canvas = mainCropper.getCroppedCanvas(); 
        
            let url = canvas.toDataURL('image/jpeg', 0.92);

            let blob = dataURLtoBlob(url);

            let timestamp = new Date().getTime();

            let fileName = `${timestamp}_main_cropped_image.jpg`;

            let file = new File([blob], fileName , { type: 'image/jpeg' });

            let dataTransfer = new DataTransfer();

            dataTransfer.items.add(file);

            mainInputFile.files = dataTransfer.files;

            mainCroppedImage.setAttribute("src" , url);

            mainCroppedImage.style.display = "block";

            mainImage.setAttribute("src" , "");

            mainImage.style.display ="none";

            mainCropper.destroy();

            tryAnother.style.display = "block";

            element.style.display = "none";
        }
      })


      $(document).on("click" , ".try-another" , function(e){
        let element = e.target.classList.contains(".try-another") ? e.target : e.target.closest(".try-another");
        let mainInputFile = document.getElementById("product_main_photo");
        let mainCroppedImage = document.querySelector(".main-cropped-image");
        let mainImage = document.querySelector(".product-main-image");

        element.style.display = "none";
        mainImage.setAttribute("src" ,"");
        mainCroppedImage.setAttribute("src","");
        mainCroppedImage.style.display ="none";
        mainImage.style.display ="none";
        mainInputFile.value = "";
        mainInputFile.style.display = "block"
      })



      function generateRandomString(length) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const characterCount = characters.length;
        let result = '';

        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characterCount);
            result += characters.charAt(randomIndex);
        }

        return result;
        }

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

    })
</script>

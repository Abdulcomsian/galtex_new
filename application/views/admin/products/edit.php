<style>
    img.gallery-image{
        width: 200px;
        margin: 10px;
    }
    img.thumbnail-image , img.thumnail-cropped-image{
        width: 200px;
        margin: 10px;
    }
    .gallery-items{
        display: flex;
    }

    .gallery-item-box , .thumnail-image-box{
        display: flex;
        flex-direction: column;
    }
    .add-more-gallery-images , .crop-image , .try-another, .thumbnail-crop-image{
        background : #00B3CA;
        color: white;
        border: none;
        font-size: 14px;
        padding: 7px;
        margin :10px;
    }

    button.try-another, button.thumbnail-crop-image{
        max-width: 220px;
    }

    .remove-image{
        max-width: 220px!important;
        margin: 10px;
        padding: 7px;
    } 

    .d-none{
        display: none!important;
    }
    /* .crop-image{
        display: none;
    } */

</style>
<section id="content">
    <div class="container"> 
        <div class="tile">
            <div class="t-header">
                <div class="th-title"><?php echo lang('edit_product'); ?></div>
            </div>
            <div class="t-body tb-padding">
                <form role="form" method="post" class="edit-product-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('product_name'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $details['product_name']; ?>" name="product_name" placeholder="<?php echo lang('product_name'); ?>" maxlength="200" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('select_category'); ?></label>
                                <select class="form-control chosen-select" name="product_category_id">
                                    <option value=""><?php echo lang('select_category'); ?></option>
                                    <?php if($categories['data']['total_records'] > 0) { foreach($categories['data']['records'] as $value) { ?>
                                        <option value="<?php echo $value['category_guid']; ?>" <?php if($value['category_guid'] == $details['category_guid']) {echo "selected";} ?>><?php echo $value['category_name']; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('min_price'); ?> (<?php echo CURRENCY_SYMBOL; ?>)</label>
                                <input type="number" min="0" class="form-control validate-no" value="<?php echo $details['min_price']; ?>" name="min_price" placeholder="<?php echo lang('min_price'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('max_price'); ?> (<?php echo CURRENCY_SYMBOL; ?>)</label>
                                <input type="number" min="0" class="form-control validate-no" value="<?php echo $details['max_price']; ?>" name="max_price" placeholder="<?php echo lang('max_price'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('warranty'); ?></label>
                                <input type="text" class="form-control" value="<?php echo $details['warranty']; ?>" name="warranty" placeholder="<?php echo lang('warranty'); ?>" maxlength="200" autocomplete="off">
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $details['product_guid']; ?>" name="product_guid">
                        <input type="hidden" name="old_gallery_images" value='<?php echo json_encode($details['product_gallery_images'])?>'>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('product_short_description'); ?></label>
                                <textarea id="product-short-description" name="product_short_description" class="form-control" rows="6" placeholder="<?php echo lang('product_short_description'); ?>"><?php echo $details['short_description']; ?></textarea>
                            </div>                
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo lang('product_descprition'); ?></label>
                                <textarea id="product-description" name="product_descprition" class="form-control" rows="6" placeholder="<?php echo lang('product_descprition'); ?>"><?php echo $details['product_descprition']; ?></textarea>
                            </div>
                        </div>












                        

                        <div class="col-sm-12">
                            <label class="control-label"><?php echo lang('gallery_images'); ?></label><br/>
                            <div class="gallery-items">
                                <?php foreach($details['product_gallery_images'] as $galleryImage) {?>
                                    <div class="gallery-item-box">
                                        <img class="gallery-image" src="<?=$galleryImage['path']?>" alt="">
                                        <img class="cropped-image d-none" src="<?=$galleryImage['path']?>" alt="">
                                        <input type="hidden" name="previous-file[]" class="previous-gallery-images" value="<?=$galleryImage['name']?>">
                                        <input type="file" name="gallery-image" class="input-gallery-image d-none">
                                        <button type="button" class="crop-image d-none">Crop Image</button>
                                        <button type="button" class="btn btn-danger remove-image">Remove</button>
                                    </div>
                                <?php } ?>
                            </div>
                                
                            <button type="button" class="add-more-gallery-images">
                                Add More
                            </button>

                        </div>
                        

                        <!-- <div class="col-sm-12">
                            <label class="control-label"><?php //echo lang('gallery_images'); ?></label><br/>
                            <div id="dZUpload" class="dropzone">
                                <div class="dz-default dz-message" data-dz-message><span><?php //echo lang('drop_gallery_images'); ?></span></div>
                            </div>
                            <p style="color:red;"><?php //echo lang('max_4_gallery_images'); ?></p>
                        </div> -->


                        <?php 
                            // echo "<pre>";
                            // print_r($details['product_main_photo']);
                            // exit;
                                        
                        ?>

                        <div class="col-sm-4">
                            <div>
                                <label class="control-label"><?php echo lang('main_photo'); ?></label><br/>
                                <div class="thumnail-image-box">
                                    <input type="hidden" name="previous-thumbnail" value="<?=$details['product_main_photo']?>">
                                    <img class="thumbnail-image" src="<?=$details['product_main_photo']?>" alt="">
                                    <img class="thumbnail-cropped-image d-none" src="<?=$details['product_main_photo']?>" alt="">
                                    <input type="file" name="product_main_photo" class="product_main_photo d-none">
                                    <button type="button" class="thumbnail-crop-image d-none">Crop Image</button>
                                    <button type="button" class="try-another">Try Another</button>
                                </div>
                            </div>




                            <!-- <label class="control-label"><?php //echo lang('main_photo'); ?></label><br/>
                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;">
                                    <img src="<?php //echo $details['product_main_photo']; ?>" class="img-responsive">
                                </div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new"><?php //echo lang('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php //echo lang('change'); ?></span>
                                        <input type="hidden" value=""><input type="file" name="product_main_photo">
                                    </span>
                                    <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><?php //echo lang('remove'); ?></a>
                                </div>
                            </div> -->
                        </div>

                        <div class="form-group col-sm-12 text-center m-t-20">
                            <button class="btn btn-primary" id="edit-submit-product"><?php echo lang('submit'); ?></button>
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
        var mainCropper = null;


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



      //crop gallery image starts here


    //   $(document).on("click" , ".try-another" , function(e){
    //     let element = e.target.classList.contains(".try-another") ? e.target : e.target.closest(".try-another");
    //     let mainInputFile = element.closest(".gallery-item-box").querySelector(".input-gallery-image");
    //     let mainCroppedImage = element.closest(".gallery-item-box").querySelector(".cropped-image");
    //     let mainImage = element.closest(".gallery-item-box").querySelector(".gallery-image");
    //     let removeBtn = element.closest(".gallery-item-box").querySelector(".remove-image");
    //     element.classList.add("d-none")
    //     mainImage.setAttribute("src" ,"");
    //     mainCroppedImage.setAttribute("src","");
    //     mainCroppedImage.classList.add("d-none")
    //     mainImage.classList.add("d-none")
    //     mainInputFile.value = "";
    //     mainInputFile.classList.remove("d-none");
    //     removeBtn.classList.add("d-none");
    //   })




      $(document).on("click" , ".add-more-gallery-images" , function(e){
            let galleryItemBox = document.querySelectorAll(".gallery-item-box").length;
            let galleryItem = document.querySelector(".gallery-items");

            if(galleryItemBox == 4){
                toastr.error('<?php echo lang('max_4_gallery_images'); ?>');
            }else{
                let html =       `<div class="gallery-item-box">
                                            <img class="gallery-image d-none" src=">" alt="">
                                            <img class="cropped-image d-none" src=">" alt="">
                                            <input type="file" name="gallery-image" class="input-gallery-image">
                                            <button type="button" class="crop-image d-none">Crop Image</button>
                                            <button type="button" class="btn btn-danger remove-image d-none">Remove Image</button>
                                        </div>`;

                galleryItem.insertAdjacentHTML("beforeend" , html);
            }
      })




      $(document).on("change" , ".input-gallery-image" , function(e){
            let element = e.target;
            let file = element.files[0];
            let galleryListBox = element.closest(".gallery-item-box");
            

            
            let reader = new FileReader();

            reader.onload = function () {

                let randomKey = generateRandomString(10)

                galleryListBox.querySelector(".input-gallery-image").classList.add("d-none");
                galleryListBox.querySelector(".cropped-image").setAttribute("src" , reader.result);
                galleryListBox.querySelector(".cropped-image").classList.remove("cropper-hidden");
                galleryListBox.querySelector(".crop-image").dataset.key=randomKey;
                galleryListBox.querySelector(".crop-image").classList.remove("d-none");

                let cropperImage = galleryListBox.querySelector('.cropped-image');

                currentCropper = new Cropper(cropperImage, {
                        viewMode: 1,
                        aspectRatio: 1,
                    });

                cropper.push( { key : randomKey , cropper:currentCropper} );

            }

            
            reader.readAsDataURL(file);
            
        })


        $(document).on("click" , ".crop-image" , function(e){
        let currentRow =e.target.closest(".gallery-item-box"); 
        let key = e.target.classList.contains(".crop-image") ? e.target.dataset.key : e.target.closest(".crop-image").dataset.key;



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


            currentRow.querySelector(".gallery-image").setAttribute("src" , url);
            currentRow.querySelector(".gallery-image").classList.remove("d-none");
            currentRow.querySelector(".remove-image").classList.remove("d-none");               
            currentRow.querySelector(".remove-image").dataset.key = currentCropper.key; 
            currentRow.querySelector(".crop-image").classList.add("d-none");
            currentRow.querySelector(".cropped-image").classList.add("d-none");
            currentRow.querySelector(".cropper-container").remove();
            currentRow.querySelector(".input-gallery-image").files = dataTransfer.files;
        }
      })



      $(document).on("click" , ".remove-image" , function(e){
        let element = e.target;
        let key = e.target.classList.contains(".remove-image") ? e.target.dataset.key : e.target.closest(".remove-image").dataset.key;
        let currentIndex = $(".remove-image").index(this);
        element.closest(".gallery-item-box").remove();
        // console.log(cropper);
        let newCropper = cropper.filter(eachCropper => {
            return key != eachCropper.key;
        })

        cropper = newCropper
      })




      //crop gallery image ends here
    })



    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    $(document).on("click" , ".try-another" , function(e){
        let element = e.target.classList.contains(".try-another") ? e.target : e.target.closest(".try-another");
        let thumnailBox = element.closest(".thumnail-image-box");

        let mainInputFile = thumnailBox.querySelector(".product_main_photo");
        let mainCroppedImage = thumnailBox.querySelector(".thumbnail-cropped-image");
        let mainImage = thumnailBox.querySelector(".thumbnail-image");
        let cropImageBtn = thumnailBox.querySelector(".thumbnail-crop-image");
        
        element.classList.add("d-none");
        mainImage.setAttribute("src" ,"");
        mainImage.classList.add("d-none");
        mainCroppedImage.setAttribute("src","");
        mainCroppedImage.classList.add("d-none");
        cropImageBtn.classList.add("d-none");
        mainInputFile.classList.remove("d-none");
      })


      $(document).on("input" , ".product_main_photo" , function(e){
        let element = e.target;
        let file = element.files[0];
        let reader = new FileReader();
        let mainImage = document.querySelector(".thumbnail-image");
        let mainCropBtn = document.querySelector(".thumbnail-crop-image");

        reader.onload = function(){
            mainImage.setAttribute('src' , reader.result );
            mainImage.classList.remove("d-none");
            mainCropper = new Cropper(mainImage , {
                viewMode: 1,
                aspectRatio: 1,
            })
        }

        reader.readAsDataURL(file);
        this.classList.add("d-none");
        mainCropBtn.classList.remove("d-none");
      })




      $(document).on("click" , ".thumbnail-crop-image" , function(e){
        let element = e.target.classList.contains("thumbnail-crop-image") ? e.target : e.target.closest(".thumbnail-crop-image");
        let mainCropData =  mainCropper.getCropBoxData();
        
        let mainInputFile = document.querySelector(".product_main_photo");
        let mainCroppedImage = document.querySelector(".thumbnail-cropped-image");
        let mainImage = document.querySelector(".thumbnail-image");
        let tryAnother= document.querySelector(".try-another");

        if (mainCropData.width > 0 && mainCropData.height > 0) {
            let canvas = mainCropper.getCroppedCanvas(); 

            console.log(canvas);
        
            let url = canvas.toDataURL('image/jpeg', 0.92);
            console.log(url);

            let blob = dataURLtoBlob(url);

            let timestamp = new Date().getTime();

            let fileName = `${timestamp}_main_cropped_image.jpg`;

            let file = new File([blob], fileName , { type: 'image/jpeg' });

            let dataTransfer = new DataTransfer();

            dataTransfer.items.add(file);

            mainInputFile.files = dataTransfer.files;

            mainCroppedImage.setAttribute("src" , url);

            mainCroppedImage.classList.remove("d-none"); 

            mainImage.setAttribute("src" , "");

            mainImage.classList.add("d-none");

            mainCropper.destroy();

            tryAnother.classList.remove("d-none");

            element.classList.add("d-none");
        }
      })











      ///////////////////////////////////////////////////////////////////




      
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


</script>
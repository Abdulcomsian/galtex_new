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
                            <label class="control-label"><?php echo lang('gallery_images'); ?></label><br/>
                            <div id="dZUpload" class="dropzone">
                                <div class="dz-default dz-message" data-dz-message><span><?php echo lang('drop_gallery_images'); ?></span></div>
                            </div>
                            <p><?php echo lang('image_dimension'); ?></p>
                            <p style="color:red;"><?php echo lang('max_4_gallery_images'); ?></p>
                        </div> -->
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo lang('main_photo'); ?></label><br/>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="line-height: 150px;"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new"><?php echo lang('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo lang('change'); ?></span>
                                        <input type="hidden" value=""><input type="file" name="product_main_photo">
                                    </span>
                                    <a href="javascript:void(0);" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><?php echo lang('remove'); ?></a>
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
            // let galleryItem = document.getElementById("gallery-items");
            currentRow.innerHTML ="";
            let html = `<div>
                            <div class="col-8">
                                <img src="${url}" class="gallery-item-image"/>
                            </div>
                            <div class="col-4">
                                <input type="file" class="crop-gallery-image d-none" value="${url}"/>
                                <button type="button" class="btn btn-danger remove-gallery-item-image" data-key="${currentCropper.key}">Remove Image</button>
                            </div>
                        </div>`;
            currentRow.innerHTML = html;
        }
      })


      $(document).on("click" , ".remove-gallery-item-image" , function(e){
        let element = e.target;
        let key = e.target.classList.contains(".remove-gallery-item-image") ? e.target.dataset.key : e.target.closest(".remove-gallery-item-image").dataset.key;
        element.closest(".row").remove();
        let currentIndex = $(".remove-gallery-item-image").index(this);
        console.log(cropper);
        let newCropper = cropper.filter(eachCropper => {
            return key != eachCropper.key;
        })
        console.log(newCropper);
        cropper = newCropper

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

    })
</script>

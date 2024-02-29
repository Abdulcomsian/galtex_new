<style>
   .collapsable-header {
      display: flex;
      flex-direction: row-reverse;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
   }

   .collapsable-header h1.product_name {
      font-size: 18px;
   }

   .slick-list {
      width: 100% !important;
      height: 100% !important;
   }

   .slick-list .slick-track {
      height: 100%;
      border-radius: 10px;
      overflow: hidden;
      transform: none !important;
   }

   .slick-list .slick-track .slick-active {
      right: 0 !important;
   }

   .slick-list .slick-track img {
      right: 0 !important;
      /* margin: 7px !important; */
   }

   .product_main_item .slick-list .slick-track img {
      width: 100% !important;
      height: 100%;
      /* object-fit: contain; */
      margin-bottom: 0 !important;
   }

   .product_main_item .slick-list .slick-track img:not(.slick-active) {
      display: none !important;
   }

   .thumb_inner .slick-track {
      padding: 7px;
   }

   .thumb_inner .slick-track img {
      /* box-shadow: 0 0 12px 3px #00000033 !important; */
      height: 80px !important;
      /* width: auto !important; */
      /* margin: 5px */
   }

   /* .product_thumb_item{
      margin-left: 0;
      /* width: 100% !important; */
   /* } */

   /* .slick-track{
      width: 100% !important;
   } */
   .product_thumb_item {
      margin-top: 0px !important;
   }



   @media (max-width: 575px) {
      .thumb_inner .slick-track img {
         /* box-shadow: 0 0 12px 3px #00000033 !important; */
         height: 70px !important;
         /* width: auto !important; */
         margin-top: 0px;
      }

      .product_thumb_item {
         margin-top: 0px !important;
      }

      .thumb_wrapper {
         width: 70px !important;
         height: 70px !important;
         margin: 3px;
      }

      .single_slider_main .product_slider_thumb {
         width: 25% !important;
      }
   }


   @media (max-width:425px) {
      .single_slider_main .product_slider_thumb {
         width: 20% !important;
      }

      .product_slider_main {
         height: 260px !important;
         width: 260px !important;
      }

      .thumb_wrapper {
         width: 60px !important;
         height: 60px !important;
      }

      .product_main_item .slick-list .slick-track img {
         object-fit: fill;
      }
   }
</style>
<main class="main_content">
   <div class="add_to_card">
      <div class="addToCartDiv"><!-- remove class(desktopHide)-->
         <?php if ($details['remaining_quantity'] > 0) { ?>
            <div class="quantity_box">
               <label>
                  <?php echo lang('quantity'); ?>
               </label>
               <div class="quantity">
                  <input class="touch-spin-count-ver" readonly type="text" value="<?php echo $quantity; ?>"
                     name="pro_quantity">
               </div>
            </div>
         <?php }
         if ($is_added_into_cart) { ?>
            <div class="wow zoomIn"><a href="../../employees/cart" class="btn btn_common">
                  <?php echo lang('go_to_cart'); ?>
               </a></div>
         <?php } else { ?>
            <?php if ($details['remaining_quantity'] > 0) { ?>
               <div class="wow zoomIn"><a href="javascript:void(0);" data-type="package"
                     data-guid="<?php echo $details['package_guid']; ?>" class="btn btn_common add-to-cart">
                     <?php echo lang('add_to_cart'); ?>
                  </a></div>
            <?php } else { ?>
               <strong><a class="btn btn_common" href="javascript:void(0);">
                     <?php echo lang('out_of_stock'); ?>
                  </a></strong>
            <?php }
         } ?>

      </div>
      <div class="backToStore "><!-- remove class(desktopHide)-->
         <div class="wow "><a href="../../employees/products" class="btn"><img
                  src="<?php echo base_url(); ?>assets/images/rightIcon.svg" /><span style="color: black;
    font-size: 20px !important;
    font-family: 'AssistantBold'; position: relative; ">
                  <?php echo lang('back'); ?>
               </span> </a></div>
      </div>
   </div>
   <!-- <section class="inner_banner_sec packageHeader">
      <div class="innerbanner_cap text-center mobileCap">
         <div class="container">
            <div class="watermark_text">
           
               <h1 class="head_1 mobileHide"><?php echo $details['package_name']; ?></h1>
               <p class="watermark wow zoomIn mobileHide" data-wow-delay="0.4s"><?php echo lang('packages'); ?></p>
                   
                   <h1 class="product_name wow bounce desktopHide"><?php echo $details['package_name']; ?></h1>
               
            </div>
            <div class="tagDiv">
           
               <p href=""><?php echo lang('pack'); ?></p>
            </div>
         </div>
      </div>
   </section> -->

   <div id="accordion" class="container package_product_page">
      <div class="container card ">
         <div class="col-md-12 text-center mt-4 mobileHide">
            <div class="product_right">
               <h1 class="product_name wow bounce ">
                  <?php echo $details['package_name']; ?>
               </h1>
            </div>
         </div>
         <div class="desktopHide">
            <div class="product_right">
               <h1 class="product_name wow bounce ">
                  <?php echo $details['package_name']; ?>
               </h1>
            </div>
         </div>
         <?php $i = 0;
         foreach ($details['products']['data']['records'] as $product) { ?>

            <div class="card border-0">
               <div class="card-header bg-white px-0" id="heading<?php echo $i; ?>">
                  <div class="card_package_collapse">
                     <h5 class="mb-0">
                        <button class="btn btn-link button_text sign-toggler" data-toggle="collapse"
                           data-target="#collapse<?php echo $i; ?>" aria-expanded="true"
                           aria-controls="collapse<?php echo $i; ?>">
                           <?php echo $product['product_name']; ?>
                        </button>
                     </h5>

                     <button class="btn btn-link sign-toggler downArrow" data-toggle="collapse"
                        data-target="#collapse<?php echo $i; ?>" aria-expanded="true"
                        aria-controls="collapse<?php echo $i; ?>">
                        <img class="icon-image" src="<?php echo base_url(); ?>assets/images/arrowdown-icon.svg"
                           style="height:11px;width:11px" />
                     </button>

                     <!-- <button class="btn btn-link sign-toggler upArrow" data-toggle="collapse"
                        data-target="#collapse<?php echo $i; ?>" aria-expanded="true"
                        aria-controls="collapse<?php echo $i; ?>" style="display: none;">
                        <img class="icon-image" src="<?php echo base_url(); ?>assets/images/up-arrow-5.svg"
                           style="height:11px;width:11px" />
                     </button> -->
                  </div>
               </div>

               <div id="collapse<?php echo $i; ?>" class="collapse <?php if ($i == 0) {
                     echo "show";
                  } ?>" aria-labelledby="heading<?php echo $i; ?>"
                  data-parent="#accordion">
                  <div class="card-body">
                     <div class="row package-detail_view">
                        <div class="col-md-4 col-lg-6">
                           <div class="product_right">
                              <!-- <div class="row mobileHide">
                                 <div class="col-md-12">

                                    
                                    <div class="sku_main">
                                       <p class="wow " data-wow-delay="0.4s"><span>
                                             <?php echo lang('category'); ?>:
                                          </span> <span class="greenText ml-3">
                                             <?php echo $product['category_name']; ?>
                                          </span></p>
                                       <p class="wow" data-wow-delay="0.2s"><span>
                                             <?php echo lang('warranty'); ?>:
                                          </span> <span class="ml-3">
                                             <?php echo $product['warranty']; ?>
                                          </span></p>
                                       <?php if ($details['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                                          <p class="wow" data-wow-delay="0.2s"><span>
                                                <?php echo lang('remaining_quantity'); ?>:
                                             </span> <span class="ml-3">
                                                <?php echo $details['remaining_quantity']; ?>
                                             </span></p>
                                       <?php } ?>
                                    </div>
                                 </div>
                              </div> -->
                              <div>
                                 <div class="col-md-12 px-0">
                                    <div class="product_detail wow px-0">
                                       <p>
                                          <?php echo $product['product_descprition']; ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <?php if ($details['remaining_quantity'] > 0) { ?>
                                 <!-- <div class="product_information wow fadeInUp">
                          <div class="quantity_box">
                             <label><?php //echo lang('quantity'); 
                                   ?></label>
                             1
                          </div>
                       </div> -->
                              <?php } ?>
                           </div>
                        </div>
                        <div class="col-md-8 col-lg-6  ">
                           <div class="single_slider_main clearfix">



                              <div class="product_slider_thumb arrow_center zoomIn">
                                 <div class="product_thumb_item" style="height: 100%; width: 100% !important;  ">
                                    <div class="thumb_inner">
                                       <div class="thumb_wrapper">
                                          <img src="<?php echo $product["product_main_photo"]; ?>" alt="main-photo"
                                             class="package_page_image" />
                                       </div>
                                       <?php $increment = 0;
                                       foreach ($product["product_gallery_images"] as $image) { ?>
                                          <?php if ($increment == 3)
                                             break; ?>
                                          <div class="thumb_wrapper">
                                             <img class="package_page_image"
                                                src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                                alt="gallery-image" />
                                          </div>

                                          <?php ++$increment;
                                       } ?>
                                    </div>
                                 </div>


                              </div>
                              <div class="product_slider_main">
                                 <div class="product_main_item " style="width: 100%; height: 100%">
                                    <img src="<?php echo $product["product_main_photo"]; ?>" alt="main-photo" />
                                    <?php foreach ($product["product_gallery_images"] as $image) { ?>

                                       <img src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                          alt="gallery-image" />

                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>


            <?php $i++;
         } ?>
         <center class="mobileHide" style="margin-bottom: 62px;">

            <?php if ($details['remaining_quantity'] > 0) { ?>
               <!-- <div class="quantity_box">
       <label><?php #echo lang('quantity'); 
          ?></label>
       <div class="quantity">
          <input class="touch-spin-count-ver" readonly type="text" value="<?php #echo $quantity; 
             ?>" name="pro_quantity">
       </div>
    </div> -->
            <?php }
            if ($is_added_into_cart) { ?>
               <div class="product-button "><a href="../../employees/cart" style="margin-bottom:10px;"
                     class="btn btn_common">
                     <?php echo lang('go_to_cart'); ?>
                  </a></div>
            <?php } else { ?>
               <?php if ($details['remaining_quantity'] > 0) { ?>
                  <div class="product-button "><a href="javascript:void(0);" data-type="package"
                        data-guid="<?php echo $details['package_guid']; ?>" style="margin-bottom:10px;"
                        class="btn btn_common add-to-cart">
                        <?php echo lang('add_to_cart'); ?>
                     </a></div>
               <?php } else { ?>
                  <strong><a href="javascript:void(0);" style="margin-top:10px;color:red;">
                        <?php echo lang('out_of_stock'); ?>
                     </a></strong>
               <?php }
            } ?>
            <!-- <div class="product-button wow zoomIn"><a href="../../employees/products" class="btn btn_common">
                  <?php echo lang('back_to_store'); ?>
               </a></div> -->
         </center>
      </div>

   </div>

   <div style="display:none">
      <?php foreach ($details['products']['data']['records'] as $product) { ?>
         <div class=" packageDetails">
            <div class="productDiv">
               <div class="container"
                  style="border-top: 1px solid lightgray; border-bottom: 1px solid lightgray; padding-bottom: 33px;">
                  <div class="row py-4">
                     <div class="col-12 collapsable-header">
                        <i class="fa-solid fa-plus"></i>
                        <h1 class="product_name wow bounce">
                           <?php echo $product['product_name']; ?>
                        </h1>
                     </div>
                  </div>
                  <div class="row package-detail--container">
                     <div class="col-md-6 wow fadeInUp mobilePackageSlider">
                        <div class="single_slider_main clearfix">
                           <div class="product_slider_main">
                              <div class="product_main_item ex1">
                                 <img src="<?php echo $product['product_main_photo']; ?>" alt="main-photo" />
                                 <p class="productName">
                                    <?php echo $product['product_name'] ?>
                                 </p>
                              </div>

                              <?php foreach ($product['product_gallery_images'] as $image) { ?>
                                 <div class="product_main_item ex1">
                                    <img src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                       alt="gallery-image" />
                                 </div>
                              <?php } ?>
                           </div>

                           <div class="product_slider_thumb arrow_center wow zoomIn">
                              <div class="product_thumb_item">
                                 <div class="thumb_inner">
                                    <img src="<?php echo $product['product_main_photo']; ?>" alt="main-photo" />

                                 </div>
                              </div>

                              <?php foreach ($product['product_gallery_images'] as $image) { ?>
                                 <div class="product_thumb_item">
                                    <div class="thumb_inner">
                                       <img src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                          alt="gallery-image" />

                                    </div>

                                 </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="product_right">
                           <div class="row mobileHide">
                              <div class="col-md-12">

                                 <!-- <div class="product_price wow fadeInRight"> $26.00 <del>$34.00</del></div> -->
                                 <div class="sku_main">
                                    <p class="wow fadeInRight" data-wow-delay="0.4s"><span>
                                          <?php echo lang('category'); ?>:
                                       </span> <span class="greenText ml-3">
                                          <?php echo $product['category_name']; ?>
                                       </span></p>
                                    <p class="wow fadeInRight" data-wow-delay="0.2s"><span>
                                          <?php echo lang('warranty'); ?>:
                                       </span> <span class="ml-3">
                                          <?php echo $product['warranty']; ?>
                                       </span></p>
                                    <?php if ($details['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                                       <p class="wow fadeInRight" data-wow-delay="0.2s"><span>
                                             <?php echo lang('remaining_quantity'); ?>:
                                          </span> <span class="ml-3">
                                             <?php echo $details['remaining_quantity']; ?>
                                          </span></p>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="product_detail wow fadeInRight">
                                    <p>
                                       <?php echo $product['product_descprition']; ?>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <?php if ($details['remaining_quantity'] > 0) { ?>
                              <!-- <div class="product_information wow fadeInUp">
                          <div class="quantity_box">
                             <label><?php //echo lang('quantity'); 
                                   ?></label>
                             1
                          </div>
                       </div> -->
                           <?php } ?>
                        </div>
                     </div>
                  </div>

               </div>

            </div>
         </div>
         <!-- <div class="singleprod-devider mobileHide"></div> -->
      <?php } ?>
   </div>

   <div class="col-md-6 cartDiv desktopHide" style="margin-bottom: 30px">
      <!-- <p style="line-height: 22px;text-align: center;">Additional 500₪</p> -->
      <div class="desktopHide" style="width: 100%;">
         <?php if ($details['remaining_quantity'] > 0) { ?>
            <!-- <div class="quantity_box mobileHide">
             <label><?php #echo lang('quantity'); 
                ?></label>
             <div class="quantity">
                <input class="touch-spin-count-ver" readonly type="text" value="<?php #echo $quantity; 
                   ?>" name="pro_quantity">
             </div>
          </div> -->
         <?php }
         if ($is_added_into_cart) { ?>
            <div class="product-button wow zoomIn mobileProductBtn"><a href="../../employees/cart"
                  style="margin-bottom:10px;" class="btn btn_common">
                  <?php echo lang('go_to_cart'); ?>
               </a></div>
         <?php } else { ?>
            <?php if ($details['remaining_quantity'] > 0) { ?>
               <div class="product-button wow zoomIn mobileProductBtn"><a href="javascript:void(0);" data-type="package"
                     data-guid="<?php echo $details['package_guid']; ?>" style="margin-bottom:10px;"
                     class="btn btn_common add-to-cart">
                     <?php echo lang('add_to_cart'); ?>
                  </a></div>
            <?php } else { ?>
               <div class="product-button wow zoomIn mobileProductBtn"><a href="javascript:void(0);"
                     style="margin-top:10px;color:red;">
                     <?php echo lang('out_of_stock'); ?>
                  </a></div>
            <?php }
         } ?>
      </div>
   </div>
</main>



<script>
   < script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.min.js" >
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</script>
<script>
   // $(document).on("click", ".downArrow", function(){
   //    $(".downArrow").hide();
   //    $(".upArrow").show();
   // });

   // $(document).on("click", ".upArrow", function(){
   //    $(".downArrow").show();
   //    $(".upArrow").hide();
   // });
</script>
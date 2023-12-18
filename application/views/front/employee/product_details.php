<style type="text/css">
   .product_thumb_item.slick-slide.slick-cloned {
      display: none !important
   }

   .product_thumb_item {
      margin-top: 0px !important;
   }

   .slick-list .slick-track .slick-active {
      right: 0 !important;
   }

   .product_main_item .slick-list .slick-track img:not(.slick-active) {
      display: none !important;
   }

   .product_slider_main {
      box-shadow: 0px 0px 13px 4px #00000033 !important;
      /* height:400px !important;
      width:400px !important */
   }

   .thumb_inner .slick-track {
      padding: 7px;
      /* margin-top: 10px; */
   }

   .thumb_inner .slick-track img {
      /* box-shadow: 0 0 12px 3px #00000033 !important; */
      height: 80px !important;
      /* width: auto !important; */
      /* margin: 5px; */
   }

   .slick-list .slick-track {
      height: 100%;
      border-radius: 10px;
      overflow: hidden;
      transform: none !important;
   }

   @media screen and (max-width: 767px) {
      .thumb_inner .slick-track img {
         margin: 2px
      }
   }

   @media screen and (max-width: 600px) {
      .thumb-inner--img {
         max-height: 73px;
         min-width: 47px !important;
         object-fit: cover
      }
   }

   @media screen and (max-width: 1200px) {
      .thumb-inner--img {
         object-fit: cover
      }
   }

   @media (max-width: 575px) {
      .product_heading {
         margin-top: 0 !important;
      }

      .product_right .product_name {
         padding-top: 0;
      }

      .productDetailDiv .product_main_item img {
         height: 320px !important;
         width: 320px !important
      }

      .thumb_inner .slick-track img {
         box-shadow: 0 0 12px 3px #00000033 !important;
         height: 70px !important;
         width: 70px !important;
         margin-top: 0px;
      }

      .product_thumb_item {
         margin-top: 0px !important;
      }

      .product_slider_main {
         width: 100% !important
      }
   }


   @media (max-width:425px) {
      .single_slider_main .product_slider_thumb {
         width: 20% !important;
      }

      .thumb_wrapper {
         height: 60px !important;
         width: 60px !important;
      }

      .thumb_inner .slick-track img {
         height: 60px !important;
         width: 60px !important;
         object-fit: fill;
      }

      .product_slider_main {
         width: 260px !important;
         height: 260px !important;
      }

      .productDetailDiv .product_main_item img {
         width: 260px !important;
         height: 260px !important;
         object-fit: fill;
      }
   }
</style>
<main class="main_content">
   <div class="add_to_card">
      <div class="addToCartDiv"><!-- remove the class(desktopHide)-->
         <?php if ($details['remaining_quantity'] > 0) { ?>

         <?php }
         if ($is_added_into_cart) { ?>
            <div class="wow zoomIn"><a href="../../employees/cart" class="btn btn_common">
                  <?php echo lang('go_to_cart'); ?>
               </a></div>
         <?php } else { ?>
            <?php if ($details['remaining_quantity'] > 0) { ?>
               <div class="wow zoomIn"><a href="javascript:void(0);" data-type="product"
                     data-guid="<?php echo $details['product_guid']; ?>" class="btn btn_common add-to-cart">
                     <?php echo lang('add_to_cart'); ?>
                  </a></div>
            <?php } else { ?>
               <strong><a class="btn btn_common add-to-cart" href="javascript:void(0);">
                     <?php echo lang('out_of_stock'); ?>
                  </a></strong>
            <?php }
         } ?>
      </div>
      <div class="backToStore"><!-- remove the class(desktopHide)-->
         <div class="wow zoomIn"><a href="../../employees/products" class="btn"
               style="color: black;font-size: 20px !important;font-family: 'AssistantBold';"><img
                  src="<?php echo base_url(); ?>assets/images/rightIcon.svg" /></span>
               <?php echo lang('back'); ?></span> <span style="color: #000; position: relative; left: -15px;"><span>
            </a></div>
      </div>
   </div>
   <!-- <section class="inner_banner_sec productBg mobileHide" >
            <div class="innerbanner_cap text-center">
               <div class="container">
                  <div class="watermark_text">
                     <h1 class="head_1"><?php echo $details['product_name']; ?></h1>
                     <p class="watermark wow zoomIn" data-wow-delay="0.4s"><?php echo lang('products'); ?></p>
                  </div>
               </div>
            </div>
         </section> -->
   <!-- <section class="inner_banner_sec productBg desktopHide"
      style="background-image: url(<?php echo $details['product_main_photo']; ?>);">
      <div class="innerbanner_cap text-center">
         <div class="container">
            <div class="watermark_text">
               <h1 class="head_1">
                  <?php echo $details['product_name']; ?>
               </h1>
               <p class="watermark wow zoomIn" data-wow-delay="0.4s">
                  <?php echo lang('products'); ?>
               </p>
            </div>
         </div>
      </div>
   </section> -->
   <div class="single_product_page">
      <div class="container card product_details_card">
         <!-- <div class="row" style="margin-bottom: 10px;">
            <div class="col-12 text-right">
               <?php if (!empty($details['above_budget_price'])) { ?>
                  <a href="" class="additionalCosts desktopHide">
                     <?php echo lang('additional_cost'); ?>
                  </a>
               <?php } ?>
            </div>
         </div>
         <div class="product_description desktopHide" style="width: 100%;">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12 text-right">
                     <?php if ($details['remaining_quantity'] <= 10) { ?>
                        <b style="padding:10px 0px; color: #373737;">
                           <?php echo $details['remaining_quantity']; ?>
                           <?php echo lang('last_item'); ?>
                        </b>
                     <?php } ?>
                     <p style="line-height: 22px;">
                        <?php echo $details['product_descprition']; ?>
                     </p>
                  </div>
               </div>
            </div>
         </div> -->
         <div><!--remove class(row)-->

            <div ><!-- remove class(mobileHide col-md-12)-->
               <div class="product_right">
                  <div class="product_description_details">
                     <div class="col-md-12 text-center mt-4 product_heading">
                        <h2 class="product_name wow bounce">
                           <?php echo $details['product_name']; ?>
                        </h2>
                        <!-- <?php if (!empty($details['above_budget_price'])) { ?>
                           <div class="product_price wow fadeInRight"> +
                              <?php echo CURRENCY_SYMBOL . $details['above_budget_price']; ?>
                           </div>
                        <?php } ?> -->
                        <!-- <div class="sku_main">  for categroies
                           <p class="wow fadeInRight" data-wow-delay="0.4s"><span>
                                 <?php echo lang('category'); ?>:
                              </span> <span class="greenText ml-3">
                                 <?php echo $details['category_name']; ?>
                              </span></p>
                           <p class="wow fadeInRight" data-wow-delay="0.2s"><span>
                                 <?php echo lang('warranty'); ?>:
                              </span> <span class="ml-3">
                                 <?php echo $details['warranty']; ?>
                              </span></p>
                           <?php if ($details['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                              <p class="wow fadeInRight" data-wow-delay="0.2s"><span>
                                    <?php echo lang('remaining_quantity'); ?>:
                                 </span> <span class="ml-3">
                                    <?php echo $details['remaining_quantity']; ?>
                                 </span></p>
                           <?php } ?>
                        </div> -->
                     </div>
                     <div class="desktopHide mobileHide">
                        <h2 class="product_name wow bounce">
                           <?php echo $details['product_name']; ?>
                        </h2>
                        <?php if (!empty($details['above_budget_price'])) { ?>
                           <div class="product_price wow fadeInRight"> +
                              <?php echo CURRENCY_SYMBOL . $details['above_budget_price']; ?>
                           </div>
                        <?php } ?>
                        <!-- <div class="sku_main">  for categroies
                           <p class="wow fadeInRight" data-wow-delay="0.4s"><span>
                                 <?php echo lang('category'); ?>:
                              </span> <span class="greenText ml-3">
                                 <?php echo $details['category_name']; ?>
                              </span></p>
                           <p class="wow fadeInRight" data-wow-delay="0.2s"><span>
                                 <?php echo lang('warranty'); ?>:
                              </span> <span class="ml-3">
                                 <?php echo $details['warranty']; ?>
                              </span></p>
                           <?php if ($details['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                              <p class="wow fadeInRight" data-wow-delay="0.2s"><span>
                                    <?php echo lang('remaining_quantity'); ?>:
                                 </span> <span class="ml-3">
                                    <?php echo $details['remaining_quantity']; ?>
                                 </span></p>
                           <?php } ?>
                        </div> -->
                     </div>
                  </div>
               </div>
               <div > <!-- remove class(class="col-md-12")-->
                  <div class="row" style="justify-content: center;">
                     <div class="row product_direction col-12">
                        <div class="col-md-4 col-lg-6">
                           <div class="product_right">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="product_detail wow fadeInRight">
                                       <p>
                                          <?php echo $details['product_descprition']; ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                        <div class="col-md-8 col-lg-6 wow fadeInUp mobileBackground">
                           <div class="single_slider_main clearfix  productDetailDiv "><!-- remove class(mobileHode)-->
                              <div class="product_slider_thumb arrow_center wow zoomIn">
                                 <div class="product_thumb_item">
                                    <div class="thumb_inner">
                                       <div class="thumb_wrapper">
                                          <img class="thumb-inner--img "
                                             src="<?php echo $details['product_main_photo']; ?>" alt="main-image"
                                             style="object-fit:cover" />
                                       </div>
                                       <?php $increment = 0;
                                       foreach ($details['product_gallery_images'] as $image) { ?>
                                          <?php if ($increment == 3)
                                             break; ?>
                                          <div class="thumb_wrapper">
                                             <img class="thumb-inner--img "
                                                src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                                alt="main-image" style="object-fit:cover" />
                                          </div>
                                          <?php ++$increment;
                                       } ?>
                                    </div>
                                 </div>
                                 <?php
                                 // echo $details['product_gallery_images'][0]."<br>";
                                 // echo $details['product_gallery_images'][1];
                                 // exit;
                                 foreach ($details['product_gallery_images'] as $image) {
                                    ?>

                                    <div class="product_thumb_item">
                                       <div class="thumb_inner">
                                          <img src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                             alt="gallery-image" />
                                       </div>
                                    </div>
                                 <?php } ?>
                              </div>
                              <div class="product_slider_main">
                                 <div class="product_main_item ex1" style="width: 100%; height: 100%">
                                    <img src="<?php echo $details['product_main_photo']; ?>" alt="main-image" />
                                    <?php foreach ($details['product_gallery_images'] as $image) { ?>
                                       <img src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                          alt="gallery-image" />
                                    <?php } ?>
                                 </div>
                                 <!-- <?php foreach ($details['product_gallery_images'] as $image) { ?>
                                    <div class="product_main_item test">
                                       <img src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>" alt="gallery-image" />
                                    </div>
                                 <?php } ?> -->
                              </div>


                           </div>

                           <!-- <div class="sliderProduct productDetailDiv" dir="rtl" style="display: none;">
                              <div class="productImage">
                                 <div class="product_thumb_item">
                                    <div class="thumb_inner">
                                       <img src="<?php echo $details['product_main_photo']; ?>" alt="main-image" />
                                    </div>
                                 </div>
                              </div>
                              <?php
                              foreach ($details['product_gallery_images'] as $image) {
                                 ?>
                                 <div class="productImage">
                                    <div class="product_thumb_item">
                                       <div class="thumb_inner">
                                          <img src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                             alt="gallery-image" />
                                       </div>
                                    </div>
                                 </div>
                              <?php } ?>
                           </div> -->

                        </div>
                     </div>
                     <div class="mobileHide product_right my-6">
                        <?php if ($details['remaining_quantity'] > 0) { ?>
                           <!-- <div class="product_information wow fadeInUp">
                         <div class="quantity_box">
                            <label><?php #echo lang('quantity'); 
                               ?></label>
                            <div class="quantity">
                               <input class="touch-spin-count-ver" readonly type="text" value="<?php #echo $quantity; 
                                  ?>" name="pro_quantity">
                            </div>
                         </div>
                      </div> -->
                        <?php }
                        if ($is_added_into_cart) { ?>
                           <div class="product-button wow zoomIn"><a href="../../employees/cart" class="btn btn_common">
                                 <?php echo lang('go_to_cart'); ?>
                              </a></div>
                        <?php } else { ?>
                           <?php if ($details['remaining_quantity'] > 0) { ?>
                              <div class="product-button wow zoomIn">

                                 <a href="javascript:void(0);" data-type="product"
                                    data-guid="<?php echo $details['product_guid']; ?>" style="margin-bottom:10px;"
                                    class="btn btn_common add-to-cart">
                                    <?php echo lang('add_to_cart'); ?>
                                 </a>

                                 <?php
                                 if (!empty($details['above_budget_price'])) {
                                    ?>
                                    <p style="line-height: 22px;text-align: center;">
                                       <?php echo lang('additional') . ' ' . CURRENCY_SYMBOL . $details['above_budget_price']; ?>
                                    </p>
                                 <?php } ?>
                              </div>
                           <?php } else { ?>
                              <strong><a href="javascript:void(0);" style="margin-top:10px;color:red;">
                                    <?php echo lang('out_of_stock'); ?>
                                 </a></strong>
                           <?php }
                        } ?>
                        <!-- <div class="product-button wow zoomIn"><a href="../../employees/products"
                              class="btn btn_common">
                              <?php echo lang('back_to_store'); ?>
                           </a></div> -->

                     </div>
                  </div>
               </div>
            </div>
            <!-- Hamza Custom Code Here - Start -->
            <div class="col-md-6 text-right desktopHide">
               <!-- <p style="line-height: 22px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec maximus enim non mattis pharetra. Nulla hendrerit semper sem sed luctus. Maecenas vulputate lacinia ipsum ac rhoncus. Fusce ultricies quam at velit pharetra tempus eu nec ante. Etiam augue tellus, finibus sit amet consequat non, mattis aliquet quam. Nulla blandit, elit id congue luctus, nisl augue mollis odio, non suscipit magna justo quis massa. Nam maximus nisl vitae sollicitudin sollicitudin. Duis sed eleifend urna. Nunc blandit eget quam id lobortis. Nam eget egestas velit.</p> -->
            </div>
            <div class="col-md-6 cartDiv desktopHide mb-4">
               <?php #if((details['remaining_quantity'] > 0) && !empty($details['above_budget_price'])) { 
               if (!empty($details['above_budget_price'])) {
                  ?>
                  <p style="line-height: 22px;text-align: center;">
                     <?php echo lang('additional') . ' ' . CURRENCY_SYMBOL . $details['above_budget_price']; ?>
                  </p>
               <?php } ?>
               <div class="desktopHide" style="width: 100%;">
                  <?php if ($details['remaining_quantity'] > 0) { ?>

                  <?php }
                  if ($is_added_into_cart) { ?>
                     <div class="wow zoomIn mobileProductBtn"><a style="width: 100%; border: none;"
                           href="../../employees/cart" class="btn btn_common">
                           <?php echo lang('go_to_cart'); ?>
                        </a></div>
                  <?php } else { ?>
                     <?php if ($details['remaining_quantity'] > 0) { ?>
                        <div class="wow zoomIn mobileProductBtn"><a style="width: 100%; border: none;"
                              href="javascript:void(0);" data-type="product"
                              data-guid="<?php echo $details['product_guid']; ?>" class="btn btn_common add-to-cart">
                              <?php echo lang('add_to_cart'); ?>
                           </a></div>
                     <?php } else { ?>
                        <div class="wow zoomIn mobileProductBtn"><a style="width: 100%; border: none;"
                              href="javascript:void(0);" style="margin-top:10px;color:red;">
                              <?php echo lang('out_of_stock'); ?>
                           </a></div>
                     <?php }
                  } ?>
               </div>
            </div>
            <!-- Hamza Custom Code Here - End -->
         </div>
      </div>
   </div>
</main>

<script>
   window.addEventListener('resize', function (event) {
      var clientWidth = window.innerWidth;
      if (clientWidth <= 768) {
         var card = document.getElementById("card_remove");
         console.log(card);
         card.classList.remove('card');
      }
</script>
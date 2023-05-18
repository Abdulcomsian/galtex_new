<style type="text/css">
   .product_thumb_item.slick-slide.slick-cloned {
      display: none !import
   }

   .product_slider_main{
      box-shadow: 0 0 9px -1px lightgray !important;
   }

   .thumb_inner .slick-track{
      padding: 10px;
   }
   .thumb_inner .slick-track img{
      box-shadow: 0 0 9px -1px lightgray;
   }

   @media screen and (max-width: 767px) {
      .thumb_inner .slick-track img{
      margin: 2px
   }
   }
   
</style>
<main class="main_content" >
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
                     data-guid="<?php echo $details['product_guid']; ?>" class="btn btn_common add-to-cart"><?php echo lang('add_to_cart'); ?></a></div>
            <?php } else { ?>
               <strong><a class="btn btn_common add-to-cart" href="javascript:void(0);">
                     <?php echo lang('out_of_stock'); ?>
                  </a></strong>
            <?php }
         } ?>
      </div>
      <div class="backToStore"><!-- remove the class(desktopHide)-->
         <div class="wow zoomIn"><a href="../../employees/products" class="btn" style="color:black;"><img
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

            <div class="col-md-12"><!-- remove class(mobileHide)-->
               <div class="product_right">
                  <div class="product_description_details">
                     <div class="col-md-12 text-center mt-4 mobileHide">
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
                     <div class="desktopHide">
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
               <div class="col-md-12">
                  <div class="row" style="justify-content: center;">
                     <div class="row product_direction">
                        <div class="col-md-6">
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
                        <div class="col-md-6 wow fadeInUp mobileBackground">
                           <div class="single_slider_main clearfix  productDetailDiv "><!-- remove class(mobileHode)-->
                              <div class="product_slider_thumb arrow_center wow zoomIn">
                                 <div class="product_thumb_item">
                                    <div class="thumb_inner">
                                       <img src="<?php echo $details['product_main_photo']; ?>"  alt="main-image" />
                                    </div>
                                 </div>
                                 <?php
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
                                 </div>
                                 <?php foreach ($details['product_gallery_images'] as $image) { ?>
                                    <div class="product_main_item ">
                                       <img src="<?php echo base_url(); ?>uploads/products/<?php echo $image; ?>"
                                          alt="gallery-image" />
                                    </div>
                                 <?php } ?>
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
                     <div class="mobileHide product_right" style="padding-bottom: 142px;">
                        <?php if ($details['remaining_quantity'] > 0) { ?>
                           <!-- <div class="product_information wow fadeInUp">
                         <div class="quantity_box">
                            <label><?php #echo lang('quantity'); ?></label>
                            <div class="quantity">
                               <input class="touch-spin-count-ver" readonly type="text" value="<?php #echo $quantity; ?>" name="pro_quantity">
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
                              <div class="product-button wow zoomIn"><a href="javascript:void(0);" data-type="product"
                                    data-guid="<?php echo $details['product_guid']; ?>" style="margin-bottom:10px;"
                                    class="btn btn_common add-to-cart"><?php echo lang('add_to_cart'); ?></a></div>
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
                              data-guid="<?php echo $details['product_guid']; ?>" class="btn btn_common add-to-cart"><?php echo lang('add_to_cart'); ?></a></div>
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
   window.addEventListener('resize', function(event) {
  var clientWidth = window.innerWidth;
  if(clientWidth<=768)
  {
   var card = document.getElementById("card_remove");
   console.log(card);
   card.classList.remove('card');
  }
</script>
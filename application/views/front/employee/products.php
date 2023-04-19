<style>

   .overlay{
      position: absolute;
      top: 0;
      right: 0;
      background: rgba(0, 0, 0, -1.5);
      width: 100%;
      height: 100%;
      backdrop-filter: brightness(0.3) blur(7px);
      z-index: 100;
      transition: all 1.5s;
      
   }
   
   .mobile-hide{
      height: 100%;
      background: white;
      transition: all 1.5s;
}
</style>

<main class="main_content">
   <div class="product_main">
      <div class="container">
         <div class="cardBlur">
            <section id="card">
               <img src="<?php echo base_url(); ?>/assets/images/testImage.png" className="card-img-top rounded" />
               <!-- <div class="inner_banner_sec">
            <div class="innerbanner_cap text-center productMain">
               <div class="container">
                  <div class="watermark_text">
                     <h1 class="head_1"><?php echo lang('products'); ?></h1> 
                     <p class="watermark wow zoomIn" data-wow-delay="0.4s"><?php echo $this->session->userdata('webuserdata')['client_configs']['shop_title']; ?></p>
                  </div>
               </div>
            </div>
         </div> -->
               <!-- <div class="welcomeText">
            <p><?php echo lang('welcome_note'); ?></p>
         </div> -->
            </section>
         </div>

         <div class="content_main_sec">
         <div class="div_button">
               <button class="filterButton">filters</button>
               
         </div>
         <div class="container-fluid">
            <div class="row">
               <div class="overlay d-none">
                  <div class="col-md-4 col-lg-4 col-xl-3 mobile-hide">
                     <div class="cat_sidebar">
                        <div class="sidebar_block">
                           <h4 class="sidebar_head wow fadeInDown">
                              <?php echo lang('budget_categories'); ?>
                           </h4>
                           <ul class="list-unstyled catlist_item">
                              <?php $category = $_REQUEST['budget_categories']; ?>
                             <li class="wow fadeInLeft" data-wow-delay="0.3s">
                              <input type="checkbox" id="chk_Apple" value="within" name="budget_category[]" class="budget-categories"/>
                              <label for="chk_Apple">
                              <span><i class="fas fa-check"></i></span> <?php echo lang('within_the_budget'); ?>
                              </label>
                           </li>
                              <?php if (count(@$above_the_budget_products['data']['total_records']) > 0) { ?>
                                 <li class="wow fadeInLeft" data-wow-delay="0.6s">
                                    <?php $checked = "";
                                    if ($category === 'above') {
                                       $checked = "checked1";
                                    } else {
                                       $checked = "uncheck";
                                    } ?>
                                    <input type="checkbox" id="chk_Canon" value="above" name="budget_category[]"
                                       class="budget-categories <?php echo $checked; ?> " <?php echo $category === 'above' ? 'checked' : '' ?> />
                                    <label for="chk_Canon">
                                       <span><i class="fas fa-check"></i></span>
                                       <?php echo lang('above_the_budget'); ?>
                                    </label>
                                 </li>
                              <?php } ?>
                           </ul>
                        </div>
                        <div class="sidebar_block">
                           <h4 class="sidebar_head wow fadeInDown">
                              <?php echo lang('main_categories'); ?>
                           </h4>
                           <ul class="list-unstyled catlist_item">
                              <?php if ($categories['data']['total_records']) {
                                 foreach ($categories['data']['records'] as $category) { ?>
                                    <li class="wow fadeInLeft" data-wow-delay="0.3s">
                                       <input type="checkbox" id="category_<?php echo $category['category_guid']; ?>"
                                          name="main_category[]" value="<?php echo $category['category_guid']; ?>" <?php echo in_array($category['category_guid'], $main_categories) ? 'checked' : '' ?>
                                          class="main_categories" />
                                       <label for="category_<?php echo $category['category_guid']; ?>">
                                          <span><i class="fas fa-check"></i></span>
                                          <?php echo $category['category_name']; ?>
                                       </label>
                                    </li>
                                 <?php }
                              } ?>
                           </ul>
                        </div>
                        <div class="sidebar_block hide_mobile">
                        <div class="new_arrival wow fadeInUp" data-wow-delay="0.4s">
                           <img src="images/new_arrival.jpg">
                           <h2 class="font_merienda">New <span>Arrival</span></h2>
                           <a href="#">Shop Now</a>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="filterDiv desktopHide">
                  <ul>
                     <li class="list-inline-item desktopHide filterIconBtn">

                        <img src="<?php echo base_url(); ?>assets/images/filter.svg">
                     </li>
                  </ul>
               </div>
               <div class="col-md-8 col-lg-8 col-xl-9">

                  <?php $type = $_REQUEST['budget_categories'];
                  if ($type === 'above') { ?>


                     <div class="list_row row">
                        <div class="col-sm-12">
                           <h2 class="head_common2 wow fadeInRight" style="display: none;">
                              <!-- <?php echo lang('products'); ?>(<?php echo addZero(@$within_the_budget_products['data']['total_records'] + @$above_the_budget_products['data']['total_records']); ?>)</h2> -->
                              <?php echo lang('products'); ?>(
                              <?php echo addZero(@$above_the_budget_products['data']['total_records']); ?>)
                           </h2>
                        </div>
                        <?php foreach ($above_the_budget_products['data']['records'] as $product) { ?>
                           <div class="prod_coll col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                              <div class="proimage">
                                 <div class="pro_img_box">
                                    <a
                                       href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img
                                          src="<?php echo $product['product_main_photo']; ?>" /></a>
                                    <!-- <a href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img src="https://images.unsplash.com/photo-1526947425960-945c6e72858f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHByb2R1Y3RzfGVufDB8fDB8fA%3D%3D&w=1000&q=80" /></a> -->
                                    <div class="hover_box">
                                       <?php $product_cart = is_product_into_cart($product['product_guid']);
                                       if ($product_cart['is_added_into_cart'] > 0) { ?>
                                          <a href="../employees/cart" class="add_cart">
                                             <?php echo lang('go_to_cart'); ?>
                                          </a>
                                       <?php } else { ?>
                                          <?php if ($product['remaining_quantity'] > 0) { ?>
                                             <a href="javascript:void(0);" data-type="product"
                                                data-guid="<?php echo $product['product_guid']; ?>"
                                                class="add_cart add-to-cart"><?php echo lang('add_to_cart'); ?></a>
                                          <?php } else { ?>
                                             <a href="javascript:void(0);" style="color:red;" class="add_cart">
                                                <?php echo lang('out_of_stock'); ?>
                                             </a>
                                          <?php }
                                       } ?>
                                    </div>
                                    <p class="productPrice">
                                       <?php echo lang('additional') . ' ' . CURRENCY_SYMBOL . $product['above_budget_price'];

                                       ?>
                                    </p>

                                 </div>
                                 <div class="pro_bottom clerfix">
                                    <div class="product_name">
                                       <a
                                          href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><?php echo $product['product_name']; ?></a>
                                    </div>
                                    <div class="product_description">
                                       <p>
                                          <?php echo str_replace("\n", "", $product['product_descprition']); ?>
                                       </p>
                                    </div>
                                    <!-- <div class="product_price">
                              <p><?php echo $product['category_name']; ?> (+ <?php echo CURRENCY_SYMBOL . $product['above_budget_price']; ?>) </p>
                              <?php if ($product['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                                  <p><?php echo lang('remaining_quantity'); ?> <?php echo $product['remaining_quantity']; ?> </p>
                              <?php } ?>
                              </div> -->
                                    <div class="readMore">
                                       <a
                                          href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img
                                             src="<?php echo base_url(); ?>assets/images/rightIcon.svg" /> <?php echo lang('more_details'); ?></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php } ?>
                        <!-- OBAID WORK HERE -->

                        <?php foreach ($within_the_budget_products['data']['records'] as $product) { ?>
                           <div class="prod_coll col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                              <div class="proimage">
                                 <div class="pro_img_box">
                                    <a
                                       href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img
                                          src="<?php echo $product['product_main_photo']; ?>" /></a>
                                    <!-- <a href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img src="https://images.unsplash.com/photo-1526947425960-945c6e72858f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHByb2R1Y3RzfGVufDB8fDB8fA%3D%3D&w=1000&q=80" /></a> -->
                                    <div class="hover_box">
                                       <?php $product_cart = is_product_into_cart($product['product_guid']);
                                       if ($product_cart['is_added_into_cart'] > 0) { ?>
                                          <a href="../employees/cart" class="add_cart">
                                             <?php echo lang('go_to_cart'); ?>
                                          </a>
                                       <?php } else { ?>
                                          <?php if ($product['remaining_quantity'] > 0) { ?>
                                             <a href="javascript:void(0);" data-type="product"
                                                data-guid="<?php echo $product['product_guid']; ?>"
                                                class="add_cart add-to-cart"><?php echo lang('add_to_cart'); ?></a>
                                          <?php } else { ?>
                                             <a href="javascript:void(0);" style="color:red;" class="add_cart">
                                                <?php echo lang('out_of_stock'); ?>
                                             </a>
                                          <?php }
                                       } ?>
                                    </div>
                                    <p class="productPrice">
                                       <?php echo lang('additional') . ' ' . CURRENCY_SYMBOL . $product['above_budget_price'];

                                       ?>
                                    </p>
                                 </div>
                                 <div class="pro_bottom clerfix">
                                    <div class="product_name">
                                       <a
                                          href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><?php echo $product['product_name']; ?></a>
                                    </div>
                                    <div class="product_description">
                                       <p>
                                          <?php echo str_replace("\n", "", $product['product_descprition']); ?>
                                       </p>
                                    </div>
                                    <!-- <div class="product_price">
                              <p><?php echo $product['category_name']; ?> (+ <?php echo CURRENCY_SYMBOL . $product['above_budget_price']; ?>) </p>
                              <?php if ($product['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                                  <p><?php echo lang('remaining_quantity'); ?> <?php echo $product['remaining_quantity']; ?> </p>
                              <?php } ?>
                              </div> -->
                                    <div class="readMore">
                                       <a
                                          href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img
                                             src="<?php echo base_url(); ?>assets/images/rightIcon.svg" /> <?php echo lang('more_details'); ?></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php } ?>
                        <!-- OBAID WORK END -->
                     </div>
                  <?php } else { ?>
                     <!-- obaid work here -->

                     <div class="list_row row">
                        <div class="col-sm-12" style="display: none;">
                           <h2 class="head_common2 wow fadeInRight mobileHide">
                              <?php echo lang('products'); ?> (
                              <?php echo addZero(@$within_the_budget_products['data']['total_records']); ?>)<span
                                 style="font-size: 10px;">Within the Budget</span>
                           </h2>
                        </div>
                        <?php foreach ($within_the_budget_products['data']['records'] as $product) { ?>
                           <div class="prod_coll col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                              <div class="proimage">
                                 <div class="pro_img_box">
                                    <a
                                       href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img
                                          src="<?php echo $product['product_main_photo']; ?>" /></a>
                                    <!-- <a href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img src="https://images.unsplash.com/photo-1526947425960-945c6e72858f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHByb2R1Y3RzfGVufDB8fDB8fA%3D%3D&w=1000&q=80" /></a> -->
                                    <div class="hover_box">
                                       <?php $product_cart = is_product_into_cart($product['product_guid']);
                                       if ($product_cart['is_added_into_cart'] > 0) { ?>
                                          <a href="../employees/cart" class="add_cart">
                                             <?php echo lang('go_to_cart'); ?>
                                          </a>
                                       <?php } else { ?>
                                          <?php if ($product['remaining_quantity'] > 0) { ?>
                                             <a href="javascript:void(0);" data-type="product"
                                                data-guid="<?php echo $product['product_guid']; ?>"
                                                class="add_cart add-to-cart"><?php echo lang('add_to_cart'); ?></a>
                                          <?php } else { ?>
                                             <a href="javascript:void(0);" style="color:red;" class="add_cart">
                                                <?php echo lang('out_of_stock'); ?>
                                             </a>
                                          <?php }
                                       } ?>
                                    </div>
                                    <?php
                                    if (count($this->cart->contents()) > 0 || count($order_details['order_product_details']) > 0) { ?>
                                       <p class="productPrice">
                                          <?php
                                          #if(count($this->cart->contents())>0)
                                          #{
                                          echo lang('price') . ' ' . CURRENCY_SYMBOL;
                                          echo $this->session->userdata('webuserdata')['employee_budget'];
                                          #}
                                          # else{
                                          #echo lang('additional') . ' ' .CURRENCY_SYMBOL. $product['above_budget_price']; 
                                          #  }
                                          ?>
                                       </p>
                                    <?php } ?>
                                 </div>
                                 <div class="pro_bottom clerfix">
                                    <div class="product_name">
                                       <a
                                          href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><?php echo $product['product_name']; ?></a>
                                    </div>
                                    <div class="product_description">
                                       <p>
                                          <?php echo str_replace("\n", "", $product['product_descprition']); ?>
                                       </p>
                                    </div>
                                    <!-- <div class="product_price">
                              <p><?php echo $product['category_name']; ?> (+ <?php echo CURRENCY_SYMBOL . $product['above_budget_price']; ?>) </p>
                              <?php if ($product['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                                  <p><?php echo lang('remaining_quantity'); ?> <?php echo $product['remaining_quantity']; ?> </p>
                              <?php } ?>
                              </div> -->
                                    <div class="readMore">
                                       <a
                                          href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img
                                             src="<?php echo base_url(); ?>assets/images/rightIcon.svg" /> <?php echo lang('more_details'); ?></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php } ?>
                     </div>
                     <!-- obaid work end -->

                     <?php if (!empty($within_the_budget_products) || !empty($packages)) { ?>
                        <div class="list_row packages_por row">
                           <?php if (!empty($packages)) { ?>
                              <div class="col-sm-12" style="display: none;">
                                 <h2 class="head_common2 wow fadeInRight mobileHide">
                                    <?php echo lang('packages'); ?> (
                                    <?php echo addZero($packages['data']['total_records']); ?>)
                                 </h2>
                              </div>
                           <?php } ?>
                           <!------ Single Image ---->

                           <?php foreach ($packages['data']['records'] as $package) { ?>
                              <div class="prod_coll col-xs-6 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                                 <div class="proimage">
                                    <?php
                                    $i = 0;
                                    if (count($package['products']['data']['records']) == 1) { ?>
                                       <div class="pro_img_box ">
                                          <?php foreach ($package['products']['data']['records'] as $package_product) {
                                             #echo count($package_product);exit;
                                             ?>

                                             <div class="oneimage">
                                                <a
                                                   href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img
                                                      src="<?php echo $package_product['product_main_photo']; ?>" /></a>
                                                <div class="hover_box">
                                                   <?php $package_cart = is_product_into_cart($package['package_guid']);
                                                   if ($package_cart['is_added_into_cart'] > 0) { ?>
                                                      <a href="../employees/cart" class="add_cart">
                                                         <?php echo lang('go_to_cart'); ?>
                                                      </a>
                                                   <?php } else { ?>
                                                      <?php if ($package['remaining_quantity'] > 0) { ?>
                                                         <a href="javascript:void(0);" data-type="package"
                                                            data-guid="<?php echo $package['package_guid']; ?>"
                                                            class="add_cart add-to-cart"><?php echo lang('add_to_cart'); ?></a>
                                                      <?php } else { ?>
                                                         <a href="javascript:void(0);" style="color:red;" class="add_cart">
                                                            <?php echo lang('out_of_stock'); ?>
                                                         </a>
                                                      <?php } ?>
                                                   <?php } ?>
                                                </div>
                                             </div>
                                          <?php } ?>
                                          <p class="tag">
                                             <?php echo lang('packages'); ?>
                                          </p>
                                       </div>
                                    <?php } else if (count($package['products']['data']['records']) == 2) { ?>
                                          <div class="pro_img_box two_item">
                                             <div class="row">
                                             <?php $j = 0;
                                             foreach ($package['products']['data']['records'] as $package_product) {
                                                #echo count($package_product);exit;
                                 
                                                ?>
                                                   <div class="col-6 twoimages first_col" <?php if ($j == 0) { ?>                <?php } else if ($j == 1) { ?>
                                                            class="second_col" <?php }
                                                   if ($j == 1) {
                                                      $j = 0;
                                                   }
                                                   $j++; ?>>
                                                      <a
                                                         href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img
                                                            style="height: 125px;"
                                                            src="<?php echo $package_product['product_main_photo']; ?>" /></a>

                                                      <!-- <p class="productPrice">
                                 200USD
                                 </p> -->
                                                   </div>
                                             <?php } ?>
                                             </div>
                                             <div class="hover_box">
                                             <?php $package_cart = is_product_into_cart($package['package_guid']);
                                             if ($package_cart['is_added_into_cart'] > 0) { ?>
                                                   <a href="../employees/cart" class="add_cart">
                                                   <?php echo lang('go_to_cart'); ?>
                                                   </a>
                                             <?php } else { ?>
                                                <?php if ($package['remaining_quantity'] > 0) { ?>
                                                      <a href="javascript:void(0);" data-type="package"
                                                         data-guid="<?php echo $package['package_guid']; ?>"
                                                         class="add_cart add-to-cart"><?php echo lang('add_to_cart'); ?></a>
                                                <?php } else { ?>
                                                      <a href="javascript:void(0);" style="color:red;" class="add_cart">
                                                      <?php echo lang('out_of_stock'); ?>
                                                      </a>
                                                <?php } ?>
                                             <?php } ?>
                                             </div>
                                             <p class="tag">
                                             <?php echo lang('packages'); ?>
                                             </p>
                                          </div>

                                    <?php } else if (count($package['products']['data']['records']) == 3) {

                                       ?>
                                             <div class="pro_img_box three_item">
                                                <div class="row">
                                             <?php $i = 0;
                                             $j = 0;
                                             foreach ($package['products']['data']['records'] as $package_product) { ?>
                                                <?php if ($i == 0) { ?>
                                                         <div class="col-6 first_col threeimages first_col">
                                                   <?php } ?>
                                                   <?php if ($i == 0 || $i == 1) { ?>
                                                            <a
                                                               href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img
                                                                  style="margin-bottom:3px; <?php if ($i == 1) { ?>margin-top:3px;<?php } ?>"
                                                                  src="<?php echo $package_product['product_main_photo']; ?>" /></a>
                                                   <?php } ?>
                                                   <?php if ($i == 1) { ?>
                                                         </div>
                                                <?php } ?>
                                                <?php if ($i == 2) { ?>
                                                         <div class="col-6 second_col">
                                                            <a
                                                               href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img
                                                                  style="min-height: 125px;max-height: 125px;"
                                                                  src="<?php echo $package_product['product_main_photo']; ?>" /></a>
                                                         </div>
                                                <?php } ?>
                                                <?php $i++;
                                             } ?>
                                                </div>
                                                <div class="hover_box">
                                             <?php $package_cart = is_product_into_cart($package['package_guid']);
                                             if ($package_cart['is_added_into_cart'] > 0) { ?>
                                                      <a href="../employees/cart" class="add_cart">
                                                   <?php echo lang('go_to_cart'); ?>
                                                      </a>
                                             <?php } else { ?>
                                                <?php if ($package['remaining_quantity'] > 0) { ?>
                                                         <a href="javascript:void(0);" data-type="package"
                                                            data-guid="<?php echo $package['package_guid']; ?>"
                                                            class="add_cart add-to-cart"><?php echo lang('add_to_cart'); ?></a>
                                                <?php } else { ?>
                                                         <a href="javascript:void(0);" style="color:red;" class="add_cart">
                                                      <?php echo lang('out_of_stock'); ?>
                                                         </a>
                                                <?php } ?>
                                             <?php } ?>
                                                </div>
                                                <p class="tag">
                                             <?php echo lang('packages'); ?>
                                                </p>
                                             </div>
                                    <?php } else if (count($package['products']['data']['records']) >= 4) { ?>

                                                <div class="pro_img_box three_item">
                                                   <div class="row">
                                             <?php $i = 0;
                                             foreach ($package['products']['data']['records'] as $package_product) { ?>
                                                <?php if ($i == 0) { ?>
                                                            <div class="col-6 first_col">
                                                   <?php } ?>
                                                   <?php if ($i == 0 || $i == 1) { ?>
                                                               <a
                                                                  href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img
                                                                     src="<?php echo $package_product['product_main_photo']; ?>" /></a>
                                                   <?php } ?>
                                                   <?php if ($i == 1) { ?>
                                                            </div>
                                                <?php } ?>
                                                <?php if ($i == 2) { ?>
                                                            <div class="col-6 second_col">
                                                   <?php } ?>
                                                   <?php if ($i == 2 || $i == 3) { ?>
                                                               <a
                                                                  href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img
                                                                     src="<?php echo $package_product['product_main_photo']; ?>" /></a>
                                                   <?php } ?>
                                                   <?php if ($i == 3) { ?>
                                                            </div>
                                                <?php } ?>
                                                <?php $i++;
                                             } ?>
                                                   </div>
                                                   <div class="hover_box">
                                             <?php $package_cart = is_product_into_cart($package['package_guid']);
                                             if ($package_cart['is_added_into_cart'] > 0) { ?>
                                                         <a href="../employees/cart" class="add_cart">
                                                   <?php echo lang('go_to_cart'); ?>
                                                         </a>
                                             <?php } else { ?>
                                                <?php if ($package['remaining_quantity'] > 0) { ?>
                                                            <a href="javascript:void(0);" data-type="package"
                                                               data-guid="<?php echo $package['package_guid']; ?>"
                                                               class="add_cart add-to-cart"><?php echo lang('add_to_cart'); ?></a>
                                                <?php } else { ?>
                                                            <a href="javascript:void(0);" style="color:red;" class="add_cart">
                                                      <?php echo lang('out_of_stock'); ?>
                                                            </a>
                                                <?php } ?>
                                             <?php } ?>
                                                   </div>
                                                   <p class="tag">
                                             <?php echo lang('packages'); ?>
                                                   </p>
                                                </div>

                                    <?php } ?>

                                    <div class="pro_bottom clerfix">
                                       <div class="product_name">
                                          <a
                                             href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><?php echo $package['package_name']; ?></a>
                                       </div>
                                       <!--  <div class="product_description">
                              <p><?php echo $package['product_descprition']; ?></p>
                           </div> -->
                                       <!--   <div class="product_price">
                              <p>(<?php echo addZero($package['no_of_products']); ?> <?php echo lang('products'); ?>)</p>
                              <?php if ($package['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                                  <p><?php echo lang('remaining_quantity'); ?> <?php echo $package['remaining_quantity']; ?> </p>
                              <?php } ?>
                              </div> -->
                                       <div class="product_name">
                                          <?php
                                          if (count($this->cart->contents()) > 0 || count($order_details['order_product_details']) > 0) {
                                             echo lang('additional') . ' ' . CURRENCY_SYMBOL;
                                             echo $this->session->userdata('webuserdata')['employee_budget'];
                                          }
                                          ?>
                                       </div>
                                       <div class="readMore">
                                          <!--  <a href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img src="<?php echo base_url(); ?>assets/images/leftIcon.svg" /> <?php echo lang('more_details'); ?>  </a> -->
                                          <a
                                             href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img
                                                src="<?php echo base_url(); ?>assets/images/rightIcon.svg" /> <?php echo lang('more_details'); ?> </a>

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php } ?>
                        </div>
                     <?php } ?>


                     <!-- <div class="packageDiv">
                     <div class="single_item">
                        <div class="hoverAbleImg">
                              <div class="imgDiv">
                                 <img src="https://galtexapp2.ussl.co.il/uploads/products/1640632146-299fdb35-89cd-fa8a-1c90-6b6aa31dcffd.jpg">
                              </div>
                              <div class="hover_box">
                                 <a href="javascript:void(0);" style="color:red;" class="add_cart">Add to Cart</a>
                              </div>
                        </div>
                        <div class="packageItemDetail">
                            <div class="package_name">
                              <a href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>">Package 1</a>
                           </div>
                        </div>
                        <div class="readMore">
                           <a href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img src="<?php echo base_url(); ?>assets/images/leftIcon.svg" /> More Details</a>
                        </div>
                        
                     </div>
                     <div class="single_item">
                        <div class="hoverAbleImg">
                              <div class="imgDiv">
                                 <img src="https://galtexapp2.ussl.co.il/uploads/products/1640632146-299fdb35-89cd-fa8a-1c90-6b6aa31dcffd.jpg">
                              </div>
                              <div class="hover_box">
                                 <a href="javascript:void(0);" style="color:red;" class="add_cart">Add to Cart</a>
                              </div>
                        </div>
                        <div class="packageItemDetail">
                            <div class="package_name">
                              <a href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>">Package 1</a>
                           </div>
                        </div>
                        <div class="readMore">
                           <a href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img src="<?php echo base_url(); ?>assets/images/leftIcon.svg" /> More Details</a>
                        </div>
                        
                     </div>
                     <div class="single_item">
                        <div class="hoverAbleImg">
                              <div class="imgDiv">
                                 <img src="https://galtexapp2.ussl.co.il/uploads/products/1640632146-299fdb35-89cd-fa8a-1c90-6b6aa31dcffd.jpg">
                              </div>
                              <div class="hover_box">
                                 <a href="javascript:void(0);" style="color:red;" class="add_cart">Add to Cart</a>
                              </div>
                        </div>
                        <div class="packageItemDetail">
                            <div class="package_name">
                              <a href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>">Package 1</a>
                           </div>
                        </div>
                        <div class="readMore">
                           <a href="<?php echo base_url(); ?>package/details/<?php echo $package['package_guid']; ?>"><img src="<?php echo base_url(); ?>assets/images/leftIcon.svg" /> More Details</a>
                        </div>
                        
                     </div>
                  </div> -->





                     <div class="list_row row">
                        <div class="col-sm-12" style="display: none;">
                           <h2 class="head_common2 wow fadeInRight mobileHide">
                              <?php echo lang('products'); ?> (
                              <?php echo addZero(@$above_the_budget_products['data']['total_records']); ?>)<span
                                 style="font-size: 10px;">
                                 <?php echo lang('above_the_budget'); ?>
                              </span>
                           </h2>
                        </div>
                        <?php foreach ($above_the_budget_products['data']['records'] as $product) { ?>
                           <div class="prod_coll col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                              <div class="proimage">
                                 <div class="pro_img_box">
                                    <a
                                       href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img
                                          src="<?php echo $product['product_main_photo']; ?>" /></a>
                                    <!-- <a href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img src="https://images.unsplash.com/photo-1526947425960-945c6e72858f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHByb2R1Y3RzfGVufDB8fDB8fA%3D%3D&w=1000&q=80" /></a> -->
                                    <div class="hover_box">
                                       <?php $product_cart = is_product_into_cart($product['product_guid']);
                                       if ($product_cart['is_added_into_cart'] > 0) { ?>
                                          <a href="../employees/cart" class="add_cart">
                                             <?php echo lang('go_to_cart'); ?>
                                          </a>
                                       <?php } else { ?>
                                          <?php if ($product['remaining_quantity'] > 0) { ?>
                                             <a href="javascript:void(0);" data-type="product"
                                                data-guid="<?php echo $product['product_guid']; ?>"
                                                class="add_cart add-to-cart"><?php echo lang('add_to_cart'); ?></a>
                                          <?php } else { ?>
                                             <a href="javascript:void(0);" style="color:red;" class="add_cart">
                                                <?php echo lang('out_of_stock'); ?>
                                             </a>
                                          <?php }
                                       } ?>
                                    </div>
                                    <p class="productPrice">
                                       <?php
                                       if (count($this->cart->contents()) > 0 || count($order_details['order_product_details']) > 0) {
                                          echo lang('additional') . ' ' . CURRENCY_SYMBOL;
                                          echo $product['above_budget_price'] + $this->session->userdata('webuserdata')['employee_budget'];
                                       } else {
                                          echo lang('additional') . ' ' . CURRENCY_SYMBOL;
                                          echo $product['above_budget_price'];

                                       }


                                       ?>
                                    </p>
                                 </div>
                                 <div class="pro_bottom clerfix">
                                    <div class="product_name" style="">
                                       <a
                                          href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><?php echo $product['product_name']; ?></a>
                                    </div>
                                    <div class="product_description">
                                       <p>
                                          <?php echo str_replace("\n", "", $product['product_descprition']); ?>
                                       </p>
                                    </div>
                                    <!-- <div class="product_price">
                              <p><?php echo $product['category_name']; ?> (+ <?php echo CURRENCY_SYMBOL . $product['above_budget_price']; ?>) </p>
                              <?php if ($product['remaining_quantity'] < REMAINING_PRODUCTS_QUANTITY_LIMIT) { ?>
                                  <p><?php echo lang('remaining_quantity'); ?> <?php echo $product['remaining_quantity']; ?> </p>
                              <?php } ?>
                              </div> -->
                                    <div class="readMore">
                                       <a
                                          href="<?php echo base_url(); ?>product/details/<?php echo $product['product_guid']; ?>"><img
                                             src="<?php echo base_url(); ?>assets/images/rightIcon.svg" /> <?php echo lang('more_details'); ?></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php } ?>
                     </div>



                  <?php } ?>



               </div>
            </div>
            <!-- <div class="pagination_main">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled prev">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><img src="<?php echo base_url(); ?>assets/images/arrow-left.png" /></a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item next">
                        <a class="page-link" href="#"><img src="<?php echo base_url(); ?>assets/images/arrow-right.png" /></a>
                    </li>
                </ul>
            </nav>
            </div> -->
         </div>
      </div>
      </div>
   </div>
</main>


<script>
   document.querySelector('.filterButton').addEventListener('click', function(e){
      e.stopPropagation();
      document.querySelector('.overlay').classList.remove('d-none')
   document.querySelector('.mobile-hide').style.transform = 'translate(0)';
});

document.querySelector('.overlay').addEventListener('click', function(e){
   this.classList.add('d-none')
document.querySelector('.mobile-hide').style.transform = 'translate(100%)';
});
</script>

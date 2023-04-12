<main class="main_content">
       <section class="inner_banner_sec" style="padding-bottom:30px;">
          <div class="innerbanner_cap text-center">
             <div class="container">
                <div class="watermark_text">
                   <h1 class="head_1"><?php echo lang('my_profile'); ?></h1>
                  <!-- <p class="watermark wow zoomIn mobileHide" data-wow-delay="0.4s"><?php #echo lang('my_profile'); ?></p> -->
                </div>
             </div>
          </div>
       </section>
       <section class="profile_sec personalArea">
         <div class="borderTopRadiusDiv"></div>
        <div class="container">
         <div class="profile_main clearfix">
           <ul class="nav nav-tabs responsive mb-5 mobileHide" id="profile_Tabs" role="tablist">
              <li class="nav-item wow fadeInLeft" data-wow-delay="0.3s">
                 <a class="nav-link active" id="personalinfo-tab" data-toggle="tab" href="#personalinfo" role="tab" aria-controls="personalinfo" aria-selected="true"><?php echo lang('my_profile'); ?></a>
              </li>
               <?php if(!empty($order_details)) { ?>
                 <li class="nav-item wow fadeInLeft" data-wow-delay="0.6s">
                    <a class="nav-link" id="addresses-tab" data-toggle="tab" href="#myOrder" role="tab" aria-controls="myOrder" aria-selected="false"><?php echo lang('order_details'); ?></a>
                 </li>
               <?php } ?>
           </ul>
           <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="personalinfo" role="tabpanel" aria-labelledby="personalinfo-tab">
                 <form class="custom_form wow zoomIn">
                    <div class="account_detail_main wow zoomIn" data-wow-delay="0.4s">
                       <h4><?php echo lang('personal_details'); ?></h4>
                       <div class="row">
                          <div class="col-sm-6 col-md-6 col-lg-4">
                             <div class="form-group focus_label">
                              <?php if(!isset($details['first_name'])) { ?> <label><?php echo lang('first_name'); ?></label> <?php } ?>
                                
                                <input type="text" class="form-control" readonly value="<?php echo $details['first_name']; ?>">
                             </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4">
                             <div class="form-group focus_label">
                              <?php if(!isset($details['last_name'])) { ?> <label><?php echo lang('last_name'); ?></label> <?php } ?>
                                
                                <input type="text" class="form-control" readonly value="<?php echo $details['last_name']; ?>">
                             </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4">
                             <div class="form-group focus_label">
                                 <?php if(!isset($details['phone_number'])) { ?> <label ><?php echo lang('mobile_number'); ?></label> <?php } ?>
                                
                                <input  type="tel" class="form-control" id="telephone" readonly value="<?php echo $details['phone_number']; ?>" >
                             </div>
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-4">
                             <div class="form-group focus_label">
                              <?php if(!isset($details['total_credits'])) { ?> <label ><?php echo lang('total_credits'); ?></label> <?php } ?>
                                
                                <input  type="tel" class="form-control" id="credits" readonly value="<?php echo $details['total_credits']; ?>">
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- <div class="profile_footer pb-5">
                       <button class="btn btn_common wow fadeInLeft" data-wow-delay="0.2s">Submit</button>
                       <button class="btn btn_common wow fadeInRight" data-wow-delay="0.6s">Cancel</button>
                    </div> -->
                 </form>
              </div>

                 <?php if(!empty($order_details)) { ?>
                 <div class="tab-pane fade" id="myOrder" role="tabpanel" aria-labelledby="addresses-tab">
                    <div class="account_detail_main custom_form">
                     <!--  <h4><?php echo lang('order_details'); ?></h4> -->
                      <h4><?php echo lang('purchase_made'); ?></h4>
                    <section class="order_sec mobileHide pb-5">
                         <div class="row">
                           <?php foreach($order_details['order_product_details'] as $key => $value) { ?>
                              <div class="col-md-12">
                                <div class="orderpro_item">
                                  <div class="row">
                                    <div class="col-auto">
                                      <?php if($value['type'] == 'Product') { ?>
                                          <img src="<?php echo $value['product_main_photo']; ?>" class="img-fluid img-thumbnail" width="100" alt="product">
                                      <?php } else { ?>
                                          <img src="<?php echo $value['products']['data']['records'][0]['product_main_photo']; ?>" class="img-fluid img-thumbnail" width="100" alt="product">
                                      <?php } ?>
                                    </div>
                                    <div class="col">
                                        <h4 class="cart_proname"><?php echo $value['product_package_name']; ?></h4>
                                        <p class="pro_pera"><?php echo @$value['product_descprition']; ?></p>
                                        <p class="orderpro_price"><label><?php echo lang('price'); ?> : </label> <?php echo CURRENCY_SYMBOL.$value['amount']; ?> </p>
                                        <p class="orderpro_qty"><label><?php echo lang('quantity'); ?> :</label><?php echo $value['quantity']; ?></p>
                                        <?php if(($key+1) == count($order_details['order_product_details'])) { ?>
                                        <div class="orderpro_totalprice"><?php echo lang('total_price'); ?> : <strong> <?php echo CURRENCY_SYMBOL.$order_details['order_amount']; ?></strong></div>
                                        <?php } ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                           <?php } ?>
                           <!-- <div class="col-md-4">
                             <div class="order_right">
                               <h4>Delivery Address</h4>
                               <p><label>Name : </label> Sorav Gard</p>
                               <p><label>Address : </label> 142 extension, tilak nagar near jain mandir,  Indore-452018, <br> Madhya Pradesh.</p>
                               <p><label>Mobile : </label> 0123456789</p>
                             </div>
                           </div> -->
                         </div>
                         <div class="ordercancel_btn text-right">
                           <?php if($order_details['order_status'] == 'Created') { ?>
                              <button type="button" class="btn_common btn btn-primary cancel-order" data-order-guid="<?php echo $order_details['order_guid']; ?>" ><?php echo lang('cancel_order'); ?></button>
                           <?php } else { ?>
                              <a href="javascript:void(0);" style="color:red;"><strong><?php echo lang('order_cancelled_at'); ?> : <?php echo convertDateTime($order_details['cancelled_date']); ?></strong></a>
                           <?php } ?>
                         </div>
                      
                     </section>
                     <section class="order_sec desktopHide pb-5" style="width: 100%;">
                         <div class="row">
                           <?php foreach($order_details['order_product_details'] as $key => $value) { ?>
                              <div class="col-md-12">
                                <div class="orderpro_item">


                                    <div class="orderItemDiv">
                                       <div class="productInfo">
                                          <div class="productAction"> 
                                             <div class="orderpro_totalprice"><strong> <?php echo CURRENCY_SYMBOL.$order_details['order_amount']; ?></strong></div></div>
                                          <div class="productName">
                                             <h4 class="cart_proname"><?php echo $value['product_package_name']; ?></h4>
                                             <p class="orderpro_qty"><label>x</label><?php echo $value['quantity']; ?></p>
                                          </div>
                                       </div>
                                       <div class="productImg">
                                           <?php if($value['type'] == 'Product') { ?>
                                          <img src="<?php echo $value['product_main_photo']; ?>" class="img-fluid img-thumbnail" width="100" alt="product">
                                         <?php } else { ?>
                                             <img src="<?php echo $value['products']['data']['records'][0]['product_main_photo']; ?>" class="img-fluid img-thumbnail" width="100" alt="product">
                                         <?php } ?>
                                       </div>
                                    </div> 
                                 <!--  <div class="row">
                                    <div class="col-auto">
                                      <?php if($value['type'] == 'Product') { ?>
                                          <img src="<?php echo $value['product_main_photo']; ?>" class="img-fluid img-thumbnail" width="100" alt="product">
                                      <?php } else { ?>
                                          <img src="<?php echo $value['products']['data']['records'][0]['product_main_photo']; ?>" class="img-fluid img-thumbnail" width="100" alt="product">
                                      <?php } ?>
                                    </div>
                                    <div class="col">
                                        <h4 class="cart_proname"><?php echo $value['product_package_name']; ?></h4>
                                        <p class="pro_pera"><?php echo @$value['product_descprition']; ?></p>
                                        <p class="orderpro_price"><label><?php echo lang('price'); ?> : </label> <?php echo CURRENCY_SYMBOL.$value['amount']; ?> </p>
                                        <p class="orderpro_qty"><label><?php echo lang('quantity'); ?> :</label><?php echo $value['quantity']; ?></p>
                                        <?php if(($key+1) == count($order_details['order_product_details'])) { ?>
                                        <div class="orderpro_totalprice"><?php echo lang('total_price'); ?> : <strong> <?php echo CURRENCY_SYMBOL.$order_details['order_amount']; ?></strong></div>
                                        <?php } ?>
                                    </div>
                                  </div> -->
                                </div>
                              </div>
                           <?php } ?>
                           <!-- <div class="col-md-4">
                             <div class="order_right">
                               <h4>Delivery Address</h4>
                               <p><label>Name : </label> Sorav Gard</p>
                               <p><label>Address : </label> 142 extension, tilak nagar near jain mandir,  Indore-452018, <br> Madhya Pradesh.</p>
                               <p><label>Mobile : </label> 0123456789</p>
                             </div>
                           </div> -->
                         </div>
                          <div class="totalDiv">
                              <p><?php echo CURRENCY_SYMBOL.$value['amount']; ?></p>
                              <p><?php echo $value['quantity']; ?> items</p>
                              <p><b>Total</b></p>
                           </div>
                         <div class="ordercancel_btn text-right">
                           <?php if($order_details['order_status'] == 'Created') { ?>
                              <button type="button" class="btn_common btn btn-primary cancel-order" data-order-guid="<?php echo $order_details['order_guid']; ?>" ><?php echo lang('cancel_order'); ?></button>
                           <?php } else { ?>
                              <a href="javascript:void(0);" style="color:red;"><strong><?php echo lang('order_cancelled_at'); ?> : <?php echo convertDateTime($order_details['cancelled_date']); ?></strong></a>
                           <?php } ?>
                         </div>
                      
                     </section>



                   </div>
                 </div>
               <?php } ?>

                 
         </div>
        </div>
     </div>
        <div class="borderBottomRadiusDiv"></div>
      </section>
    </main>
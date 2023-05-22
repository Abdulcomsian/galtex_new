<main class="main_content cartSection">
  <!-- <section class="inner_banner_sec">
          <div class="innerbanner_cap text-center">
             <div class="container">
                <div class="watermark_text">
                   <h1 class="head_1"><?php echo lang('cart'); ?></h1>
                   <p class="watermark wow zoomIn" data-wow-delay="0.4s"><?php #echo lang('cart'); ?></p>
                </div>
             </div>
          </div>
       </section> -->
  <section class="cart_sec">
    <div class="add_to_card">
      <div class="backToStore"><!-- remove the class(desktopHide backToStore)-->
        <div class="wow zoomIn"><a href="../employees/products" class="btn" style="color:black;font-size: 20px !important;
    font-family: 'AssistantBold';"><img src="<?php echo base_url(); ?>assets/images/rightIcon.svg" /></span>
            <?php echo lang('back'); ?></span> <span style="color: #000; position: relative; left: -15px;"><span>
          </a></div>
      </div>
    </div>
    <div class="container cart_main_content">
      <div class="container card cart_card">
        <div class="col-md-12">
          <div class="watermark_text">
            <h1 class="cart_heading">עגלת הקניות שלך
              <!-- <?php echo lang('cart'); ?> -->
            </h1>
          </div>

          <div class="container p-0">
            <div class="container p-0">
              <div class="cart_left">

                <?php if (!empty($cart)) {
                  $total_amount = (array_sum(array_column($cart, 'subtotal')) - $this->session->userdata('webuserdata')['employee_budget']);
                  $i = 1;
                  foreach ($cart as $rowid => $value) {
                    ; ?>
                    <div class=" cart_items">
                      <div style="display:flex;    align-items: center;">
                        <?php if ($value['options']['type'] == 'package') { ?>
                          <img src="<?php echo $value['options']['product_main_photos'][0]; ?>"
                            class="img-fluid img-thumbnail" width="100" alt="product">
                        <?php } else { ?>
                          <img src="<?php echo '../uploads/products/' . $value['options']['product_main_photo']; ?>"
                            class="img-fluid img-thumbnail" width="100" alt="product">
                        <?php } ?>
                        <div class="itemDetail">
                          <h4>
                            <?php echo $value['name']; ?>
                          </h4>
                          <p>
                            <span>x
                              <?php echo $value['qty']; ?>
                            </span>
                          </p>
                        </div>
                      </div>
                      <?php if ($value['options']['type'] == 'package') { ?>
                        <!-- <p class="pro_pera">
                          <?php echo $value['options']['no_of_products'] . " " . lang('products'); ?>
                        </p> -->
                      <?php } else { ?>
                        <!-- <p class="pro_pera"><?php // echo $value['options']['product_descprition']; ?></p> -->
                      <?php } ?>
                      <p>
                        <?php echo showCartPrice($i++, $rowid) . CURRENCY_SYMBOL; ?>
                      </p>
                    </div>

                  <?php }
                } else { ?>
                  <?php echo lang('cart_empty'); ?>
                <?php } ?>
                <div class="cart_sub_total">
                  <div style="display:contents;">
                    <h5 class="clearfix pricetotal">
                      <?php echo lang('total_amount') ?>
                    </h5>
                    <span><?php echo count($this->cart->contents()); ?> פריטים</span>
                  </div>
                  <p>
                    <?php echo $total_amount . CURRENCY_SYMBOL; ?>
                  </p>
                </div>
                <div class="checkout_btn">
                  <a href="checkout" class="btn btn_common "><!-- remove class(wow zoomInUp)-->
                    <?php echo lang('checkout'); ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
          

          <!-- <form method="post">
            <div class="cart_left">
              <table class="table table-striped cart_table wow fadeInUp">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th class="text-left" scope="col">
                      <?php echo lang('product') . "/" . lang('package'); ?>
                    </th>
                    <?php echo lang('price'); ?>
                    <th scope="col">
                      <?php echo lang('quantity'); ?>
                    </th>
                    <th scope="col">
                      <?php echo lang('total') . " " . lang('price'); ?>
                    </th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($cart)) {
                    $i = 1;
                    foreach ($cart as $rowid => $value) {
                      ; ?>
                      <tr class="wow fadeInLeft" data-wow-delay="0.3s">
                        <td>
                          <?php if ($value['options']['type'] == 'package') { ?>
                            <img src="<?php echo $value['options']['product_main_photos'][0]; ?>" width="100" alt="product">
                          <?php } else { ?>
                            <img src="<?php echo '../uploads/products/' . $value['options']['product_main_photo']; ?>"
                              class="img-fluid img-thumbnail" width="100" alt="product">
                          <?php } ?>
                        </td>
                        <td class="text-left">
                          <h4 class="cart_proname">
                            <?php echo $value['name']; ?>
                          </h4>
                          <?php if ($value['options']['type'] == 'package') { ?>
                            <p class="pro_pera">
                            <?php echo $value['options']['no_of_products'] . " " . lang('products'); ?>
                            </p>
                          <?php } else { ?>
                           <p class="pro_pera"><?php // echo $value['options']['product_descprition']; ?></p>
                          <?php } ?>
                        </td>
                         <td data-title="Price"><?php echo CURRENCY_SYMBOL . $value['price']; ?></td> 
                        <td class="qty" data-title="Qty"><input min="1" type="number"
                            name="quantities[<?php echo $value['rowid']; ?>]" class="form-control" id="input1"
                            value="<?php echo $value['qty']; ?>"></td>

                        <td data-title="Total">
                          <?php echo CURRENCY_SYMBOL . showCartPrice($i++, $rowid); ?>
                        </td>
                        <td class="remove_cart_item">
                          <a href="javascript:void(0);"
                            onclick="showConfirmationBox('<?php echo lang('are_you_sure'); ?>','<?php echo lang('are_you_want_to_remove'); ?>','<?php echo lang('yes'); ?>','<?php echo lang('no'); ?>','../employees/remove_from_cart/<?php echo $value['rowid']; ?>')"
                            class="btn btn-danger btn-sm">
                            <i class="fas fa-times"></i>
                          </a>
                        </td>
                      </tr>
                    <?php }
                  } else { ?>
                    <tr>
                      <td colspan="6">
                        <?php echo lang('cart_empty'); ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php if (!empty($cart)) { ?>
                <div class="table_bottom_btn clearfix pt-3">
                  <button type="submit" class="btn btn_common wow zoomInRight float-right" style="margin-bottom:10px;">
                    <?php echo lang('update_cart'); ?>
                  </button>
                </div>
              <?php } ?>
            </div>
          </form> -->
        </div>
        <!-- <?php if (!empty($cart)) { ?>
          <div class="col-md-4">
            <div class="cart_right">
              <div class="checkout_btm wow zoomIn">
                <?php $total_amount = (array_sum(array_column($cart, 'subtotal')) - $this->session->userdata('webuserdata')['employee_budget']); ?>
                <ul>
                  <li>
                    <h5 class="clearfix pricetotal">
                      <?php echo lang('total_amount'); ?>: <span class="price text-success">
                        <?php echo CURRENCY_SYMBOL . $total_amount; ?>
                      </span>
                    </h5>
                  </li>
                  <?php if ($user_details['total_credits'] > 0 && $total_amount > 0) {
                    $credits_minus = ($user_details['total_credits'] > $total_amount) ? $total_amount : $user_details['total_credits'];
                    ?>
                    <li>
                      <h5 class="clearfix creditstotal">
                        <?php echo lang('credits_balance'); ?>: <span class="price text-danger"> (-)
                          <?php echo CURRENCY_SYMBOL . $credits_minus; ?>
                        </span>
                      </h5>
                    </li>
                    <li>
                      <h5 class="clearfix creditstotal">
                        <?php echo lang('payable_amount'); ?>: <span class="price text-success">
                          <?php echo CURRENCY_SYMBOL . ($total_amount - $credits_minus); ?>
                        </span>
                      </h5>
                    </li>
                  <?php } ?>
                  <li>
                    <a href="checkout" class="btn btn_common wow zoomInUp">
                      <?php echo lang('checkout'); ?>
                    </a>
                    <div class="text-center pt-3">
                      <a href="../employees/products" class="hover_dash">
                        <?php echo lang('shopping_continue'); ?>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?> -->
      </div>
    </div>
  </section>
  <!-- <div class="shoppingCart">
    <div class="headerCart">
      <img
        src="<?php echo base_url(); ?>uploads/company/<?php echo $this->session->all_userdata()['webuserdata']['client_configs']['company_logo']; ?>">
      <a href="/">
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
        <img src="<?php echo base_url(); ?>assets/images/rightShoppingIcon.svg"> 
      </a>
    </div>
    <div class="cartList">
      <h4>
        <?php echo lang('shopping_cart'); ?>
      </h4>


      <ul>
        <?php if (!empty($cart)) {
          $i = 1;
          foreach ($cart as $rowid => $value) {
            ; #print_r($value);exit; ?>
            <li>
              <img
                onclick="showConfirmationBox('<?php echo lang('are_you_sure'); ?>','<?php echo lang('are_you_want_to_remove'); ?>','<?php echo lang('yes'); ?>','<?php echo lang('no'); ?>','../employees/remove_from_cart/<?php echo $value['rowid']; ?>')"
                class="crossImg" src="<?php echo base_url(); ?>assets/images/shoppingCancel.svg">
              <div class="itemCart">
                <div class="itemDetail">
                  <h5>
                    <?php echo $value['name']; ?>
                  </h5>
                  <p>
                    <span>
                      <?php echo CURRENCY_SYMBOL . $value['price']; ?>
                    </span>
                    <span>x
                      <?php echo $value['qty']; ?>
                    </span>
                  </p>
                </div>
                <?php if ($value['options']['type'] == 'package') { ?>
                  <img src="<?php echo $value['options']['product_main_photos'][0]; ?>" width="100" alt="product">
                <?php } else { ?>
                  <img src="<?php echo '../uploads/products/' . $value['options']['product_main_photo']; ?>"
                    class="img-fluid img-thumbnail" width="100" alt="product">
                <?php } ?>
              </div>
            </li>

          <?php }
        } else { ?>
          <li style="color: #fff; text-align: center;">
            <?php echo lang('cart_empty'); ?>
          </li>
        <?php } ?>
      </ul>
      <?php if (!empty($cart)) { ?>
        <div class="cartTotal">
          <ul>
            <li>
              <?php echo CURRENCY_SYMBOL . $value['price']; ?>
            </li>
            <li>
              <?php echo $value['qty']; ?> items
            </li>
            <li>Total</li>
          </ul>
        </div>
        <button class="continuePayment">
          <a style="color: #fff !important;" href="checkout">
            <?php echo lang('continue_payment'); ?>
          </a>
        </button>
      <?php } ?>
    </div>

  </div> -->
</main>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    if ($(window).width() < 768) {
      $(".shoppingCart").css("right", "0px")
      $(".hdr_main").addClass("blurMe")
      $(".main_content").addClass("blurMe")
      $(".footer_sec").addClass("blurMe")
      $(".shoppingCart").css("transition", "none")
    }
    window.addEventListener('resize', function (event) {
      if ($(window).width() < 768) {
        $(".shoppingCart").css("right", "0px")
        $(".filterBox").removeClass("blockItem")
        $(".hdr_main").addClass("blurMe")
      }
      else {
        $(".shoppingCart").css("right", "-350px")
        $(".hdr_main").removeClass("blurMe")

      }
    }, true);

  })
</script>
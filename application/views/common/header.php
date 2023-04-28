<?php
$color_code = $this->session->all_userdata()['webuserdata']['client_configs']['theme_color'];
$company_logo = $this->session->all_userdata()['webuserdata']['client_configs']['company_logo'];
$language = $this->session->userdata('language');
?>

<!doctype html>
<html lang="<?php echo $language; ?>" class="lang_<?php echo $language; ?>"
   dir="<?php echo ($language == 'he') ? 'rtl' : 'ltr'; ?>">

<head>
   <script>
      function setActive(event) {
         const menuItem = document.querySelectorAll('nav-link');
         menuItem.forEach(item => item.class.addList.remove('active'));

         console.log("here");
         const clickedItem = event.target;
         clickedItem.classList.add('active');
      }
   </script>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png" />

   <!-- Bootstrap CSS -->

   <?php if ($language == 'he') { ?>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/rtl-bootstrap.min.css">
   <?php } else { ?>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
   <?php } ?>

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome-all.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.bootstrap-touchspin.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nprogress.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toastr.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
   <!--      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"> -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick-theme.css">
   <title>
      <?php echo SITE_NAME; ?> ::
      <?php echo @$title; ?>
   </title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@500&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200&display=swap" rel="stylesheet">
   <style type="text/css">
      /** theme color update start**/
      .hdr_top_bar,
      .btn_common,
      .btn_common:hover,
      .hover_dash:before,
      .catlist_item li input[type=checkbox]:checked~label span,
      h2.head_common2:after,
      .quantity .btn-primary:hover,
      .cart_table thead,
      .form-control.change-language,
      .continuePayment,
      .pro_img_box .productPrice {
         /* background: linear-gradient(to left, rgba(255, 255, 255, 0.5), rgba(0, 0, 0, 0.5)),
            <?php #echo $color_code; ?>
         ;
         */
         /* background: <?php echo $color_code; ?>
         ;
         */ background: #963491;
      }

      .inner_banner_sec,
      .pagination_main .page-link.active,
      .profile_main .nav-tabs .nav-link.active,
      .custom-radio .custom-control-input:checked~.custom-control-label::before,
      .nav_right li .badge,
      .main_content .addToCartDiv,
      .innerbanner_cap.mobileCap .tagDiv p,
      .main_content .additionalCosts,
      .change-language ul li:nth-child(1):after,
      .packages_por p.tag {
         background: linear-gradient(to left, rgba(255, 255, 255, 0.5), rgba(0, 0, 0, 0.5)),
            <?php echo $color_code; ?>
         ;
         /*  background-color: <?php echo $color_code; ?>
         ;
         */
      }

      a,
      .hdr_main .navbar-nav .nav-link:hover,
      .get_opt,
      .hover_dash:hover,
      .catlist_item a:hover,
      .sort_by_list ul li a:hover,
      .pro_view_main li button:hover,
      .pro_view_main li.active button,
      .breadcrumb-item a:hover,
      .pagination_main .page-link:hover,
      .custom_form h4,
      .checkout_sec .account_detail_main>h4,
      .filterBox .filterHeader button,
      .shoppingCart .headerCart a,
      .mobileHeader button {
         color:
            <?php echo $color_code; ?>
         ;
      }

      .btn_common:hover,
      .catlist_item li input[type=checkbox]:checked~label span,
      .thumb_inner:hover,
      .custom_form .form-group .form-control:focus,
      .profile_main .nav-tabs .nav-link.active {
         border-color: transparent;
         border: none;
         /*border-color:<?php echo $color_code; ?>
         ;
         */
      }

      .btn_common {
         outline-color:
            <?php echo $color_code; ?>
         ;
      }

      .filterBox .filterCategory .catlist_item li input[type="checkbox"]:checked:after,
      .change-language ul li:nth-child(1):after {
         background: linear-gradient(to left, rgba(255, 255, 255, 0.5), rgba(0, 0, 0, 0.5)),
            <?php echo $color_code; ?>
         ;
      }

      .filterBox .filterCategory .catlist_item li input[type="checkbox"]:before,
      .prod_coll .proimage,
      .packageDiv .single_item {
         border-color: #eee;
         <?php #echo $color_code; ?>
         ;
      }

      .prod_coll .proimage:hover {
         border-bottom: 1px solid #963491;
         border-radius: 0px;
      }

      .packages_por .prod_coll .proimage .pro_img_box {
         background: linear-gradient(to left, rgba(0, 0, 0, 0.01), rgba(0, 0, 0, 0.01)),
            <?php echo $color_code; ?>
            90;
      }

      /** theme color update end**/


      .main_content .addToCartDiv {
         border-radius: 0.25rem;
      }
   </style>
</head>

<body>

   <header class="header_sec">
      <!-- <div class="hdr_top_bar">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-6">
                     <div class="hdr_left_block">
                        <ul>
                           <li>
                              <a href="javascript:void(0);"><i class="fas fa-text"></i><?php echo $this->session->userdata('webuserdata')['client_configs']['shop_title']; ?></a>
                           </li>
                           <li>
                              <a target="_blank" href="javascript:void(0);"><i class="fab fa-whatsapp"></i><?php echo $this->session->all_userdata()['webuserdata']['client_configs']['contact_number']; ?></a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-6 text-right">
                     <div class="hdrbudget" style="display:none;">
                        <?php echo lang('budget'); ?> <?php echo CURRENCY_SYMBOL; ?><?php echo $this->session->userdata('webuserdata')['employee_budget']; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div> -->
      <div class="hdr_main">
         <nav class="navbar navbar-expand-lg">
            <div class="menu_bar">
               <a href="<?php echo base_url(); ?>" class="companyLogo desktopHide mobileHide"> <img
                     src="<?php echo base_url(); ?>uploads/company/<?php echo $company_logo; ?>" alt="logo"
                     style="height:60px;"></a>
               <div class="logo_main">
                  <a href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>uploads/company/logoImg.svg"
                        alt="logo" style="height:40px;"></a>
               </div>
               <!--   <div class="change-language desktopHide mainLangague">
                    <ul>
                        <li>
                            <input type="text" readonly name="" value="en" >
                            <!-- <a value="en" <?php if ($this->session->userdata('language') == 'en')
                               echo "selected"; ?>>EN</a> 
                        </li>
                        <li>
                            <input type="text" readonly name="" value="he" >
                            <!-- <a value="he" <?php if ($this->session->userdata('language') == 'he')
                               echo "selected"; ?>>HB</a> 
                        </li>
                    </ul>
                </div>  -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <img src="<?php echo base_url(); ?>assets/images/menu.png" alt="">
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <div class="mobileHeader">
                     <div class="row">
                        <div class="col-6">
                           <img src="<?php echo base_url(); ?>uploads/company/<?php echo $company_logo; ?>" alt="logo"
                              style="height:60px;">
                        </div>
                        <div class="col-6">
                           <button>
                              <!-- <img src="<?php echo base_url(); ?>assets/images/closeIcon.svg" alt=""> -->
                              <i class="fa fa-times" aria-hidden="true"></i>

                           </button>
                        </div>
                     </div>
                  </div>
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url(); ?>" onclick="setActive(event)"><?php echo lang('home'); ?></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#havingTroubleModal"
                           onclick="setActive(event)">
                           <?php echo lang('contact_us'); ?>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url(); ?>" onclick="setActive(event)"><?php echo lang('about_us'); ?></a>
                     </li>
                     <!-- <li class="nav-item">
                            <a class="nav-link" href="https://app.galtex.co.il/employees/cart"><?php echo lang('cart'); ?></a>
                        </li> -->
                     <li class="nav-item">
                        <a class="nav-link " href="https://app.galtex.co.il/employees/profile#myOrder"
                           onclick="setActive(event)">
                           <?php echo lang('personal_area'); ?>
                        </a>
                     </li>


                     <!--   <li class="desktopHide">
                              <a class="nav-link" href="<?php echo base_url(); ?>employees/profile">
                              <?php echo lang('my_account'); ?>
                              </a>
                           </li>
 -->
                     <li style="text-align: center;">
                        <div class="change-language desktopHide mainLangague" style="padding-top: 35px;">
                           <ul>
                              <li>
                                 <input type="text" readonly name="" value="en">
                                 <!-- <a value="en" <?php if ($this->session->userdata('language') == 'en')
                                    echo "selected"; ?>>EN</a> -->
                              </li>
                              <li>
                                 <input type="text" readonly name="" value="he">
                                 <!-- <a value="he" <?php if ($this->session->userdata('language') == 'he')
                                    echo "selected"; ?>>HB</a> -->
                              </li>
                           </ul>
                        </div>
                     </li>


                  </ul>
                  <!-- <select class="form-control change-language col-sm-2 mobileHide">
                     <option value="en" <?php if ($this->session->userdata('language') == 'en')
                        echo "selected"; ?>>English
                        (EN)</option>
                     <option value="he" <?php if ($this->session->userdata('language') == 'he')
                        echo "selected"; ?>>Hebrew
                        (HE)</option>
                  </select> -->

                  <div class="socialMedia">
                     <!--  <select class="form-control change-language col-sm-2">
                        <option value="en" <?php if ($this->session->userdata('language') == 'en')
                           echo "selected"; ?>>English (EN)</option>
                        <option value="he" <?php if ($this->session->userdata('language') == 'he')
                           echo "selected"; ?>>Hebrew (HE)</option>
                    </select>  -->
                     <p class="logoutText">
                        <a href="javascript:void(0);"
                           onclick="showConfirmationBox('<?php echo lang('are_you_sure'); ?>','<?php echo lang('are_you_sure_logout'); ?>','<?php echo lang('yes'); ?>','<?php echo lang('no'); ?>','<?php echo base_url(); ?>home/logout/<?php echo $this->login_session_key; ?>')">
                           <span><img src="<?php echo base_url(); ?>assets/images/icon_logout.svg" alt=""></span>
                           <?php echo lang('logout'); ?>
                        </a>
                     </p>
                     <p>
                        <?php echo lang('social_media'); ?>
                     </p>
                     <ul class="social_main list-unstyled mb-0">
                        <li class="list-inline-item">
                           <a href="javascript:void(0);" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                           <a href="javascript:void(0);" target="_blank"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                           <a href="javascript:void(0);" target="_blank"><i class="fab fa-google"></i></a>
                        </li>
                        <li class="list-inline-item">
                           <a href="javascript:void(0);" target="_blank"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                           <a href="javascript:void(0);" target="_blank"><i class="fab fa-youtube"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>

               <div class="mobile_toggle_area"></div>
               <ul class="nav_right">
                  <!-- <li class="list-inline-item user_item mobileHide"> -->
                  <!-- <a href="javascript:void(0);" class="userdd_open"><img src="<?php echo base_url(); ?>assets/images/user.png"></a> -->
                  <!--  <a href="javascript:void(0);" class="userdd_open"> <i class="fa fa-user-o" aria-hidden="true"></i></a> -->
                  <!-- <ul class="dropdown-hover">
                           <li>
                              <a href="<?php echo base_url(); ?>employees/profile">
                              <span><img src="<?php echo base_url(); ?>assets/images/icon_myaccount.svg" alt=""></span> <?php echo lang('my_account'); ?>
                              </a>
                           </li>
                           <li>
                              <a href="javascript:void(0);" onclick="showConfirmationBox('<?php echo lang('are_you_sure'); ?>','<?php echo lang('are_you_sure_logout'); ?>','<?php echo lang('yes'); ?>','<?php echo lang('no'); ?>','<?php echo base_url(); ?>home/logout/<?php echo $this->login_session_key; ?>')">
                              <span><img src="<?php echo base_url(); ?>assets/images/icon_logout.svg" alt=""></span> <?php echo lang('logout'); ?>
                              </a>
                           </li>
                        </ul> -->
                  <!-- </li> -->
                  <!-- <li class="list-inline-item desktopHide filterIconBtn">

                        <img src="<?php echo base_url(); ?>assets/images/filter.svg">
                     </li> -->
                  <?php if (!empty($this->cart->contents())) { ?>
                     <?php
                        $url = $_SERVER['REQUEST_URI'];
                        $urlParam = explode("/", $url);
                        $class= $urlParam[sizeof($urlParam) - 1] == 'cart' ? "active_cart" : "";
                        ?>
                     <li class="list-inline-item  <?=$class?>">
                        <a class="open-cart-sidebar" href="<?php echo base_url(); ?>employees/cart">
                           <img src="<?php echo base_url(); ?>assets/images/<?=$class=="active_cart"?"shoping_cart.png":"shopping_cart_black_24dp.svg"?>">
                           <span class="top-cart-info-count badge badge-pill <?=($class=="active_cart"?"d-none":"")?>">
                              <?php echo count($this->cart->contents()); ?>
                           </span>
                        </a>
                     </li>
                  <?php } else { ?>
                     <li class="list-inline-item">
                        <a class="open-cart-sidebar" href="javascript:void(0)">
                           <img src="<?php echo base_url(); ?>assets/images/shopping_cart_black_24dp.svg">
                           <span class="top-cart-info-count badge badge-pill">0</span>
                        </a>
                     </li>
                  <?php } ?>
               </ul>
            </div>
            <div class="filterBox">
               <div class="filterHeader">
                  <div class="closingBtn">
                     <button>
                        <!-- <img src="<?php echo base_url(); ?>assets/images/closeIcon.svg"> -->
                        <i class="fa fa-times" aria-hidden="true"></i>
                     </button>
                  </div>
               </div>
               <div class="filterCategory">
                  <h4 class="sidebar_head wow fadeInDown">
                     <?php echo lang('budget_categories'); ?>
                  </h4>
                  <ul class="list-unstyled catlist_item">
                     <?php $category = $_REQUEST['budget_categories']; ?>
                     <!-- <li class="wow fadeInLeft" data-wow-delay="0.3s">
                           <input type="checkbox" id="chk_Apple" value="within" name="budget_category[]" class="budget-categories2"/>
                           <label for="chk_Apple">
                           <span><i class="fas fa-check"></i></span> <?php echo lang('within_the_budget'); ?>
                           </label>
                        </li> -->

                     <li class="wow fadeInLeft" data-wow-delay="0.6s">
                        <input type="checkbox" id="chk_Canon" value="above" name="budget_category[]"
                           class="budget-categories2" <?php echo $category === 'above' ? 'checked' : '' ?> />
                        <label for="chk_Canon">
                           <?php echo lang('above_the_budget'); ?>
                        </label>


                     </li>
                  </ul>
               </div>
               <?php #print_r($categories['data']['records']); exit;?>
               <div class="filterCategory">
                  <h4>
                     <?php echo lang('filter_category'); ?>
                  </h4>
                  <p>
                     <?php echo lang('category'); ?>
                  </p>
                  <ul class="list-unstyled catlist_item">
                     <?php if ($categories['data']['total_records']) {
                        foreach ($categories['data']['records'] as $category) { ?>
                           <li class="wow fadeInLeft" data-wow-delay="0.3s">
                              <input type="checkbox" id="category_<?php echo $category['category_guid']; ?>"
                                 name="main_category[]" value="<?php echo $category['category_guid']; ?>" <?php if (in_array($category['category_guid'], $main_categories))
                                       echo "checked"; ?>
                                 class="main_categories2" />
                              <label for="category_<?php echo $category['category_guid']; ?>">
                                 <?php echo $category['category_name']; ?>
                              </label>


                           </li>
                        <?php }
                     } ?>
                  </ul>
               </div>

            </div>
            <div class="blurEffect">

            </div>
         </nav>
      </div>

   </header>
<style>
        .product-slides-modal img {
            max-width: 100%;
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 0.3rem;
            outline: 0;
        }

        .sliderForProduct img,
        .sliderNavProduct img {
            max-width: 100%;
            border-radius: 10px;
        }

        .sliderNavProduct {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .sliderNavProduct .lower {
            flex: 0 0 calc(33.33% - 10px);
            margin: 5px;
        }

        .custom-modal-dialog {
        max-width: 70%; 
        width: auto;
        margin: 1.75rem auto;
    } [dir='rtl'] .slick-slide { float: left; }

    .slick-track {
        display: flex!important;
    }
    .lower{
        width: auto important;
        height: 150px!important;
    }
    .lower img{
        width: auto important;
        height: 150px!important;
    }

    #sliderForProduct .slick-slide img{
        width: 470px!important;
        height: 520px!important;
    }
    </style>

<input type="hidden" name="baseurl" id="baseurl" value="<?=BASE_URL."uploads/products/";?>">
<section id="content">
    <div class="container"> 
        <div class="tile">
            <div class="t-header">
                <div class="th-title"><?php echo "(".CURRENCY_SYMBOL.$employee_budget." ".lang('budget').") ".lang('view_shop'); ?></div>
            </div>
            <div class="t-body tb-padding">
                <div role="tabpanel">
                    <ul class="tab-nav tab-nav-right" role="tablist">
                        <li role="presentation" class="active"><a href="#within" aria-controls="within" role="tab" data-toggle="tab" aria-expanded="false"><?php echo lang('within_the_budget'); ?> (<?php echo addZero($within_the_budget_products['data']['total_records']+@$packages['data']['total_records']); ?>)</a></li>
                        <li role="presentation"><a href="#above" aria-controls="above" role="tab" data-toggle="tab" aria-expanded="true"><?php echo lang('above_the_budget'); ?> (<?php echo addZero($above_the_budget_products['data']['total_records']); ?>)</a></li>
                    </ul>                    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="within">
                            <div class="row">
                                <?php if($within_the_budget_products['data']['total_records']) { foreach($within_the_budget_products['data']['records'] as $product) { ?>
                                    <div class="col-sm-6 col-md-3" >
                                        <div class="thumbnail">
                                            <img src="<?php echo $product['product_main_photo']; ?>" alt="product here"  class="img-responsive product-card" data-product-id="<?=$product['product_id']?>">
                                            <div class="caption">
                                                <h4><?php echo $product['category_name']; ?> - <?php echo $product['product_name']; ?></h4>
                                                <div class="clearfix"></div>
                                                <div class="m-t-10">
                                                    <div style="cursor:pointer;"><i class="heart fa <?php if($product['client_status'] == 'Liked') {echo "fa-heart";} else {echo "fa-heart-o";} ?>  heart-icon within_budget_products"  data-shop-product-id="<?php echo $product['shop_product_id']; ?>-<?php echo ($product['client_status'] == 'Liked') ? 'Liked' : 'Deleted'; ?>"></i></div>
                                                </div>
                                                <div class="m-t-10">
                                                    <p><?php echo lang('quantities'); ?> : <?php echo $product['quantity']; ?></p> 
                                                    <p><?php echo lang('sold_quantity'); ?> : <?php echo $product['sold_quantity']; ?> </p> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>
                            </div>
                            <?php if($packages['data']['total_records']) { ?>
                                <hr/>
                                <div class="row">
                                    <div class="t-header">
                                        <div class="th-title"><?php echo lang('packages'); ?> (<?php echo addZero($packages['data']['total_records']); ?>)</div>
                                    </div>
                                    <?php foreach($packages['data']['records'] as $package) { ?>
                                        <div class="col-xs-6 col-md-2">
                                            <div class="thumbnail">
                                                <div class="images">
                                                    <?php foreach($package['products']['data']['records'] as $product) { ?>
                                                        <img src="<?php echo $product['product_main_photo']; ?>" alt="product" data-product-id="<?=$product['product_id']?>" class="img-responsive product-card">
                                                    <?php } ?>
                                                </div>
                                                <div class="caption">
                                                    <h4 title="<?php echo $package['no_of_products']." ".lang('products'); ?>"><?php echo $package['package_name']; ?> (<?php echo addZero($package['no_of_products']); ?>)</h4>
                                                    <p><?php echo lang('quantity').": ".$package['quantity']; ?></p>
                                                    <p><?php echo lang('sold_quantity').": ".$package['sold_quantity']; ?></p>
                                                    <div class="clearfix"></div>
                                                    <div class="m-t-10">
                                                        <div style="cursor:pointer;"><i class="heart fa <?php if($package['client_status'] == 'Liked') {echo "fa-heart";} else {echo "fa-heart-o";} ?>  heart-icon client_packages" data-shop-product-id="<?php echo $package['package_guid']; ?>@<?php echo ($package['client_status'] == 'Liked') ? 'Liked' : 'Deleted'; ?>"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php if($within_the_budget_products['data']['total_records'] || $packages['data']['total_records']) { ?>
                                <center><button class="btn btn-success set-shop send-to-galtex col-sm-6 col-md-3" type="button"><?php echo lang('send_to_galtex'); ?></button></center>
                            <?php } ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="above">
                            <div class="row">
                                <?php if($above_the_budget_products['data']['total_records']) { foreach($above_the_budget_products['data']['records'] as $product) { ?>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="thumbnail">
                                            <img src="<?php echo $product['product_main_photo']; ?>" alt="product hello" class="img-responsive product-card" data-product-id="<?=$product['product_id']?>">
                                            <div class="caption">
                                                <h4><?php echo $product['category_name']; ?> - <?php echo $product['product_name']; ?></h4>
                                                <p>+ <?php echo CURRENCY_SYMBOL."".$product['above_budget_price']; ?></p>
                                                <div class="clearfix"></div>
                                                <div class="m-t-10">
                                                    <div style="cursor:pointer;"><i class="heart fa <?php if($product['client_status'] == 'Liked') {echo "fa-heart";} else {echo "fa-heart-o";} ?>  heart-icon above_budget_products" data-shop-product-id="<?php echo $product['shop_product_id']; ?>-<?php echo ($product['client_status'] == 'Liked') ? 'Liked' : 'Deleted'; ?>"></i></div>
                                                </div>
                                                <div class="m-t-10">
                                                    <p><?php echo lang('quantities'); ?> : <?php echo $product['quantity']; ?> </p>
                                                    <p><?php echo lang('sold_quantity'); ?> : <?php echo $product['sold_quantity']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>
                                </div>
                                <?php if($above_the_budget_products['data']['total_records']) { ?>
                                    <center><button class="btn btn-success set-shop send-to-galtex col-sm-6 col-md-3" type="button"><?php echo lang('send_to_galtex'); ?></button></center>
                                <?php } ?>
                        </div>
                    </div>
               
               
               
               
               
                    <!-- new modal -->
     <!-- <div class="container">
        <div class="row">
            <div class="button-quick-view">
                <button type="button" data-toggle="modal" data-target="#aynModal-1">
                    check
                </button>
            </div>
        </div>
    </div> -->
                
                
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Package View -->
<div class="modal" id="view_package" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-cyan m-b-20"> 
                <button type="button" class="close white-clr" data-dismiss="modal">X</button>
                <h4 class="modal-title white-clr"><?php echo lang('create_package'); ?></h4>
            </div>
            <div class="modal-body">               
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo lang('package_name'); ?></label>
                            <input type="text" class="form-control" name="package_name" placeholder="<?php echo lang('package_name'); ?>" maxlength="150" autocomplete="off">
                        </div>
                    </div>
                </div> 
                <hr> 
                <div class="row package-products">

                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-primary submit-package"><?php echo lang('submit'); ?></button>
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo lang('close'); ?></button>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="aynModal-1">
        <div class="modal-dialog modal-lg  custom-modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5" dir="rtl">
                            <div class="product-slides-modal" >
                                <div class="sliderForProduct" id="sliderForProduct">
                                <div><img
                                        src="https://images.unsplash.com/photo-1548238177-8cf7cc19a0e8?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ">
                                </div>
                                <div><img
                                        src="https://images.unsplash.com/photo-1501622549218-2c3ef86627cb?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ">
                                </div>
                                <div><img
                                        src="https://images.unsplash.com/photo-1542395403839-388ec538e0e5?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ">
                                </div>
                                </div>
                            </div>
                            <div class="sliderNavProduct" id="sliderNavProduct">
                            <div class="lower" ><img
                                    src="https://images.unsplash.com/photo-1548238177-8cf7cc19a0e8?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ">
                            </div>
                            <div class="lower"><img
                                    src="https://images.unsplash.com/photo-1501622549218-2c3ef86627cb?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ">
                            </div>
                            <div class="lower" ><img
                                    src="https://images.unsplash.com/photo-1542395403839-388ec538e0e5?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h1 id="product_name"></h1>
                            <p id="product_description"></p>
                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="<?php echo base_url(); ?>/assets/js/jquery.bootstrap-touchspin.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/slick.css">



    <script>
        $(window).on('load', function(){
        jQuery(function ($) {
            $('.modal').on('shown.bs.modal', function (e) {
                $('.sliderForProduct').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: false,
                    fade: true,
                    asNavFor: '.sliderNavProduct',
                    rtl: true,
                    draggable:false,

                });
                $('.sliderNavProduct').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.sliderForProduct',
                    dots: false,
                    arrows: true,
                    infinite: false,
                    focusOnSelect: true,
                    rtl: true,

                });
            });
        });
    });
    </script>
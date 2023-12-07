$(document).ready(function () {
  $(".heart-icon").click(function () {
    let self = $(this);
    let shop_product_id = self.attr("data-shop-product-id");

    if (self.hasClass("fa-heart")) {
      // Like to Dislike

      self.attr(
        "data-shop-product-id",
        shop_product_id.replace("Liked", "Deleted")
      );
    } else {
      // Dislike to Like
      self.attr(
        "data-shop-product-id",
        shop_product_id.replace("Deleted", "Liked")
      );
    }
    self.toggleClass("fa-heart fa-heart-o");
  });

  $("body").on("click", "button.send-to-galtex", function () {
    /* Get Selected Products (Within Budget) */
    let within_product_guids = $.makeArray(
      $("i.within_budget_products").map(function (idx, elm) {
        var jElm = $(elm);
        var value = jElm.attr("data-shop-product-id");
        return value;
      })
    );

    /* Get Selected Products (Above Budget) */
    let above_product_guids = $.makeArray(
      $("i.above_budget_products").map(function (idx, elm) {
        var jElm = $(elm);
        var value = jElm.attr("data-shop-product-id");
        return value;
      })
    );

    /* Get Selected Packages (Under Budget) */
    let client_packages = $.makeArray(
      $("i.client_packages").map(function (idx, elm) {
        var jElm = $(elm);
        var value = jElm.attr("data-shop-product-id");
        return value;
      })
    );

    if (within_product_guids.length === 0 && above_product_guids.length === 0) {
      showToaster("error", error, select_products);
      return false;
    }

    $.ajax({
      url: api_url + "shop/like_dislike_shop_products",
      type: "POST",
      data: {
        client_packages: client_packages,
        within_product_guids: within_product_guids,
        above_product_guids: above_product_guids,
      },
      success: function (resp) {
        if (resp.status == 200) {
          showToaster("success", success, resp.message);
          setTimeout(function () {
            window.location.reload();
          }, 500);
        } else {
          showToaster("error", error, resp.message);
        }
        hideProgressBar();
      },
    });
  });

  function getSliderSettings() {
    return {
      // Slick configuration options
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
    };
  }

  $(document).on("click", ".product-card", function () {
    const sliders = document.querySelectorAll(".slick-initialized");

    sliders.forEach((item) => {
      $(item).slick("unslick");
    });
    let productId = $(this).attr("data-product-id");
    $.ajax({
      url: api_url + "shop/product_details",
      type: "POST",
      data: { product_id: productId },
      success: function (resp) {
        if (resp.status == 200) {
          let product = resp.data.product;
          let productName = product.product_name;
          let description = product.product_descprition;
          let productMainPhoto = product.product_main_photo;
          let productGalleryImages = JSON.parse(product.product_gallery_images);
          let baseUrl = document.getElementById("baseurl").value;

          let productMainPhotoHTML = "";
          productGalleryImages.forEach((image, index) => {
            productMainPhotoHTML += `
            <div >
                                         <div class="main-photo">
                                             <img src="${baseUrl}${image}">
                                      </div>
                                      </div>`;
          });
          // let productMainPhotoHTML = `<div >
          //                               <div class="main-photo">
          //                                   <img src="${baseUrl}${productMainPhoto}">
          //                               </div>
          //                             </div>`;

          let galleryImagesHTML = "";
          productGalleryImages.forEach((image, index) => {
            galleryImagesHTML += `<div><div class="lower">
                                          <img src="${baseUrl}${image}">
                                      </div></div>`;
          });

          if (
            productGalleryImages.length == 0 &&
            galleryImagesHTML.length == 0
          ) {
            productMainPhotoHTML = `<div >
                                        <div class="main-photo">
                                            <img src="${baseUrl}${productMainPhoto}">
                                        </div>
                                      </div>`;
            galleryImagesHTML = `<div><div class="lower">
                                      <img src="${baseUrl}${productMainPhoto}">
                                  </div></div>`;
          }
          // product-slides-modal

          document.getElementById("sliderForProduct").innerHTML =
            productMainPhotoHTML;
          document.getElementById("sliderNavProduct").innerHTML =
            galleryImagesHTML;

          document
            .getElementById("sliderForProduct")
            .insertAdjacentHTML("beforeend", galleryImagesHTML);

          // document
          //   .getElementById("sliderNavProduct")
          //   .insertAdjacentHTML("beforeend", galleryImagesHTML);

          document.getElementById("product_name").innerHTML = productName;

          document.getElementById("product_description").innerHTML =
            description;

          // $("#sliderForProduct").slick('unslick');
          // $("#sliderNavProduct").slick('unslick');

          // $('.product-slides-modal').slick({
          //       slidesToShow: 1,
          //       slidesToScroll: 1,
          //       arrows: false,
          //       dots: false,
          //       fade: true,
          //       asNavFor: '.sliderNavProduct',
          //       rtl: true,
          //       draggable: false,
          //   });

          //   $('.sliderNavProduct').slick({
          //       slidesToShow: 3,
          //       slidesToScroll: 1,
          //       asNavFor: '.product-slides-modal', // Change to '.product-slides-modal'
          //       dots: false,
          //       arrows: true,
          //       infinite: false,
          //       focusOnSelect: true,
          //       rtl: true,
          //   });
          // $(slider).slick(getSliderSettings())

          $("#aynModal-1").modal("show");
        } else {
          toastr.error("Something Went Wrong");
        }
      },
    });
  });
});

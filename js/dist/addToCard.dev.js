"use strict";

function wc_ajaxAddToCart() {
  event.preventDefault();
  var eventTarget = event.currentTarget || event.target;

  if (!eventTarget) {
    return;
  }

  var productContainer = eventTarget.closest(".productContainer");
  var productIDCotnainer = document.getElementById("productIDContainer");
  var productQantityCotnainer = document.getElementById("productQantityCotnainer");
  var productVariationIDCotnainer = document.getElementById("productVariationIDCotnainer");

  if (!productContainer || !productIDCotnainer || !productQantityCotnainer || !productVariationIDCotnainer) {
    return;
  }

  var productID = productIDCotnainer.value;
  var productSKU = "";
  var productQuantity = productQantityCotnainer.value;
  var productVariationID = productVariationIDCotnainer.value;
  var data = {
    action: "ql_woocommerce_ajax_add_to_cart",
    productID: productID,
    productSKU: productSKU,
    productQuantity: productQuantity,
    productVariationID: productVariationID
  };
  $.ajax({
    type: "post",
    url: wc_add_to_cart_params.ajax_url,
    data: data,
    beforeSend: function beforeSend(response) {
      console.log(response);
    },
    complete: function complete(response) {
      console.log(response);
    },
    success: function success(response) {
      if (response.error && response.product_url) {
        window.location = response.product_url;
        return;
      } else {
        $(document.body).trigger("added_to_cart", [response.fragments, response.cart_hash, eventTarget]);
      }
    }
  });
}
//# sourceMappingURL=addToCard.dev.js.map

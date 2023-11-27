<?php
//Chuyển Sale thành dạng +- %
function custom_product_sale_flash( $output, $post, $product ) {
    global $product;
    if($product->is_on_sale()) {
        if($product->is_type( 'variable' ) )
        {
            $regular_price = $product->get_variation_regular_price();
            $sale_price = $product->get_variation_price();
        } else {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
        }
        $percent_off = (($regular_price - $sale_price) / $regular_price) * 100;
        $text=$regular_price>$sale_price? '-':'+';
        return '<span class="sale-off">'.$text.'' . round($percent_off) . '% </span>';
    }
}
add_filter( 'woocommerce_sale_flash', 'custom_product_sale_flash', 11, 3 );

//Add theme Woocommerce

function ws247_theme_woo() {

    // Declare WooTheme support
    // https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'ws247_theme_woo' );

//Add theme suopport gallery single product
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

//Số lượng sản phẩm (Phân trang)
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = get_field('woo_number','option');
  return $cols;
}

//Giỏ hàng - Thanh toán
add_filter( 'woocommerce_billing_fields', 'remove_billing_phone_field', 20, 1 );
function remove_billing_phone_field($fields) {
    $fields ['billing_country']['required'] = false;
    $fields ['billing_email']['required'] = false;
    $fields ['billing_last_name']['required'] = false;
    $fields ['billing_city']['required'] = false;
    unset($fields['billing_country']);
    unset($fields['billing_address_2']);
    unset($fields['billing_postcode']);
    unset($fields['billing_last_name']);
    unset($fields['billing_city']);
    unset($fields['billing_company']);
    return $fields;
}
add_filter( 'woocommerce_shipping_fields', 'remove_shipping_phone_field', 20, 1 );
function remove_shipping_phone_field($fields) {
    $fields ['shipping_country']['required'] = false;
    $fields ['shipping_last_name']['required'] = false;
    unset($fields['shipping_country']);
    unset($fields['shipping_address_2']);
    unset($fields['shipping_postcode']);
    unset($fields['shipping_last_name']);
    unset($fields['shipping_city']);
    unset($fields['shipping_company']);
    return $fields;
}

//

add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
        /* Update */
        body.woocommerce-cart, body.woocommerce-checkout{
          min-height: 100%;
          line-height: normal;
          background: #f9f9f9;
          padding: 0!important;
          font-family: "Roboto",sans-serif;
          margin: 0!important;
      }
      .gini-shipping .container {
          width: auto!important;
          max-width: 1170px!important;
      }
      .gini-shipping .shipping-header {
          padding-top: 25px;
          padding-bottom: 15px;
          background: #f8f8f8;
          -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
          box-shadow: 0 1px 2px rgba(0,0,0,.2);
      }
      .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step .bs-wizard-stepnum {
          color: #a3a3a3;
          font-size: 14px;
      }
      .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step:first-child>.progress {
          left: 50%;
          width: 50%;
      }
      .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step>.progress {
          height: 3px;
          margin: 22px 0;
          background: #b9b9b9;
          position: relative;
          border-radius: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
      }
      .progress-bar {
          float: left;
          width: 0%;
          height: 100%;
          line-height: 20px;
          color: #fff;
          background-color: #337ab7;
          -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
          box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
          -webkit-transition: width .6s ease;
          transition: width .6s ease;
          font-size: 12px;
          text-align: center;
      }
      .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step>.bs-wizard-dot {
          background: #fff;
          font-size: 14px;
          color: #000;
          border: 2px solid #35c4f6;
          line-height: 23px;
          -webkit-box-shadow: none;
          box-shadow: none;
          position: absolute;
          width: 26px;
          height: 26px;
          display: block;
          top: 45px;
          left: 50%;
          margin-top: -15px;
          margin-left: -15px;
          border-radius: 50%;
          text-align: center;
      }
      .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step:last-child>.progress {
          width: 50%;
      }
      .gini-shipping .shipping-header .gini-logo img{
          max-height: 60px;
      }
      .gini-shipping .shipping-header .gini-hotline svg{
          height: 35px;
          width: 45px;
      }
      .gini-shipping a{
          text-decoration: none;
      }
      .gini-shipping .shipping-header .gini-hotline span{
          width: 100%;
          font-size: 14px;
      }
      .gini-shipping .shipping-header .gini-hotline span small{
          display: block;
          font-weight: normal;
          color: #000;
          font-size: 14px;
      }

      .woocommerce-cart .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-1>.bs-wizard-dot,.woocommerce-checkout .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-1>.bs-wizard-dot,.woocommerce-checkout .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-2>.bs-wizard-dot,.woocommerce-order-received .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-1>.bs-wizard-dot, .woocommerce-order-received .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-2>.bs-wizard-dot, .woocommerce-order-received .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-3>.bs-wizard-dot  {
          background: #00b6f0;
          font-size: 15px;
          color: #fff;
          border: none;
          line-height: 26px;
          -webkit-box-shadow: #666 0 0 2px;
          box-shadow: #666 0 0 2px;
      } 
      .woocommerce-checkout .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-2>.progress>.progress-bar{
          width: 50%;
      }
      .woocommerce-checkout .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-1>.progress>.progress-bar,.woocommerce-order-received .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-2>.progress>.progress-bar{
          width: 100%;
      }
      .woocommerce-order-received .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-3>.progress>.progress-bar{
          width: 100%;
      }
      .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step>.progress>.progress-bar {
          width: 0;
          -webkit-box-shadow: none;
          box-shadow: none;
          background: #00b6f0;
          -webkit-transition: none;
          transition: none;
      }
      .gini-shipping .shipping-header .gini-hotline a {
          font-size: 15px;
          font-weight: 500;
          text-transform: uppercase;
          color: #26A126;
          border: 1px solid #ddd;
          border-radius: 23px;
          width: 100%;
          text-align: center;
          padding: 3px;
          font-weight: bold;
          min-width: 170px;
      }
      .woocommerce-cart .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-1 .bs-wizard-stepnum,.woocommerce-checkout .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-1 .bs-wizard-stepnum,.woocommerce-checkout .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-2 .bs-wizard-stepnum,.woocommerce-order-received .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-3 .bs-wizard-stepnum{
          color: #000;
      }
      .gini-shipping .gini-main .gini-h1{
          color: #333;
          font-size: 18px;
          text-transform: uppercase;
          font-weight: 400;
          margin-bottom: 12px;
      }
      .woocommerce-cart .gini-shipping .gini-main  .cart-collaterals .cart_totals{
          float: none;
          width: 100%;
      }
      .woocommerce-cart .gini-shipping .gini-main .woocommerce-cart-form table,.woocommerce-cart .gini-shipping .gini-main  .cart-collaterals .cart_totals table{
          border: none;
          margin: 0;
      }
      .woocommerce-cart .gini-shipping .gini-main .woocommerce-cart-form table .product-name a{
          color: #000;
      }
      .woocommerce-cart .gini-shipping .gini-main .woocommerce-cart-form table .product-thumbnail img{
          width: 100px;
      }
      .woocommerce-cart .gini-shipping .gini-main .woocommerce-cart-form table .product-name a:hover{
          color: #00b6f0;
      }
      .woocommerce-checkout .gini-shipping .gini-main table.shop_table thead th{
          font-weight: bold;
      }
      .woocommerce-checkout .gini-shipping .gini-main table.shop_table th{
          font-weight: normal;
      }
      .gini-shipping .woocommerce  button.button{
          background: #fdd835;
          background-color: #fdd835;
          font-size: 18px;
          color: #4a4a4a;
          border: 0;
          outline: 0;
          -webkit-transition: all .3s linear;
          transition: all .3s linear;
          border-radius: 0 3px 3px 0;
          font-weight: normal;
          margin: 0;
          padding: 9px 15px;
      }
      .gini-shipping .woocommerce button.button:hover{
       background: #fdd835;
       background-color: #fdd835;
       color: #4a4a4a;
   }
   .gini-shipping input,.gini-shipping textarea{
      padding: 5px 10px;
  }
  .woocommerce-cart .gini-shipping .gini-main .woocommerce-cart-form table .coupon button[name="update_cart"]{
      display: none!important;
  }
  .woocommerce-notices-wrapper .woocommerce-message,.woocommerce-info{
      background-color: #fffbfb;
      border-color: #ff959c;
      color: #ff3b27;
      border: 1px solid #ff3b27;
      border-radius: 4px;
  }
  .woocommerce-info {
      border-top-color: #ff3b27;
  }
  .woocommerce-message::before {
      color:#ff3b27;
  }
  .woocommerce-info::before {
      color: #ff3b27;
  }
  .woocommerce-cart .wc-proceed-to-checkout a.checkout-button{
      margin-bottom: 0;
      color: #fff;
      background-color: #ff0f1e;
      border-color: #ff0515;
      padding: 15px;
      font-size: 18px;
      font-weight: normal;
      -webkit-border-radius: 5px;
      border-radius: 5px;
  }
  .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover{
      background-color: #ea000f;
      border-color: #c2000c;
  }
  .woocommerce-cart .coupon.ws-boxshadow .panel-title{
      font-size: 17px;
      color: #000;
      font-weight: 400;
  }
  .woocommerce-cart .coupon.ws-boxshadow .panel-body{
      border-top: 1px solid #ddd;
      padding-top: 20px;
      margin-top: 10px;
      display: flex;
      width: 100%;
      margin-bottom: 10px;
  }
  .woocommerce-cart .coupon.ws-boxshadow .panel-body input{
      width: 65%;
      padding: 0 10px;
      border: 1px solid #c8c8c8;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
  }
  .woocommerce-cart .coupon.ws-boxshadow .panel-body button{
      width: 35%;
      font-weight: normal;
      font-size: 16px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
  }
  .woocommerce-cart table.shop_table th,.woocommerce-cart table.shop_table tbody th {
      font-weight: normal;
  }
  .woocommerce-cart .cart-collaterals .order-total span.woocommerce-Price-amount,.woocommerce-checkout .order-total span.woocommerce-Price-amount{
      color: #fe3834;
      font-size: 22px;
      font-weight: normal;
      
  }
  .ws-buy-conti{
      background: #00B6F0;
      border-color: #00B6F0;
      color: #fff;
      padding: 10px;
      font-size: 16px;
  }
  .ws-buy-conti:hover{
      color: #FFF;
      background: #0060C4;
  }
  .gini-shipping .gini-h1 {
      border-bottom: 1px solid #c9d0cd;
      padding-bottom: 10px;
      font-size: 17px;
      color: #00B6F0;
  }
  .gini-shipping h1.gini-h1,.gini-shipping #ship-to-different-address{
      border: none;
      padding: 0;
      margin: 0;
  }
  .ws-boxshadow {
      border-left: 1px solid #c9d0cd;
      border-right: 1px solid #c9d0cd;
      border-bottom: 1px solid #c9d0cd;
      border-top: 3px solid #00B6F0!important;
      margin-bottom: 20px;
      background: #fff;
      border-radius: 2px;
      padding: 10px;
      -webkit-box-shadow: 0 2px 3px 0 rgba(0,0,0,.1), 0 2px 4px 0 rgba(0,0,0,.12);
      box-shadow: 0 2px 3px 0 rgba(0,0,0,.1), 0 2px 4px 0 rgba(0,0,0,.12);
      border-radius: 2px;
  }
  .woocommerce-checkout form .form-row{
      width: 100%;
  }
  .select2-container--default .select2-selection--single{
      width: 100%!important;
  }
  .woocommerce-checkout form .form-row label,#billing_address_2_field>label{
      width: 30%!important;
  }
  .woocommerce-checkout form .form-row span,.woocommerce form .form-row.address-field .select2-container{
      width: 70%;
      -webkit-border-radius: 0;
      border-radius: 0;
  }
  .woocommerce form .form-row.address-field .select2-container{
      width: 70%!important;
  }
  .woocommerce form .form-row.address-field#billing_state_field > .woocommerce-input-wrapper > .select2-container{
      width: 100%!important;
  }
  .woocommerce-checkout #place_order{
      width: 100%;
  }
  .woocommerce-order-received .woocommerce-order-details h2,.woocommerce-order-received .woocommerce-column__title{
      color: #333;
      font-size: 18px;
      text-transform: uppercase;
      font-weight: 400;
      margin-bottom: 12px;
  }
  .woocommerce-order-received .col2-set .col-1,.woocommerce-order-received .col2-set .col-2{
      width: 50%;
      -webkit-box-flex: 0;
      -ms-flex: 0 0 49%;
      flex: 0 0 49%;
      min-width: 49%;
      padding: 0;
      margin-bottom: 20px;
  }
  .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step .bs-wizard-stepnum a {
      color: #a3a3a3;
      font-size: 14px;
  }
  .woocommerce-cart .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-1 .bs-wizard-stepnum a, .woocommerce-checkout .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-1 .bs-wizard-stepnum a, .woocommerce-checkout .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-2 .bs-wizard-stepnum a, .woocommerce-order-received .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step.step-3 .bs-wizard-stepnum a{
      color: #000;
  }
  @media (min-width: 1200px){
      .gini-shipping .shipping-header {
        background: #fff;
    }
    .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step>.progress {
        height: 6px;
        margin: 20px 0;
        background: #ebebeb;
    }
    .gini-shipping .shipping-header .bs-wizard>.bs-wizard-step>.bs-wizard-dot {
        font-size: 15px;
        background-color: #fff;
        color: #000;
        border: none;
        line-height: 26px;
        -webkit-box-shadow: #666 0 0 2px;
        box-shadow: #666 0 0 2px;
    }
    
}
@media (max-width: 768px){
  .woocommerce-checkout form .form-row label,#billing_address_2_field>label{
      width: 100%!important;
  }
  .woocommerce-checkout form .form-row span,.woocommerce form .form-row.address-field .select2-container{
      width: 100%;
      -webkit-border-radius: 0;
      border-radius: 0;
  }
  .woocommerce form .form-row.address-field .select2-container{
      width: 100%!important;
  }
}
</style>
<?php
}
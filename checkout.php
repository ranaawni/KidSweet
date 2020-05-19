<?php
//echo $_REQUEST['submit'];
 //echo "<pre>";
//print_r($_POST);

$conn=  mysqli_connect("localhost","root","","ekids");
if (!$conn) {
die("cannot connect to server");
}
session_start();
//echo "<pre>";
//print_r($_SESSION);

if (empty($_SESSION['customer'])){
    ob_start();
    echo("<script>location.href = 'account/login.php';</script>");
}

//echo "<pre>";
//print_r($_SESSION);



//$total = 0;
if(isset($_SESSION['product'])){
    //echo 111;die;
foreach ($_SESSION['product']as $pro_id ) {
        //echo $pro_id;
   $qu = "SELECT product_id,product_name,product_description,product_price,product_image,
    age,mproduct_name,mcategory_name,product.mcategory_id,product.mproduct_id,product.age_id from product
     inner join  main_category on main_category.mcategory_id = product.mcategory_id 
     inner join age on age.age_id = product.age_id
       inner join main_product on main_product.mproduct_id = product.mproduct_id  where product_id = 
       $pro_id";

        $res=mysqli_query($conn,$qu);
        if($res){
        while($row = mysqli_fetch_assoc($res)){
            $productCart[] = $row;}
        }
}

    
}

if ( isset($_POST['cfirst_name'])and isset($_POST['address'])and isset($_POST['mobile'])and isset($_POST['totalPrice'])){//die();

    $name = $_POST['cfirst_name'];
    $address = $_POST['address'];
    $phone =$_POST['mobile'];
    $customerId = $_SESSION['customer'];
    $totalPrice = $_SESSION['totalPrice'];
    
    $query = "insert into korder (customer_id,recipient_name,address,mobile,total_price) 
              values ($customerId,'$name','$address','$phone',$totalPrice)"; //die($query);
    mysqli_query($conn,$query);
    $query = "select order_id from korder where customer_id={$_SESSION['customer']}";
    $result = mysqli_query($conn,$query);
    $fetch = mysqli_fetch_assoc($result);
    $orderId = $fetch['order_id'];
    if (isset($productCart)) {
        foreach ($productCart as $singleProduct){
            $proId= $singleProduct['product_id'];
            
            $query = "insert into orderdetails (product_id,order_id) values ($proId,$orderId)";
            mysqli_query($conn,$query);
        }
    }
    unset($_SESSION['product']);
    
    echo("<script>location.href = 'index.php';</script>");
}

$total = 0;
//print_r($productCart);

//$productCart = array();
//$query = "SELECT * from product where product_id = {$_GET['id']}";



//if(isset($_POST['submit'])){
  //echo "yes";
 // $query = "INSERT into customer values('customer_email','mobile','cfirst_name','clast_name','password','address','postal_code')";
 // $result = mysqli_query($conn,$query);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr" class="no-js windows chrome desktop page--no-banner page--logo-main page--show page--show card-fields">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
    <meta name="referrer" content="origin">

    <title>    Information - kidsweet - Checkout</title>

      <meta data-browser="chrome" data-browser-major="78">
<meta data-body-font-family="-apple-system, BlinkMacSystemFont, &#39;Segoe UI&#39;, Roboto, Helvetica, Arial, sans-serif, &#39;Apple Color Emoji&#39;, &#39;Segoe UI Emoji&#39;, &#39;Segoe UI Symbol&#39;" data-body-font-type="system">

    <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/24595202108/digital_wallets/dialog">



  <meta name="shopify-checkout-authorization-token" content="75a98cf2874d1f88a2f626e4d5a9f78e" />

<meta id="shopify-regional-checkout-config" name="shopify-regional-checkout-config" content="{&quot;bugsnag&quot;:{&quot;checkoutJSApiKey&quot;:&quot;717bcb19cf4dd1ab6465afcec8a8de02&quot;,&quot;endpoint&quot;:&quot;https:\/\/notify.bugsnag.com&quot;}}" />





      
  
<!--[if lt IE 9]>
<link rel="stylesheet" media="all" href="//cdn.shopify.com/app/services/24595202108/assets/72785526844/checkout_stylesheet/v2-ltr-edge-45c5a0665f17c948dd566c307407b5de-3104/oldie" />
<![endif]-->

<!--[if gte IE 9]><!-->
  <link rel="stylesheet" media="all" href="//cdn.shopify.com/app/services/24595202108/assets/72785526844/checkout_stylesheet/v2-ltr-edge-45c5a0665f17c948dd566c307407b5de-3104" />

<!--<![endif]-->






        <script type="text/javascript">
  Shopify = window.Shopify || {};
  ShopifyExperiments = window.ShopifyExperiments || {};
  ShopifyPay = window.ShopifyPay || {};

  if (window.opener) {
    window.opener.postMessage(JSON.stringify({"current_checkout_page": "\/checkout\/contact_information"}), "*");
  }

  Shopify.Checkout = Shopify.Checkout || {};
  Shopify.Checkout.Autocomplete = false;
  Shopify.Checkout.apiHost = "theme685-baby-clothing.myshopify.com";
  Shopify.Checkout.assetsPath = "\/\/cdn.shopify.com\/s";
  Shopify.Checkout.DefaultAddressFormat = "{firstName}{lastName}_{company}_{address1}_{address2}_{city}_{country}{province}{zip}_{phone}";
  Shopify.Checkout.geolocatedAddress = {"lat":31.952200000000005,"lng":35.93899999999999};
  Shopify.Checkout.i18n = {"orders":{"order_updates":{"title":"Order updates"},"complete_order":"Complete order","pay_now":"Pay now"},"shipping_line":{"pickup_in_store_label":"Pickup","no_pickup_location":"Your order isn't available for pickup. Enter a shipping address.","shipping_label":"Shipping","shipping_default_value":"Calculated at next step","shipping_free_value":"Free"},"continue_button":{"continue_to_shipping_method":"Continue to shipping","continue_to_payment_method":"Continue to payment"}};
  Shopify.Checkout.locale = "en";
  Shopify.Checkout.normalizedLocale = "en";
  Shopify.Checkout.page = "show";
  Shopify.Checkout.releaseStage = "production";
  Shopify.Checkout.requiresShipping = true;
  Shopify.Checkout.step = "contact_information";
  Shopify.Checkout.token = "5ce2bdbedf1e037e009380ddb7b7ca8c";
  Shopify.Checkout.currency = "USD";
  Shopify.Checkout.estimatedPrice = 40.00;
  Shopify.Checkout.dynamicCheckoutPaymentInstrumentsConfig = {"paymentInstruments":{"accessToken":"6aca557a56644bb5fd6cdde2ca631a12","amazonPayConfig":null,"applePayConfig":null,"checkoutConfig":{"domain":"theme685-baby-clothing.myshopify.com","shopId":24595202108},"shopifyPayConfig":null,"currency":"USD","googlePayConfig":null,"locale":"en","paypalConfig":null,"offsiteConfigs":null,"supportsDiscounts":false,"supportsGiftCards":false,"checkoutDisabled":false}};
  ShopifyExperiments.AutocompleteServiceApiHost = "https:\/\/autocomplete-service.shopifycloud.com";
  ShopifyExperiments.googleAutocompleteAllCountries = false;

  ShopifyPay.enabled = false;
  ShopifyPay.apiHost = "pay.shopify.com";
  ShopifyPay.apiToken = "em9qL3NySTJRNVhmYXREUXRVY29wZFcrMW9rVWtneEo1cmViaW12UGoyRUhhUkxTcU5nY0p5UWJ1TGNPQUJuWmxGR1Y4Vmx5NGFrY3FpQUZNY01NL1E9PS0taFVlWnA4ZFlLZzE4VXAvZTBGeGZIdz09--ec30f971c7a544f8d4ae9e062c94317b3b5764d6";
  ShopifyPay.transactionParams = null;
  ShopifyPay.signUpButtonEnabled = false;
</script>

  <script src="//cdn.shopify.com/app/services/24595202108/javascripts/checkout_countries/72785526844/en/countries-a60f5ff7d1bbc66a1f0d9d12fcc32dd2e01c3a41-1558016567.js?version=edge" crossorigin="anonymous"></script>

<script src="//cdn.shopify.com/s/assets/checkout-c3d472cc4ed117b21efbfd424086b0847a9492f92dd727fbf4b9491c7d645eb5.js" crossorigin="anonymous"></script>






<script>window.ShopifyPaypalV4VisibilityTracking = true;</script>



<script type="text/javascript">
  Shopify.clientAttributesCollectionEventName =
    "client_attributes_checkout";
  var DF_CHECKOUT_TOKEN = "5ce2bdbedf1e037e009380ddb7b7ca8c";
</script>





<script id="__st">var __st={"a":24595202108,"offset":-14400,"reqid":"43c441d6-8ebc-4195-a317-94b704e61f81","pageurl":"theme685-baby-clothing.myshopify.com\/24595202108\/checkouts\/5ce2bdbedf1e037e009380ddb7b7ca8c?step=contact_information","u":"a96685bd9565","t":"checkout","offsite":1};</script>







  


  </head>
  <body>
        <a href="#main-header" class="skip-to-content">
  Skip to content
</a>




    <header class="banner" data-header role="banner">
      <div class="wrap">
          
  <a class="logo logo--left" href="https://theme685-baby-clothing.myshopify.com/"><span class="logo__text heading-1">kidsweet</span></a>

<h1 class="visually-hidden">
  Information
</h1>


      </div>
    </header>

   



    <div class="content" data-content>
      <div class="wrap">
        <div class="main">
          <header class="main__header" role="banner">
              
  <a class="logo logo--left" href="https://theme685-baby-clothing.myshopify.com/"><span class="logo__text heading-1">kidsweet</span></a>

<h1 class="visually-hidden">
  Information
</h1>
                  <nav aria-label="Breadcrumb">
    <ul class="breadcrumb ">
        <li class="breadcrumb__item breadcrumb__item--completed">
          <a class="breadcrumb__link" href="cart.php">Cart</a>
          <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumb__chevron-icon" aria-hidden="true" focusable="false"> <use xlink:href="#chevron-right" /> </svg>
        </li>

    </ul>
  </nav>



                <div class="shown-if-js" data-alternative-payments>
</div>



          </header>
          <main class="main__content" role="main">
    
<div class="step" name="form1" data-step="contact_information" data-last-step="false">
  <form action=""  method="POST">
    <div class="step__sections">
      
        <div class="section section--contact-information">
          <div class="section__header">
            <div class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
              <h2 class="section__title layout-flex__item layout-flex__item--stretch" id="main-header" tabindex="-1" style="border:1px solid grey; background-color: #cfcecc; font-size: 20px;">
                Contact information
              </h2>
          </div>
      </div>
      <div class="section__content">
        <div class="fieldset">
          <div class="address-fields" data-address-fields  style="padding: 20px;">

          
            <label style="margin-right: 20px; margin-top: 10px;">Full Name </label>
            
              <input placeholder="Enter Full Name"   type="text" value="" name="cfirst_name" style="border: 1px solid #eee; width: 400px; height: 40px;" required="required" />
            </div>
        </div>

        <div class="fieldset">
          <div class="address-fields" data-address-fields  style="padding: 20px;">
       
            <label style="margin-right: 20px; margin-top: 10px;">Address</label>
            
                <input placeholder="Enter Address"   type="text" value="" name="address"  style="border: 1px solid #eee; width: 400px; height: 40px;" required="required" />
            </div>
        </div>
    

           <div class="address-fields" data-address-fields  style="padding: 20px;">

   
    <label style="margin-right: 20px; margin-top: 30px;">Mobile Number</label>
   
        <input placeholder="Mobile Number"  type="text" value="" name="mobile"style="border: 1px solid #eee; width: 400px; height: 40px;margin-top: 20px;" required="required" />
    </div>
</div>

<input type="hidden" name="totalPrice" value="<?php echo $total; ?>">


 

</div>
    </div> 
  </div>
<div class="step__footer">

     <input name="save" value="save" type="submit" class="btn btn-success" onclick="myFunction()">
                      <input type="hidden" name="total" id="total" value="<?php $_SESSION['total'];?>">

  </div>

  

<script>
    
function myFunction() {

 // alert("You Are Welcome! Your Order Is Done .. Thanks For Visiting VEGEFOODS");
//getElementById('#total');
//var order_id="<?php //echo $order_id;?>";
 //total =getElementById('#total').val();
// var total = getElementById($('#total').val());
            
//alert(" total is:"+$('#total').val());
var total=document.getElementById('$total').value(1);
//var total=getElementById('#total').val();
alert(total);
//alert("Thank you your order number is"+total);
}

</script>

 

  <a class="step__footer__previous-link" href="cart.php"><svg focusable="false" aria-hidden="true" class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"/></svg><span class="step__footer__previous-link-content">Return to cart</span></a>
</div>

</form>
</div><div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
    <div class="wn__order__box" style="padding:20px;line-height: 40px;">
        <h3 class="onder__title" style="border: 1px solid grey; font-size: 20px; background-color: #cfcecc">Your order</h3>
        <ul class="order__total">
            <li>Product</li>
            <li style="margin-left: 1700px; margin-top: -40px;">Price</li>
        </ul>
        <ul class="order_product" style="border: 1px solid #eee; padding: 20px;">

            <?php
            
             if (isset($productCart)){ foreach ($productCart as $singleProduct) {
                $total = 0;
               $total=$total+$singleProduct['product_price'];
                
                ?>
                <li><?php echo $singleProduct['product_name']; ?></li>
                 <li ><span>$ <?php echo $singleProduct['product_price'] ?></span></li>
            <?php } ?>
        </ul>

       
                    <li>
                        <input class="ship" name="shipping" data-index="0" value="48"  type="radio">
                        <label>Free Shipping</label>
                    </li>
                    
                </ul>
            </li>
        </ul>
        <ul class="total__amount">
            <li>Order Total <span class="orderTotal">$<?php echo $total; ?></span></li>
        </ul>
    </div>
    <?php } else {echo "<li class='text-lg-center alert-danger'>No Product in cart</li> </div>"; }?>
</div>
      </div>
    </div>

      </div>
    </div>
  </main>
          <footer class="main__footer" role="contentinfo">
                <p class="copyright-text">
    All rights reserved kidsweet
  </p>
<style type="text/css">
    .order_product {
  margin-top: 18px;
  padding: 0 80px; }
  .order_product li {
    color: #333444;
    font-size: 14px;
    font-weight: 400;
    padding: 15px 0; }
    .order_product li span {
      float: right; }
</style>

          </footer>
        </div>
        

    <link href="https://monorail-edge.shopifysvc.com" rel="dns-prefetch">
<script>window.ShopifyAnalytics = window.ShopifyAnalytics || {};
window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
window.ShopifyAnalytics.meta.currency = 'USD';
var meta = {"page":{"path":"\/checkout\/contact_information","search":"","url":"https:\/\/theme685-baby-clothing.myshopify.com\/24595202108\/checkouts\/5ce2bdbedf1e037e009380ddb7b7ca8c?step=contact_information"}};
for (var attr in meta) {
  window.ShopifyAnalytics.meta[attr] = meta[attr];
}</script>
<script>window.ShopifyAnalytics.merchantGoogleAnalytics = function() {
  
};
</script>
<script class="analytics">(function () {
  var customDocumentWrite = function(content) {
    var jquery = null;

    if (window.jQuery) {
      jquery = window.jQuery;
    } else if (window.Checkout && window.Checkout.$) {
      jquery = window.Checkout.$;
    }

    if (jquery) {
      jquery('body').append(content);
    }
  };

  var isDuplicatedThankYouPageView = function() {
    return document.cookie.indexOf('loggedConversion=' + window.location.pathname) !== -1;
  }

  var setCookieIfThankYouPage = function() {
    if (window.location.pathname.indexOf('/checkouts') !== -1 &&
        window.location.pathname.indexOf('/thank_you') !== -1) {

      var twoMonthsFromNow = new Date(Date.now());
      twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

      document.cookie = 'loggedConversion=' + window.location.pathname + '; expires=' + twoMonthsFromNow;
    }
  }

  var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
  if (trekkie.integrations) {
    return;
  }
  trekkie.methods = [
    'identify',
    'page',
    'ready',
    'track',
    'trackForm',
    'trackLink'
  ];
  trekkie.factory = function(method) {
    return function() {
      var args = Array.prototype.slice.call(arguments);
      args.unshift(method);
      trekkie.push(args);
      return trekkie;
    };
  };
  for (var i = 0; i < trekkie.methods.length; i++) {
    var key = trekkie.methods[i];
    trekkie[key] = trekkie.factory(key);
  }
  trekkie.load = function(config) {
    trekkie.config = config;
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.onerror = function(e) {
      (new Image()).src = '//v.shopify.com/internal_errors/track?error=trekkie_load';
    };
    script.async = true;
    script.src = 'https://cdn.shopify.com/s/javascripts/tricorder/trekkie.storefront.min.js?v=2020.04.13.1';
    var first = document.getElementsByTagName('script')[0];
    first.parentNode.insertBefore(script, first);
  };
  trekkie.load(
    {"Trekkie":{"appName":"checkout","development":false,"defaultAttributes":{"shopId":24595202108,"isMerchantRequest":null,"themeId":72785526844,"themeCityHash":"6118820579615239674","contentLanguage":"en","currency":"USD","checkoutToken":"5ce2bdbedf1e037e009380ddb7b7ca8c"},"isServerSideCookieWritingEnabled":true},"Performance":{"navigationTimingApiMeasurementsEnabled":true,"navigationTimingApiMeasurementsSampleRate":1},"Session Attribution":{}}
  );

  var loaded = false;
  trekkie.ready(function() {
    if (loaded) return;
    loaded = true;

    window.ShopifyAnalytics.lib = window.trekkie;
    

    var originalDocumentWrite = document.write;
    document.write = customDocumentWrite;
    try { window.ShopifyAnalytics.merchantGoogleAnalytics.call(this); } catch(error) {};
    document.write = originalDocumentWrite;
      (function () {
        if (window.BOOMR && (window.BOOMR.version || window.BOOMR.snippetExecuted)) {
          return;
        }
        window.BOOMR = window.BOOMR || {};
        window.BOOMR.snippetStart = new Date().getTime();
        window.BOOMR.snippetExecuted = true;
        window.BOOMR.snippetVersion = 12;
        window.BOOMR.application = "core";
        window.BOOMR.shopId = 24595202108;
        window.BOOMR.themeId = 72785526844;
        window.BOOMR.url =
          "https://cdn.shopify.com/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
        var where = document.currentScript || document.getElementsByTagName("script")[0];
        var parentNode = where.parentNode;
        var promoted = false;
        var LOADER_TIMEOUT = 3000;
        function promote() {
          if (promoted) {
            return;
          }
          var script = document.createElement("script");
          script.id = "boomr-scr-as";
          script.src = window.BOOMR.url;
          script.async = true;
          parentNode.appendChild(script);
          promoted = true;
        }
        function iframeLoader(wasFallback) {
          promoted = true;
          var dom, bootstrap, iframe, iframeStyle;
          var doc = document;
          var win = window;
          window.BOOMR.snippetMethod = wasFallback ? "if" : "i";
          bootstrap = function(parent, scriptId) {
            var script = doc.createElement("script");
            script.id = scriptId || "boomr-if-as";
            script.src = window.BOOMR.url;
            BOOMR_lstart = new Date().getTime();
            parent = parent || doc.body;
            parent.appendChild(script);
          };
          if (!window.addEventListener && window.attachEvent && navigator.userAgent.match(/MSIE [67]./)) {
            window.BOOMR.snippetMethod = "s";
            bootstrap(parentNode, "boomr-async");
            return;
          }
          iframe = document.createElement("IFRAME");
          iframe.src = "about:blank";
          iframe.title = "";
          iframe.role = "presentation";
          iframe.loading = "eager";
          iframeStyle = (iframe.frameElement || iframe).style;
          iframeStyle.width = 0;
          iframeStyle.height = 0;
          iframeStyle.border = 0;
          iframeStyle.display = "none";
          parentNode.appendChild(iframe);
          try {
            win = iframe.contentWindow;
            doc = win.document.open();
          } catch (e) {
            dom = document.domain;
            iframe.src = "javascript:var d=document.open();d.domain='" + dom + "';void(0);";
            win = iframe.contentWindow;
            doc = win.document.open();
          }
          if (dom) {
            doc._boomrl = function() {
              this.domain = dom;
              bootstrap();
            };
            doc.write("<body onload='document._boomrl();'>");
          } else {
            win._boomrl = function() {
              bootstrap();
            };
            if (win.addEventListener) {
              win.addEventListener("load", win._boomrl, false);
            } else if (win.attachEvent) {
              win.attachEvent("onload", win._boomrl);
            }
          }
          doc.close();
        }
        var link = document.createElement("link");
        if (link.relList &&
          typeof link.relList.supports === "function" &&
          link.relList.supports("preload") &&
          ("as" in link)) {
          window.BOOMR.snippetMethod = "p";
          link.href = window.BOOMR.url;
          link.rel = "preload";
          link.as = "script";
          link.addEventListener("load", promote);
          link.addEventListener("error", function() {
            iframeLoader(true);
          });
          setTimeout(function() {
            if (!promoted) {
              iframeLoader(true);
            }
          }, LOADER_TIMEOUT);
          BOOMR_lstart = new Date().getTime();
          parentNode.appendChild(link);
        } else {
          iframeLoader(false);
        }
        function boomerangSaveLoadTime(e) {
          window.BOOMR_onload = (e && e.timeStamp) || new Date().getTime();
        }
        if (window.addEventListener) {
          window.addEventListener("load", boomerangSaveLoadTime, false);
        } else if (window.attachEvent) {
          window.attachEvent("onload", boomerangSaveLoadTime);
        }
        if (document.addEventListener) {
          document.addEventListener("onBoomerangLoaded", function(e) {
            e.detail.BOOMR.init({
              ResourceTiming: {
                enabled: true,
                trackedResourceTypes: ["script", "img", "css"]
              },
            });
            e.detail.BOOMR.t_end = new Date().getTime();
          });
        } else if (document.attachEvent) {
          document.attachEvent("onpropertychange", function(e) {
            if (!e) e=event;
            if (e.propertyName === "onBoomerangLoaded") {
              e.detail.BOOMR.init({
                ResourceTiming: {
                  enabled: true,
                  trackedResourceTypes: ["script", "img", "css"]
                },
              });
              e.detail.BOOMR.t_end = new Date().getTime();
            }
          });
        }
      })();
    

    if (!isDuplicatedThankYouPageView()) {
      setCookieIfThankYouPage();
      
        window.ShopifyAnalytics.lib.page(
          "Checkout - Contact information",
          {"path":"\/checkout\/contact_information","search":"","url":"https:\/\/theme685-baby-clothing.myshopify.com\/24595202108\/checkouts\/5ce2bdbedf1e037e009380ddb7b7ca8c?step=contact_information"}
        );
      
      
    }
  });

  
      var eventsListenerScript = document.createElement('script');
      eventsListenerScript.async = true;
      eventsListenerScript.src = "//cdn.shopify.com/s/assets/shop_events_listener-2c6237918c4bbec8783d8ceecd5759edc38afa9b5bef55134462710955517539.js";
      document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);
    
})();</script>
  </body>
</html>

<?php 
    if(isset($_POST['submitform'])){
        $status = 0;
        $reponsemessage = "Something Went Wrong";
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $consent = $_POST['consent'];        
        $utm_source =  ($_POST['utm_source'] == "googleadword") ? "Google Adwords" : 'Microsite'; 
        $crm_subsource =  isset($_POST['crm_subsource']) ? $_POST['crm_subsource'] : '';        
        $frompage = "CERATEC WESTWINDS PRESIDENTIAL TOWERS - PUNE";
        //Send Data to CRM
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => 'https://buildeskapi.azurewebsites.net/api/Webhook',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>
            '{
            "apikey":"8a9cd6ef-6382-45b0-9674-22d52adb6350",
            "firstname":"'.$fullname.'",
            "lastname":"",
            "source":"'.$utm_source.'",
            "SubSource" :"'.$crm_subsource.'",
            "mobile":"'.$phone.'",
            "CreatedDate":"'.date('d/M/Y').'",
            "email":"'.$email.'",
            "ProjectName": "'.$frompage.'",
            "Remark":"'.$message.'",
            "HasVisitScheduled":"false",
            "VisitDate":"null"
            }',
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        ]);
        //  "SubSource" :"'.$utm_campaign.'",
        $response = curl_exec($curl);
        // $crm_api = json_decode($response, true)['Success'];
        curl_close($curl);
        $filename = "download/" . date("m") . "-" . date("Y") . ".csv";
        $header = ["Full Name","Mobile","Email","Message", "Consent"];
        $data = [$fullname,$phone,$email,$message,$consent];
        if (file_exists($filename)) {
            $handleagain = fopen($filename, 'a');
            fputcsv($handleagain, $data);
        } else{
            $handleagain = fopen($filename, 'w');
            fputcsv($handleagain, $header);
            fputcsv($handleagain, $data);
        }
        fclose($handleagain);
        echo $response; 
        die;
    }
    $sitekey = "6LcRIaspAAAAAC-I4t0z4EXJzUEfr25bNlwn4xX8";
    $secretkey = "6LcRIaspAAAAAFLfduJgZ-gm6D4cmoa4KbLd_PqI";  
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Luxurious 2 BHK, 3 BHK Apartments Sale in Pune - Presidential Towers</title>
    <meta name="title" content="Luxurious 2 BHK, 3 BHK Apartments Sale in Pune - Presidential Towers">
    <meta name="description" content="Explore your dream home in Ceratec Presidential Towers, Pune with our exclusive 2 BHK, 3 BHK apartments for sale. Elevate your lifestyle and embrace luxury living with unmatched comfort and convenience.">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.png">
    <meta name='robots' content='index, follow'/>
    <link rel="stylesheet" href="./assets/sass/styles.css">    
    <link rel="stylesheet" href="./assets/sass/pages/index.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Slick Slider CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MNW2SJRX');</script>
    <!-- End Google Tag Manager -->

    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $sitekey; ?>"></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNW2SJRX"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="loading-overlay" style="display:none;">
        <div class="loading-spinner"></div>
        <div class="loading-text">Loading...</div>
    </div>
    <header>
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="javascript:void(0);" title="Ceratec Presidential Towers">
                        <picture>
                            <source srcset="assets/images/logo.webp" alt="Ceratec Presidential Towers" title="Ceratec Presidential Towers" width="113">
                            <img src="./assets/images/logo.png" alt="Ceratec Presidential Towers" title="Ceratec Presidential Towers" width="113"
                                draggable='false' />
                        </picture>
                    </a>
                </div>
                <nav class="nav">
                    <ul>
                        <li><a class="scroll-nav" href="#about-us" title="Overview"> overview </a></li>
                        <li><a class="scroll-nav" href="#price" title="Price"> price </a></li>
                        <li><a class="scroll-nav" href="#floor-plan" title="Floor Plans"> floor plans</a></li>
                        <li><a class="scroll-nav" href="#amenities" title="Amenities"> amenities </a></li>
                        <li><a class="scroll-nav" href="#location-connectivity" title="Location"> location </a></li>
                        <li><a class="modal-popup" href="javascript:void(0);" title="Download Brochure"> download brochure </a></li>
                    </ul>
                </nav>
                <div class="request-call">
                    <a href="javascript:void(0)" class="modal-popup" title="Instant Call Back">Instant Call Back</a>
                </div>
                <div class="menu-toggle">
                 <p class="menu-toggle2"> <span></span> <span></span> <span></span> </p>
                </div>
            </div>
        </div>
    </header>
    <main>
        <!-- Banner -->
        <section class="banner">
            <div class="mobile-banner">
                <a href="javascript:void(0);">
                    <img src="./assets/images/mobile-banner.jpg" alt="Ceratec Presidential Towers Mobile Banner" title="Ceratec Presidential Towers Mobile Banner">
                </a>
            </div>
            <div class="container">
                <div class="texture">
                    <div class="offer">                                                        
                        <div class="offer-title">
                            <span>At Ravet, Pune</span>
                            <h1>PRESIDENTIAL<br/>TOWERS</h1>
                        </div>
                        <div class="price">
                            Starting Price <br/>
                            <div class="star-price animated tada"> &#8377; <strong>82 Lacs</strong>*</div>
                        </div>
                        <ul>
                            <li> Premium 2 & 3 BHK Residences </li>
                            <li> 30+ Amenities in the project </li>
                            <li> Gym, Swimming pool & party lawn </li>
                            <li> 40%+ Open Space </li>
                        </ul>                        
                    </div>                  
                    <div class="banner-form"> 
                        <div id="sidebar">
                        <h2> Pre-Register for Best Offers </h2>
                        <p class="success_msg" style="display:none;"></p>
                        <form class="" action="" id="banner-form" method="POST" novalidate="novalidate">
                            <div class="form-group">
                                <input name="fullname" class="input" type="text" placeholder="Enter Name" id="fullname" onkeypress="return isAlpha(event);" maxlength="255" />
                            </div>
                            <div class="form-group">
                                <input minlength="10" maxlength="10" name="phone" placeholder="Enter Mobile Number" class="input" type="text" id="phone" onkeypress="return isNumspac(event);" />
                            </div>
                            <div class="form-group">
                                <input name="email" class="input" type="email" id="email" placeholder="Enter Email Address" onkeyup="return IsEmail(this)" />
                            </div> 
                            <div class="form-group">                               
                                <textarea name="message" id="message" placeholder="Message" cols="30" rows="4" maxlength="255"></textarea>
                            </div>
                            <div class="form-group form-checkbox">
                                <input type="checkbox" class="form-checkbox" value="" id="consent" name="consent" />
                                <label for="consent"> I agree to be contacted via WhatsApp, SMS, Phone, Email etc.</label>
                            </div>
                            <input type="hidden" name="utm_source" id="utm_source" value="<?php echo isset($_GET['utm_source']) ? $_GET['utm_source'] : 'Microsite'; ?>">
                            <input type="hidden" name="crm_subsource" id="crm_subsource" value="<?php echo isset($_GET['crm_subsource']) ? $_GET['crm_subsource'] : ''; ?>">
                            <div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>" style="display:none;"></div>
                            <button type="submit" class="btn btn-secondary" id="submitform" name="submitform" value="Submit">Submit</button>                            
                        </form>
                    </div>
                </div>
                </div>                
            </div>   
        </section>
        
        <!-- About Us -->
        <section class="about-us" id="about-us">
            <div class="container">
                <h2> Project Overview </h2>
                <div class="row">
                    <div class="d-col d-col-66">
                        <h4></h4>
                        <!-- <p>We Offering Presidential Towers prestigious well organized space of living for you which is the trade mark of the market with affordable and Exclusive Flats. Presidential Towers Offering Lots of unique Lifestyles or attractive Designs of Apartments at Ravet. It is envisioned to become the largest ever privately planned development in India. This has made the neighborhood a top choice amongst home buyers. All the apartments are at this address are thoughtfully-designed to take care of every element of your life. Open to essential conveniences as and when you need them. A world that appreciates your choices. Presidential Towers is a place that cares about your health above all else. Here, we promise to keep you healthy in more ways than one. Presidential Towers a landmark gracefully designed to offer you with a wholesome living experience.</p>                         -->
                        <p>
                            Experience prestigious living at Presidential Towers in Ravet, India's largest private development. Thoughtfully designed apartments cater to your every need, prioritizing convenience and well-being. Welcome to a landmark of exclusive living.
                        </p>
                        
                        <h5> FEATURES:</h5>
                        <ul>
                            <li> Luxurious 2 and 3 BHK Apartments </li>
                            <li> Theme based project </li>
                            <li> All Flats with East-West Entry </li>
                            <li> 30+ Lifestyle Amenities across ground, Podium & rooftop Levels </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </section>

         <!-- Price Section -->
         <section class="price" id="price">
            <div class="container">
                <div class="row">
                    <div class="d-col d-col-66">
                        <div class="price-wrapper">
                            <h2> PRICE </h2>
                            <div class="apartment-list">
                                <div class="wrapper">
                                    <div class="bhk">
                                        2 BHK Apartment
                                    </div>
                                    <div class="price">
                                        <strong> &#8377; 82-87 Lacs*</strong>
                                    </div>
                                    <div class="size">
                                        <div class="label">Size :&nbsp;</div>
                                        <div class="value"> 727 - 792 Sq.ft</div>
                                    </div>
                                    <button class="modal-popup"> enquiry now</button>
                                </div>                                
                                <div class="wrapper">
                                    <div class="bhk">
                                        3 BHK Apartment
                                    </div>
                                    <div class="price">
                                        <strong> &#8377; 1.08 - 1.14 Cr*</strong>
                                    </div>
                                    <div class="size">
                                        <div class="label">Size :&nbsp;</div>
                                        <div class="value"> 971 - <?= number_format(1031,0) ?> Sq.ft</div>
                                    </div>
                                    <button class="modal-popup"> enquiry now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Floor Section -->
        <section class="floor-plan" id="floor-plan">
            <div class="container">
                <h2> Floor Plan </h2>
                <div class="row">
                    <div class="d-col d-col-66">
                        <div class="plan-list">
                            <div class="plan-image">
                                <picture>
                                    <img src="./assets/images/floor-plan/floor-plan1.png" alt="Floor Plan 1 2 BHK" title="Floor Plan 1 2 BHK">
                                </picture>
                                <div class="size-tag modal-popup">2 BHK</div>
                            </div>
                            <div class="plan-image">
                                <picture>
                                    <img src="./assets/images/floor-plan/floor-plan2.png" alt="Floor Plan 2 3 BHK" title="Floor Plan 2 3 BHK">
                                </picture>
                                <div class="size-tag modal-popup">3 BHK</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- Amenities Section -->
         <section class="amenities" id="amenities">
            <div class="container">
                <h2> Amenities </h2>
                <div class="row" style="padding-bottom: 25px;">
                    <div class="d-col d-col-66">
                        <p style="margin-top: 0;">Presidential Tower boasts a plethora of amenities that redefine urban living. From a state-of-the-art fitness center and a refreshing swimming pool to lush green gardens and dedicated play areas, every aspect of your well-being is catered to. Elevate your lifestyle with Presidential Tower.</p>
                        <div class="amenities-list">
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Swimming Pool" title="Swimming Pool">
                                    <img src="./assets/images/amenities/sp.png" alt="Swimming Pool" title="Swimming Pool">
                                </picture>
                                <div class="amenities-name">swimming pool</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Club House" title="Club House">
                                    <img src="./assets/images/amenities/ch.png" alt="Club House" title="Club House">
                                </picture>
                                <div class="amenities-name">club house</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Kids Play Area" title="Kids Play Area">
                                    <img src="./assets/images/amenities/kpa.png" alt="Kids Play Area" title="Kids Play Area">
                                </picture>
                                <div class="amenities-name">kids play area</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Senior Citizen Area" title="Senior Citizen Area">
                                    <img src="./assets/images/amenities/sc.png" alt="Senior Citizen Area" title="Senior Citizen Area">
                                </picture>
                                <div class="amenities-name">senior citizen area</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Kids Pool" title="Kids Pool">
                                    <img src="./assets/images/amenities/kp.png" alt="Kids Pool" title="Kids Pool">
                                </picture>
                                <div class="amenities-name">kids pool</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Net Cricket" title="Net Cricket">
                                    <img src="./assets/images/amenities/nc.png" alt="Net Cricket" title="Net Cricket">
                                </picture>
                                <div class="amenities-name">net cricket</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Tennis Court" title="Tennis Court">
                                    <img src="./assets/images/amenities/tc.png" alt="Tennis Court" title="Tennis Court">
                                </picture>
                                <div class="amenities-name">tennis court</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Basketball Court" title="Basketball Court">
                                    <img src="./assets/images/amenities/bc.png" alt="Basketball Court" title="Basketball Court">
                                </picture>
                                <div class="amenities-name">basketball court</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Amphitheater" title="Amphitheater">
                                    <img src="./assets/images/amenities/amphitheater.png" alt="Amphitheater" title="Amphitheater">
                                </picture>
                                <div class="amenities-name">amphitheater</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="BBQ Lawn" title="BBQ Lawn">
                                    <img src="./assets/images/amenities/bbq.png" alt="BBQ Lawn" title="BBQ Lawn">
                                </picture>
                                <div class="amenities-name">BBQ lawn</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Indoors Games" title="Indoors Games">
                                    <img src="./assets/images/amenities/ig.png" alt="Indoors Games" title="Indoors Games">
                                </picture>
                                <div class="amenities-name">indoors games</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Party Lawn" title="Party Lawn">
                                    <img src="./assets/images/amenities/pl.jpg" alt="Party Lawn" title="Party Lawn">
                                </picture>
                                <div class="amenities-name">party lawn</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Badminton Court" title="Badminton Court">
                                    <img src="./assets/images/amenities/bc.png" alt="Badminton Court" title="Badminton Court">
                                </picture>
                                <div class="amenities-name">badminton court</div>
                            </div>
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Gymnasium" title="Gymnasium">
                                    <img src="./assets/images/amenities/gymnasium.png" alt="Gymnasium" title="Gymnasium">
                                </picture>
                                <div class="amenities-name">gymnasium</div>
                            </div>
                            
                            <div class="box">
                                <picture>
                                    <source src="./assets/images/banner.webp" alt="Car Charging Station" title="Car Charging Station">
                                    <img src="./assets/images/amenities/ccs.png" alt="Car Charging Station" title="Car Charging Station">
                                </picture>
                                <div class="amenities-name">Car charging Station</div>
                            </div>
                            <!-- Repeat this box div 16 times -->
                        </div>
                    </div>
                </div>
            </div>            
        </section>
         <!-- Location Section -->
         <section class="location-connectivity" id="location-connectivity">
            <div class="container">
                <div class="row">
                    <div class="d-col d-col-66">
                        <div class="row">
                            <div class="d-col d-col-2">
                                <h2> Location with Connectivity </h2>
                                <ul>
                                    <li> S B Patil Public School: 600 M </li>
                                    <li> Kiwale Bus Stop: 1.3 KM </li>
                                    <li> Akurdi Railway Station: 2.7 KM </li>
                                    <li> D-Mart: 3 KM </li>
                                </ul>
                            </div>
                            <div class="d-col d-col-2">
                                <div id="map" style="height: 400px; width:100%; display:block;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!-- About Us -->
        <section class="about-us" id="about-us">
            <div class="container">
                <h2> About Developer </h2>
                <div class="row">
                    <div class="d-col d-col-66">
                        <h4></h4>
                        <p>Ceratec is growing speedily into one of Pune's leading brands in the real estate industry. Ceratec stepped into the lifestyle industry on a strong foundation of quality benchmark and customer satisfaction to make innovative lifestyle more accessible today. Over the years it has emerged as the most trusted destination for all home dwellers. In the year 2000 Ceratec was born to provide end to end lifestyle spaces building futuristic state of the art homes for every budget. The company adheres to ethical practices, timely delivery while maintaining quality in each of its projects. With a growing number of satisfied customers across the lifestyle industry, Ceratec has emerged as a young dynamic and promising company.</p>                        
                    </div>
                </div>
            </div>
        </section>    
        <!-- Sticky Footer Menu -->
        <div class="mobile-bottom-links" id="mobile-bottom-links">
            <nav class="bottom-links">
            <ul>
                    <li>
                        <a href="javascript:void(0)" class="modal-popup" title="Call">
                            <img src="./assets/images/call.svg" alt="Call" title="Call">
                            Call
                        </a>
                    </li>
                    <li>
                        <a class="scroll-nav" href="#price" title="Price">
                            <img src="./assets/images/price.svg" alt="Price" title="Price">
                            price
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="modal-popup" title="Brochure">
                            <img src="./assets/images/floor.svg" alt="Brochure" title="Brochure">
                            Brochure
                        </a>
                    </li>
                </ul>
            </nav>
        </div>     
    </main>
    <footer class="footer" id="footer">
        <div class="container">
            <div class="footer-wrapper">
                <div class="row">
                    <div  class="d-col d-col-66">
                        <p class="disclaimer">Disclaimer: We are an authorised marketing partner for this project. Provided content is given by respective owners and this website and content is for information purpose only and it does not constitute any offer to avail for any services. Prices mentioned are subject to change without prior notice and properties mentioned are subject to availability. You can expect a call, SMS or emails on details registered with us.</p>
                    </div>
                </div>
            </div>
        </div>
        <span>
            Digital Media Planned by: <a href="https://kunvarjirealty.com/?utm_source=Ceratec Presidential Towers&utm_medium=CPC&utm_campaign=Google%20Adwords" target="blank" title="Kunvarji Realty Advisors"> Kunvarji Realty Advisors</a>
        </span>
    </footer>
    <!-- Chatbot -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6607deee1ec1082f04dcf603/1hq7btlnr';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- Popup Modal -->
    <div id="modal-popup" style="display:none">
        <div class="banner-form"> 
            <div class="sidebar">
                <span class="close">&times;</span>
            <h2> PRE-REGISTER FOR BEST OFFERS </h2>
            <p class="popsuccess_msg" style="display:none;"></p>
            <form class="" action="" id="popup-form" method="POST" novalidate="novalidate">
                <div class="form-group">
                    <input name="popupfullname" class="input" type="text" id="popupfullname" placeholder="Enter Name" onkeypress="return isAlpha(event);" maxlength="255" />
                </div>
                <div class="form-group">
                    <input minlength="10" maxlength="10" name="popupmobile" class="input" type="text" placeholder="Enter Mobile Number" id="popupmobile" onkeypress="return isNumspac(event);" />
                </div>
                <div class="form-group">
                    <input name="popupemail" class="input" type="email" id="popupemail" placeholder="Enter Email Address" onkeyup="return IsEmail(this)" />
                </div> 
                <div class="form-group">
                    <textarea name="popupmessage" id="popupmessage" placeholder="Message" cols="30" rows="4" maxlength="255"></textarea>
                </div>
                <div class="form-group form-checkbox">
                    <input type="checkbox" class="form-checkbox" value="" id="popupconsent" name="popupconsent" />
                    <label for="popupconsent"> I agree to be contacted via WhatsApp, SMS, Phone, Email etc.</label>
                </div>
                 <input type="hidden" name="popuputm_source" id="popuputm_source" value="<?php echo isset($_GET['utm_source']) ? $_GET['utm_source'] : 'Microsite'; ?>">
                <input type="hidden" name="popupcrm_subsource" id="popupcrm_subsource" value="<?php echo isset($_GET['crm_subsource']) ? $_GET['crm_subsource'] : ''; ?>">
                <div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>" style="display:none;"></div>
                <button type="submit" class="btn btn-secondary" id="popupsubmit" name="popupsubmit" value="Submit">Submit</button>                            
            </form>
        </div>
    </div>



    <!-- jQuery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <!-- Custom JS -->
    <script src="./assets/js/custom.js" async defer></script>
    <!-- Slick Slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>     
        //Amenites Slider
        $('.amenities-list').slick({
        rows: 2,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false,
        autoplay: true,
        dots: true,                
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true,
                    swipeToSlide: true,
                    arrows: false,
                }
            },  
            {
                breakpoint: 768,
                settings: {
                    rows: 1,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true,
                    swipeToSlide: true,
                    arrows: false,
                }
            },                    
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    swipeToSlide: true,
                    arrows: false,
                }
            }
        ]
    });
    </script>
    <style>
            .banner .texture{position: relative;}    
            .loading-overlay {
                position: fixed;
                width: 100%;
                height: 100%;
                background-color: #000000e3;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                z-index: 999999;
            }
            .loading-text {
                font-size: 18px;
                margin-top: 10px;
                color: #1D685B;
            }
            .loading-spinner {
                border: 4px solid #D3D4D4;
                border-top: 4px solid #1D685B;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                animation: spin 1s linear infinite;
            }
            @keyframes spin {
                0% {
                    transform: rotate(0deg);                
                }
                100% {
                    transform: rotate(360deg);
                }
            }
            .success_msg, .popsuccess_msg {
                color: green;
                font-weight: 600;
            }
        </style> 
    <script>  
        if( $( window ).width() > 1200) {      
            var stickitLeft = $('#sidebar').offset.left;            
            var stickitWidth = $('.banner-form').width() + 'px';
            var stickitHeight = $('.banner-form').height() + 'px';
            var stickySidebarToTop = $('#sidebar').offset().top;
            $(window).scroll(function() {
                var windowToTop = $(window).scrollTop();
                if (windowToTop + 140 > stickySidebarToTop) {
                    $('#sidebar').css({
                    'position': 'fixed',
                    'top': '150px',
                    'background': '#EAE9E8',
                    'z-index': '9999',
                    'left': stickitLeft,
                    'width': stickitWidth,
                    'height': stickitHeight
                    })
                } else {
                    $('#sidebar').removeAttr('style');
                }
            })
        }

        $('a.scroll-nav').on('click',function (e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);
            var scroll;
            if($(window).scrollTop()==0){
                scroll =  ($target.offset().top) - 211
            }else{
                scroll =  ($target.offset().top) - 105
            }
            $('html, body').stop().animate({
                'scrollTop': scroll
            }, 500, 'swing', function () {
                //window.location.hash = target;
            });
        });
        
        async function initMap() {
            // 18.650176846124722, 73.73660673366908
            const {AdvancedMarkerElement} = await google.maps.importLibrary("marker");
            var map = new google.maps.Map(document.getElementById('map'),{
                center: { lat: 18.650176846124722, lng: 73.73660673366908 },
                zoom: 16, 
                mapId: 'DEMO_MAP_ID'
            });
            var content = '<b>Ravet, Pimpri-Chinchwad, Maharashtra 412101</b>';
            const marker = new AdvancedMarkerElement({
                map,
                position: { lat: 18.650176846124722, lng: 73.73660673366908 }
            });  
            var infowindow = new google.maps.InfoWindow({
                content: content
            });
            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
        }
    </script>
    <script async src="//maps.googleapis.com/maps/api/js?key=AIzaSyCcNMzHX7wbqZ6xu0QNBTQUbKVgYAuZ6zw&language=en&callback=initMap&loading=async"></script>
</body>

</html>
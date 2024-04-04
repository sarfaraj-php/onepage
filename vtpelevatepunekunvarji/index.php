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
        $frompage = "VTP ELEVATE - PUNE";
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
        // echo '<pre>data = ';
        // print_r($alldata);
        // echo '</pre>';
        // die;
        fclose($handleagain);
        echo $response; 
        die;

        
    }
    $sitekey = "6LeN7qopAAAAAGeKDf6L3-PlSHDEUml2d1T-A_7T";
    $secretkey = "6LeN7qopAAAAAGG_QxyzbmdMuIRuLyxVsZsNJoCK";
              
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
        <title>VTP Elevate near Hinjewadi | 2, 2.5 & 3 BHK Premium Apartments in Pune</title>
        <meta name="title" content="VTP Elevate near Hinjewadi | 2, 2.5 & 3 BHK Premium Apartments in Pune">
        <meta name="description" content="Experience luxury living at its finest with our 2, 2.5 & 3 BHK Luxury residential apartments in Hinjewadi, Pune. Elevate your lifestyle with spacious interiors, modern amenities, and breathtaking views.">
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
        })(window,document,'script','dataLayer','GTM-KM65QTB6');</script>
        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $sitekey; ?>"></script>
        <!-- End Google Tag Manager -->
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KM65QTB6"
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
                        <a href="javascript:void(0);" title="VTP Realty">
                            <picture>
                                <source srcset="assets/images/logo.webp" alt="VTP Realty" title="VTP Realty" width="113">
                                <img src="./assets/images/logo.png" alt="VTP Realty" title="VTP Realty" width="113"
                                    draggable='false' />
                            </picture>
                        </a>
                    </div>
                    <nav class="nav">
                        <ul>
                            <li><a class="scroll-nav" href="#about-us" title="Overview">overview</a></li>
                            <li><a class="scroll-nav" href="#price" title="Price & Floor Plans">price & floor plans</a></li>
                            <li><a class="scroll-nav" href="#amenities" title="Amenities">amenities</a></li>
                            <li><a class="scroll-nav" href="#location-connectivity" title="Location" >location</a></li>
                            <li><a class="modal-popup" href="javascript:void(0);" title="Download Brochure"> download brochure </a></li>
                        </ul>
                    </nav>
                    
                    <div class="request-call">
                        <a href="javascript:void(0)" class="modal-popup" title="Request a call back">Request a call back</a>
                    </div>
                    <div class="menu-toggle">
                        <!-- <div class="request-call">
                        <a href="javascript:void(0)" class="modal-popup" title="Request a call back">Request a call back</a>  
                        </div>-->
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
                        <img src="./assets/images/mobile-banner.jpg" alt="VTP Elevate Mobile Banner" title="VTP Elevate Mobile Banner">
                    </a>
                </div>
                <div class="container">
                    <div class="texture">
                        <div class="offer">                                
                            <div class="offer-title">
                                <span> near hinjewadi it park, pune</span>
                                <h1>vtp elevate</h1>
                            </div>
                            <div class="description"> <strong>2</strong> bhk <span> | </span> <strong>2.5</strong> bhk <br>
                                <strong>3.5</strong> bhk apartments
                            </div>
                            <div class="price">
                                Starting Price <br/>
                                <div class="star-price animated tada"> &#8377; <strong>69 Lacs</strong>*</div>
                            </div>
                            <ul>
                                <li> Stylish Entrance Lobbies For Every Tower </li>
                                <li> 100% DG backup for Lifts & Common Areas </li>
                                <li> Provision For Electric Vehicle Charging Points* </li>
                            </ul>                        
                        </div>                  
                        <div class="banner-form"> 
                            <div id="sidebar">
                            <h2> BOOK A SITE VISIT </h2>
                            <p class="success_msg" style="display:none;"></p>
                            <form class="" action="" id="banner-form" method="POST" novalidate="novalidate">
                                <div class="form-group">                                
                                    <input name="fullname" class="input" type="text" id="fullname" placeholder="Full Name" onkeypress="return isAlpha(event);" maxlength="255"  />
                                </div>
                                <div class="form-group">
                                    <input minlength="10" maxlength="10" name="phone" class="input" type="text" id="phone" placeholder="Mobile Number" onkeypress="return isNumspac(event);"/>
                                </div>
                                <div class="form-group">                                
                                    <input name="email" class="input" type="email" id="email" placeholder="Email Address" onkeyup="return IsEmail(this)" />
                                </div> 
                                <div class="form-group">
                                    <textarea name="message" id="message" cols="30" rows="2" placeholder="Message" maxlength="255"></textarea>
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
                    <h2> about us </h2>
                    <div class="row">
                        <div class="d-col d-col-66">
                            <h4> Makes your self at home and enjoy a unique experience</h4>
                            <span> Near Hinjewadi IT Park, Pune</span>
                            <!-- <p>VTP Elevate Hinjewadi is spread across 3 towers soaring 35 floors high, crafted to elevate your living experience. Located in Hinjewadi Phase 1, you can easily forget about the stress of long commutes. Don’t just settle for anything because you definitely deserve a slice of paradise in bustling Pune. Look no further than VTP Elevate Hinjewadi by VTP Realty offering 2, 2.5 & 3 BHK premium apartments defining luxury living meets the convenience of architectural brilliance.</p>
                            <p>Nestled close to major IT offices, VTP Codename Elevate is your gateway to career success. Plus, top schools, entertainment hubs, and healthcare facilities are all within arm's reach.</p>
                            <p>VTP Realty is committed to providing world-class amenities, from kids' play areas to a fully-equipped gymnasium, from indoor games to a serene yoga lawn, VTP Elevate has everything to cater to your lifestyle needs.</p>-->
                            <p>
                                Welcome to VTP Elevate Hinjewadi, your gateway to luxury living near Pune's Hinjewadi IT Park. Our 35-story towers feature premium 2, 2.5 & 3 BHK apartments, offering proximity to IT offices, schools, and entertainment hubs. With top-notch amenities like a gym, kids' play areas, and a yoga lawn, we cater to your lifestyle needs. Experience paradise with VTP Elevate Hinjewadi by VTP Realty.
                            </p>
                            <h5> FEATURES:</h5>
                            <ul>
                                <li> Stylish Entrance Lobbies For Every Tower </li>
                                <li> 100% DG backup for Lifts & Common Areas </li>
                                <li> Construction Technology - Aluform</li>
                                <li> Project Will Have A STP and WTP </li>
                                <li> Provision For Electric Vehicle Charging Points* </li>
                                <li> Common Washroom For Drivers In The Parking Area </li>
                                <li> Superior Quality Apex/texture/protective Exterior Paint </li>
                                <li> Earthquake Resistant Rcc Structure </li>
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
                                            <strong> &#8377; 69-89 Lacs*</strong>
                                        </div>
                                        <div class="size">
                                            <div class="label">Size :&nbsp;</div>
                                            <div class="value"> 620 - 765 Sq.ft</div>
                                        </div>
                                        <button class="modal-popup"> enquiry now</button>
                                    </div>
                                    <div class="wrapper">
                                        <div class="bhk">
                                            2.5 BHK Apartment
                                        </div>
                                        <div class="price">
                                            <strong> &#8377; 98 Lacs* - 1.01 Cr*</strong>
                                        </div>
                                        <div class="size">
                                            <div class="label"> Size :&nbsp;</div>
                                            <div class="value"> 860 Sq.ft</div>
                                        </div>
                                        <button class="modal-popup"> enquiry now</button>
                                    </div>
                                    <div class="wrapper">
                                        <div class="bhk">
                                            3 BHK Apartment
                                        </div>
                                        <div class="price">
                                            <strong> &#8377; 1.08 - 1.12 Cr*</strong>
                                        </div>
                                        <div class="size">
                                            <div class="label">Size :&nbsp;</div>
                                            <div class="value"> 948 Sq.ft</div>
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
                                        <img src="./assets/images/floor-plan/floor-plan2.png" alt="Floor Plan 1 2.5 BHK" title="Floor Plan 1 2.5 BHK">
                                    </picture>
                                    <div class="size-tag modal-popup">2.5 BHK</div>
                                </div>                            
                                <div class="plan-image">
                                    <picture>
                                        <img src="./assets/images/floor-plan/floor-plan3.png" alt="Floor Plan 1 3 BHK" title="Floor Plan 1 3 BHK">
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
                    <div class="row">
                        <div class="d-col d-col-66">
                            <div class="amenities-list">
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/sp.png" alt="Swimming Pool" title="Swimming Pool">
                                    </picture>
                                    <div class="amenities-name">swimming pool</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/ch.png" alt="Club House" title="Club House">
                                    </picture>
                                    <div class="amenities-name">club house</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/kpa.png" alt="Kids Play Area" title="Kids Play Area">
                                    </picture>
                                    <div class="amenities-name">kids play area</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/sc.png" alt="Senior Citizen Area" title="Senior Citizen Area">
                                    </picture>
                                    <div class="amenities-name">senior citizen area</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/kp.png" alt="Kids Pool" title="Kids Pool">
                                    </picture>
                                    <div class="amenities-name">kids pool</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/nc.png" alt="Net Cricket" title="Net Cricket">
                                    </picture>
                                    <div class="amenities-name">net cricket</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/tc.png" alt="Tennis Court" title="Tennis Court">
                                    </picture>
                                    <div class="amenities-name">tennis court</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/bc.png" alt="Basketball Court" title="Basketball Court">
                                    </picture>
                                    <div class="amenities-name">basketball court</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/amphitheater.png" alt="Amphitheater" title="Amphitheater">
                                    </picture>
                                    <div class="amenities-name">amphitheater</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/bbq.png" alt="BBQ Lawn" title="BBQ Lawn">
                                    </picture>
                                    <div class="amenities-name">BBQ lawn</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/ig.png" alt="Indoors Games" title="Indoors Games">
                                    </picture>
                                    <div class="amenities-name">indoors games</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/pl.jpg" alt="Party Lawn" title="Party Lawn">
                                    </picture>
                                    <div class="amenities-name">party lawn</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/bc.png" alt="Badminton Court" title="Badminton Court">
                                    </picture>
                                    <div class="amenities-name">badminton court</div>
                                </div>
                                <div class="box">
                                    <picture>
                                        <img src="./assets/images/amenities/gymnasium.png" alt="Gymnasium" title="Gymnasium">
                                    </picture>
                                    <div class="amenities-name">gymnasium</div>
                                </div>
                                
                                <div class="box">
                                    <picture>
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
                                        <li> Solapur Road 7 Km </li>
                                        <li> Lifeline Hospital 5 km </li>
                                        <li> Columbia Asia Hospital 6 km </li>
                                        <li> Reliance Mart 5.5 km </li>
                                        <li> Phoenix Market City 8 km </li>
                                        <li> Hotel Radisson Blu 5.5 km </li>
                                        <li> Hyatt Regency 9 km </li>
                                        <li> Airport 10 km </li>
                                        <li> Pune Ahmednagar Highway 4.5 Km</li>
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
                        <div class="d-col d-col-66">
                            <p>
                                Welcome to VTP Elevate Hinjewadi, where luxury living meets convenience near Pune's Hinjewadi IT Park. Our 3 towers, rising 35 floors high, offer 2, 2.5 & 3 BHK premium apartments. Enjoy proximity to major IT offices, schools, entertainment hubs, and healthcare facilities. With world-class amenities including a gym, kids' play areas, and a yoga lawn, we ensure your lifestyle needs are met. Experience a slice of paradise with VTP Elevate Hinjewadi by VTP Realty.
                            </p>
                            <p>Project RERA NO : P52100033888</p>
                            <p class="disclaimer">Disclaimer - The content provided on this website is for information purposes only and does not constitute an offer to avail any service. The prices mentioned are subject to change without prior notice, and the availability of properties mentioned is not guaranteed.</p>
                        </div>                  
                    </div>
                </div>
            </div>
            <span>
                Digital Media Planned by: <a href="https://kunvarjirealty.com/?utm_source=VTP%20Elevate%20Pune&utm_medium=CPC&utm_campaign=Google%20Adwords" target="blank" title="Kunvarji Realty Advisors"> Kunvarji Realty Advisors</a>
            </span>
        </footer>
        <!-- Chatbot -->
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/6607acc9a0c6737bd1266798/1hq6vlt2n';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        <!-- Popup Modal -->
        <div id="modal-popup">
            <div class="banner-form"> 
                <div class="sidebar">
                    <span class="close">&times;</span>
                <h2> BOOK A SITE VISIT </h2>
                <p class="popsuccess_msg" style="display:none;"></p>
                <form class="" action="" id="popup-form" method="POST" novalidate="novalidate">
                    <div class="form-group">
                        <input name="popupfullname" class="input" type="text" id="popupfullname" placeholder="Full Name"   onkeypress="return isAlpha(event);" maxlength="255" />
                    </div>
                    <div class="form-group">
                        <input minlength="10" maxlength="10" name="popupmobile" class="input" type="text" id="popupmobile" placeholder="Mobile Number" onkeypress="return isNumspac(event);" />
                    </div>
                    <div class="form-group">
                        <input name="popupemail" class="input" type="email" id="popupemail" placeholder="Email Address" onkeyup="return IsEmail(this)"/>
                    </div> 
                    <div class="form-group">
                        <textarea name="popupmessage" id="popupmessage" cols="30" rows="2" placeholder="Message" maxlength="255"></textarea>
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
        <script src="./assets/js/custom.js" ></script>
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
                color: #B57722;
            }
            .loading-spinner {
                border: 4px solid #D3D4D4;
                border-top: 4px solid #B57722;
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
                    scroll =  ($target.offset().top) - 118
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
                const {AdvancedMarkerElement} = await google.maps.importLibrary("marker");
                var map = new google.maps.Map(document.getElementById('map'),{
                    center: { lat: 18.5914773, lng: 73.7277271 },
                    zoom: 14, 
                    mapId: 'DEMO_MAP_ID'
                });
                var content = '<b>Phase 1, Hinjawadi Rajiv Gandhi Infotech Park, Hinjawadi, Pune, Pimpri-Chinchwad, Maharashtra 411057</b>';
                const marker = new AdvancedMarkerElement({
                    map,
                    position: { lat: 18.5914773, lng: 73.7277271 }
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
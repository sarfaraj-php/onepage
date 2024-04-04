/*******************
*    
*    Header Responsive
*
*********************/
$(document).ready(function(){
    $('.menu-toggle').click(function(){
        $('nav').toggleClass('active');
        $(".menu-toggle2").toggleClass("open");
    })
    $('.nav a.scroll-nav').click(function(){
        $('.nav').removeClass('active');
        $(".menu-toggle2").toggleClass("open");
    })

    $( window ).resize( function() {
    $ = jQuery;    
    if( $( window ).width() > 1201) {
        jQuery('header .header-wrapper > .request-call').show();
    }
    else {
        jQuery('header .header-wrapper > .request-call').hide();
    }        
    });    
});
/*****************End Of Header Responsive *********************/
/*******************
*    
*    Popup Modal Design
*
*********************/
$("#modal-popup").hide(); 

$('.modal-popup').click(function(){
    // $("html").animate({ scrollTop: 0 }, "slow");
    $("body").css('overflow-y','hidden');
    $("#modal-popup").show();
    // $(".banner-form").clone().appendTo("#modal-popup"); 
    $('#modal-popup #sidebar').removeAttr('style');
    console.log('popup open');
});

$('#modal-popup .close').click(function(){
    $("body").css('overflow-y','unset');
    $("#modal-popup").hide(); 
    console.log('popup close');
});
/*****************End Of Popup Modal *********************/

/*******************
*    
*    Mobile Scroll Sticky Header
*
*********************/
$(window).scroll(function() {
    if( $( window ).width() < 1201) {
        if ($(this).scrollTop() > 74) {
            $('header').addClass('sticky');
        } else {
            $('header').removeClass('sticky');
        }
    }
});

if( $( window ).width() < 1200) {
    jQuery('section.banner').css('padding-top','0');
}

//Only Alphabets 
//onkeypress="return isAlpha(event);" 
function isAlpha(evt) {
    var key = evt.keyCode;
    if (key >= 48 && key <= 57) {
        evt.preventDefault();
        return true;
    }
}
// Only Numeric
//onkeypress="return isNumspac(event);"
function isNumspac(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 32){
        return false;
    }
    return true;
} 
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email.value)) {
        email.style.border = "1px solid red";
        return false;
    }
    else {
        email.style.border = "0px";
        return true;
    }
}
jQuery.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Please enter only alphabetic characters");

jQuery.validator.addMethod("digitsonly", function (value, element) {
    return this.optional(element) || /^\d*(?:\.\d{1,2})?$/i.test(value);
}, "Please enter a valid mobile number.");
jQuery.validator.addMethod('email_rule', function (value, element) {
    if (/^([a-zA-Z0-9_\-\.]+)\+?([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
        return true;
    } else {
        return false;
    };
}, "Please enter a valid email address");

$("#banner-form").validate({
    ignore: [],
     rules: {
        fullname: { required: true, lettersonly: true},
        email: { required: true, maxlength: 255, email: true, email_rule: true},
         phone: { required: true, digitsonly: true },
         message: { maxlength: 255 },
        consent: { required: true }
    },
    messages: {
        fullname: { required: 'Please enter full name', lettersonly: "Please enter valid full name" },
        email: { required: 'Please enter email address', email: "Please enter valid email address", email_rule: "Please enter valid email address"},
        phone: { required: 'Please enter phone number', digitsonly: 'Phone number must 10 digit' },
        message: { maxlength: 'Message leangth is 250 characters'},
        consent: { required: 'Please check consent' }
    },submitHandler: function (e) {
        // alert("Hello");
        
        var fullname = $("#fullname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();
        var consent = $("#consent").val();
        var submitform = $("#submitform").val();
        var consent = "";
        if ($('#consent').is(":checked")) {
            consent = "Yes";
        }
        var utm_source = $("#utm_source").val();
        var crm_subsource = $("#crm_subsource").val();
        // e.preventDefault();
        $.ajax({
            url:  "index.php",
            type:'POST',
            beforeSend: function() {
                // setting a timeout
                $(".loading-overlay").fadeIn();
            }, 
            // data: $('#banner-form').serialize(),
            data: {fullname : fullname, email : email, phone : phone, message : message, consent : consent, submitform : submitform, crm_subsource: crm_subsource, utm_source : utm_source},
            dataType: "json",
            success:function(response){
                console.log(response);
                $(".loading-overlay").fadeOut();
                if (response.Success == true) {
                    // alert(response);
                    $('#banner-form')[0].reset();
                    // $('#banner-form')[0].reset();
                    window.location.href= window.location.origin+"/thankyou.php";                    
                }
            }
        })
    }
});

$("#popup-form").validate({
    ignore: [],
    rules: {
        popupfullname: { required: true, lettersonly: true},
        popupemail: { required: true, maxlength: 255, email: true, email_rule: true},
        popupmobile: { required: true, digitsonly: true },
        popupmessage: { maxlength: 255 },
        popupconsent: { required: true }
    },
    messages: {
        popupfullname: { required: 'Please enter full name', lettersonly: "Please enter valid full name" },
        popupemail: { required: 'Please enter email address', email: "Please enter valid email address", email_rule: "Please enter valid email address"},
        popupmobile: { required: 'Please enter phone number', digitsonly: 'Phone number must 10 digit' },
        popupmessage: { maxlength: 'Message leangth is 250 characters'},
        popupconsent: { required: 'Please check consent' }
    },submitHandler: function (e) {
        // alert("Hello");        
        var fullname = $("#popupfullname").val();
        var email = $("#popupemail").val();
        var phone = $("#popupmobile").val();
        var message = $("#popupmessage").val();
        var consent = $("#popupconsent").val();
        var submitform = $("#popupsubmit").val();
        var consent = "";
        if ($('#popupconsent').is(":checked")) {
            consent = "Yes";
        }
        var utm_source = $("#popuputm_source").val();
        var crm_subsource = $("#popupcrm_subsource").val();
        // e.preventDefault();
        $.ajax({
            url:  "index.php",
            type:'POST',
            beforeSend: function() {
                // setting a timeout
                $(".loading-overlay").fadeIn();
            }, 
            data: {fullname : fullname, email : email, phone : phone, message : message, consent : consent, submitform : submitform, utm_source: utm_source, crm_subsource : crm_subsource},
            dataType: "json",
            success:function(response){
                console.log(response);
                $(".loading-overlay").fadeOut();
                if (response.Success == true) { 
                    $('#popup-form')[0].reset(); 
                    window.location.href= window.location.origin+"/thankyou.php";
                }
            }
        })
    }
});

$(document).ready(function() {
    localStorage.removeItem('popState');
    if(localStorage.getItem('popState') != 'shown'){
        $('#modal-popup').delay(15000).fadeIn();
        localStorage.setItem('popState','shown')
    }
});
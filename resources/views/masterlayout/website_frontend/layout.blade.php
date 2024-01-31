<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" >
  

  @if(request()->is('/'))
  <title>Sagmetic Infotech: Web Design, Development, and Digital Marketing</title>
  <meta name="google-site-verification" content="Z3P2ZSjBqYcKEoDS58H0qR1tQbBQexgBB596IUxmZ1c"/>
  <meta name="description" content="Sagmetic Infotech is a full-service web design, development, and digital marketing company. We help businesses improve their online visibility and boost sales.">
  @endif
  @if(request()->is('careers*'))
  <title>Web Developement Job Openings and Career Opportunities</title>
  <meta name="description" content="Explore exciting web development opportunities! Join us at Sagmetic Infotech for a dynamic career filled with growth, innovation, and rewarding opportunities!">
  @endif
    <link rel="icon" type="image/x-icon" href="{{asset('website_frontend/images/favicon.png')}}"> 
    {{-- REMIX ICONS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.css" integrity="sha512-ZH3KB6wI5ADHaLaez5ynrzxR6lAswuNfhlXdcdhxsvOUghvf02zU1dAsOC6JrBTWbkE1WNDNs5Dcfz493fDMhA==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    {{-- iziToast --}}
    <link rel="stylesheet" href="{{asset('iziToast/css/iziToast.min.css')}}">
    <!-- Include Dropzone.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,500;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.0/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('website_frontend/css/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>


      <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T2N4Q4V');</script>
<!-- End Google Tag Manager -->

<meta name="keywords" content="website development company, ecommerce website development, web development services, website developers In India, digital marketing company, digital marketing agency, digital marketing services in india, seo services, best seo company, web design & development, ecommerce web design, Shopify development, PPC, ORM, SMM, SMO ">
<link rel="canonical" href="https://www.sagmetic.com/">
<meta property="og:type" content="website">
<meta property="og:title" content="Sagmetic Infotech: Web Design, Development, and Digital Marketing">
<meta property="og:url" content="https://www.sagmetic.com/">
<meta property="og:image" content="/files/images/sagmetic.png">
<meta property="og:description" content="Sagmetic Infotech is a full-service web design, development, and digital marketing company. We help businesses improve their online visibility and boost sales.">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Sagmetic Infotech: Web Design, Development, and Digital Marketing">
<meta name="twitter:description" content="Sagmetic Infotech is a full-service web design, development, and digital marketing company. We help businesses improve their online visibility and boost sales." >
<meta name="twitter:image" content="/files/images/sagmetic.png">

<script type="application/ld+json">
{

  "@context": "https://schema.org",

  "@type": "Organization",

  "name": "Sagmetic Infotech",

  "alternateName": "Vivid Creation",

  "url": "https://www.sagmetic.com/",

  "logo": "/files/images/sagmetic.png",

  "sameAs": [

    "https://www.facebook.com/sagmetic",

    "https://www.instagram.com/sagmeticinfotechpvtltd/",

    "https://www.linkedin.com/company/sagmetic-infotech-pvt-ltd/"

  ]

}
</script>
<style>
    .job-description p{
        font-size: large;
    }
</style>
</head>
<body>
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2N4Q4V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="site-header">
    <div class="container">
    <span id="counter"></span>
    <span id="counter2"></span>
    <span id="counter3"></span>
    <span id="counter1"></span>
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img  class="img-fluid logo" src="{{asset('website_frontend/images/sagmetic.svg')}}" alt="Sagmetic Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="bar bar1"></span>
                    <span class="bar bar2"></span>
                    <span class="bar bar3"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    @if(request()->is('careers*'))
                    <li class="nav-item ">
                    @else
                      <li class="nav-item active" id="bannerhash">
                    @endif
                    @if(request()->is('/'))
                      <a class="nav-link" href="{{url('#banner')}}">HOME <span class="sr-only">(current)</span></a>
                    @else
                      <a class="nav-link" href="{{url('/')}}">HOME <span class="sr-only">(current)</span></a>
                    @endif
                    </li>
                      <li class="nav-item " id="servicehash">
                      <a class="nav-link" href="{{url('/'.'#services')}}">OUR SERVICES</a>
                    </li>
                    <li class="nav-item" id="abouthash">
                      <a class="nav-link" href="{{url('/'.'#about')}}">ABOUT US</a> 
                    </li>
                    <li class="nav-item" id="contacthash">
                      <a class="nav-link" href="{{url('/'.'#contact')}}">CONTACT</a>
                    </li> 
                    @if(request()->is('careers*'))
                     <li class="nav-item active">
                    @else
                    <li class="nav-item">
                    @endif
                      <a class="nav-link" href="{{url('/careers')}}">CAREERS</a>
                    </li> 
                    <li class="nav-item" id="reviewhash">
                      <a class="nav-link" href="{{url('/'.'#reviews')}}">REVIEWS</a> 
                    </li>             
                  </ul>
                 <div class="socialicon">
                  <a class="icons" href="https://www.facebook.com/sagmetic">
                    <i class="fa-brands fa-facebook-f"></i>
                  </a>
                  <a class="icons" href="https://www.instagram.com/sagmeticinfotechpvtltd/">
                    <i class="fa-brands fa-instagram"></i>
                  </a>
                  <a class="icons" href="https://www.linkedin.com/company/sagmetic-infotech-pvt-ltd/"> 
                    <i class="fa-brands fa-linkedin-in"></i>
                  </a>
                 </div>
                </div>
              </nav>
        </div>
</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>



@yield('content')

<footer>
  <div class="container">
    <div class="footer-content">
      <div class="copyright">
        <p>©2023 All rights reserved to Sagmetic Infotech.</p>
    </div>
  </div>
  </div>
</footer>
<script src="{{asset('iziToast/js/iziToast.min.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('website_frontend/javascript/script.js')}}"></script>
<script>
$(document).ready(function(){
  $('#contactform').on('submit',function(e){
    e.preventDefault();
      formdata = new FormData(this);
   
      $.ajax({
        method: 'post',
         url: "{{url('/contact-us-mail')}}",
         data: formdata,
         dataType: 'json',
         contentType: false,
         processData: false,
         headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         success: function(response)
         {
          if(response == 'success'){
            $('#name').val('');
            $('#email').val('');
            $('#subject').val('');
            $('#phone').val('');
            $('#message').val('');
            grecaptcha.reset();
            $('.g-recaptcha').removeClass('g-recaptcha-success');
            $(".mail-response").removeClass('text text-danger');
            $(".mail-response").addClass('text text-success');
            $(".mail-response").text('Your mail has been sent successfully. Our team will review your query and get back to you shortly.');
          }else{
            grecaptcha.reset();
            $('.g-recaptcha').removeClass('g-recaptcha-success');
            $(".mail-response").removeClass('text text-success');
            $(".mail-response").addClass('text text-danger');
            $(".mail-response").text(response);
          }
         }
      });
  });
});
</script>
<script>
  $(function(){
    new WOW().init(); 
  });
  AOS.init();
</script>
<script>
$(document).ready(function(){

    if(location.hash == '#banner'){
      $('.nav-item').removeClass('active')
      $('#bannerhash').addClass('active')
    }
    if(location.hash == '#services'){
      $('.nav-item').removeClass('active')
      $('#servicehash').addClass('active')
    }
    if(location.hash == '#contact'){
      $('.nav-item').removeClass('active')
      $('#contacthash').addClass('active')
    }
    if(location.hash == '#reviews'){
      $('.nav-item').removeClass('active')
      $('#reviewhash').addClass('active')
    }
    if(location.hash == '#about'){
      $('.nav-item').removeClass('active')
      $('#abouthash').addClass('active')
    }
  })
</script>

</body>
</html>
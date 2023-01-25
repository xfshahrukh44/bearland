<!-- ============================================================== -->
<!-- All SCRIPTS AND JS LINKS BELOW  -->
<!-- ============================================================== -->

<script src="{{asset('js/jquery.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Slick Slider js -->
<script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
<!-- Fancy Box js -->
<script type="text/javascript" src="{{asset('js/jquery.fancybox.min.js')}}"></script>

<!-- Include js plugin -->
<script src="{{asset('js/wow.min.js')}}"></script>

<script>
    $(document).ready(function () {
        new WOW().init();
//Header fade function

        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $('.navbar-default').addClass('show');
            } else {
                $('.navbar-default').removeClass('show');
            }
        });

        $('.scroll').on('click', function (e) {
            e.preventDefault()
            $('html, body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1500);
        });

        $('.slider-for').slick({
            arrows: false,
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
            pauseOnDotsHover: true,
        });

//*=======Testimonials Slider============ */
        $('.testimonials-slider').slick({
            arrows: false,
            dots: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

//*=======Testimonials Slider============ */
        $('.main_test').slick({
            arrows: true,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });




// MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    });
</script>
<script>


    $(document).ready(function () {
        /*
         *  Simple image gallery. Uses default settings
         */
        $('.fancybox').fancybox();



        $('.tab-custom .tab-custom-nav a').click(function (event) {
            $(this).closest('li').siblings('li').children('a').removeClass('current');
            $(this).addClass('current');
            $(this).closest('.tab-custom').children('div.tab-content-panel:not(:hidden)').hide();
            $(this.hash).show();
            event.preventDefault();
            $('.sliderxs').slick('setPosition');
            $('.category-slider').slick('setPosition');

        });

        $('.tabs-custom-nav a').click(function (event) {
            $(this).closest('li').siblings('li').children('a').removeClass('current');
            $(this).addClass('current');
            $(this.hash).closest('.general').children('div.tab-content-panel:not(:hidden)').hide();
            $(this.hash).show();
            event.preventDefault();
            $('.sliderxs').slick('setPosition');
        });

    });
</script>









  <!-- Notification JS Below  -->

  <script src="{{ asset('/plugins/vendors/toast-master/js/jquery.toast.js') }}"></script>

  <script>

       $(document).ready(function () {

             @if(\Session::has('message'))
                  $.toast({
                      heading: 'Success!',
                      position: 'bottom-right',
                      text:  '{{session()->get('message')}}',
                      loaderBg: '#ff6849',
                      icon: 'success',
                      hideAfter: 3000,
                      stack: 6
                  });
              @endif


              @if(\Session::has('flash_message'))
                  $.toast({
                      heading: 'Error!',
                      position: 'bottom-right',
                      text:  '{{session()->get('flash_message')}}',
                      loaderBg: '#ff6849',
                      icon: 'error',
                      hideAfter: 3000,
                      stack: 6
                  });
              @endif


          })

  </script>

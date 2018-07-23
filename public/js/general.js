 $( document ).ready(function() {

     $("#menu-show").click(function () {
        if($("#hidden-menu").height() == '0') {
        $("#hidden-menu").css({'opacity':'1', 'height':'auto', 'transform': 'translateY(15px)'});
        $(this).css({'top':'100px','transform': 'translateY(220px)'});
        }
        else {
            $("#hidden-menu").css({'opacity':'0', 'height':'0', 'transform': 'translateY(-320px)'});
            $(this).css({'top':'15px','transform': 'translateY(0)'});
        }
    });

    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function() {
      scaleVideoContainer();
      scaleBannerVideoSize('.video-container .poster img');
      scaleBannerVideoSize('.video-container .filter');
      scaleBannerVideoSize('.video-container video');
    });
    /*for services info blocks*/
    var mh = 0;
    $(".serv-white").each(function () {
        var h_block = parseInt($(this).outerHeight());
        if(h_block > mh) {
            mh = h_block+30;
        };
    });
    $(".serv-white").height(mh);

     $(".in").hover(function(){
        $(".in").css("opacity", "0.5");
        $(this).css("opacity", "1");
        }, function(){
        $(".in").css("opacity", "1");
        $(this).css("opacity", "1");
    });
     $(".w-vulcan-v2-button").css("display", "none");


  });



  function scaleVideoContainer() {
    var height = $(window).height()/* + 5*/;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);
  }

  function initBannerVideoSize(element){
    $(element).each(function(){
      $(this).data('height', $(this).height());
      $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);
  }

  function scaleBannerVideoSize(element) {

    var windowWidth = $(window).width(),
    windowHeight = $(window).height()/* + 5*/,
    videoWidth,
    videoHeight;

    // console.log(windowHeight);

    $(element).each(function(){
      var videoAspectRatio = $(this).data('height')/$(this).data('width');

      $(this).width(windowWidth);

      if(windowWidth < 1000){
          videoHeight = windowHeight;
          videoWidth = videoHeight / videoAspectRatio;
          $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

          $(this).width(videoWidth).height(videoHeight);
      }

      $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
  }

function Scroll(){
  //Scroll

  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll > 50) {
      $(".header-top").addClass("header-active");
        $(".scroll-top").addClass("active-scroll"); // Scroll Menu - Mobile
      } 
      else {
        $(".header-top").removeClass("header-active");
        $(".scroll-top").removeClass("active-scroll");
      }
    });

  $(".scroll-top").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

}Scroll();


function ClickMe(){

  $('.search-nh').click(function(){
    $('.form-search').slideToggle();
  });

  $('.list-user li').click(function(){
    $('.list-user li').removeClass('active');
    $(this).addClass('active');
  })

}ClickMe();



function OwlSlide(){

  var owl = $('.sl-banner');
  owl.owlCarousel({
    items:1,
    loop:true,
    margin:10,
    nav:true,
    dots:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    animateOut: 'fadeOut',
    smartSpeed:500,
  });

  $('.opinion').owlCarousel({
    loop:true,
    margin:35,
    nav:false,
    dots:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    smartSpeed:1000,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      1000:{
        items:2
      }
    }
  });

  $('.l-sv').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    dots:false,
    autoplay:true,
    autoplayTimeout:3000,
    smartSpeed:500,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:3
      },
      1000:{
        items:4
      }
    }
  })

}OwlSlide();


// ?jquery mobile

(function($) {
  var $main_nav = $('#main-nav');
  var $toggle = $('.toggle');

  var defaultData = {
    maxWidth: false,
    customToggle: $toggle,
        // navTitle: 'All Categories',
        levelTitles: true,
        pushContent: '#container'
      };

    // add new items to original nav
    $main_nav.find('li.add').children('a').on('click', function() {
      var $this = $(this);
      var $li = $this.parent();
      var items = eval('(' + $this.attr('data-add') + ')');

      $li.before('<li class="new"><a>' + items[0] + '</a></li>');

      items.shift();

      if (!items.length) {
        $li.remove();
      } else {
        $this.attr('data-add', JSON.stringify(items));
      }

      Nav.update(true);
    });

    // call our plugin
    var Nav = $main_nav.hcOffcanvasNav(defaultData);

    // demo settings update

    const update = (settings) => {
      if (Nav.isOpen()) {
        Nav.on('close.once', function() {
          Nav.update(settings);
          Nav.open();
        });

        Nav.close();
      } else {
        Nav.update(settings);
      }
    };

    $('.actions').find('a').on('click', function(e) {
      e.preventDefault();

      var $this = $(this).addClass('active');
      var $siblings = $this.parent().siblings().children('a').removeClass('active');
      var settings = eval('(' + $this.data('demo') + ')');

      update(settings);
    });

    $('.actions').find('input').on('change', function() {
      var $this = $(this);
      var settings = eval('(' + $this.data('demo') + ')');

      if ($this.is(':checked')) {
        update(settings);
      } else {
        var removeData = {};
        $.each(settings, function(index, value) {
          removeData[index] = false;
        });

        update(removeData);
      }
    });
  })(jQuery);


  jQuery(document).ready(function($) {
    wow = new WOW(
    {
     animateClass: 'animated',
     offset: 100,
     callback: function (box) {
       console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
     }
   }
   );
    wow.init();  
  });


  $('.fixe-container .contact-fixe ul li:last-child()').click(function(){
    $('.pp-lich-kham').addClass('active-time');
  });

  $('.icon-footer ul li:first-child()').click(function(){
    $('.pp-lich-kham').addClass('active-time');
  });

  $('.email-click').click(function(){
    $('.pp-lich-kham').addClass('active-time');
  });

  $('.times').click(function(){
    $('.pp-lich-kham').removeClass('active-time');
  });




  var loadingJs = setInterval(function(){
    $('.load-fixe').fadeOut();
    clearInterval(loadingJs);
  }, 2000);


  function pluginsNh(){

    $(".item-sl > .item:gt(0)").hide();
    setInterval(function() {
      $('.item-sl > .item:first')
      .fadeOut(500)
      .next()
      .fadeIn(500)
      .end()
      .appendTo('.item-sl');
    }, 2000);

    $('.item-sl').click(function(){
      $(this).hide();
      $('.timesss').show();
      $('.box-send-chat').addClass('active-chat');
    });

    $('.timesss').click(function(){
      $(this).hide();
      $('.item-sl').show();
      $('.box-send-chat').removeClass('active-chat');
    });

    $('.user').click(function(){
      $('.fixe-container .login-fixe').addClass('active-user');
    });

    $('.fixe-container .login-fixe form button').click(function(){
      $('.fixe-container .login-fixe').removeClass('active-user');
    })

  }pluginsNh();
  $(document).mouseup(function(e) 
  {
    var container = $(".fixe-container .login-fixe.active-user");

    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
      container.removeClass('active-user');
    }
  });
  $(document).mouseup(function(e) 
  {
    var $myDiv = $('.box-send-chat.active-chat');
    if ( $myDiv.length){
      var container = $(".slide-item");

      if (!container.is(e.target) && container.has(e.target).length === 0) 
      {
        $('.box-send-chat').removeClass('active-chat');
        $('.timesss').hide();
        $('.item-sl').show();
      }
    }
  });
  function WidthBox(){

    var widthtitle = $('.title-main').find('.title-hd').width();
    var numberwidth = 505;
    console.log(numberwidth);
    if(widthtitle >= numberwidth){
      $('.title-main').css('margin-left','-70px');
    }else{
      $('.title-main').css('margin-left','0px');
    }

    $('.login').click(function(){
      $('.login-fixe').toggleClass('active-login');
    });

    $('#submit').click(function(){
      $('.login-fixe').removeClass('active-login');
    });


  }WidthBox();

  function tableCss(){
    $('table').addClass('table');
    $('table').addClass('table-bordered');
    $('table').addClass('table-customize');
    $('table').addClass('table-responsive');
  }tableCss();



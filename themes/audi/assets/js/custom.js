(function ($, root, undefined) {
  $(function () {
    "use strict";

    window.location.hash = "";

    $("html, body").animate(
      {
        scrollTop: $("#home").offset().top,
      },
      0
    );

    $("#backtotop").on("click", function () {
      $("html, body").animate(
        {
          scrollTop: $("#home").offset().top,
        },
        1000
      );
    });

    $("ul#menu-main-menu > li").first("a").addClass("active");

    $("ul#menu-main-menu > li > a, .logo > a").live("click", function (event) {
      event.preventDefault();

      var hash = this.hash;
      $("ul#menu-main-menu > li > a").removeClass("active");

      $(this).addClass("active");
      if ($(window).width() > 767) {
        $("html, body").animate(
          {
            scrollTop: $(hash).offset().top,
          },
          1000
        );
      } else {
        $("html, body").animate(
          {
            scrollTop: $(hash).offset().top - 70,
          },
          1000
        );
      }
    });

    $("ul#menu-main-menu > li").first().find("a").addClass("active");

    $("ul#menu-main-menu li.dropdown").hover(
      function () {
        $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeIn(500);
      },
      function () {
        $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeOut(500);
      }
    );

    if ($(window).width() < 767) {
      $("ul#menu-main-menu > li > a").on("click", function () {
        $(".hamburger").removeClass("is-active");
        $("#navbarSupportedContent").fadeOut(200);
      });
    } else {
    }

    $(".hamburger").on("click", function () {
      this.classList.toggle("is-active");
      $("#navbarSupportedContent").slideToggle(500);
    });

    $(".slides").slick({
      dots: false,
      infinite: true,
      speed: 800,
      fade: true,
      cssEase: "linear",
      autoplay: true,
      autoplaySpeed: 5000,
      swipe: true,
      touchMove: true,
    });

    function parallax(selector) {
      var scrolled = $(window).scrollTop();
      $(selector).css(
        "background-position",
        "center " + scrolled * 0.05 + "px"
      );
    }

    $(window).scroll(function (e) {
      parallax(".slides .slide");
    });

    $(window).scroll(function (e) {
      var scrollTop = $(this).scrollTop();

      $(".header-overlay").css({
        opacity: function () {
          var elementHeight = $(this).height();
          return 1 - (elementHeight - scrollTop) / elementHeight;
        },
      });
    });

    // back

    var windowWidth = $(window).width(),
      didScroll = false;

    var $arrow = $("#backtotop");

    $arrow.on("click", function (e) {
      $("body,html").animate({ scrollTop: "0" }, 750);
      e.preventDefault();
    });

    $(window).scroll(function () {
      didScroll = true;
    });

    setInterval(function () {
      if (didScroll) {
        didScroll = false;

        if ($(window).scrollTop() > 500) {
          $arrow.fadeIn(300).css("right", 10);
        } else {
          $arrow.fadeOut(300).css("right", "-60px");
        }
      }
    }, 250);

    // scroll contact image
    var image = $("section#contact_us .image");
    var bodyHeight = $("body").height();
    $(window).on("scroll", function () {
      var scrollHeight = $(document).height();
      var scrollPosition = $(window).height() + $(window).scrollTop();
      if (scrollHeight - scrollPosition < 800) {
        var left = (scrollHeight - scrollPosition) / 1.5 + 200;
        image.css("left", -left + "px");
      }
    });

    // form
    $(".wpcf7-form").trigger("reset");

    $(".input-placeholder input").on("keydown", function () {
      $(this).parent().parent().find(".placeholder").fadeOut(300);
    });

    $(".input-placeholder input").on("blur", function () {
      if (!$(this).val()) {
        $(this).parent().parent().find(".placeholder").fadeIn(300);
      }
    });

    $(".input-placeholder textarea").on("keydown", function () {
      $(this).parent().parent().find(".placeholder").fadeOut(300);
    });

    $(".input-placeholder textarea").on("blur", function () {
      if (!$(this).val()) {
        $(this).parent().parent().find(".placeholder").fadeIn(300);
      }
    });
  });
})(jQuery, this);

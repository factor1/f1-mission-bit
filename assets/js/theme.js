import Bowser from "bowser";

jQuery(document).ready(function($) {
  // Inside of this function, $() will work as an alias for jQuery()
  // and other libraries also using $ will not be accessible under this shortcut
  // https://codex.wordpress.org/Function_Reference/wp_enqueue_script#jQuery_noConflict_Wrappers

  // Touch Device Detection
  var isTouchDevice = "ontouchstart" in document.documentElement;
  if (isTouchDevice) {
    $("body").removeClass("no-touch");
  }

  // Browser detection via Bowser (https://github.com/lancedikson/bowser) - add detection as needed
  const userBrowser = Bowser.getParser(window.navigator.userAgent);
  const browser = userBrowser.getBrowser();

  if (browser.name === "Internet Explorer" && browser.version == "11.0") {
    $("body").addClass("ie-11");
  } else if (browser.name === "Safari") {
    $("body").addClass("safari");
  }

  // Menu functions
  function toggleMenu(icon, menu) {
    $("html").toggleClass("locked");
    $("body").toggleClass("locked masked");

    icon.toggleClass("active");
    menu.slideToggle();
  }

  function closeMenu(icon, menu) {
    if( menu.css("display") == "block" ) {
      $("html").removeClass("locked");
      $("body").removeClass("locked masked");
    }

    icon.removeClass("active");
    menu.slideUp();
  }

  // Main menu function
  $(".menu-icon").on("click", function() {
    toggleMenu($(this), $(".nav--mobile"));
  });

  // Close menu on desktop
  $(window).on("resize", function() {
    if( $(window).width() > 1024 ) {
      closeMenu($(".menu-icon"), $(".nav--mobile"));
    }
  });

  // Close menu on outside click
  $(document).on("click", function(e) {
    if( !$(e.target).closest(".site-header").length ) {
      closeMenu($(".menu-icon"), $(".nav--mobile"));
    }
  });

  // Close menu on ESC key 
  $(document).on("keyup", function(e) {
    if( e.which == 27) {
      closeMenu($(".menu-icon"), $(".nav--mobile"));
    }
  });

  // Mobile menu sub-menu toggle
  $(".nav--mobile .menu-item-has-children > a").on("click", function(e) {
    e.preventDefault();

    $(this).siblings(".sub-menu").slideToggle();
    $(this).toggleClass("active");
  });  
});

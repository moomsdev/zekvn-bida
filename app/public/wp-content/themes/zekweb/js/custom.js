(function ($) {
  // Menu-mobile
  $("#touch-menu").click(function () {
    $("body").addClass("active-menu");
  });
  $(".line-dark").click(function () {
    $("body").removeClass("active-menu");
  });
  $("#close-menu").click(function () {
    $("body").removeClass("active-menu");
  });
  $("#menu-mobile .menu li.menu-item-has-children> a").after(
    '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>'
  );
  $("#menu-mobile .menu li.menu-item-has-children svg").click(function () {
    $(this).parent("li").children("ul").stop(0).slideToggle(300);
    $(this).parent("li").toggleClass("re-arrow");
  });
  // Select2
  $(".select2").select2({});
  // Back-top
  $("#back-top").hide();
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 500) {
        $("#back-top").fadeIn();
      } else {
        $("#back-top").fadeOut();
      }
    });
    $("#back-top").click(function () {
      $("body,html").animate(
        {
          scrollTop: 0,
        },
        800
      );
      return false;
    });
  });
  // Head
  var navfixed = $(".head");
  $(window).scroll(function () {
    if ($(this).scrollTop() > 10) {
      navfixed.addClass("navbar-fixed-top");
    } else {
      navfixed.removeClass("navbar-fixed-top");
    }
  });
  // Ajax Contact-form7
  $(".wpcf7-submit").click(function () {
    var thisElement = $(this);
    var oldVal = thisElement.val();
    var textLoading = "Đang xử lý ...";
    $(".cf7_submit .ajax-loader").remove();
    thisElement.val(textLoading);
    document.addEventListener(
      "wpcf7submit",
      function (event) {
        thisElement.val(oldVal);
      },
      false
    );
  });
  // Add-class
  $("table").addClass("table table-bordered");
  $("table").wrap('<div class="table-responsive"></div>');
  $(".woocommerce-product-details__short-description").addClass(
    "content-post clearfix"
  );
  $(".page-description").addClass("term-description");
  $(".term-description").addClass("content-post clearfix");
  $(".woocommerce-MyAccount-content").addClass("content-post clearfix");
  $(".link-move").click(function (a) {
    var i = this.getAttribute("href");
    if ("" != i) {
      var t = $(i).offset().top - 67;
      $(window).width() <= 1190 && (t += 7),
        $("html, body").animate(
          {
            scrollTop: t,
          },
          500
        );
    }
  });
  // Lắng nghe sự kiện nhấp chuột vào tất cả các thẻ <a>
  document.addEventListener("click", function (event) {
    // Kiểm tra xem phần tử mà người dùng nhấp chuột có phải là thẻ <a> không
    if (event.target.tagName === "A") {
      // Kiểm tra href có cấu trúc "#"
      if (event.target.getAttribute("href").startsWith("#")) {
        // Ngăn chặn hành vi mặc định khi nhấp vào liên kết
        event.preventDefault();
        // Lấy id từ href của liên kết
        var targetId = event.target.getAttribute("href").slice(1);
        // Tìm phần tử có id tương ứng và cuộn đến nó
        var targetElement = document.getElementById(targetId);
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: "smooth",
          });
        }
      }
    }
  });
  // Account
  $(".account-body #customer_login").removeClass("u-columns col2-set");
  $(".account-body #customer_login")
    .children(".u-column1")
    .removeClass("col-1");
  $(".account-body #customer_login")
    .children(".u-column2")
    .removeClass("col-2");
  $(".account-body .box-login .lost_password").insertAfter(
    ".account-body .box-login .woocommerce-form-login__rememberme"
  );
  $(".account-body .box-login .note .note1 a").click(function () {
    $(".account-body .box-login").addClass("active");
  });
  $(".account-body .box-login .note .note2 a").click(function () {
    $(".account-body .box-login").removeClass("active");
  });
  // End
  // Swiper
  var swiper = new Swiper(".swiper-banner", {
    loop: true,
    autoplay: {
      delay: 6000,
    },
    speed: 500,
    pagination: {
      el: ".banner-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".banner-next",
      prevEl: ".banner-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      429: {
        slidesPerView: 1,
      },
      575: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 1,
      },
      992: {
        slidesPerView: 1,
      },
    },
  });
  var swiper = new Swiper(".swiper-product-4", {
    loop: true,
    autoplay: {
      delay: 6000,
    },
    speed: 500,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });
  var swiper = new Swiper(".swiper-product-5", {
    loop: true,
    autoplay: {
      delay: 6000,
    },
    speed: 500,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 5,
        spaceBetween: 15,
      },
    },
  });
  var swiper = new Swiper(".swiper-product-3", {
    loop: true,
    autoplay: {
      delay: 6000,
    },
    speed: 500,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
  });
  var swiper = new Swiper(".club-swiper", {
    loop: true,
    autoplay: {
      delay: 6000,
    },
    speed: 500,
    pagination: {
      el: ".banner-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".banner-next",
      prevEl: ".banner-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 25,
      },
    },
  });
  var swiper = new Swiper(".news-swiper", {
    loop: true,
    autoplay: {
      delay: 6000,
    },
    speed: 500,
    pagination: {
      el: ".banner-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".banner-next",
      prevEl: ".banner-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 25,
      },
    },
  });
  // Cookie helper functions
  function setCookie(name, value, hours) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (hours * 60 * 60 * 1000));
    document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
  }
  
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }
  
  function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
  }
  
  // Countdown Timer - 12 hours with cookie (only applies to blocks with 4 items)
  function startCountdown() {
    var cookieName = 'promotion_countdown';
    var endTime;
    
    // Check if countdown already exists in cookie
    var savedEndTime = getCookie(cookieName);
    
    if (savedEndTime) {
      // Use existing countdown time from cookie
      endTime = parseInt(savedEndTime);
    } else {
      // Create new countdown - 12 hours from now
      endTime = new Date().getTime() + (12 * 60 * 60 * 1000);
      // Save to cookie for 12 hours
      setCookie(cookieName, endTime.toString(), 12);
    }
    
    // Update countdown every second
    var countdownInterval = setInterval(function() {
      var now = new Date().getTime();
      var timeLeft = endTime - now;
      
      // If countdown is finished
      if (timeLeft < 0) {
        clearInterval(countdownInterval);
        $('.time-countdown .time-item .time-value').text('00');
        // Delete cookie when countdown ends
        deleteCookie(cookieName);
        return;
      }
      
      // Calculate time units
      var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
      var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
      
      // Update only countdown blocks with 4 items (skip product-sale popup)
      $('.time-countdown').each(function() {
        var $container = $(this);
        if ($container.closest('#popup-product-sale').length) {
          return; // skip popup-specific countdown
        }
        var itemsCount = $container.find('.time-item').length;
        if (itemsCount === 4) {
          $container.find('.time-item:nth-child(1) .time-value').text(days.toString().padStart(2, '0'));
          $container.find('.time-item:nth-child(2) .time-value').text(hours.toString().padStart(2, '0'));
          $container.find('.time-item:nth-child(3) .time-value').text(minutes.toString().padStart(2, '0'));
          $container.find('.time-item:nth-child(4) .time-value').text(seconds.toString().padStart(2, '0'));
        }
      });
    }, 1000);
  }
  
  // Start countdown when page loads
  startCountdown();
  //

  function showPopup() {
    // Kiểm tra xem popupData có tồn tại không
    if (typeof popupData === 'undefined' || !popupData.notifications) {
        console.log('popupData không tồn tại hoặc không có notifications');
        return;
    }
    
    // popupData được truyền từ file functions.php
    const notifications = popupData.notifications;

    if (notifications.length === 0) {
        console.log('Không có thông báo nào để hiển thị');
        return; // Không làm gì nếu không có thông báo nào
    }

    let currentIndex = 0;

    const showNextPopup = () => {
        // Lấy thông tin
        const currentNotification = notifications[currentIndex];

        // Cập nhật nội dung vào HTML
        $('#popup-name').text(currentNotification.name);
        $('#popup-action').text(currentNotification.action);
        $('#popup-time').text(currentNotification.time);
        $('#popup-avatar').attr('src', currentNotification.image);

        // Hiển thị popup
        $('#social-proof-popup').addClass('show');

        // Hẹn giờ ẩn popup sau 5 giây
        setTimeout(() => {
            $('#social-proof-popup').removeClass('show');
        }, 5000); // 5 giây hiển thị

        // Chuyển sang thông báo tiếp theo
        currentIndex = (currentIndex + 1) % notifications.length;
    };

    // Bắt đầu vòng lặp, mỗi 8 giây sẽ hiển thị một thông báo mới
    setInterval(showNextPopup, 8000); // 3 giây chờ + 5 giây hiển thị = 8 giây
  }

  showPopup();

  // Auto show homepage modal after 5 seconds
  // Purpose: On homepage, display Bootstrap modal with id `popup-homepage` after delay
  if (document.body.classList.contains('home')) {
    setTimeout(function () {
      var modalEl = document.getElementById('popup-homepage');
      if (!modalEl) return;

      // Prefer Bootstrap 5 Modal API if available
      if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
        var instance = bootstrap.Modal.getOrCreateInstance(modalEl);
        instance.show();
        return;
      }

      // Fallback: jQuery modal if integrated (Bootstrap 4 style)
      if (typeof jQuery !== 'undefined' && typeof jQuery(modalEl).modal === 'function') {
        jQuery(modalEl).modal('show');
        return;
      }

      // Last resort: toggle minimal classes/attrs to show
      modalEl.classList.add('show');
      modalEl.style.display = 'block';
      modalEl.setAttribute('aria-modal', 'true');
      modalEl.removeAttribute('aria-hidden');
    }, 2000);
  }

  // Auto show WooCommerce popup after 5 seconds on Woo pages
  // Purpose: Display `#popup-product-sale` on WooCommerce-related pages after delay
  (function () {
    var body = document.body;
    var isWooPage = body.classList.contains('home');
                    // body.classList.contains('woocommerce-page') ||
                    // body.classList.contains('single-product');
    if (!isWooPage) return;

    setTimeout(function () {
      var modalEl = document.getElementById('popup-product-sale');
      if (!modalEl) return;

      // Prefer Bootstrap 5 Modal API if available
      if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
        var instance = bootstrap.Modal.getOrCreateInstance(modalEl);
        instance.show();
        return;
      }

      // Fallback: jQuery modal if integrated (Bootstrap 4 style)
      if (typeof jQuery !== 'undefined' && typeof jQuery(modalEl).modal === 'function') {
        jQuery(modalEl).modal('show');
        return;
      }

      // Last resort: toggle minimal classes/attrs to show
      modalEl.classList.add('show');
      modalEl.style.display = 'block';
      modalEl.setAttribute('aria-modal', 'true');
      modalEl.removeAttribute('aria-hidden');
    }, 15000);
  })();

  // Product popup countdown based on days value and cookie
  // Purpose: Use days from DOM, persist endTime in cookie with lifetime = days
  (function () {
    var modalEl = document.getElementById('popup-product-sale');
    if (!modalEl) return;

    var countdownEl = modalEl.querySelector('.time-countdown');
    if (!countdownEl) return;

    var dayEl = countdownEl.querySelector('.time-item:nth-child(1) .time-value');
    var hourEl = countdownEl.querySelector('.time-item:nth-child(2) .time-value');
    var minuteEl = countdownEl.querySelector('.time-item:nth-child(3) .time-value');
    var secondEl = countdownEl.querySelector('.time-item:nth-child(4) .time-value');
    if (!dayEl || !hourEl || !minuteEl) return;

    var initialDays = parseInt((dayEl.textContent || '0').trim(), 10);
    if (isNaN(initialDays) || initialDays <= 0) return;

    var cookieName = 'product_sale_countdown_' + initialDays;
    var endTime;

    var savedEndTime = getCookie(cookieName);
    if (savedEndTime) {
      endTime = parseInt(savedEndTime, 10);
    } else {
      endTime = new Date().getTime() + (initialDays * 24 * 60 * 60 * 1000);
      setCookie(cookieName, endTime.toString(), initialDays * 24); // lifetime equals days
    }

    var timer = setInterval(function () {
      var now = new Date().getTime();
      var timeLeft = endTime - now;

      if (timeLeft <= 0) {
        clearInterval(timer);
        dayEl.textContent = '00';
        hourEl.textContent = '00';
        minuteEl.textContent = '00';
        if (secondEl) secondEl.textContent = '00';
        deleteCookie(cookieName);
        return;
      }

      var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
      var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

      dayEl.textContent = days.toString().padStart(2, '0');
      hourEl.textContent = hours.toString().padStart(2, '0');
      minuteEl.textContent = minutes.toString().padStart(2, '0');
      if (secondEl) secondEl.textContent = seconds.toString().padStart(2, '0');
    }, 1000);
  })();

  // Auto show register popup after 2 seconds on category pages
  // Purpose: Display `#popup-register` on category-related pages after delay
  // (function () {
  //   var body = document.body;
  //   var isCategoryPage = body.classList.contains('category') ||
  //                       body.classList.contains('category-tin-tuc') ||
  //                       body.classList.contains('archive');
  //   if (!isCategoryPage) return;

  //   setTimeout(function () {
  //     var modalEl = document.getElementById('popup-register');
  //     if (!modalEl) return;

  //     // Prefer Bootstrap 5 Modal API if available
  //     if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
  //       var instance = bootstrap.Modal.getOrCreateInstance(modalEl);
  //       instance.show();
  //       return;
  //     }

  //     // Fallback: jQuery modal if integrated (Bootstrap 4 style)
  //     if (typeof jQuery !== 'undefined' && typeof jQuery(modalEl).modal === 'function') {
  //       jQuery(modalEl).modal('show');
  //       return;
  //     }

  //     // Last resort: toggle minimal classes/attrs to show
  //     modalEl.classList.add('show');
  //     modalEl.style.display = 'block';
  //     modalEl.setAttribute('aria-modal', 'true');
  //     modalEl.removeAttribute('aria-hidden');
  //   }, 2000);
  // })();
})(jQuery);

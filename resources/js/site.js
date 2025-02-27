$(document).ready(function() {
  // Custom menu toggle button
  $(document).on("click", ".navbar-toggler", function() {
    $(this).toggleClass("active");
    $('navbar-collapse').toggleClass("show");
  });

  // Custom Parallax
  $(".parallax").each(function() {
    var $obj = $(this);

    $(window).scroll(function() {
      var offset = $obj.offset();
      var yPos = -($(window).scrollTop() - offset.top) / $obj.data("speed");
      var bgPos = "50%" + yPos + "px";
      var width = "100%";
      var bgSize = "cover";

      $obj.css("background-position", bgPos);
      $obj.css("width", width);
      $obj.css("background-size", bgSize);
    });
  }, {passive: true});
});

window.onload = function() {
  sticky(1)

  ScrollOut({ // scroll-out
    threshold: .2,
    once: true
  })

  lax.setup() // laxxx

  const updateLax = () => {
    lax.update(window.scrollY)
    window.requestAnimationFrame(updateLax)
  }

  window.requestAnimationFrame(updateLax)
}

function sticky(offset) { // Sticky navigation
  let scrollPos = window.scrollY;

  const navbar = document.querySelector('.navbar');

  window.addEventListener('scroll', ()=> {
    scrollPos = window.scrollY;
    passive = true;

    if (scrollPos >= offset) {
      navbar.classList.add('sticky');
    } else {
      navbar.classList.remove('sticky');
    }
  });
}

// Swiper
const mainSwiper = new Swiper ('.swiper', {
  direction: 'horizontal',
  effect: 'slide',
  slidesPerView: 1,
  spaceBetween: 0,
  speed: 300,
  loop: true,
  lazy: true,
  preloadImages: true,
  autoplay: {
    delay: 8000,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  }
})

const brandSwiper = new Swiper ('.swiper-brands', {
  direction: 'horizontal',
  slidesPerView: 5,
  allowTouchMove: false,
  grabCursor: false,
  preventClicks: false,
  preventClicksPropagation: false,
  effect: 'slide',
  speed: 300,
  loop: true,
  lazy: true,
  preloadImages: false,
  autoplay: {
    delay: 4000,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 0
    },
    480: {
      slidesPerView: 1,
      spaceBetween: 0
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 30
    }
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
})

const Galeria = new Swiper ('.swiper-galeria', {
  direction: 'horizontal',
  slidesPerView: 3,
  effect: 'slide',
  speed: 300,
  loop: true,
  lazy: true,
  spaceBetween: 30,
  preloadImages: false,
  autoplay: {
    delay: 4000,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 0
    },
    480: {
      slidesPerView: 1,
      spaceBetween: 0
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 30
    }
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
})

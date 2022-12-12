"use strict";
self["webpackHotUpdatesage"]("app",{

/***/ 813:
/*!**********************************!*\
  !*** ./resources/scripts/app.js ***!
  \**********************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _roots_sage_client__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @roots/sage/client */ "./node_modules/@roots/sage/lib/client/index.js");
/* harmony import */ var micromodal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! micromodal */ 650);
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(slick_carousel__WEBPACK_IMPORTED_MODULE_2__);
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "jquery");
/* provided dependency */ var __react_refresh_utils__ = __webpack_require__(/*! ./node_modules/@pmmmwh/react-refresh-webpack-plugin/lib/runtime/RefreshUtils.js */ "./node_modules/@pmmmwh/react-refresh-webpack-plugin/lib/runtime/RefreshUtils.js");
__webpack_require__.$Refresh$.runtime = __webpack_require__(/*! ./node_modules/react-refresh/runtime.js */ "./node_modules/react-refresh/runtime.js");

var _import$meta$webpackH;




/**
 * app.main
 */
const main = async err => {
  if (err) {
    console.error(err);
  }
  micromodal__WEBPACK_IMPORTED_MODULE_1__["default"].init({
    onShow: modal => console.info("".concat(modal.id, " is shown")),
    onClose: modal => console.info("".concat(modal.id, " is hidden")),
    openClass: 'is-open',
    disableScroll: true,
    disableFocus: false,
    awaitOpenAnimation: false,
    awaitCloseAnimation: false,
    debugMode: false
  });

  // accordions
  const accordions = document.querySelectorAll('.accordion-item');
  let activeCard = accordions[0];
  if (accordions != null) {
    activeCard.classList.add('active');
  }
  accordions.forEach(card => {
    card.addEventListener('click', e => {
      let isActive = card.classList.contains('active');
      activeCard.classList.remove('active');
      activeCard = card;
      if (!isActive) {
        activeCard.classList.add('active');
      }
    });
  });

  // sticky nav
  var navbar = document.getElementById("stickynav");
  if (navbar) {
    var sticky = navbar.offsetTop;
    function stickNav() {
      if (window.pageYOffset + 140 >= sticky) {
        navbar.classList.add("stuck");
      } else {
        navbar.classList.remove("stuck");
      }
    }
    window.onscroll = function () {
      stickNav();
    };
  }

  // anchor actions
  const anchors = document.querySelectorAll('.anchor-item');
  let anchorList = anchors[0];
  anchors.forEach(anchor => {
    anchor.addEventListener('click', () => {
      anchorList.classList.remove('active');
      anchorList = anchor;
      anchorList.classList.add('active');
    });
  });

  // mobile menu
  const sbtn = document.querySelector("button.search-toggle");
  const btn = document.querySelector("button.mobile-toggle");
  const menu = document.querySelector(".mobile-menu");
  const smenu = document.querySelector(".mobile-search");
  btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });
  sbtn.addEventListener("click", () => {
    smenu.classList.toggle("hidden");
  });

  // jquery stuff 
  // slick slider init
  let $sliders = $('.slider');
  if ($sliders.length > 0) {
    for (let s = 0; s < $sliders.length; s++) {
      initSlider($($sliders[s]));
    }
  }
  function initSlider($slider) {
    $slider.slick({
      dots: true,
      arrows: false,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1
    });
  }
  let hash = location.hash.replace(/^#/, '');

  // scroll to 
  function scrollto(hash) {
    // make sure we have a hash and element to scroll to
    if (hash !== "" && $(hash).length > 0) {
      $('html, body').animate({
        scrollTop: $(hash).offset().top - 200
      }, 800, function () {
        if (history.pushState) {
          history.pushState(null, null, hash);
        } else {
          window.location.hash = hash;
        }
      });
    }
  }

  // Scroll to Position on hash link
  $(".anchor-item a").on('click', function (event) {
    if (this.hash !== "" && $(this.hash).length > 0) {
      event.preventDefault();
      scrollto(this.hash);
    }
  });

  //scroll down on page load
  if (hash) {
    setTimeout(function () {
      scrollto('#' + hash);
    }, 550);
  }
  $(".desktop-nav .mega > a").append('&nbsp;<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12" class="subtoggle inline-block" style="top: -2px;position: relative;"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>');
  $(".mobile-menu .mega > a, .mobile-menu .mega .cat > a").append('<span class="inline-block absolute right-0 top-0 subtoggle w-[44px] h-[44px] text-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12" class="inline closed" style="position: relative;top: 6px; "><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12" class="inline open hidden" style="position: relative;top: 6px; "><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#ffffff" d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>');
  $(".sub-menu .cat > a").addClass('text-primary');
  $(".mobile-menu .subtoggle").on('click', function (e) {
    e.preventDefault();
    $(this).parent().next('.sub-menu').toggleClass('!block');
    $(this).toggleClass('active');
    $(this).find('svg.closed, svg.open').toggleClass('hidden');
  });

  // Set active sub nav menu state
  let didScroll;
  let lastScrollTop = 0;
  let delta = 5;
  let scrollNav = $('#stickynav .nav');
  let scrollEls = [];
  let scrollItems = scrollNav.find('a').get().reverse();
  if (scrollNav.length > 0) {
    for (let s = 0; s < scrollItems.length; s++) {
      scrollEls.push($(scrollItems[s].hash));
    }
  }
  $(window).scroll(function () {
    didScroll = true;
  });
  setInterval(function () {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);
  function menuState(st) {
    if (scrollEls.length > 0) {
      let foundHash = false;
      for (let se = 0; se < scrollEls.length; se++) {
        if (scrollEls[se].selector !== '' && st + 210 > scrollEls[se].offset().top) {
          $('#stickynav a').removeClass('active');
          $(scrollItems[se]).addClass('active');
          foundHash = true;
          break;
        }
        if (st + 150 < $('#stickynav').offset().top) {
          $('#stickynav a').removeClass('active');
        }
        if (!foundHash) {
          $('#stickynav a').removeClass('active');
        }
      }
    }
  }
  function hasScrolled() {
    let st = $(window).scrollTop();

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta) return;
    menuState(st);
    lastScrollTop = st;
  }
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
(0,_roots_sage_client__WEBPACK_IMPORTED_MODULE_0__.domReady)(main);
(_import$meta$webpackH = module.hot) === null || _import$meta$webpackH === void 0 ? void 0 : _import$meta$webpackH.accept(main);

var $ReactRefreshModuleId$ = __webpack_require__.$Refresh$.moduleId;
var $ReactRefreshCurrentExports$ = __react_refresh_utils__.getModuleExports(
	$ReactRefreshModuleId$
);

function $ReactRefreshModuleRuntime$(exports) {
	if (true) {
		var errorOverlay;
		if (true) {
			errorOverlay = false;
		}
		var testMode;
		if (typeof __react_refresh_test__ !== 'undefined') {
			testMode = __react_refresh_test__;
		}
		return __react_refresh_utils__.executeRuntime(
			exports,
			$ReactRefreshModuleId$,
			module.hot,
			errorOverlay,
			testMode
		);
	}
}

if (typeof Promise !== 'undefined' && $ReactRefreshCurrentExports$ instanceof Promise) {
	$ReactRefreshCurrentExports$.then($ReactRefreshModuleRuntime$);
} else {
	$ReactRefreshModuleRuntime$($ReactRefreshCurrentExports$);
}

/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ /* webpack/runtime/getFullHash */
/******/ (() => {
/******/ 	__webpack_require__.h = () => ("1d96b30d57d6e5a1e3b8")
/******/ })();
/******/ 
/******/ }
);
//# sourceMappingURL=app.b158d9eae0dbc4db0b3a.hot-update.js.map
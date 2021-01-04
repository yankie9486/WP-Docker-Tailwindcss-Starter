/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./dev/css/app.scss":
/*!**************************!*\
  !*** ./dev/css/app.scss ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./dev/js/app.js":
/*!***********************!*\
  !*** ./dev/js/app.js ***!
  \***********************/
/*! no static exports found */
/***/ (function(module, exports) {

var lastKnownScrollPosition = 0;
var toTopBtn = document.getElementsByClassName("to-top"); // /**
//  * On page scroll
//  */

window.addEventListener("scroll", function (e) {
  lastKnownScrollPosition = window.scrollY; //show and hide scroll button

  if (lastKnownScrollPosition > window.outerHeight) {
    toTopBtn[0].classList.add("show");
  } else if (lastKnownScrollPosition < window.outerHeight) {
    if (toTopBtn[0].classList.contains("show")) {
      toTopBtn[0].classList.remove("show");
    }
  }
}); // /* Optional Javascript to close the radio button version by clicking it again */

var myRadios = document.getElementsByName("faq-tab");

if (myRadios) {
  var setCheck;
  var x = 0;

  for (x = 0; x < myRadios.length; x++) {
    myRadios[x].onclick = function () {
      if (setCheck != this) {
        setCheck = this;
      } else {
        this.checked = false;
        setCheck = null;
      }
    };
  }
} // //scroll to top button click


toTopBtn[0].addEventListener("click", function () {
  scrollToTop(500);
  menuBtn.focus();
}); //scroll to top animation

function scrollToTop(duration) {
  // cancel if already on top
  if (document.scrollingElement.scrollTop === 0) return;
  var totalScrollDistance = document.scrollingElement.scrollTop;
  var scrollY = totalScrollDistance,
      oldTimestamp = null;

  function step(newTimestamp) {
    if (oldTimestamp !== null) {
      // if duration is 0 scrollY will be -Infinity
      scrollY -= totalScrollDistance * (newTimestamp - oldTimestamp) / duration;
      if (scrollY <= 0) return document.scrollingElement.scrollTop = 0;
      document.scrollingElement.scrollTop = scrollY;
    }

    oldTimestamp = newTimestamp;
    window.requestAnimationFrame(step);
  }

  window.requestAnimationFrame(step);
}

/***/ }),

/***/ "./dev/js/navigation.js":
/*!******************************!*\
  !*** ./dev/js/navigation.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
  var container, button, menu, links, i, len;
  container = document.getElementById("site-navigation");

  if (!container) {
    return;
  }

  button = container.getElementsByTagName("button")[0];

  if ("undefined" === typeof button) {
    return;
  }

  menu = container.getElementsByTagName("ul")[0]; // Hide menu toggle button if menu is empty and return early.

  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  menu.setAttribute("aria-expanded", "false"); // Get all the link elements within the menu.

  links = menu.getElementsByClassName("menu-item-has-children");

  if (links.length > 0) {
    var firstItem = links[0];
    var lastItem = links[links.length - 1].childNodes[0];
  } else {
    links = menu.getElementsByClassName("menu-item");
    var firstItem = links[0];
    var lastItem = links[links.length - 1].childNodes[0];
  }

  function close() {
    container.className = container.className.replace(" toggled", "");
    button.className = button.className.replace(" is-active", "");
    menu.className += " close";
    button.setAttribute("aria-expanded", "false");
    menu.setAttribute("aria-expanded", "false");
  }

  function open() {
    container.className += " toggled";
    button.className += " is-active";
    button.setAttribute("aria-expanded", "true");
    menu.setAttribute("aria-expanded", "true");
    menu.className = menu.className.replace(" close", "");
  }

  button.onclick = function () {
    if (-1 !== container.className.indexOf("toggled")) {
      close();
    } else {
      open();
    }
  };

  menu.addEventListener("keydown", trapTabKey);

  function trapTabKey(e) {
    if (e.keyCode === 9) {
      // Shift Tab
      if (e.shiftKey) {
        if (document.activeElement === firstItem) {
          e.preventDefault();
          lastItem.focus();
          console.log(document.activeElement);
        } // Tab

      } else {
        if (document.activeElement === lastItem) {
          e.preventDefault();
          var menuContactUsButton = document.getElementById('menu-contact-us-button');
          menuContactUsButton.focus();
        }
      }
    }
  }
  /**
   * Toggles `focus` class to allow submenu access on tablets.
   */


  (function (container) {
    var touchStartFn,
        i,
        parentLink = container.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a");

    if ("ontouchstart" in window) {
      touchStartFn = function touchStartFn(e) {
        var menuItem = this.parentNode,
            i;

        if (!menuItem.classList.contains("focus")) {
          e.preventDefault();

          for (i = 0; i < menuItem.parentNode.children.length; ++i) {
            if (menuItem === menuItem.parentNode.children[i]) {
              continue;
            }

            menuItem.parentNode.children[i].classList.remove("focus");
          }

          menuItem.classList.add("focus");
        } else {
          menuItem.classList.remove("focus");
        }
      };

      for (i = 0; i < parentLink.length; ++i) {
        parentLink[i].addEventListener("touchstart", touchStartFn, false);
      }
    }
  })(container);
})();

/***/ }),

/***/ 0:
/*!***********************************************************************!*\
  !*** multi ./dev/js/app.js ./dev/js/navigation.js ./dev/css/app.scss ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/yankie/Projects/wpDocker/dev/js/app.js */"./dev/js/app.js");
__webpack_require__(/*! /Users/yankie/Projects/wpDocker/dev/js/navigation.js */"./dev/js/navigation.js");
module.exports = __webpack_require__(/*! /Users/yankie/Projects/wpDocker/dev/css/app.scss */"./dev/css/app.scss");


/***/ })

/******/ });
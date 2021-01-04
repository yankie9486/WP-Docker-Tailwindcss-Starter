/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function() {
  var container, button, menu, links, i, len;

  container = document.getElementById("site-navigation");
  if (!container) {
    return;
  }

  button = container.getElementsByTagName("button")[0];
  if ("undefined" === typeof button) {
    return;
  }

  menu = container.getElementsByTagName("ul")[0];

  // Hide menu toggle button if menu is empty and return early.
  if ("undefined" === typeof menu) {
    button.style.display = "none";
    return;
  }

  menu.setAttribute("aria-expanded", "false");

  // Get all the link elements within the menu.
  links = menu.getElementsByClassName("menu-item-has-children");

  if(links.length > 0){
    var firstItem = links[0];
    var lastItem = links[links.length - 1].childNodes[0];
  }else{
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

  button.onclick = function() {
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
        }
        // Tab
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
  (function(container) {
    var touchStartFn,
      i,
      parentLink = container.querySelectorAll(
        ".menu-item-has-children > a, .page_item_has_children > a"
      );

    if ("ontouchstart" in window) {
      touchStartFn = function(e) {
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

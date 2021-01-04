let lastKnownScrollPosition = 0;
const toTopBtn = document.getElementsByClassName("to-top");

// /**
//  * On page scroll
//  */
window.addEventListener("scroll", (e) => {
  lastKnownScrollPosition = window.scrollY;

  //show and hide scroll button
  if (lastKnownScrollPosition > window.outerHeight) {
    toTopBtn[0].classList.add("show");
  } else if (lastKnownScrollPosition < window.outerHeight) {
    if (toTopBtn[0].classList.contains("show")) {
      toTopBtn[0].classList.remove("show");
    }
  }
});

// /* Optional Javascript to close the radio button version by clicking it again */
var myRadios = document.getElementsByName("faq-tab");
if(myRadios) {
  var setCheck;
  var x = 0;
  for (x = 0; x < myRadios.length; x++) {
    myRadios[x].onclick = function() {
      if (setCheck != this) {
        setCheck = this;
      } else {
        this.checked = false;
        setCheck = null;
      }
    };
  }
}

// //scroll to top button click
toTopBtn[0].addEventListener("click", () => {
  scrollToTop(500);
  menuBtn.focus();
});

//scroll to top animation
function scrollToTop(duration) {
  // cancel if already on top
  if (document.scrollingElement.scrollTop === 0) return;

  const totalScrollDistance = document.scrollingElement.scrollTop;
  let scrollY = totalScrollDistance,
    oldTimestamp = null;

  function step(newTimestamp) {
    if (oldTimestamp !== null) {
      // if duration is 0 scrollY will be -Infinity
      scrollY -=
        (totalScrollDistance * (newTimestamp - oldTimestamp)) / duration;
      if (scrollY <= 0) return (document.scrollingElement.scrollTop = 0);
      document.scrollingElement.scrollTop = scrollY;
    }
    oldTimestamp = newTimestamp;
    window.requestAnimationFrame(step);
  }
  window.requestAnimationFrame(step);
}


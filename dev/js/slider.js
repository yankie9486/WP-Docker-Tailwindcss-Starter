window.addEventListener("DOMContentLoaded", function() {
    new Glide("#platforms", {
      type: "slider",
      startAt: 0,
      perView: 4,
      gap: 32,
      keyboard: !0,
      bound: !0,
      breakpoints: {
        1024: { perView: 3, gap: 8 },
        768: { perView: 2, gap: 8 },
        600: { perView: 1, gap: 8 },
      },
    }).mount();
  
    new Glide("#banner", {
      type: 'carousel',
      perView: 1,
      focusAt: 0,
      autoplay: 15000,
      gap: 0,
      rewindDuration: 0,
      animationDuration: 800,
    }).mount();
});
  
document.addEventListener("scroll", function () {
    if (window.scrollY >= 20) {
      document.body.classList.add("scrolling");
    } else {
      document.body.classList.remove("scrolling");
    }
});
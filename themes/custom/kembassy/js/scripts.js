jQuery(document).ready(function () {
  var title = jQuery('.section-2 h2.color-title').html();
  var color_title = '';

  for (var i = 0; i < title.length; i++) {
    if (i != 2) {
      color_title += title[i];
    } else {
      color_title += "<span class='pink'>" + title[i] + "</span>";
    }
  }
  jQuery('.section-2 h2.color-title').html(color_title);
});

// Add smooth scrolling to all links
jQuery(document).ready(function () {

  jQuery("a").on('click', function (event) {

    console.log(this.href);

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      jQuery('html, body').animate({
        scrollTop: jQuery(hash).offset().top
      }, 800, function () {

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

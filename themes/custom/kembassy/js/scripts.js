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

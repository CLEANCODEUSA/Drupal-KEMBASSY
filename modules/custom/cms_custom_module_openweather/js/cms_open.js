(function ($, Drupal, drupalSettings) {
    Drupal.behaviors.cmsOpenBehavior = {
        attach: function (context, settings) {
            $(document).ready(function () {
                function getUrlVar() {
                    var vars = {};
                    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
                        vars[key] = value;
                    });
                    return vars;
                }

                var currentPathArr = getUrlVar()["zip_code"];

                jQuery('#edit-user-zip-code').val(currentPathArr);

                $(".cms-custom-module-openweather-form #edit-submit").bind().click(function () {
                    var pathname = window.location.href;
                    var newarg = jQuery('#edit-user-zip-code').val();
                    //var currentPathArr = getUrlVar()["zip_code"];
                    // var currentUrl = 'http://www.example.com/hello.png?w=100&h=100&bg=white';
                    var url = new URL(pathname);
                    url.searchParams.set("zip_code", newarg); // setting your param
                    var newUrl = url.href;
                    console.log(newUrl);
                    window.location.href = newUrl;
                    return false;
                });

            });
        }
    };

})(jQuery, Drupal, drupalSettings);

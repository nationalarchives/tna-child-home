/**
 * TNA Child home JS
 */

jQuery(document).ready(function() {

    var $count = jQuery(".col-card").length;

    if ($count < 3) {
        var elements = document.getElementsByClassName("col-card");
        for (var i = 0; i < elements.length; i++) {
            elements[i].hide();
        }
    }

    if ( $count > 3 && $count < 6 ) {
        var elements = document.getElementsByClassName("col-card");

        for (var i = 3; i < elements.length; i++) {

            elements[i].hide();
        }
    }

    $("#alert_close_button").click(function () {
        $("#home_alert").css("display", "none");
    });

});
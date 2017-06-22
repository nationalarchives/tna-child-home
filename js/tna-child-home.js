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

    var tnaSetThisCookie = function (name, days) {
        var d = new Date();
        d.setTime(d.getTime() + 1000 * 60 * 60 * 24 * days);
        document.cookie = name + "=true;path=/;expires=" + d.toGMTString() + ';';
    };

    var tnaCheckForThisCookie = function (name) {
        if (document.cookie.indexOf(name) === -1) {
            return false;
        } else {
            return true;
        }
    };

    $(function () {
        if (!tnaCheckForThisCookie("dontShowHomeAlertTest3")) {
            $("#home_alert").show();
        }
    });

    $("#alert_close_button").click(function () {

        tnaSetThisCookie('dontShowHomeAlertTest3', 1);

        $("#home_alert").hide();
    });

});
/**
 * Admin JS.
 */

jQuery(document).ready( function( $ ) {

    $('#home_banner_img_button').click(function() {

        formfield = $('#home_banner_img').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    $('#home_card_img_1_button').click(function() {

        formfield = $('#home_card_img_1').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    $('#home_card_img_2_button').click(function() {

        formfield = $('#home_card_img_2').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    $('#home_card_img_3_button').click(function() {

        formfield = $('#home_card_img_2').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    $('#home_card_img_4_button').click(function() {

        formfield = $('#home_card_img_2').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    $('#home_card_img_5_button').click(function() {

        formfield = $('#home_card_img_2').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    $('#home_card_img_6_button').click(function() {

        formfield = $('#home_card_img_2').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#home_banner_img').val(imgurl);
        tb_remove();
    }

    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#home_card_img_1').val(imgurl);
        tb_remove();
    }

    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#home_card_img_2').val(imgurl);
        tb_remove();
    }

    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#home_card_img_3').val(imgurl);
        tb_remove();
    }

    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#home_card_img_4').val(imgurl);
        tb_remove();
    }

    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#home_card_img_5').val(imgurl);
        tb_remove();
    }

    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#home_card_img_6').val(imgurl);
        tb_remove();
    }

});
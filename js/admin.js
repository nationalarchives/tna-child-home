/**
 * Admin JS.
 */


jQuery(document).ready(function() {
    jQuery('#home_banner_img_button').click(function() {
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
            url = jQuery(html).attr('href');
            jQuery('#home_banner_img').val(url);
            tb_remove();
        };
        return false;
    });
    jQuery('#home_card_img_1_button').click(function() {
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
            url = jQuery(html).attr('href');
            jQuery('#home_card_img_1').val(url);
            tb_remove();
        };
        return false;
    });
    jQuery('#home_card_img_2_button').click(function() {
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
            url = jQuery(html).attr('href');
            jQuery('#home_card_img_2').val(url);
            tb_remove();
        };
        return false;
    });
    jQuery('#home_card_img_3_button').click(function() {
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
            url = jQuery(html).attr('href');
            jQuery('#home_card_img_3').val(url);
            tb_remove();
        };
        return false;
    });
    jQuery('#home_card_img_4_button').click(function() {
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
            url = jQuery(html).attr('href');
            jQuery('#home_card_img_4').val(url);
            tb_remove();
        };
        return false;
    });
    jQuery('#home_card_img_5_button').click(function() {
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
            url = jQuery(html).attr('href');
            jQuery('#home_card_img_5').val(url);
            tb_remove();
        };
        return false;
    });
    jQuery('#home_card_img_6_button').click(function() {
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
            url = jQuery(html).attr('href');
            jQuery('#home_card_img_6').val(url);
            tb_remove();
        };
        return false;
    });
});
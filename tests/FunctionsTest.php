<?php

class FunctionsTest extends PHPUnit_Framework_TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
    }

    public function test_tnatheme_globals()
    {
        $this->assertTrue(function_exists('tnatheme_globals'));
    }
    public function test_dequeue_parent_style()
    {
        $this->assertTrue(function_exists('dequeue_parent_style'));
    }
    public function test_tna_child_styles()
    {
        $this->assertTrue(function_exists('tna_child_styles'));
    }

    public function test_attributes_filter()
    {
        $this->assertTrue(function_exists('attributes_filter'));
    }

    public function test_hide_editor_from_homepage()
    {
        $this->assertTrue(function_exists('hide_editor_from_homepage'));
    }
    public function test_home_meta_boxes()
    {
        $this->assertTrue(function_exists('home_meta_boxes'));
    }
    public function test_get_content_and_display_card()
    {
        $this->assertTrue(function_exists('get_content_and_display_card'));
    }
    public function test_content_type()
    {
        $this->assertTrue(function_exists('content_type'));
    }
    public function test_card_html()
    {
        $this->assertTrue(function_exists('card_html'));
    }
    public function test_banner_html()
    {
        $this->assertTrue(function_exists('banner_html'));
    }
    public function test_home_banner()
    {
        $this->assertTrue(function_exists('home_banner'));
    }
    public function test_update_page_delete_transient()
    {
        $this->assertTrue(function_exists('update_page_delete_transient'));
    }
    public function test_is_card_active()
    {
        $this->assertTrue(function_exists('is_card_active'));
    }
    public function test_card_fallback()
    {
        $this->assertTrue(function_exists('card_fallback'));
    }
    public function test_check_cards()
    {
        $this->assertTrue(function_exists('check_cards'));
    }
    public function test_cards_admin_notice()
    {
        $this->assertTrue(function_exists('cards_admin_notice'));
    }
}

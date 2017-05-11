<?php

class FunctionsTest extends PHPUnit_Framework_TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
        $this->assertFalse(false);
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
}

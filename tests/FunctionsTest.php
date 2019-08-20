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
    public function test_cards_admin_notice()
    {
        $this->assertTrue(function_exists('cards_admin_notice'));
    }
    public function test_is_homepage_template()
    {
        $this->assertTrue(function_exists('is_homepage_template'));
    }
    public function test_landingpage_link_html_markup()
    {
        $this->assertTrue(function_exists('landingpage_link_html_markup'));
    }
    public function test_home_alert()
    {
        $this->assertTrue(function_exists('home_alert'));
    }
    public function test_render_schema()
    {
        $this->assertTrue(function_exists('render_schema'));
    }
}

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
    public function test_display_card()
    {
        $this->assertTrue(function_exists('display_card'));
    }
    public function test_content_type()
    {
        $this->assertTrue(function_exists('content_type'));
    }
    public function test_content_type_news()
    {
        $url = 'http://www.nationalarchives.gov.uk/about/news/the-national-archives-gets-top-marks-for-educational-visits/';
        $type = content_type( $url );

        $this->assertEquals($type, 'News');
    }
    public function test_content_type_blog()
    {
        $url = 'http://blog.nationalarchives.gov.uk/blog/decolonising-archaeology-iraq/';
        $type = content_type( $url );

        $this->assertEquals($type, 'Blog');
    }
    public function test_content_type_event()
    {
        $url = 'https://www.eventbrite.co.uk/e/annual-pipe-roll-society-lecture-the-charter-of-the-forest-1217-tickets-35002383070';
        $type = content_type( $url );

        $this->assertEquals($type, 'Event');
    }
    public function test_content_type_multimedia()
    {
        $url = 'http://media.nationalarchives.gov.uk/index.php/black-british-politics-anti-apartheid-struggle/';
        $type = content_type( $url );

        $this->assertEquals($type, 'Multimedia');
    }
    public function test_content_type_feature()
    {
        $url = 'http://www.google.com';
        $type = content_type( $url );

        $this->assertEquals($type, 'Feature');
    }
    public function test_card_html()
    {
        $this->assertTrue(function_exists('card_html'));
    }
    public function test_banner_html()
    {
        $this->assertTrue(function_exists('banner_html'));
    }
    public function test_display_home_banner()
    {
        $this->assertTrue(function_exists('display_home_banner'));
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
    public function test_get_meta_og_data()
    {
        $this->assertTrue(function_exists('get_meta_og_data'));
    }
    public function test_is_tna_open()
    {
        $this->assertTrue(function_exists('is_tna_open'));
    }
    public function test_tna_openingtimes_overrides()
    {
        $this->assertTrue(function_exists('tna_openingtimes_overrides'));
    }
    public function test_display_tna_opening_status()
    {
        $this->assertTrue(function_exists('display_tna_opening_status'));
    }
    public function test_render_schema()
    {
        $this->assertTrue(function_exists('render_schema'));
    }
}

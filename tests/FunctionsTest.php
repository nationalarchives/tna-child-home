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
    public function test_display_tna_opening_status_override()
    {
        $array = array(
            'status1' => 'open',
            'date1' => '2017-06-01',
            'times1' => '09:00 - 21:00'
        );
        $results = display_tna_opening_status('2017-06-01', 'Thursday', $array);
        $this->assertEquals($results, 'Open today 09:00 - 21:00');
    }
    public function test_display_tna_opening_status_open()
    {
        $array = array(
            'status1' => 'open',
            'date1' => '2017-06-02',
            'times1' => '09:00 - 21:00'
        );
        $results = display_tna_opening_status('2017-06-01', 'Thursday', $array);
        $this->assertEquals($results, 'Open today 09:00 - 19:00');
    }
    public function test_display_tna_opening_status_closed()
    {
        $array = array(
            'status1' => 'open',
            'date1' => '2017-06-02',
            'times1' => '09:00 - 21:00'
        );
        $results = display_tna_opening_status('2017-06-04', 'Sunday', $array);
        $this->assertEquals($results, 'Closed today');
    }
}

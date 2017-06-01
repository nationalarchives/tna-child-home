<?php
/**
 * Opening times
 */

function is_tna_opening() {
	$day_of_week  = date('l');

	if ($day_of_week === 'Sunday' || $day_of_week === 'Monday') {
		return 'Closed today';
	} elseif ($day_of_week === 'Tuesday' || $day_of_week === 'Thursday') {
		return 'Open today 09:00 - 19:00';
	} else {
		return 'Open today 09:00 - 17:00';
	}
}

function tna_openingtimes_exceptions() {
	$current_date = date('Y-m-d');

	if (have_rows('opening-time-changes', 'option')) {

		if (get_sub_field('date') === $current_date && strtolower(get_sub_field('tna-open')) === 'closed') {

			return 'Closed today';

		} elseif (get_sub_field('date') === $current_date && strtolower(get_sub_field('tna-open')) === 'open') {

			return 'Open today ';
		}

	}
}
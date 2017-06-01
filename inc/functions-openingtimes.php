<?php
/**
 * Opening times
 */

function is_tna_open( $day_of_week ) {

	if ($day_of_week === 'Sunday' || $day_of_week === 'Monday') {
		return 'Closed today';
	} elseif ($day_of_week === 'Tuesday' || $day_of_week === 'Thursday') {
		return 'Open today 09:00 - 19:00';
	} else {
		return 'Open today 09:00 - 17:00';
	}
}

function tna_openingtimes_overrides( $current_date ) {

	for ( $i=1 ; $i<=9 ; $i++ ) {

		$status = get_option('open_status_'.$i);
		$override_date = get_option('open_date_'.$i);

		if ( $override_date === $current_date && $status !== 'disabled') {

			if ( $override_date === $current_date && $status === 'closed' ) {

				return 'Closed today';

			} elseif ( $override_date === $current_date && $status === 'open' ) {

				return 'Open today';
			}
		}
	}
}

function display_tna_opening_status( $current_date, $day_of_week ) {

	if ( tna_openingtimes_overrides( $current_date ) ) {

		return tna_openingtimes_overrides( $current_date );

	} else {

		return is_tna_open( $day_of_week );

	}
}
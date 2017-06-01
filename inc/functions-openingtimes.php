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

function tna_openingtimes_overrides( $current_date, $array ) {

	for ( $i=1 ; $i<=12 ; $i++ ) {

		$status = $array['status'.$i];
		$override_date = $array['date'.$i];

		if ( $override_date === $current_date && $status !== 'disabled') {

			if ( $override_date === $current_date && $status === 'closed' ) {

				return 'Closed today';

			} elseif ( $override_date === $current_date && $status === 'open' ) {

				$times = $array['times'.$i];

				return 'Open today ' . $times;
			}
		}
	}
}

function display_tna_opening_status( $current_date, $day_of_week, $overrides ) {

	if ( tna_openingtimes_overrides( $current_date, $overrides ) ) {

		return tna_openingtimes_overrides( $current_date, $overrides );

	} else {

		return is_tna_open( $day_of_week );

	}
}

function get_openingtimes_overrides() {

	$openingtimes_overrides = array();

	for ( $i=1 ; $i<=12 ; $i++ ) {

		if (get_option( 'open_date_' . $i )) {

			$status = get_option( 'open_status_' . $i );
			$date = get_option( 'open_date_' . $i );
			$times = get_option( 'open_times_' . $i );

			$openingtimes_overrides['status'.$i] = $status;
			$openingtimes_overrides['date'.$i] = $date;
			$openingtimes_overrides['times'.$i] = $times;

		}
	}
	return $openingtimes_overrides;
}
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

function tna_openingtimes_overrides( $current_date, $array = array() ) {

	if ($array) {

		for ( $i = 1; $i <= 12; $i ++ ) {

			$status = ( isset( $array[ 'status'.$i ] ) ) ?  $array[ 'status'.$i ]  : false;
			$override_date = ( isset( $array[ 'date'.$i ] ) ) ?  $array[ 'date'.$i ]  : false;
			$times = ( isset( $array[ 'times'.$i ] ) ) ?  $array[ 'times'.$i ]  : false;

			if ( $override_date === $current_date && $status !== 'disabled' ) {

				if ( $override_date === $current_date && $status === 'closed' ) {

					return 'Closed today';

				} elseif ( $override_date === $current_date && $status === 'open' ) {

					return 'Open today ' . $times;
				}
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

	$overrides = array();

	for ( $i=1 ; $i<=12 ; $i++ ) {

		if (get_option( 'open_date_'.$i )) {

			$status = esc_attr( get_option( 'open_status_'.$i ) );
			$date = esc_attr( get_option( 'open_date_'.$i ) );
			$times = esc_attr( get_option( 'open_times_'.$i ) );

			$overrides['status'.$i] = $status;
			$overrides['date'.$i] = $date;
			$overrides['times'.$i] = $times;

		}
	}
	return $overrides;
}
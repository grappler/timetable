<p>
	<div class="session-row-content">
		<label for="session-day" class="session-row-title"><?php _e( 'Day', 'timetable' )?></label>
		<select name="session-day" id="session-day">
			<?php foreach( timetable_get_week() as $day ) {
				echo '<option value="' . esc_attr( $day['weekday_number'] ) . '"' . selected( $session_stored_meta['session-day'][0], $day['weekday_number'] ) . '>' . $day['weekday_whole'] . '</option>';
			} ?>
		</select>
	</div>
	<div class="session-row-content">
		<label for="session-start" class="session-row-title"><?php _e( 'Start', 'timetable' )?></label>
		<input type="text" name="session-start" id="session-start" value="<?php if ( isset ( $session_stored_meta['session-start'] ) ) echo esc_attr( $session_stored_meta['session-start'][0] ); ?>" />
	</div>
	<div class="session-row-content">
		<label for="session-end" class="session-row-title"><?php _e( 'End', 'timetable' )?></label>
		<input type="text" name="session-end" id="session-end" value="<?php if ( isset ( $session_stored_meta['session-end'] ) ) echo esc_attr( $session_stored_meta['session-end'][0] ); ?>" />
	</div>
	<script>
		jQuery(function($) {
			$('#session-start').timepicker({
				'minTime': '00:00',
				'maxTime': '24:00'
			});
			$('#session-end').timepicker({
				'minTime': '00:00',
				'maxTime': '24:00',
				'showDuration': true
			});
			$('#session-start').on('changeTime showTimepicker', function() {
				$('#session-end').timepicker(
					'option', {
						'minTime': $('#session-start').val()
					}
				);
			});
		});
	</script>
</p>
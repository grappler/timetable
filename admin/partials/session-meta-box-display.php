<p>
	<div class="session-row-content">
		<label for="session-day" class="session-row-title"><?php _e( 'Day', 'timetable' )?></label>
		<select name="session-day" id="session-day">
			<option value="1" <?php if ( isset ( $session_stored_meta['session-day'] ) ) selected( $session_stored_meta['session-day'][0], '1' ); ?>><?php _e( 'Monday' )?></option>
			<option value="2" <?php if ( isset ( $session_stored_meta['session-day'] ) ) selected( $session_stored_meta['session-day'][0], '2' ); ?>><?php _e( 'Tuesday')?></option>
			<option value="3" <?php if ( isset ( $session_stored_meta['session-day'] ) ) selected( $session_stored_meta['session-day'][0], '3' ); ?>><?php _e( 'Wednesday' )?></option>
			<option value="4" <?php if ( isset ( $session_stored_meta['session-day'] ) ) selected( $session_stored_meta['session-day'][0], '4' ); ?>><?php _e( 'Thursday' )?></option>
			<option value="5" <?php if ( isset ( $session_stored_meta['session-day'] ) ) selected( $session_stored_meta['session-day'][0], '5' ); ?>><?php _e( 'Friday' )?></option>
			<option value="6" <?php if ( isset ( $session_stored_meta['session-day'] ) ) selected( $session_stored_meta['session-day'][0], '6' ); ?>><?php _e( 'Saturday' )?></option>
			<option value="7" <?php if ( isset ( $session_stored_meta['session-day'] ) ) selected( $session_stored_meta['session-day'][0], '7' ); ?>><?php _e( 'Sunday' )?></option>
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
		jQuery(document).ready(function($) {
			$('#session-start').timepicker();
			$('#session-end').timepicker({
				'showDuration': true
			});
			$(".session-start").on('changeTime', function () {
				$(this).closest('tr').find('.session-start:first').timepicker('option', {
					'minTime': $(this).val()
				});
			});
		});
	</script>
</p>
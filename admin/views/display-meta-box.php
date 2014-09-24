		<p>
			<div class="timetable-row-content">
				<label for="timetable-day" class="timetable-row-title"><?php _e( 'Day', $this->plugin_slug )?></label>
				<select name="timetable-day" id="timetable-day">
					<option value="1" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], '1' ); ?>><?php _e( 'Monday' )?></option>';
					<option value="2" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], '2' ); ?>><?php _e( 'Tuesday')?></option>';
					<option value="3" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], '3' ); ?>><?php _e( 'Wednesday' )?></option>';
					<option value="4" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], '4' ); ?>><?php _e( 'Thursday' )?></option>';
					<option value="5" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], '5' ); ?>><?php _e( 'Friday' )?></option>';
					<option value="6" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], '6' ); ?>><?php _e( 'Saturday' )?></option>';
					<option value="7" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], '7' ); ?>><?php _e( 'Sunday' )?></option>';
				</select>
			</div>
			<div class="timetable-row-content">
				<label for="timetable-start" class="timetable-row-title"><?php _e( 'Start', $this->plugin_slug )?></label>
				<input type="text" name="timetable-start" id="timetable-start" value="<?php if ( isset ( $fp5_stored_meta['timetable-start'] ) ) echo esc_attr( $fp5_stored_meta['timetable-start'][0] ); ?>" />
			</div>
			<div class="timetable-row-content">
				<label for="timetable-end" class="timetable-row-title"><?php _e( 'End', $this->plugin_slug )?></label>
				<input type="text" name="timetable-end" id="timetable-end" value="<?php if ( isset ( $fp5_stored_meta['timetable-end'] ) ) echo esc_attr( $fp5_stored_meta['timetable-end'][0] ); ?>" />
			</div>
		</p>
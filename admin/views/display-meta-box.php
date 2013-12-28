		<p>
			<div class="timetable-row-content">
				<label for="timetable-day" class="timetable-row-title"><?php _e( 'Day', $this->plugin_slug )?></label>
				<select name="timetable-day" id="timetable-day">
					<option value="Monday" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], 'monday' ); ?>><?php _e( 'Monday', $this->plugin_slug )?></option>';
					<option value="Tuesday" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], 'tuesday' ); ?>><?php _e( 'Tuesday', $this->plugin_slug )?></option>';
					<option value="Wednesday" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], 'wednesday' ); ?>><?php _e( 'Wednesday', $this->plugin_slug )?></option>';
					<option value="Thursday" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], 'thursday' ); ?>><?php _e( 'Thursday', $this->plugin_slug )?></option>';
					<option value="Friday" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], 'friday' ); ?>><?php _e( 'Friday', $this->plugin_slug )?></option>';
					<option value="Saturday" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], 'saturday' ); ?>><?php _e( 'Saturday', $this->plugin_slug )?></option>';
					<option value="Sunday" <?php if ( isset ( $fp5_stored_meta['timetable-day'] ) ) selected( $fp5_stored_meta['timetable-day'][0], 'sunday' ); ?>><?php _e( 'Sunday', $this->plugin_slug )?></option>';
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
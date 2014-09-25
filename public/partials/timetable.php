<div class="timetable-grid clearfix">

	<div class="timetable-grid-header clearfix">
		<div class="column first">
			<span class="timetable-visuallyhidden">Hours</span>
		</div>
		<div class="timetable-grid-content-wrap">
			<?php timetable_get_template_part( 'column-header' ) ?>
		</div><!-- .timetable-grid-content-wrap -->
	</div><!-- .timetable-grid-header -->

	<div class="timetable-inner-grid-wrapper">

		<div class="timetable-grid-outer-wrap tribe-clearfix">
			<div class="timetable-grid-inner-wrap">
				<?php timetable_get_template_part( 'rows' ) ?>
			</div><!-- .timetable-grid-inner-wrap -->
		</div><!-- .timetable-grid-outer-wrap -->

		<!-- Days of the week & hours & events -->
		<div class="timetable-grid-body clearfix">

			<div class="column timetable-grid-hours">
				<?php timetable_get_template_part( 'row-headers' ) ?>
			</div><!-- .timetable-grid-hours -->

			<div class="timetable-grid-content-wrap">
				<?php timetable_get_template_part( 'columns' ) ?>
			</div><!-- .timetable-grid-content-wrap -->

		</div><!-- .timetable-grid-body -->
	</div><!-- .timetable-inner-grid-wrapper -->

</div><!-- .timetable-grid -->

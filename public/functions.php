<?php

// This function can live wherever is suitable in your plugin
function timetable_get_template_part( $slug, $name = null, $load = true ) {
	$timetable_template_loader = new Timetable_Template_Loader;
	$timetable_template_loader->get_template_part( $slug, $name, $load );
}

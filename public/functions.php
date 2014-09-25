<?php

// This function can live wherever is suitable in your plugin
function timetable_get_template_part( $slug, $name = null, $load = true ) {
	$timetable_template_loader = new Timetable_Template_Loader;
	$timetable_template_loader->get_template_part( $slug, $name, $load );
}

function timetable_duration_time( $id ) {
	$timetable_template = new Timetable_Template;
	$timetable_template->duration_time( $id );
}

function timetable_start_time( $id ) {
	$timetable_template = new Timetable_Template;
	$timetable_template->start_time( $id );
}

function timetable_duration_percentage( $id ) {
	$timetable_template = new Timetable_Template;
	$timetable_template->duration_percentage( $id );
}

function timetable_start_percentage( $id ) {
	$timetable_template = new Timetable_Template;
	$timetable_template->start_percentage( $id );
}

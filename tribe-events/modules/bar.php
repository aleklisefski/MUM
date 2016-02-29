<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/tribe-events-bar.class.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */
?>

<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

global $wp;
$current_url = esc_url( add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );

 ?>

<?php do_action('tribe_events_bar_before_template') ?>
<div id="tribe-events-bar">

	<!-- Views -->
	<div id="tribe-bar-views"><?php _e( '', 'tribe-events-calendar' ); ?>
		<?php if ( tribe_is_upcoming() ) { ?>
			<a class="button small" href="/events/month/" data-view="month">Switch to Calendar View</a>
		<?php } elseif ( tribe_is_month() ) { ?>
			<h4 class="mobile" style="margin-bottom: 20px;">Having trouble viewing this calendar on your mobile device?</h4>
			<a class="button small" href="/events/list/" data-view="month">Switch to List View</a>
		<?php } ?>
		<div class="clearFix"></div>
	</div>

</div><!-- #tribe-events-bar -->
<?php do_action('tribe_events_bar_after_template') ?>

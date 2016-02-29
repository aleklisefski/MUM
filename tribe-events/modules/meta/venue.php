<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 * @since 3.6
 */

if ( ! tribe_address_exists() ) return;
$phone = tribe_get_phone();
$website = tribe_get_venue_website_link()
?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue col half last">
	<h2 class="tribe-events-single-section-title"> <?php _e('Venue', 'tribe-events-calendar' ) ?> </h2>
	<dl>
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>

		<dd class="author fn org"> <?php echo tribe_get_venue() ?> </dd>
		<div class="clearFix"></div>
		<?php
		// Do we have an address?
		$address = tribe_address_exists() ? '<address class="tribe-events-address">' . tribe_get_full_address() . '</address>' : '';

		// Do we have a Google Map link to display?
		$gmap_link = tribe_show_google_map_link() ? tribe_get_map_link_html() : '';
		$gmap_link = apply_filters( 'tribe_event_meta_venue_address_gmap', $gmap_link );

		// Display if appropriate
		if ( ! empty( $address ) ) echo '<dd class="location">' . "$address $gmap_link </dd>";
		?>
		<div class="clearFix"></div>
		<?php if ( ! empty( $phone ) ): ?>
			<dt> <?php _e( 'Phone:', 'tribe-events-calendar' ) ?> </dt>
			<dd class="tel"> <?php echo $phone ?> </dd>
		<?php endif ?>
		<div class="clearFix"></div>
		<?php if ( ! empty( $website ) ): ?>
			<dt> <?php _e( 'Website:', 'tribe-events-calendar' ) ?> </dt>
			<dd class="url"> <?php echo $website ?> </dd>
		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
	</dl>
</div>
<div class="clearFix"></div>
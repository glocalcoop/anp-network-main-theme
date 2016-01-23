<?php
/**
 * The template is used for displaying a single event details.
 *
 * You can use this to edit how the details re displayed on your site. (see notice below).
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.7
 */
?>

<!-- Choose a different date format depending on whether we want to include time -->
<?php 
	$time_format = get_option( 'time_format' );
	$date_format = get_option( 'date_format' );
?>

<section class="event-details">

	<h4 class="date-time">
		<span class="event-day"><?php eo_the_start( 'l,' ); ?></span>
		<span class="event-date"><?php eo_the_start( $date_format ); ?></span>
		<span class="event-time"><?php eo_the_start( $time_format ); ?> - <?php eo_the_end( $time_format ); ?></span>
	</h4>

	<!-- Get event information, see template: event-venue-address.php -->
	<?php get_template_part( '/partials/event', 'venue-address' ); ?>

	<div class="tools"><a href="" class="add-to-calendar button"><?php _e( 'Save to Calendar', 'anp-network-theme' ); ?></a></div>

	<?php if( function_exists( 'eo_get_event_meta_list' ) ) : ?>
        <?php echo anp_get_event_meta_list(); ?>
    <?php endif; ?>

</section>
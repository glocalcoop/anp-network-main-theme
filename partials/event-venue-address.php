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

<?php if( eo_get_venue() ) : ?>

	<?php $venue_id = eo_get_venue( get_the_ID() ); ?>
	<?php $venue_address = eo_get_venue_address( $venue_id ); ?>
	<?php $venue_link = eo_get_venue_link( $venue_id ); ?>
	<div class="event-location">
		<?php if( !is_tax( 'event-venue' ) ) : ?>
		<span class="location-name"><a href="<?php echo esc_url( $venue_link ); ?>"><?php echo eo_get_venue_name( $venue_id ); ?></a></span>
		<?php endif; ?>
 		<span class="street-address"><?php echo $venue_address['address']; ?></span>
 		<span class="city-state-postalcode">
	 		<span class="city"><?php echo $venue_address['city']; ?></span>
	 		<span class="state"><?php echo $venue_address['state']; ?></span>
	 		<span class="postal-code"><?php echo $venue_address['postcode']; ?></span>
 		</span>
 		<span class="country"><?php echo $venue_address['country']; ?></span>
	</div>

<?php endif; ?>

<?php
/**
 * The template for displaying the venue page
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
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>

<?php 
	$time_format = get_option( 'time_format' );
	$date_format = get_option( 'date_format' );
?>

<div class="content">

	<div class="wrap">

		<main role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<!-- Page header, display venue title-->
				<header class="page-header">	
					
					<?php $venue_id = get_queried_object_id(); ?>
					<?php $venue_address = eo_get_venue_address( $venue_id ); ?>
					
					<h1 class="entry-title single-title" itemprop="headline">
						<?php echo eo_get_venue_name( $venue_id ); ?>
					</h1>

					<?php if( $venue_description = eo_get_venue_description( $venue_id ) ) : ?>
						 <div class="venue-archive-meta">

						 	<div class="venue-description">
						 		<?php echo $venue_description; ?>
						 	</div>
						 	
						 </div>
					<?php endif; ?>

				 	<!-- Get event information, see template: event-venue-address.php -->
					<?php get_template_part( '/partials/event', 'venue-address' ); ?>
					
					<!-- Display the venue map. If you specify a class, ensure that class has height/width dimensions-->
					<?php echo eo_get_venue_map( $venue_id, array('width'=>"100%") ); ?>
				</header><!-- end header -->

				<?php if ( have_posts() ) : ?>

				<section class="entry-content clearfix" itemprop="articleBody">

					<!-- This is the usual loop, familiar in WordPress templates-->
					<?php while ( have_posts()) : the_post(); ?>

					<h3><?php _e( 'Upcoming Events', 'anp-network-main' ); ?></h3>

						<ul class="event-list">

							<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<h3 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="date-time">
									<span class="event-day"><?php eo_the_start( 'l,' ); ?></span> 
									<span class="event-date"><?php eo_the_start( $date_format ); ?></span>
									<span class="event-time"><?php eo_the_start( $time_format ); ?> - <?php eo_the_end( $time_format ); ?></span>
									
								</div>
							</li>
						</ul>

					<?php endwhile; ?><!--The Loop ends-->

				</section>

				<?php endif; ?>

			</article>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>

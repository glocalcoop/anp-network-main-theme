<?php
/**
 * The template for displaying lists of events
 *
 * Queries to do with events will default to this template if a more appropriate template cannot be found
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. 
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>

<div class="content">

	<div class="wrap">

		<main class="main-archive">

		<!-- Page header-->
		<header class="page-header">
			<h1 class="page-title">
			<?php
				if( eo_is_event_archive('day') )
					//Viewing date archive
					echo __( 'Events: ','anp-network-theme' ) . ' ' .eo_get_event_archive_date( 'jS F Y' );
				elseif( eo_is_event_archive( 'month' ) )
					//Viewing month archive
					echo __( 'Events: ','anp-network-theme' ).' '.eo_get_event_archive_date( 'F Y' );
				elseif( eo_is_event_archive( 'year' ) )
					//Viewing year archive
					echo __( 'Events: ','anp-network-theme' ).' '.eo_get_event_archive_date( 'Y' );
				else
					_e( 'Events','anp-network-theme' );
			?>
			</h1>
		</header>

		<section class="event-list">

		<?php if ( have_posts() ) : ?>

			<!-- Navigate between pages-->
			<!-- In TwentyEleven theme this is done by twentyeleven_content_nav-->
			<?php 
			global $wp_query;
			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-above">
					<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'anp-network-theme' ) ); ?></div>
					<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'anp-network-theme' ) ); ?></div>
				</nav><!-- #nav-above -->
			<?php endif; ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
					<header class="post-header event-header">
						<?php
							$date_format = get_option( 'date_format' );
							$time_format = get_option( 'time_format' );
						?>

						<h4 class="meta">
							<span class="event-day"><?php eo_the_start( 'l' ); ?></span>
							<time class="event-date"><?php eo_the_start( $date_format ); ?></time>
							<span class="event-time"><?php eo_the_start( $time_format ); ?></span>
						</h4>	
								
					</header><!-- .entry-header -->

					<section class="post-body event-content">

						<div class="post-image event-image">
							<?php the_post_thumbnail( 'medium' ); ?>
						</div>

						<h3 class="post-title event-title">
							<a title="<?php echo get_the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title();?></a>
						</h3>

						<div class="event-location">
							<?php $venue_id = eo_get_venue( get_the_ID() ); ?>
							<?php $venue_address = eo_get_venue_address( $venue_id ); ?>
							<?php $venue_link = eo_get_venue_link( $venue_id ); ?>
					 		<span class="location-name"><a href="<?php echo esc_url( $venue_link ); ?>"><?php echo eo_get_venue_name( $venue_id ); ?></a></span>
					 		<span class="street-address"><?php echo $venue_address['address']; ?></span>
					 		<span class="city-state-postalcode">
						 		<span class="city"><?php echo $venue_address['city']; ?></span>
						 		<span class="state"><?php echo $venue_address['state']; ?></span>
						 		<span class="postal-code"><?php echo $venue_address['postcode']; ?></span>
					 		</span>
					 		<span class="country"><?php echo $venue_address['country']; ?></span>
					 	</div>

					 	<p class="post-excerpt event-description">
					 		<?php the_excerpt(); ?>
					 	</p>

					</section>

				</article><!-- #post-<?php the_ID(); ?> -->


    		<?php endwhile; ?><!--The Loop ends-->

		<!-- Navigate between pages-->
		<?php 
			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-below">
					<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'anp-network-theme' ) ); ?></div>
					<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'anp-network-theme' ) ); ?></div>
				</nav><!-- #nav-below -->
			<?php endif; ?>

		<?php else : ?>
			<!-- If there are no events -->
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'anp-network-theme' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. ', 'anp-network-theme' ); ?></p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

			<?php endif; ?>

			</section>

		</main>

		<?php get_sidebar(); ?>

    </div>

</div>

<?php get_footer(); ?>

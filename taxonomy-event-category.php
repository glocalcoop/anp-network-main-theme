<?php
/**
 * The template for displaying an event-category page
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

			<?php if ( have_posts() ) : ?>

				<!-- Page header, display category title-->
				<header class="page-header">	

					<h1 class="entry-title single-title" itemprop="headline">
						<?php _e( 'Event Category: ', 'anp-network-main' ); ?><?php echo single_cat_title( '', false ); ?>
					</h1>

					<!-- If the category has a description display it-->
					<?php $category_description = category_description(); ?>

					<?php if( $category_description ) :  ?>

					<div class="event-category-archive-meta">

						<div class="event-category-description">

							<?php echo $category_description; ?>

						</div>

					</div>

					<?php endif; ?>

				</header>

				<!-- Navigate between pages-->
				<!-- In TwentyEleven theme this is done by twentyeleven_content_nav-->
				<?php 
				global $wp_query;
				if ( $wp_query->max_num_pages > 1 ) : ?>
					<nav id="nav-above">
						<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
						<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
					</nav><!-- #nav-above -->
				<?php endif; ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
								
				<section class="entry-content clearfix" itemprop="articleBody">

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

				</section>

    			<?php endwhile; ?><!--The Loop ends-->

				<!-- Navigate between pages-->
				<?php 
				if ( $wp_query->max_num_pages > 1 ) : ?>
					<nav id="nav-below">
						<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
						<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
					</nav><!-- #nav-below -->
				<?php endif; ?>

			<?php else : ?>

				<!-- If there are no events -->
				<section id="post-0" class="post no-results not-found" itemprop="articleBody">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'eventorganiser' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no events were found for the requested category. ', 'eventorganiser' ); ?></p>
					</div><!-- .entry-content -->
				</section><!-- #post-0 -->

			<?php endif; ?>

			</article>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>
<?php get_footer(); ?>

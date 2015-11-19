<?php get_header(); ?>

<div class="content">

	<div class="wrap">

		<main class="main-results" role="main">
		
			<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'anp-main-theme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

					<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					
					<p class="byline vcard">
					    <?php printf( __( '<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'anp-main-theme' ), get_the_time( 'Y-m-j' ) ); ?>
					</p>

					<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'anp-main-theme' ) . '</span>' ); ?>


				</article>

			<?php endwhile; ?>

					<?php if (function_exists('bones_page_navi')) { ?>
							<?php bones_page_navi(); ?>
					<?php } else { ?>
							<nav class="wp-prev-next">
									<ul class="clearfix">
										<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'anp-main-theme' )) ?></li>
										<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'anp-main-theme' )) ?></li>
									</ul>
							</nav>
					<?php } ?>

				<?php else : ?>

						<article id="post-not-found" class="hentry clearfix">
							<header class="article-header">
								<h1><?php _e( 'Sorry, No Results.', 'anp-main-theme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Try your search again.', 'anp-main-theme' ); ?></p>
							</section>
							<footer class="article-footer">
									<p><?php _e( 'This is the error message in the search.php template.', 'anp-main-theme' ); ?></p>
							</footer>
						</article>

				<?php endif; ?>

			</main>

			<?php get_sidebar(); ?>

		</div>

</div>

<?php get_footer(); ?>

<?php get_header(); ?>

<div class="content">

	<div class="wrap">

		<main role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

					<header class="article-header">

						<?php 
						if ( has_post_thumbnail() ) { ?>

						<section class="post-image">
							<?php the_post_thumbnail('full'); ?> 
						</section>

						<?php } ?>

						<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
						

					</header>

					<section class="entry-content clearfix" itemprop="articleBody">
						<?php the_content(); ?>
					</section>

					<footer class="article-footer">
						<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'anp-main-theme' ) . '</span> ', ', ', '</p>' ); ?>

					</footer>

					<?php comments_template(); ?>

				</article>

			<?php endwhile; ?>

			<?php else : ?>

				<article id="post-not-found" class="hentry clearfix">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'anp-main-theme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'anp-main-theme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the single.php template.', 'anp-main-theme' ); ?></p>
						</footer>
				</article>

			<?php endif; ?>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying a single event
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme. You can use this template as a guide.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
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

<div class="content">

    <div class="wrap">

        <main role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">

                    <?php if( has_post_thumbnail() ) : ?>

                        <section class="event-image">
                            <?php the_post_thumbnail('full'); ?> 
                        </section>

                    <?php endif; ?>

                    <!-- Display event title -->
                    <h1 class="entry-title single-title event-title" itemprop="headline"><?php the_title(); ?></h1>

                </header><!-- .entry-header -->
        
                <!-- Get event information, see template: event-meta-event-single.php -->
                <?php get_template_part( 'partials/event-meta', 'event-single' ); ?>

                <section class="event-description">

                    <!-- The content or the description of the event-->
                    <?php the_content(); ?>

                    <!-- Does the event have a venue? -->
                    <?php if( eo_get_venue() ): ?>
                        <!-- Display map -->
                        <div class="event-map">
                            <?php echo eo_get_venue_map(eo_get_venue(),array('width'=>'100%')); ?>
                        </div>
                    <?php endif; ?>

                </section>

                <footer class="event-footer">

                    <?php if( function_exists( 'eo_get_event_meta_list' ) ) : ?>
                        <?php echo anp_get_event_meta_list(); ?>
                    <?php endif; ?>
                
                    <?php edit_post_link( __( 'Edit'), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-meta -->

            </article><!-- #post-<?php the_ID(); ?> -->

            <!-- If comments are enabled, show them -->
            <div class="comments-template">
                <?php comments_template(); ?>
            </div>              

        <?php endwhile; // end of the loop. ?>


        </main>

        <?php get_sidebar(); ?>

    </div>

</div>


<!-- Call template footer -->
<?php get_footer(); ?>

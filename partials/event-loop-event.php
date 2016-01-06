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


<article id="post-<?php the_ID(); ?>" <?php post_class( 'post event-list' ); ?>>

    <header class="post-header event-header">

        <h4 class="meta">
            <span class="event-day"><?php eo_the_start( 'l' ); ?></span>
            <time class="event-date" itemprop="startDate" datetime="<?php eo_the_start( 'c' ); ?>"><?php eo_the_start( $date_format ); ?></time>
            <span class="event-time"><?php eo_the_start( $time_format ); ?></span>
        </h4>
        <?php if( function_exists( 'eo_get_event_meta_list' ) ) : ?>
            <?php echo anp_get_event_meta_list(); ?>
        <?php endif; ?>

    </header>

    <div class="post-body event-content">

        <div class="post-image event-image">
            <?php the_post_thumbnail( 'medium' ); ?>
        </div>

        <h3 class="post-title event-title">
            <a title="<?php echo get_the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title();?></a>
        </h3>

        <?php get_template_part( 'partials/event-venue', 'address' ); ?>

        <!-- Show Event text as 'the_excerpt' or 'the_content' -->
        <p class="post-excerpt event-description">
            <?php the_excerpt(); ?>
        </p>
        

    </div><!-- .event-entry-meta -->            

</article><!-- #post-<?php the_ID(); ?> -->
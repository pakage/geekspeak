<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header(); ?>

<div id="sidebar-container">
    <div class="relative">
        <div class="absolute">
            <div class="container-inner">
                <?php get_sidebar(); ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<?php if (have_posts()) : ?>
<div id="main-container">
    <?php while (have_posts()) : the_post(); ?>
    <div class="content-container">
        <div class="container-inner">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>


                <div class="post-entry">                    
                    <?php the_content(); ?>
                </div><!-- end of .post-entry -->

                <div class="post-tags">
                    <?php the_tags(__('Tagged with:', 'responsive') . ' ', ', ', '<br />'); ?> 
                </div><!-- end of .post-data -->    

            </div><!-- end of #post-<?php the_ID(); ?> -->
        </div>
    </div>
    <?php endwhile; ?>
    
    <?php global $wp_query;              
    if ( $wp_query->max_num_pages > 1 ) : ?>  
    
    <div id="pagination-container">
        <div class="container-inner">
            <div id="pagination">
                <span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">←</span> Older posts', 'twentyeleven' ) ); ?></span>  
                <span class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">→</span>', 'twentyeleven' ) ); ?></span>  
                <div class="clear"></div>
            </div>
        </div>
    </div>
    
    <?php endif;  ?>
    
    <?php get_footer(); ?>
    
</div>
<?php endif; ?>





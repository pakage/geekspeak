<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Tech Blog
 * @since Tech Blog 1.0
 */

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header(); ?>

<div id="sidebar-container">
    <div class="container-inner">
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
</div>

<div id="main-container">
    <div class="content-container">
        <div class="container-inner">
            <div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
                            
				<?php get_template_part( 'content', get_post_format() ); ?>
                                
                                <?php $posttags = get_the_tags(); ?>
                
                                <?php if($posttags): ?>

                                <div class="post-tags">

                                    <span class="tags-title">tagged with:</span>

                                    <?php foreach($posttags as $tag): ?>

                                    <a class="white" href="<?php echo site_url().'/articles/tag/'.$tag->slug; ?>"><span><?php echo $tag->name; ?></span></a>

                                    <?php endforeach; ?>

                                    <div class="clear"></div>

                                </div><!-- end of .post-data -->    
                                
                                
                                
                                <?php endif; ?>
                    
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    </div>
</div>
    
    <div id="pagination-container">
        <div class="container-inner">
            <div id="pagination">
                <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> previous post' ); ?></span>  
                <span class="nav-next"><?php next_post_link( '%link', 'next post <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>  
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div id="comments-container">
        <div class="container-inner">
            <div id="comments">
                <?php comments_template( '', true ); ?>
            </div>
        </div>
    </div>
        
    

<?php get_footer(); ?>

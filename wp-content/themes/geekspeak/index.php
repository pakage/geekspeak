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


<div id="main-container">
    <?php $article = get_page(240);
    if($article): ?>    
    <div class="content-container">
        <div class="container-inner">
            <div class="post">
                <h1><?php echo $article->post_title; ?></h1>
                <div class="post-entry">
                    <?php echo $article->post_content; ?>
                </div>
                <?php //echo "<pre>".print_r($article,true)."</pre>"; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
<?php if (have_posts()) : ?>    
    <?php while (have_posts()) : the_post(); ?>
    <div class="content-container">
        <div class="container-inner">
            
            <?php 
            if (has_post_thumbnail( $post->ID ) ){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            }else{
                $image = false;
            } 
            ?>
            
            <div class="listing-main">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>

                    <div class="post-data">
                        Posted in <?php echo get_the_category_list(', '); ?> on <?php echo get_the_date(); ?>
                    </div><!-- end of .post-data -->             

                    <?php if($image): ?>
                    <div class="featured-image">
                            <div class="featured-image-inner">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Check out %s', 'responsive'), the_title_attribute('echo=0')); ?>">
                                <img src="<?php echo $image[0]; ?>" />
                                </a>
                            </div>
                    </div>
                    <?php endif; ?>

                    <div class="post-entry">
                        <?php the_excerpt(40); ?>
                    </div><!-- end of .post-entry -->

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

                </div><!-- end of #post-<?php the_ID(); ?> -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php endwhile; ?>
 <?php endif; ?>   
    <?php global $wp_query;              
    if ( $wp_query->max_num_pages > 1 ) : ?>  
    
    <div id="pagination-container">
        <div class="container-inner">
            <div id="pagination">
                <span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">←</span> older posts', 'twentyeleven' ) ); ?></span>  
                <span class="nav-next"><?php previous_posts_link( __( 'newer posts <span class="meta-nav">→</span>', 'twentyeleven' ) ); ?></span>  
                <div class="clear"></div>
            </div>
        </div>
    </div>
    
    <?php endif;  ?>
    
    <?php get_footer(); ?>
    
</div>






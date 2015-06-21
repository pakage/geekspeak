<?php
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

<?php if (have_posts()) : ?>
<div id="main-container">
    
    <div class="content-container">
        <div class="container-inner">
            <div class="post">
                <h1>Browse Articles by Category</h1>
                <div class="post-entry">
                    You are currently browsing articles in the "<?php 
                    $category = get_the_category(); 
                    echo $category[0]->name;
                    ?>" category.
                </div>
                <?php //echo "<pre>".print_r($article,true)."</pre>"; ?>
            </div>
        </div>
    </div>
    
    <?php while (have_posts()) : the_post(); ?>
    <div class="content-container">
        <div class="container-inner">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>

                <div class="post-data">
                    Posted in <?php echo get_the_category_list(', '); ?> on <?php echo get_the_date(); ?>
                </div><!-- end of .post-data -->             

                <div class="post-entry">
                    <?php the_excerpt(); ?>
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
    </div>
    <?php endwhile; ?>
    
    <?php global $wp_query;              
    if ( $wp_query->max_num_pages > 1 ) : ?>  
    
    <div id="pagination-container">
        <div class="container-inner">
            <div id="pagination">
                <span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">←</span> older results', 'twentyeleven' ) ); ?></span>  
                <span class="nav-next"><?php previous_posts_link( __( 'newer results <span class="meta-nav">→</span>', 'twentyeleven' ) ); ?></span>  
                <div class="clear"></div>
            </div>
        </div>
    </div>
    
    <?php endif;  ?>
    
    <?php get_footer(); ?>
    
</div>
<?php endif; ?>





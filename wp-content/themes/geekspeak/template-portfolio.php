<?php

/*
Template Name: Portfolio
 */

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

session_start();
$_SESSION['portfolioBack'] = get_permalink( $post->ID );
//echo $_SESSION['portfolioBack'];

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

            </div><!-- end of #post-<?php the_ID(); ?> -->
        </div>
    </div>
    <?php endwhile; ?>
    
    <?php 
    
    //get all children of the portfolio page
    $myQuery = new WP_Query();
    $allPages = $myQuery->query(array('post_type' => 'page', 'posts_per_page' => 999));
    $portfolio =  get_page(6);
    // Filter through all pages and find Portfolio's children
    $children = get_page_children($portfolio->ID, $allPages);
    
    //echo '<pre>'.print_r($children, true).'</pre>';
    
    $pageNumber = get_query_var('paged');
    $postPerPage = get_option('posts_per_page');
    
    $pageChunks = array_chunk($children, $postPerPage);
    
    if(!$pageNumber) $pageNumber = 1;
    
    //echo "<pre>".print_r($children,true)."</pre>";
    
    //echo "<pre>".print_r($pageChunks[$pageNumber-1],true)."</pre>";
    
    ?>
    
    <?php 
    
    if($pageChunks): 
        foreach($pageChunks[$pageNumber-1] as $post): 
        if (has_post_thumbnail( $post->ID ) ){
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        }else{
            $image = false;
        } 
        $awards = get_post_meta($post->ID, 'awards', true);
        ?>
        <a name="<?php the_slug(); ?>"></a>
        <div class="portfolio-container">
            <div class="container-inner">

                <div class="portfolio">
                    <div class="listing-main">
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1 class="post-title">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Check out %s', 'responsive'), the_title_attribute('echo=0')); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h1>

                            <div class="post-data">
                                Posted in <?php echo get_the_category_list(', '); ?> on <?php echo get_the_date(); ?>
                            </div><!-- end of .post-data -->             

                            <?php if($image): ?>
                            <div class="featured-image">
                                <div class="featured-image-inner">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Check out %s', 'responsive'), the_title_attribute('echo=0')); ?>"  class="portfolio-link"><img src="<?php echo $image[0]; ?>" />
                                    <?php if($awards){ ?>
                                    <img src="<?php bloginfo('template_url'); ?>/images/award-medal.png" class="award-medal" />
                                    <?php } ?>
                                    </a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="post-entry">
                                <?php echo the_excerpt(); ?>                   
                            </div><!-- end of .post-entry -->

                            <?php the_meta(); ?>

                            <?php //the_post_thumbnail( 'single-post-thumbnail' ); ?>

                        </div><!-- end of #post-<?php the_ID(); ?> -->
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <?php 
        endforeach;
    endif; 
    ?>
    
    <?php global $wp_query;              
    if ( count($pageChunks) > 1 ) : ?>  
    <div id="pagination-container">
        <div class="container-inner">
            <div id="pagination">
                <?php if($pageNumber < count($pageChunks)): ?>
                <span class="nav-previous"><a href="<?php echo site_url(); ?>/examples/page/<?php echo $pageNumber +1; ?>"><span class="meta-nav">←</span> older work</a></span>
                <?php endif; ?>
                <?php if($pageNumber > 1): ?>
                <span class="nav-next"><a href="<?php echo site_url(); ?>/examples/page/<?php echo $pageNumber -1; ?>">newer work <span class="meta-nav">→</span></a></span> 
                <?php endif; ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php endif;  ?>
    
    <?php get_footer(); ?>
    
</div>
<?php endif; ?>





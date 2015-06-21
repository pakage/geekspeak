<?php

/*
Template Name: Portfolio Single
 */

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header(); ?>

<script type="text/javascript">
    
$(document).ready(function() {
    
    $('.fancybox').fancybox();

});
</script>

<div id="sidebar-container">
    <div class="container-inner">
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
</div>

<?php if (have_posts()) : ?>
<div id="main-container">
    <?php while (have_posts()) : the_post(); 
    
    $currentID = $post->ID;
    ?>
    <div class="content-container">
        <div class="container-inner">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
                
                <?php the_meta(); ?>                
                
                <div class="post-entry">
                    <?php the_content(); ?>
                </div><!-- end of .post-entry -->

                <div class="post-tags">
                    <?php the_tags(__('Tagged with:', 'responsive') . ' ', ', ', '<br />'); ?> 
                </div><!-- end of .post-data -->    
                
                <div id="social-icons">
                    <?php $currentPage = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>
                    <div class="facebook-share share-icon"><a target="e" href="http://facebook.com/sharer.php?u=<?php echo $currentPage; ?>" title="Share on Facebook"></a></div>
                    <div class="twitter-share share-icon"><a target="e" href="http://twitter.com/intent/tweet?text=Check out the portfolio piece i found on geekspeak.co.nz <?php echo $currentPage; ?>" title="Share on Twitter"></a></div>
                    <div class="reddit-share share-icon"><a target="e" href="http://www.reddit.com/submit?url=<?php echo $currentPage; ?>" title="Share on Reddit"></a></div>
                    <div class="linkedin-share share-icon"><a target="e" href="http://www.linkedin.com/shareArticle?url=<?php echo $currentPage; ?>" title="Share on Linkedin"></a></div>
                </div>
                <div class="clear"></div>

            </div><!-- end of #post-<?php the_ID(); ?> -->
        </div>
    </div>
    <?php endwhile; ?>
    
    <?php 
    
    //portfolio page navigation
    
    //get all children of the portfolio page
    $myQuery = new WP_Query();
    $allPages = $myQuery->query(array('post_type' => 'page'));
    $portfolio =  get_page_by_title('Portfolio');
    // Filter through all pages and find Portfolio's children
    $children = get_page_children($portfolio->ID, $allPages);
    
    $counter = 0;
    $pageId = false;
    foreach($children as $post):
        
        if($currentID == $post->ID){
            $pagePos = $counter;
        }
        $counter++;
    endforeach;
        
    ?>  
    <?php if(count($children > 1)): ?>
    <div id="pagination-container">
        <div class="container-inner">
            <div id="pagination">
                <?php if($pagePos < count($children)-1): ?>
                <?php $post = $children[$pagePos+1]; ?>
                <span class="nav-previous"><a href="<?php the_permalink(); ?>"><span class="meta-nav">←</span> older work</a></span>  
                <?php endif; ?>
                <?php if($pagePos > 0): ?>
                <?php $post = $children[$pagePos-1]; ?>
                <span class="nav-next"><a href="<?php the_permalink(); ?>">newer work <span class="meta-nav">→</span></a></span>  
                <?php endif; ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <?php get_footer(); ?>
    
</div>
<?php endif; ?>





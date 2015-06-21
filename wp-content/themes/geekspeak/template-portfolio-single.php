<?php

/*
Template Name: Portfolio Single
 */

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

session_start();

?>
<?php get_header(); ?>

<script type="text/javascript">
    
$(document).ready(function() {
    
    $('.fancybox').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        prevEffect : 'none',
        nextEffect : 'none',
        closeBtn  : false,
        helpers: {
            title: {
                type: 'inside'
            },
            buttons	: {}
        },
        afterLoad : function() {
                //this.title = (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
        }
    });
    
    var galleryId = 1;
    
    //adds a unique rel for each gallery set so they're grouped together in the slide show.
    $('.gallery').each(function(){
       
       $(this).find('a').attr('rel', 'gallery'+galleryId);
              
       galleryId++;
       
    });
    
    $('.gallery a').fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        prevEffect : 'none',
        nextEffect : 'none',
        closeBtn  : false,
        helpers: {
            title: {
                type: 'inside'
            },
            buttons	: {}
        },
        afterLoad : function() {
                //this.title = (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
        }
    });
    
    

});
</script>

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
                
                <div class="back-button">
                    <a class="blue" href="<?php echo $_SESSION['portfolioBack']."#".the_slug(false); ?>"><span>go back</span></a>
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
    $portfolio =  get_page_by_title('Examples');
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





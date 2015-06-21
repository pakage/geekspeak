<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Main Widget Template
 *
 *
 * @file           sidebar.php
 * @package        Techblog 
 * @author         Craig MacGregor
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/techblog/sidebar.php
 * @since          available since Release 1.0
 */
?>


        <div id="widgets" class="grid col-300 fit">
        <?php responsive_widgets(); // above widgets hook ?>
                
            <?php dynamic_sidebar('main-sidebar'); ?>
            
            <?php $categories = get_categories(); ?>
            
            <div class="widget_wrapper widget_categories">
                <div class="widget-title">Browse by Category</div>
                <ul>
                    <?php foreach($categories as $category): ?>
                    <li class="cat-item cat-item-<?php echo $category->term_id; ?>">
                        <a class="silver" href="<?php echo site_url()."/articles/category/".$category->slug; ?>" title="View all posts filed under <?php echo $category->name; ?>">
                            <span><?php echo $category->name; ?></span>
                        </a>
                        <div class="clear"></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="widget_wrapper widget_share">
                <div class="widget-title">Share this page</div>
                    <div id="social-icons">
                        <?php $currentPage = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>
                        <div class="facebook-share share-icon"><a target="e" href="http://facebook.com/sharer.php?u=<?php echo $currentPage; ?>" title="Share this page on Facebook"></a></div>
                        <div class="twitter-share share-icon"><a target="e" href="http://twitter.com/intent/tweet?text=Check out this page i found on geekspeak.co.nz <?php echo $currentPage; ?>" title="Share this page on Twitter"></a></div>
                        <div class="reddit-share share-icon"><a target="e" href="http://www.reddit.com/submit?url=<?php echo $currentPage; ?>" title="Share this page on Reddit"></a></div>
                        <div class="linkedin-share share-icon"><a target="e" href="http://www.linkedin.com/shareArticle?url=<?php echo $currentPage; ?>" title="Share this page on Linkedin"></a></div>
                    </div>
                    <div class="clear"></div>
            </div>
            
        <?php responsive_widgets_end(); // after widgets hook ?>
        </div><!-- end of #widgets -->
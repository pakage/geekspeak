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
            <div id="primary" class="site-content broken-content">
		<div id="content" role="main">
                    <div class="relative-container">
                        <img src="<?php echo bloginfo('template_url').'/images/404.jpg'; ?>" id="broken-link" /> 

                        <div id="broken-text">
                            <h1>Whoops!</h1>
                            <p>We were unable to find the page you were looking for.</p>
                            <p>Try using the search box or browsing by category.</p>
                        </div>
                    </div>
		</div><!-- #content -->
	</div><!-- #primary -->
    </div>
</div>    

<?php get_footer(); ?>

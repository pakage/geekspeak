<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>

<?php //dynamic menu 
$args = array(
    'sort_order' => 'ASC',
    'sort_column' => 'menu_order',
    'parent' => 0,
    'exclude' => 240
    );
$pages = get_pages($args);

?>

<div class="clear"></div>
<div id="footer-container">
        <div class="container-inner">
            <div id="footer">
                <a <?php if($currentPage == get_site_url()."/") echo 'class="selected"'; ?> href="<?php echo get_site_url(); ?>"><span>Articles</span></a>
                <?php foreach($pages as $page): ?>
                <a href="<?php echo get_permalink($page->ID); ?>"><span><?php echo $page->post_title; ?></span></a>
                <?php endforeach; ?>
            <div id="footer-rights">Design and Development by Craig MacGregor, Uppercase Eight Limited. All Rights Reserved.</div>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>
</div><!-- /main-container -->
</div><!-- /site-container -->
</body>
</html>
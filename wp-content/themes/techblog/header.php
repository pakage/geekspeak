<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">

    <title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <link rel="icon" type="image/jpg" href="<?php bloginfo('template_url'); ?>/images/favicon.jpg">
    
    <?php wp_head(); ?>
    
    <?php //dynamic menu 
    $args = array(
        'sort_order' => 'ASC',
        'sort_column' => 'menu_order',
        'parent' => 0,
        'exclude' => 240
        );
    $pages = get_pages($args);
    $counter = 1;
    $currentPage = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    
    $urlParts = explode('/',strtolower($_SERVER['REQUEST_URI']));
    
    ?>
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/main.css?v=<?php echo rand(0,1000); ?>" />
    <!--[if IE]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie.css" /><![endif]-->
    <!--[if IE 8]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie8.css" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie7.css" /><![endif]-->
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/ie6.css" /><![endif]-->
    
    <!-- facebook meta -->
    
    <?php 
    if($currentPage == get_site_url()."/"){ //if home page
        $article = get_page(240);
        $ogTitle = "Geek Speak";
        $ogDescription = $article->post_excerpt;
    }else if(strstr($currentPage, get_site_url()."/articles/category")){ //if categories page
        $category = get_the_category(); 
        $ogTitle = "Geek Speak - ".$category[0]->name;
        $article = get_page(240);
        $ogDescription = $article->post_excerpt;
    }else if(strstr($currentPage, get_site_url()."/articles/tag")){ //if tags page
        $tags = get_the_tags(); 
        $urlParts = explode('/',strtolower($_SERVER['REQUEST_URI']));

        $counter = 0;    
        foreach($urlParts as $urlPart){
            if($urlPart === "tag"){
                $slug = $urlParts[$counter+1];
            }
            $counter++;
        }

        foreach($tags as $tag){
            if($tag->slug == $slug){
                $tagName = $tag->name;
            }                     
        }
        
        $category = get_the_category(); 
        $ogTitle = "Geek Speak - ".$tagName;
        $article = get_page(240);
        $ogDescription = $article->post_excerpt;
    }else{
        $ogTitle = $post->post_title;
        
        if($post->post_excerpt){
            $ogDescription = $post->post_excerpt; 
        }else{
            $ogDescription = (count($post->post_content > 300)) ? substr(strip_tags($post->post_content), 0, 310) : $post->post_content;
        }           
    }
    ?>
    
    <meta property="og:url" content="<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:title" content="<?php echo $ogTitle; ?>" />
    <meta property="og:description" content="<?php echo $ogDescription; ?>" />
    <meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/facebook.jpg" />
    
    <script type="text/javascript">
        reddit_title = "<?php echo $ogTitle; ?>";
    </script>
    
    <!-- Fancybox -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fancybox/lib/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fancybox/source/jquery.fancybox.js?v=2.1.3"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/fancybox/source/jquery.fancybox.css?v=2.1.2" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
    
    
    <?php //User Agent Detection     
    if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')){
        //iOS Mobile
        $siteClass = "ios mobile";
    }else if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad')){
        //iOS Tablet
        $siteClass = "ios tablet";
    }else if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') && strstr($_SERVER['HTTP_USER_AGENT'],'mobile')){
        //Android Mobile
        $siteClass = "android mobile";
    }else if(strstr($_SERVER['HTTP_USER_AGENT'],'Android') && !strstr($_SERVER['HTTP_USER_AGENT'],'mobile')){
        //Android Tablet
        $siteClass = "android tablet";
    }else{
        $siteClass = "desktop";
    }    
    ?>
    
    <!-- google analytics -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-37500584-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
    
</head>

<body <?php body_class(); ?>>
    
<div id="site-container" class="<?php echo $siteClass; ?>">   

    <div id="header"><!-- --></div>
    <div id="mobile-header">
        <img src="<?php bloginfo('template_url'); ?>/images/header-small.jpg" />
    </div>
    
    
    <div id="full-nav">
        <ul>
            <li><a <?php if($currentPage == get_site_url()."/" || strstr($currentPage, get_site_url()."/articles/")) echo 'class="selected"'; ?> href="<?php echo get_site_url(); ?>"><span>ARTICLES</span></a></li>
            <li class="divider"><span>&nbsp;</span></li>
            <?php foreach($pages as $page): ?>
            
                <li><a <?php if(strstr($currentPage, get_permalink($page->ID))) echo 'class="selected"'; ?> href="<?php echo get_permalink($page->ID); ?>"><span><?php echo strtoupper($page->post_title); ?></span></a></li>
                <?php if($counter < count($pages)): ?>
                    <li class="divider"><span>&nbsp;</span></li>
                <?php endif; //isnt last page ?>
                <?php $counter++; ?>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
    
    <div id="mobile-nav">
        <ul>
            <li><a <?php if($currentPage == get_site_url()."/" || strstr($currentPage, get_site_url()."/articles/")) echo 'class="selected"'; ?> href="<?php echo get_site_url(); ?>"><span>ARTICLES</span></a></li>
            <?php foreach($pages as $page): ?>
                <li><a <?php if(strstr($currentPage, get_permalink($page->ID))) echo 'class="selected"'; ?> href="<?php echo get_permalink($page->ID); ?>"><span><?php echo strtoupper($page->post_title); ?></span></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
   
<?php
/* Enqueue Styles */
if ( ! function_exists('haptic_spiel_enqueue_style') ) {
    function haptic_spiel_enqueue_style() {
		    wp_enqueue_style( 'haptic-spiel-custom-style', get_stylesheet_directory_uri() .'/custom-style.css', array(), wp_get_theme()->get('Version') );
    }
    add_action('wp_enqueue_scripts', 'haptic_spiel_enqueue_style');
}

function meta_theme_color() {
?>
    <meta name="theme-color" content="#F0F0F0">
<?php
}

function new_adsense_verification() {
?>
    <meta name="google-adsense-account" content="ca-pub-3530562018061148">
<?php
}

function gtag_js() {
?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L0VKMGTJ9Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-L0VKMGTJ9Q');
    </script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9133096535606449" crossorigin="anonymous"></script>
<?php
}

function og_required() {
    $site_name = get_bloginfo('name');
    echo '<meta property="og:url" content="' . get_permalink() . '" />';
    echo '<meta property="og:site_name" content="' . $site_name . '" />';
    echo '<meta name="twitter:creator" content="@thehaptic" />';
    if( is_single() ) {
        echo '<meta property="og:title" content="' . get_the_title() . ' - ' . $site_name . '" />';
        echo '<meta property="og:type" content="article" />';
        echo '<meta name="twitter:title" content="' . get_the_title() . ' - ' . $site_name . '" />';
    }
}

function og_image() {
    if( is_single() ) {
        $feat_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ($feat_img == false) {
            $feat_img = get_stylesheet_directory_uri() . '/images/ogimage.png';
        }
        echo '<meta property="og:image" content="' . $feat_img . '" />';
        echo '<meta name="twitter:card" content="summary_large_image" />';
        echo '<meta name="twitter:image" content="' . $feat_img . '" />';
    }
}

function google_fonts() {
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai+Looped:wght@400;700&display=swap" rel="stylesheet">
<?php
}

add_action('wp_head', 'meta_theme_color');
add_action('wp_head', 'new_adsense_verification');
add_action('wp_head', 'gtag_js');
add_action('wp_head', 'og_required');
add_action('wp_head', 'og_image');
add_action('wp_head', 'google_fonts');
?>
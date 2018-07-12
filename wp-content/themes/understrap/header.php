<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
    <?php 
    //$seo_description = get_post_meta($post->ID, 'seo_description', true);
    //$seo_keywords = get_post_meta($post->ID, 'seo_keywords', true);
    $seo_description = get_field('seo_description');
    $seo_keywords = get_field('seo_keywords');
    $queried_object = get_queried_object();
    $taxonomy = $queried_object->taxonomy;
    $term_id = $queried_object->term_id;
    $category = get_the_category($post->ID);
    $this_post = get_post($post->ID);
    $desc = $this_post->post_content;
    $description = wp_trim_words( $desc, 15, ' ...' );
    
    ?>
    
    
    <?php if(!empty(get_field('seo_keywords')) and is_singular()):?>
        <meta name="keywords" content="<?php echo $seo_keywords ?>"/>
    <?php elseif(empty(get_field('seo_keywords')) and is_singular()):?>
        <meta name="keywords" content="<?php echo 'Новости, Aurelia, ' . $category[0]->cat_name  ?>"/>
    <?php endif;?>
    
    <?php if(!empty(get_field('seo_description')) and is_singular()):?>
        <meta name="description" content="<?php echo $seo_description ?>"/>
        <?php elseif(empty(get_field('seo_description')) and is_singular()):?>
        <meta name="description" content="<?php echo $description ?>"/>
    <?php endif;?>
    
    <?php 
    if( !empty(get_field('seo_description', $taxonomy . '_' .$term_id) ) and !is_singular()): ?>
        <meta name="description" content="<?php echo ( get_field('seo_description', $taxonomy . '_' .$term_id) ) ?>"/>
    <?php elseif(empty(get_field('seo_description', $taxonomy . '_' .$term_id) ) and !is_singular()):?>
        <meta name="description" content="<?php echo 'Рубрика ' . $category[0]->cat_name .'. Новостной портал Aurelia'  ?>"/>
    <?php endif;?>
    
    <?php if( !empty(get_field('seo_keywords', $taxonomy . '_' .$term_id) ) and !is_singular()): ?>
        <meta name="keywords" content="<?php echo ( get_field('seo_keywords', $taxonomy . '_' .$term_id) ) ?>"/>
    <?php elseif(empty(get_field('seo_keywords', $taxonomy . '_' .$term_id) ) and !is_singular()):?>
        <meta name="keywords" content="<?php echo 'Новости, Aurelia, ' . $category[0]->cat_name  ?>"/>
    <?php endif;?>
    
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark">

		<?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" style="color: #B78B5C;" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
							
						<?php else : ?>

							<a class="navbar-brand" style="color: #B78B5C;;" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->

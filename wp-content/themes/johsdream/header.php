<!DOCTYPE html>
<html lang="en">

<html>
	<head>
		<title>The Techy Zone</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <?php wp_head(); ?>
	</head>
	<body class="is-preload">
		<!-- Page Wrapper -->
        <div id="page-wrapper">

<!-- Header -->
    <header id="header" class="alt">
    <h1>
    <a href="<?php echo home_url(); ?>">
        <?php if (is_front_page() || is_home()) : ?>
            <?php bloginfo('name'); ?>
        <?php elseif (is_category()) : ?>
            <?php single_cat_title(); ?> <!-- Displays the category title -->
        <?php elseif (is_tag()) : ?>
            <?php single_tag_title(); ?> <!-- Displays the tag title -->
        <?php elseif (is_archive()) : ?>
            <?php the_archive_title(); ?> <!-- Displays archive title for other archives -->
        <?php else : ?>
            <?php wp_title(''); ?> <!-- Fallback for other pages -->
        <?php endif; ?>
    </a>
</h1>


        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

<!-- Menu -->
<nav id="menu">
    <div class="inner">
        <h2>Menu</h2>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary-menu', // Matches the location registered in functions.php
            'menu_class'     => 'links',       // Adds a class to the <ul>
            'container'      => false,         // Removes the <div> wrapper
            'fallback_cb'    => false          // No fallback if no menu is assigned
        ) );
        ?>
        <a href="#" class="close">Close</a>
    </div>
</nav>


<!-- Banner -->
<section id="banner">
    <a href="<?php echo home_url(); ?>" class="banner-link">
        <div class="inner">
            <div class="logo"><span class="fa-gem icon"></span></div>
            <h2>The Techy Zone</h2>
            <p>The place where you can learn more about computer parts, tech news, software, and more...</p>
        </div>
    </a>
</section>


</header>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <title>
        <?php
        // Check if it's the front page or home, display site name
        if (is_front_page() || is_home()) {
            echo bloginfo('name');
        } else {
            wp_title('');
        }
        ?>
    </title>

    <?php wp_head(); ?>
</head>

<!-- Get the banner section -->
<?php get_template_part('banner-section'); ?>

<body class="is-preload">
    <!-- Page Wrapper -->
    <div id="page-wrapper">

        <!-- Header Section -->
        <header id="header" class="alt">
            <h1>
                <a href="<?php echo home_url(); ?>">
                    <?php 
                    // Display site name or dynamic page titles
                    if (is_front_page() || is_home()) {
                        bloginfo('name'); // Site name for homepage
                    } elseif (is_category()) {
                        single_cat_title(); // Category title for category pages
                    } elseif (is_tag()) {
                        single_tag_title(); // Tag title for tag pages
                    } elseif (is_archive()) {
                        the_archive_title(); // Archive title for archive pages
                    } else {
                        wp_title(''); // Page title for other pages
                    }
                    ?>
                </a>
            </h1>

            <!-- Navigation Menu -->
            <nav>
                <a href="#menu">Menu</a>
            </nav>

            <!-- Include Navigation Menu -->
            <?php get_template_part('navmenu'); ?>

        </header>
        <!-- End of Header Section -->

    </div> <!-- End of Page Wrapper -->

</body>
</html>

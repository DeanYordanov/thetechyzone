<?php get_header(); ?>

<main>
    <div class="wrapper style1">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Main Content Section -->
            <div class="inner">
                <div class="page-content box">
                    <!-- Start the Loop -->
                    <?php while (have_posts()) : the_post(); ?>
                        <h1 class="major"><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                </div> <!-- End of page-content box -->
            </div> <!-- End of inner -->
        </div> <!-- End of content-wrapper -->
    </div> <!-- End of wrapper -->
</main>

<?php get_footer(); ?>

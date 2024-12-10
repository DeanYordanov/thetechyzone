<?php get_header(); ?>

<main id="main-content">
    <div class="wrapper style1">
        <div class="inner">
            <?php
            // Start the loop for displaying a single review post
            if (have_posts()) : while (have_posts()) : the_post(); 
            ?>
                <section id="post-<?php the_ID(); ?>" class="wrapper spotlight style1">
                    <div class="inner">

                        <!-- Review Content -->
                        <div class="content">
                            <h2 class="major"><?php the_title(); ?></h2>
                            <div class="review-content">
                                <?php the_content(); ?>
                            </div>

                            <!-- Post Meta (Author, Date) -->
                            <p class="post-meta">
                                <span class="author">
                                    By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php the_author(); ?>
                                    </a>
                                </span> | 
                                <span class="date"><?php the_date(); ?></span>
                            </p>
                        </div>
                    </div>
                </section>

                <ul class="actions">
                    <!-- Return to All Reviews Button -->
                    <li>
                        <a href="<?php echo esc_url(get_post_type_archive_link('reviews')); ?>" class="button">
                            Return to All Reviews
                        </a>
                    </li>
                </ul>

            <?php endwhile; else : ?>
                <p>No reviews found.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

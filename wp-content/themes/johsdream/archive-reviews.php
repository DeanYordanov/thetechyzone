<?php get_header(); ?>

<main>
    <div class="wrapper style1">
        <div class="inner">
            <h1 class="major">All Reviews</h1>

            <div class="content-wrapper">
                <div class="main-content">
                    <?php if (have_posts()) : ?>
                        <div class="reviews-list">
                            <?php while (have_posts()) : the_post(); ?>
                                <article class="review-item">
                                    <!-- Display Review Title -->
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                    <!-- Display Review Excerpt or Content -->
                                    <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>

                                    <!-- Link to Full Review -->
                                    <a href="<?php the_permalink(); ?>" class="button">Read Full Review</a>
                                </article>
                            <?php endwhile; ?>
                        </div>

                        <!-- Pagination Links -->
                        <div class="pagination">
                            <?php
                                the_posts_pagination(array(
                                    'mid_size' => 2,
                                    'prev_text' => __('Previous', 'textdomain'),
                                    'next_text' => __('Next', 'textdomain'),
                                ));
                            ?>
                        </div>

                    <?php else : ?>
                        <p>No reviews found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

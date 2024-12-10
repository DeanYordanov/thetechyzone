<?php get_header(); ?>

<div class="wrapper style1">
    <div class="inner">
        <?php
        // Start the Loop
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
        ?>
            <!-- Single Post -->
            <section id="post-<?php the_ID(); ?>" class="wrapper spotlight style1">
                <div class="inner">
                    <!-- Post Thumbnail -->
                    <a href="<?php the_permalink(); ?>" class="image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                    </a>

                    <!-- Post Content -->
                    <div class="content">
                        <h2 class="major"><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>
                    </div>
                </div>
            </section>

            <!-- Post Meta -->
            <section class="post-meta">
    <div class="inner">
        <p class="post-info">
            <span class="author">
                By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                    <?php the_author(); ?>
                </a>
            </span> | 
            <span class="date"><?php the_date(); ?></span> | 
            <span class="category"><?php the_category(', '); ?></span>
        </p>
    </div>
</section>

            <?php
            // End the loop
            endwhile;
        else :
            echo '<p>No content found.</p>';
        endif;
        ?>

        <!-- Related Posts Section -->
        <section id="related-posts" class="wrapper alt style1">
            <div class="inner">
                <h2 class="major">Related articles</h2>
                <section class="features">
                    <?php
                    // Get related posts based on categories
                    $categories = get_the_category();
                    if ($categories) {
                        $category_ids = array();
                        foreach ($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }

                        $related_posts = new WP_Query(array(
                            'category__in' => $category_ids,
                            'posts_per_page' => 4,
                            'post__not_in' => array(get_the_ID()), // Exclude the current post
                            'orderby' => 'rand' // Randomly display related posts
                        ));

                        if ($related_posts->have_posts()) :
                            while ($related_posts->have_posts()) : $related_posts->the_post();
                    ?>
                                <article>
                                    <a href="<?php the_permalink(); ?>" class="article-link">
                                        <!-- Post Thumbnail -->
                                        <div class="image">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                                            <?php endif; ?>
                                        </div>

                                        <!-- Post Title -->
                                        <h3 class="major"><?php the_title(); ?></h3>

                                        <!-- Post Excerpt -->
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                                    </a>
                                </article>

                    <?php
                            endwhile;
                        else :
                            echo '<p>No related posts found.</p>';
                        endif;
                        wp_reset_postdata();
                    }
                    ?>
</section> <!-- End of post-content section -->

                        <ul class="actions">
                        <!-- Previous Article Button -->
                            <li>
                                <?php
                                $prev_post = get_previous_post();
                                if ($prev_post) :
                                    ?>
                                    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="button">
                                        Previous Article
                                    </a>
                                <?php endif; ?>
                            </li>
                            <!-- Return to Home Button -->
                            <li>
                                <a href="<?php echo esc_url(home_url()); ?>" class="button">
                                    Return to Home
                                </a>
                            </li>
                            <!-- Next Article Button -->
                            <li>
                                <?php
                                $next_post = get_next_post();
                                if ($next_post) :
                                    ?>
                                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="button">
                                        Next Article
                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>

                        </div> <!-- End of inner -->
</section> <!-- End of single post section -->


    </div>
</div>

<?php get_footer(); ?>

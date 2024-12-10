<section id="four" class="wrapper alt style2">
    <div class="inner">
        <h2 class="major">Learn More</h2>
        <section class="features">
            <?php
            // Fetch additional posts
            $additional_posts = new WP_Query(array(
                'posts_per_page' => 4, // Adjust as needed
                'offset' => 5, // Skip the first 5 posts displayed above
                'post_status' => 'publish',
            ));

            if ($additional_posts->have_posts()) :
                while ($additional_posts->have_posts()) : $additional_posts->the_post();
            ?>
                    <article class="box">
                        <!-- Post Image -->
                        <a href="<?php the_permalink(); ?>" class="image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
                            <?php endif; ?>
                        </a>
                        <!-- Post Title -->
                        <h3 class="major"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <!-- Post Excerpt -->
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                    </article>
            <?php
                endwhile;
            else :
                echo '<p>No additional posts found.</p>';
            endif;
            wp_reset_postdata();
            ?>
        </section>
                <!--Reviews button-->
        <ul class="actions">
        <li><a href="<?php echo esc_url(get_post_type_archive_link('reviews')); ?>" class="button">Check our Custom Post Type Reviews</a></li>
        </ul>
    </div>
</section>
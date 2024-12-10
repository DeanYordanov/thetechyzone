 <!-- Latest Posts Section -->
 <?php
$latest_posts = new WP_Query(array(
    'posts_per_page' => 3, // Number of posts to display
    'post_status' => 'publish', // Only published posts
));
$counter = 0; // Counter to toggle between styles
?>
<?php if ($latest_posts->have_posts()) : ?>
    <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
        <section id="post-<?php the_ID(); ?>" class="wrapper <?php echo ($counter % 2 == 0) ? 'spotlight style2' : 'alt style1'; ?>">
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
                    <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                    
                    <!-- Post Meta: Author, Date, and Category -->
                    <p class="post-meta">
                        <span class="author">
                            By <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                <?php the_author(); ?>
                            </a>
                        </span> | 
                        <span class="date">
                            <a href="<?php echo esc_url(get_month_link(get_the_date('Y'), get_the_date('m'))); ?>">
                                <?php the_date(); ?>
                            </a>
                        </span> | 
                        <span class="category">
                            <?php
                                $categories = get_the_category();
                                if (!empty($categories)) :
                                    foreach ($categories as $category) :
                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a> ';
                                    endforeach;
                                endif;
                            ?>
                        </span>
                    </p>

                    <!-- Learn More Link -->
                    <a href="<?php the_permalink(); ?>" class="special">Learn more</a>
                </div>
            </div>
        </section>
        <?php $counter++; // Increment counter to alternate styles ?>
    <?php endwhile; ?>
<?php else : ?>
    <p>No posts found.</p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
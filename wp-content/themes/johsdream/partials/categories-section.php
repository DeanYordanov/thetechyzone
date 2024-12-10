<section id="five" class="wrapper alt style4">
    <div class="inner">
        <h2 class="major">Categories</h2>
        <p>Browse through some of our amazing categories and discover related content!</p>
        <section class="features">
            <?php
            // WP_Query to get categories
            $args = array(
                'taxonomy'   => 'category', // Querying categories
                'orderby'    => 'name',     // Sort by name
                'order'      => 'ASC',      // Ascending order
                'number'     => 4,          // Limit to 4 categories
                'hide_empty' => true        // Only show categories with posts
            );

            $categories_query = new WP_Term_Query($args);

            if (!empty($categories_query->terms)) :
                foreach ($categories_query->terms as $category) :
                    // Fetch the category image from ACF or other method
                    $category_image = get_field('category_image', 'category_' . $category->term_id);

                    // Fallback Image
                    if (!$category_image) {
                        $category_image = array(
                            'url' => get_template_directory_uri() . '/images/default-category.jpg'
                        );
                    }
                    ?>
                    <article class="box">
                        <!-- Category Image -->
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" class="image">
                            <img src="<?php echo esc_url($category_image['url']); ?>" alt="<?php echo esc_attr($category->name); ?>" />
                        </a>
                        <!-- Category Name -->
                        <h3 class="major">
                            <a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a>
                        </h3>
                        <!-- Category Description -->
                        <p>
                            <?php echo esc_html($category->description); ?>
                        </p>
                    </article>
            <?php endforeach;
            else :
                echo '<p>No categories found.</p>';
            endif;
            ?>
        </section>
    </div>
</section>
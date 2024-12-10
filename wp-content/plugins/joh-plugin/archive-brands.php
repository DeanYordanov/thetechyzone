<?php get_header(); ?>

<section id="brands-archive">
    <h1>The Brands</h1>
    <h2>Welcome to the Clicking Brands game. Click as much as you like your favourite brands and show the competitors who is the best!!!</h2>
    <div class="brands-list">

        <?php 
        // Retrieve the options
        $show_brand_locations = get_option('joh_show_brand_locations', 1); // Default is to show Brand Locations
        $show_brand_ceos = get_option('joh_show_brand_ceos', 1);           // Default is to show Brand CEOs
        
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
                // Get custom fields (ACF)
                $company_ceo = get_field('company_ceo'); // Get the CEO
                $brand_location = get_the_terms(get_the_ID(), 'brand_location'); // Get the brand location
                $clicks = get_post_meta(get_the_ID(), '_brand_clicks', true) ?: 0; // Get the number of clicks
                $brand_id = get_the_ID(); // Get the current brand ID
        ?>
                <div class="brand-item" data-brand-id="<?php echo esc_attr($brand_id); ?>">
                    <div class="brand-details">
                        <h3 class="brand-title"><?php the_title(); ?></h3>

                        <!-- Display CEO if the setting allows -->
                        <?php if ($show_brand_ceos): ?>
                            <div class="brand-ceo">
                                <strong>CEO:</strong> <?php echo esc_html($company_ceo); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Display Location if the setting allows -->
                        <?php if ($show_brand_locations): ?>
                            <div class="brand-location">
                                <strong>Location:</strong> 
                                <?php if (!empty($brand_location)) : ?>
                                    <?php echo esc_html($brand_location[0]->name); ?>
                                <?php else : ?>
                                    <span>Location not specified</span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="brand-clicks clicks-count" data-brand-id="<?php echo esc_attr($brand_id); ?>">
                        <span>Clicks: <?php echo esc_html($clicks); ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>

        <?php else : ?>
            <p>No brands found.</p>
        <?php endif; ?>
    </div>
    <h2>More brands coming soon...</h2>
</section>

<?php get_footer(); ?>

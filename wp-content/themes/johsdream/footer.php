<section id="footer">
    <div class="inner">
        <h2 class="major"><?php echo esc_html(get_theme_mod('footer_title', 'Get in Touch')); ?></h2>
        <p><?php echo esc_html(get_theme_mod('footer_description', 'Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.')); ?></p>

        <!-- Contact Information -->
		<ul class="contact">
    <li class="icon solid fa-home">
        <?php echo esc_html(get_theme_mod('footer_address', 'Untitled Inc.<br />1234 Somewhere Road Suite #2894<br />Nashville, TN 00000-0000')); ?>
    </li>
    <li class="icon solid fa-phone"><?php echo esc_html(get_theme_mod('footer_phone', '(000) 000-0000')); ?></li>
    <li class="icon solid fa-envelope"><a href="mailto:<?php echo esc_html(get_theme_mod('footer_email', 'information@untitled.tld')); ?>"><?php echo esc_html(get_theme_mod('footer_email', 'information@untitled.tld')); ?></a></li>
        <!-- Copyright Information -->
        <ul class="copyright">
            <li>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved', 'textdomain'); ?></li>
            <li>Design: <a href="http://html5up.net" target="_blank"><?php esc_html_e('HTML5 UP', 'textdomain'); ?></a></li>
            
        </ul>
    </div>
</ul>
</section>

<?php wp_footer(); ?>
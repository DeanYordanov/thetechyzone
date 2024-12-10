
<nav id="menu">
    <div class="inner">
        <h2>Menu</h2>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary-menu', // Matches the location registered in functions.php
            'menu_class'     => 'links',       // Adds a class to the <ul>
            'container'      => true,         // Removes the <div> wrapper
            'fallback_cb'    => false          // No fallback if no menu is assigned
        ) );
        ?>
        <a href="#" class="close">Close</a>
    </div>
</nav>
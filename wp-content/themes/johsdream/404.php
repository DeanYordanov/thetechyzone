<?php
// Include header
get_header();
?>
<div id="page-wrapper">
    <!-- Header -->
    <header id="header">
        <h1><a href="<?php echo home_url(); ?>">Hardware stuff</a></h1>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo home_url('/generic'); ?>">Generic</a></li>
                <li><a href="<?php echo home_url('/elements'); ?>">Elements</a></li>
                <li><a href="<?php echo wp_login_url(); ?>">Log In</a></li>
                <li><a href="<?php echo wp_registration_url(); ?>">Sign Up</a></li>
            </ul>
            <a href="#" class="close">Close</a>
        </div>
    </nav>


        <div class="wrapper">
            <div class="inner">
                <section>
                    <h3 class="major">404 - Page Not Found</h3>
                    <p>Maybe the page moved? Or was abducted by aliens? Either way, let's get you back on track:</p>
                    <ul class="actions">
                        <li><a href="<?php echo home_url(); ?>" class="button primary">Return to Homepage</a></li>
                    </ul>
                </section>

                <section>
                    <h3 class="major">Meanwhile, here’s a joke to cheer you up:</h3>
                    <blockquote>
                        Why don’t programmers like nature?<br />
                        <strong>It has too many bugs!</strong>
                    </blockquote>
                </section>
            </div>
        </div>
    </section>


<!-- Include footer -->
<?php
get_footer();
?>

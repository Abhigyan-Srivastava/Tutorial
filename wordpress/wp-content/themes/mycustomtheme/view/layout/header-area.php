<?php get_header();?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                        <?php if (get_theme_mod('logo')) : ?>
                            <img src="<?php echo get_theme_mod('logo'); ?>" alt="Logo">
                        <?php else : ?>
                            <h1><?php bloginfo('name'); ?></h1>
                        <?php endif; ?>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Dynamic Menu Start ***** -->
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'menu_class' => 'nav',
                        'container' => false,
                        // 'walker' => new WP_Bootstrap_Navwalker(), // Optional for Bootstrap support
                    ));
                    ?>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
</body>
</html>

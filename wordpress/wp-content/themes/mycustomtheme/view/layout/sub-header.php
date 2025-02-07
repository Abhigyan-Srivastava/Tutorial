<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul class="info">
                    <li><i class="fa fa-envelope"></i> <?php echo get_theme_mod('email_address'); ?></li>
                    <li><i class="fa fa-map"></i> <?php echo get_theme_mod('location'); ?></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="social-links">
                    <?php if (get_theme_mod('facebook_link')) : ?>
                        <li><a href="<?php echo get_theme_mod('facebook_link'); ?>"><i class="fab fa-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if (get_theme_mod('linkedin_link')) : ?>
                        <li><a href="<?php echo get_theme_mod('linkedin_link'); ?>"><i class="fab fa-linkedin"></i></a></li>
                    <?php endif; ?>
                    <?php if (get_theme_mod('instagram_link')) : ?>
                        <li><a href="<?php echo get_theme_mod('instagram_link'); ?>"><i class="fab fa-instagram"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
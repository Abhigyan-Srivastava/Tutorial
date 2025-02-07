<div class="properties section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 offset-lg-4">
        <div class="section-heading text-center">
          <h6>| Properties</h6>
          <h2>We Provide The Best Property You Like</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      if (!current_theme_supports('post-thumbnails')) {
          add_theme_support('post-thumbnails');
      }

      $args = array(
        'post_type'      => 'property',
        'posts_per_page' => 3,
        'orderby' => 'rand',
      );
      $properties = new WP_Query($args);

      if ($properties->have_posts()) {
        while ($properties->have_posts()) {
          $properties->the_post();
          $property_price = get_post_meta(get_the_ID(), 'property_price', true);
          $property_terms = get_the_terms(get_the_ID(), 'property_category');
          $property_category = !empty($property_terms) ? $property_terms[0]->name : 'Uncategorized';
          $property_bedrooms = get_post_meta(get_the_ID(), 'property_bedrooms', true);
          $property_bathrooms = get_post_meta(get_the_ID(), 'property_bathrooms', true);
          $property_area = get_post_meta(get_the_ID(), 'property_area', true);
          $property_floor = get_post_meta(get_the_ID(), 'property_floor', true);
          $property_parking = get_post_meta(get_the_ID(), 'property_parking', true);
      ?>
          <div class="col-lg-4 col-md-6">
            <div class="item">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                <?php else : ?>
                  <?php
                  $image_id = get_post_meta(get_the_ID(), 'property_image', true);
                  if ($image_id) {
                    $image_url = wp_get_attachment_image_src($image_id, 'full');
                    if (!empty($image_url[0])) {
                  ?>
                      <img src="<?php echo esc_url($image_url[0]); ?>" class="img-fluid" alt="Property Image">
                  <?php 
                    } 
                  } else { 
                  ?>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/property-02.jpg'; ?>" class="img-fluid" alt="Default Image">
                  <?php } ?>
                <?php endif; ?>
              </a>
              <?php
              $property_terms = get_the_terms(get_the_ID(), 'property_category');
              $property_category = !empty($property_terms) ? $property_terms[0]->name : 'Uncategorized';
              ?>
              <span class="category"><?php echo esc_html($property_category); ?></span>
              <h6><?php echo esc_html($property_price); ?></h6>
              <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <ul>
                <li>Bedrooms: <span><?php echo esc_html($property_bedrooms); ?></span></li>
                <li>Bathrooms: <span><?php echo esc_html($property_bathrooms); ?></span></li>
                <li>Area: <span><?php echo esc_html($property_area); ?></span></li>
                <li>Floor: <span><?php echo esc_html($property_floor); ?></span></li>
                <li>Parking: <span><?php echo esc_html($property_parking); ?></span></li>
              </ul>
              <div class="main-button">
                <a href="<?php the_permalink(); ?>">Schedule a visit</a>
              </div>
            </div>
          </div>
        <?php
        }
        wp_reset_postdata();
      } else {
        echo '<p class="text-center">No properties found.</p>';
      }
      ?>
    </div>
  </div>
</div>
<div class="section best-deal">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="section-heading">
          <h6>| Best Deal</h6>
          <h2>Find Your Best Deal Right Now!</h2>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="tabs-content">
          <div class="row">
            <div class="nav-wrapper ">
              <ul class="nav nav-tabs" role="tablist">
                <?php
                $args = array(
                  'post_type' => 'property',
                  'posts_per_page' => -1,
                  'orderby' => 'rand',
                );
                $categories = get_terms(array(
                  'taxonomy' => 'property_category',
                  'hide_empty' => false,
                ));
                shuffle($categories);
                $categories = array_slice($categories, 0, 3);
                foreach ($categories as $category) :
                ?>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link <?php if ($category->term_id == $categories[0]->term_id) echo 'active'; ?>" id="<?php echo $category->slug; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $category->slug; ?>" type="button" role="tab" aria-controls="<?php echo $category->slug; ?>" aria-selected="true"><?php echo $category->name; ?></button>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="tab-content" id="myTabContent">
              <?php
              foreach ($categories as $category) :
              ?>
                <div class="tab-pane fade <?php if ($category->term_id == $categories[0]->term_id) echo 'show active'; ?>" id="<?php echo $category->slug; ?>" role="tabpanel" aria-labelledby="<?php echo $category->slug; ?>-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <?php
                          $args = array(
                            'post_type' => 'property',
                            'posts_per_page' => 1,
                            'tax_query' => array(
                              array(
                                'taxonomy' => 'property_category',
                                'field'    => 'term_id',
                                'terms'    => $category->term_id,
                              ),
                            ),
                          );
                          $properties = new WP_Query($args);
                          if ($properties->have_posts()) :
                            while ($properties->have_posts()) :
                              $properties->the_post();
                              $property_price = get_post_meta(get_the_ID(), 'property_price', true);
                              $property_bedrooms = get_post_meta(get_the_ID(), 'property_bedrooms', true);
                              $property_bathrooms = get_post_meta(get_the_ID(), 'property_bathrooms', true);
                              $property_area = get_post_meta(get_the_ID(), 'property_area', true);
                              $property_floor = get_post_meta(get_the_ID(), 'property_floor', true);
                              $property_parking = get_post_meta(get_the_ID(), 'property_parking', true);
                          ?>
                              <li>Total Flat Space <span><?php echo $property_area; ?></span></li>
                              <li>Floor number <span><?php echo $property_floor; ?></span></li>
                              <li>Number of rooms <span><?php echo $property_bedrooms; ?></span></li>
                              <li>Parking Available <span><?php echo $property_parking; ?></span></li>
                              <li>Payment Process <span>Bank</span></li>
                          <?php
                            endwhile;
                            wp_reset_postdata();
                          endif;
                          ?>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <?php
                      $args = array(
                        'post_type' => 'property',
                        'posts_per_page' => 1,
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'property_category',
                            'field'    => 'term_id',
                            'terms'    => $category->term_id,
                          ),
                        ),
                      );
                      $properties = new WP_Query($args);
                      if ($properties->have_posts()) :
                        while ($properties->have_posts()) :
                          $properties->the_post();
                          if (has_post_thumbnail()) :
                            the_post_thumbnail('full', ['class' => 'img-fluid']);
                          else :
                            $image_id = get_post_meta(get_the_ID(), 'property_image', true);
                            if ($image_id) :
                              $image_url = wp_get_attachment_image_src($image_id, 'full');
                              if (!empty($image_url[0])) :
                      ?>
                                <img src="<?php echo esc_url($image_url[0]); ?>" class="img-fluid" alt="Property Image">
                              <?php
                              endif;
                            else :
                              ?>
                              <img src="<?php echo get_template_directory_uri() . '/assets/images/deal-01.jpg'; ?>" class="img-fluid" alt="Default Image">
                      <?php
                            endif;
                          endif;
                        endwhile;
                        wp_reset_postdata();
                      endif;
                      ?>
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About <?php echo $category->name; ?></h4>
                      <?php
                      $args = array(
                        'post_type' => 'property',
                        'posts_per_page' => 1,
                        'tax_query' => array(
                          array(
                            'taxonomy' => 'property_category',
                            'field'    => 'term_id',
                            'terms'    => $category->term_id,
                          ),
                        ),
                      );
                      $properties = new WP_Query($args);
                      if ($properties->have_posts()) :
                        while ($properties->have_posts()) :
                          $properties->the_post();
                          $extra_info = get_post_meta(get_the_ID(), 'property_extra_info', true);
                      ?>
                          <p><?php echo esc_html($extra_info); ?></p>
                      <?php
                        endwhile;
                        wp_reset_postdata();
                      endif;
                      ?>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
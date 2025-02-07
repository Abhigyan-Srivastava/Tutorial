<?php
$args = array(
    'post_type' => 'property',
    'posts_per_page' => -1,
    'orderby' => 'rand',
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    $featured_image = array();
    $featured_area = array();

    while ($query->have_posts()) {
        $query->the_post();
        $featured_image[] = get_the_post_thumbnail_url();
        $featured_area[] = get_post_meta(get_the_ID(), 'property_area', true);
    }
    wp_reset_postdata();

    $random_index = array_rand($featured_image);
    $random_image = $featured_image[$random_index];
    $random_area = $featured_area[$random_index];
}
?>

<div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="<?php echo $random_image; ?>" alt="">
            <a href="property-details.html"><img src="/tutorial/wordpress/wp-content/themes/mycustomtheme/assets/images/featured-icon.png" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2>Best Appartment &amp; Sea view</h2>
          </div>
          <div class="accordion" id="accordionExample">
            <?php
            $args = array(
                'post_type' => 'property',
                'posts_per_page' => -1,
                'orderby' => 'rand',
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
                $index = 1;
                while ($query->have_posts()) {
                    $query->the_post();
                    $faq_data = get_post_meta(get_the_ID(), '_property_faq', true);
                    if (!empty($faq_data)) {
                        foreach ($faq_data as $faq) {
            ?>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="true" aria-controls="collapse<?php echo $index; ?>">
                                  <?php echo $faq['question']; ?>
                                </button>
                              </h2>
                              <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <?php echo $faq['answer']; ?>
                                </div>
                              </div>
                            </div>
            <?php
                            $index++;
                        }
                    }
                }
                wp_reset_postdata();
            }
            ?>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="/tutorial/wordpress/wp-content/themes/mycustomtheme/assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4><?php echo $random_area; ?><br><span>Total Flat Space</span></h4>
              </li>
              <li>
                <img src="/tutorial/wordpress/wp-content/themes/mycustomtheme/assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Contract<br><span>Contract Ready</span></h4>
              </li>
              <li>
                <img src="/tutorial/wordpress/wp-content/themes/mycustomtheme/assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>Payment Process</span></h4>
              </li>
              <li>
                <img src="/tutorial/wordpress/wp-content/themes/mycustomtheme/assets/images/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Under Control</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
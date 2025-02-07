<?php get_header(); ?>

<?php
    require __DIR__.'/view/components/pre-loader.php';

    require __DIR__.'/view/layout/sub-header.php';

    require __DIR__.'/view/layout/header-area.php';

    // require __DIR__.'/view/layout/page-heading-single-property.php';
    
?>

<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>  /  Single Property</span>
          <h3><?php the_title(); ?></h3>
        </div>
      </div>
    </div>
</div>

<?php
  $property_id = get_the_ID();
  $property_price = get_post_meta($property_id, 'property_price', true);
  $property_terms = get_the_terms($property_id, 'property_category');
  $property_category = !empty($property_terms) ? $property_terms[0]->name : 'Uncategorized';
  $property_bedrooms = get_post_meta($property_id, 'property_bedrooms', true);
  $property_bathrooms = get_post_meta($property_id, 'property_bathrooms', true);
  $property_area = get_post_meta($property_id, 'property_area', true);
  $property_floor = get_post_meta($property_id, 'property_floor', true);
  $property_parking = get_post_meta($property_id, 'property_parking', true);
?>

<div class="single-property section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="main-image">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
          <?php else : ?>
            <?php
            $image_id = get_post_meta($property_id, 'property_image', true);
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
        </div>
        <div class="main-content">
          <span class="category"><?php echo esc_html($property_category); ?></span>
          <h4><?php the_title(); ?></h4>
          <p><?php the_content(); ?></p>
        </div>
        <div class="main-content">
            <p>Get <strong>the best villa agency</strong> HTML CSS Bootstrap Template for your company website. TemplateMo provides you the <a href="https://www.google.com/search?q=best+free+css+templates" target="_blank">best free CSS templates</a> in the world. Please tell your friends about it. Thank you. Cloud bread kogi bitters pitchfork shoreditch tumblr yr succulents single-origin coffee schlitz enamel pin you probably haven't heard of them ugh hella.
            
            <br><br>When you look for free CSS templates, you can simply type TemplateMo in any search engine website. In addition, you can type TemplateMo Digital Marketing, TemplateMo Corporate Layouts, etc. Master cleanse +1 intelligentsia swag post-ironic, slow-carb chambray knausgaard PBR&B DSA poutine neutra cardigan hoodie pop-up.</p>
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
      <div class="col-lg-4">
        <div class="info-table">
          <ul>
            <li>
              <img src="/tutorial/wordpress/wp-content/themes/mycustomtheme/assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
              <h4><?php echo esc_html($property_area); ?><br><span>Total Flat Space</span></h4>
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

<?php 
  require __DIR__.'/view/layout/best-deal-section.php';
?>

<?php get_footer(); ?> 
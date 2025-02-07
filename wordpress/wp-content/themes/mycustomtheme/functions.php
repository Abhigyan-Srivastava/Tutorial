<?php
function mycustomtheme_enqueue_styles() {
    // echo get_template_directory_uri();
   wp_enqueue_style('mycustomtheme-style', get_template_directory_uri(). '/style.css');
   wp_enqueue_style('mycustomtheme-bootstrap', get_template_directory_uri(). '/vendor/bootstrap/css/bootstrap.min.css');
   wp_enqueue_style('mycustomtheme-font-awesome', get_template_directory_uri(). '/assets/css/fontawesome.css');
   wp_enqueue_style('mycustomtheme-templatemo-villa-agency', get_template_directory_uri(). '/assets/css/templatemo-villa-agency.css');
   wp_enqueue_style('mycustomtheme-owl', get_template_directory_uri(). '/assets/css/owl.css');
   wp_enqueue_style('mycustomtheme-animate', get_template_directory_uri(). '/assets/css/animate.css');

   wp_enqueue_script('mycustomtheme-script-jquery', get_template_directory_uri().'/vendor/jquery/jquery.min.js');
   wp_enqueue_script('mycustomtheme-script-bootstrap-min', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js');
   wp_enqueue_script('mycustomtheme-script-isotope', get_template_directory_uri().'/assets/js/isotope.min.js');
   wp_enqueue_script('mycustomtheme-script-owl-carousel', get_template_directory_uri().'/assets/js/owl-carousel.js', [], '1.0.1', true);
   wp_enqueue_script('mycustomtheme-script-counter', get_template_directory_uri().'/assets/js/counter.js');
   wp_enqueue_script('mycustomtheme-script-custom', get_template_directory_uri().'/assets/js/custom.js', array(), '1.0.0', true);
   
}
add_action( 'wp_enqueue_scripts', 'mycustomtheme_enqueue_styles' );

function create_property_post_type() {
    add_theme_support( 'post-thumbnails' );

    register_post_type('property',
        array(
            'labels' => array(
                'name' => __('Properties'),
                'singular_name' => __('Property'),
                'add_new' => __('Add New Property'),
                'add_new_item' => __('Add New Property'),
                'edit_item' => __('Edit Property'),
                'new_item' => __('New Property'),
                'view_item' => __('View Property'),
                'search_items' => __('Search Properties'),
                'not_found' => __('No properties found'),
                'not_found_in_trash' => __('No properties found in trash'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'properties'),
        )
    );
}
add_action('init', 'create_property_post_type');

function add_property_meta_boxes() {
    add_meta_box(
        'property_details',
        __('Property Details'),
        'property_details_meta_box',
        'property',
        'advanced',
        'high'
    );

    add_meta_box(
        'property_extra_info',
        __('Extra Info'),
        'property_extra_info_meta_box_callback',
        'property',
        'advanced',
        'high'
    );

    add_meta_box(
        'property_faq',
        __('FAQ Section'),
        'property_faq_meta_box',
        'property',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_property_meta_boxes');

function add_property_extra_info_meta_box() {
    add_meta_box(
        'property_extra_info',
        __('Extra Info'),
        'property_extra_info_meta_box_callback',
        'property',
        'advanced',
        'high'
    );
}
add_action('add_meta_boxes', 'add_property_extra_info_meta_box');

function property_extra_info_meta_box_callback() {
    global $post;
    $extra_info = get_post_meta($post->ID, 'property_extra_info', true);
    ?>
    <textarea name="property_extra_info" id="property_extra_info" cols="30" rows="5"><?php echo esc_html($extra_info); ?></textarea>
    <?php
}

function save_property_extra_info_meta_box($post_id) {
    if (isset($_POST['property_extra_info'])) {
        update_post_meta($post_id, 'property_extra_info', sanitize_text_field($_POST['property_extra_info']));
    }
}
add_action('save_post', 'save_property_extra_info_meta_box');

function property_details_meta_box() {
    global $post;
    $property_price = get_post_meta($post->ID, 'property_price', true);
    $property_terms = get_the_terms($post->ID, 'property_category');
    $property_category = !empty($property_terms) ? $property_terms[0]->term_id : '';
    $property_bedrooms = get_post_meta($post->ID, 'property_bedrooms', true);
    $property_bathrooms = get_post_meta($post->ID, 'property_bathrooms', true);
    $property_area = get_post_meta($post->ID, 'property_area', true);
    $property_floor = get_post_meta($post->ID, 'property_floor', true);
    $property_parking = get_post_meta($post->ID, 'property_parking', true);

    $categories = get_terms(array(
        'taxonomy' => 'property_category',
        'hide_empty' => false,
    ));

    ?>
    <table>
        <tr>
            <td><label for="property_price">Price:</label></td>
            <td><input type="text" id="property_price" name="property_price" value="<?php echo $property_price; ?>"></td>
        </tr>
        <tr>
            <td><label for="property_category">Category:</label></td>
            <td>
                <select id="property_category" name="property_category">
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category->term_id; ?>" <?php selected($property_category, $category->term_id); ?>><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="property_bedrooms">Bedrooms:</label></td>
            <td><input type="text" id="property_bedrooms" name="property_bedrooms" value="<?php echo $property_bedrooms; ?>"></td>
        </tr>
        <tr>
            <td><label for="property_bathrooms">Bathrooms:</label></td>
            <td><input type="text" id="property_bathrooms" name="property_bathrooms" value="<?php echo $property_bathrooms; ?>"></td>
        </tr>
        <tr>
            <td><label for="property_area">Area:</label></td>
            <td><input type="text" id="property_area" name="property_area" value="<?php echo $property_area; ?>"></td>
        </tr>
        <tr>
            <td><label for="property_floor">Floor:</label></td>
            <td><input type="text" id="property_floor" name="property_floor" value="<?php echo $property_floor; ?>"></td>
        </tr>
        <tr>
            <td><label for="property_parking">Parking:</label></td>
            <td><input type="text" id="property_parking" name="property_parking" value="<?php echo $property_parking; ?>"></td>
        </tr>
    </table>
    <?php
}

function property_faq_meta_box($post) {
    $faq_data = get_post_meta($post->ID, '_property_faq', true);
    ?>
    <div id="faq-container">
        <label><input type="checkbox" id="add-faq-checkbox" name="add_faq"> Add FAQ</label>
        <div id="faq-fields" style="display: none;">
            <?php if (!empty($faq_data)) : ?>
                <?php foreach ($faq_data as $index => $faq) : ?>
                    <div class="faq-item">
                        <label for="faq_question">Question:</label>
                        <input type="text" name="faq_question[]" class="faq-question" value="<?php echo esc_html($faq['question']); ?>">
                        <label for="faq_answer">Answer:</label>
                        <textarea name="faq_answer[]" class="faq-answer"><?php echo esc_html($faq['answer']); ?></textarea>
                        <button type="button" class="remove-faq-item">Remove</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <button type="button" class="add-faq-item">Add New FAQ</button>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            $('#add-faq-checkbox').change(function() {
                if (this.checked) {
                    $('#faq-fields').show();
                } else {
                    $('#faq-fields').hide();
                }
            });

            $('.add-faq-item').click(function() {
                var faqItem = '<div class="faq-item">';
                faqItem += '<label for="faq_question">Question:</label>';
                faqItem += '<input type="text" name="faq_question[]" class="faq-question">';
                faqItem += '<label for="faq_answer">Answer:</label>';
                faqItem += '<textarea name="faq_answer[]" class="faq-answer"></textarea>';
                faqItem += '<button type="button" class="remove-faq-item">Remove</button>';
                faqItem += '</div>';
                $('#faq-fields').append(faqItem);
            });

            $(document).on('click', '.remove-faq-item', function() {
                $(this).parent('.faq-item').remove();
            });
        });
    </script>
    <?php
}
function save_property_meta_boxes($post_id) {
    if (isset($_POST['property_price'])) {
        update_post_meta($post_id, 'property_price', sanitize_text_field($_POST['property_price']));
    }
    if (isset($_POST['property_bedrooms'])) {
        update_post_meta($post_id, 'property_bedrooms', sanitize_text_field($_POST['property_bedrooms']));
    }
    if (isset($_POST['property_bathrooms'])) {
        update_post_meta($post_id, 'property_bathrooms', sanitize_text_field($_POST['property_bathrooms']));
    }
    if (isset($_POST['property_area'])) {
        update_post_meta($post_id, 'property_area', sanitize_text_field($_POST['property_area']));
    }
    if (isset($_POST['property_floor'])) {
        update_post_meta($post_id, 'property_floor', sanitize_text_field($_POST['property_floor']));
    }
    if (isset($_POST['property_parking'])) {
        update_post_meta($post_id, 'property_parking', sanitize_text_field($_POST['property_parking']));
    }

    if (isset($_POST['property_category'])) {
        $category_id = intval($_POST['property_category']);
        if ($category_id > 0) {
            wp_set_object_terms($post_id, $category_id, 'property_category');
        }
    }

    if (isset($_POST['add_faq'])) {
        $faq_questions = $_POST['faq_question'];
        $faq_answers = $_POST['faq_answer'];
        $faq_data = array();

        if (!empty($faq_questions) && !empty($faq_answers)) {
            foreach ($faq_questions as $key => $question) {
                if (!empty($question) && !empty($faq_answers[$key])) {
                    $faq_data[] = array(
                        'question' => sanitize_text_field($question),
                        'answer' => sanitize_textarea_field($faq_answers[$key])
                    );
                }
            }
            update_post_meta($post_id, '_property_faq', $faq_data);
        }
    }
}
add_action('save_post', 'save_property_meta_boxes');

function create_property_category_taxonomy() {
    register_taxonomy(
        'property_category',
        'property',
        array(
            'labels' => array(
                'name' => __('Property Categories'),
                'singular_name' => __('Property Category'),
                'add_new' => __('Add New Category'),
                'add_new_item' => __('Add New Category'),
                'edit_item' => __('Edit Category'),
                'new_item' => __('New Category'),
                'view_item' => __('View Category'),
                'search_items' => __('Search Categories'),
                'not_found' => __('No categories found'),
                'not_found_in_trash' => __('No categories found in trash'),
            ),
            'public' => true,
            'hierarchical' => true,
            'rewrite' => array('slug' => 'property-categories'),
        )
    );
}
add_action('init', 'create_property_category_taxonomy');

function theme_register_menus() {
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'your-theme-textdomain')
    ));
}
add_action('after_setup_theme', 'theme_register_menus');

function create_contact_post_type() {
    register_post_type('contact',
      array(
        'labels' => array(
          'name' => __('Contacts'),
          'singular_name' => __('Contact'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-email',
      )
    );
  }
  add_action('init', 'create_contact_post_type');

  function create_contact_menu() {
    add_menu_page('Contacts', 'Contacts', 'manage_options', 'edit.php?post_type=contact');
  }
  add_action('admin_menu', 'create_contact_menu');

  function save_contact_form() {
    if (isset($_POST['action']) && $_POST['action'] == 'save_contact_form') {
      $name = sanitize_text_field($_POST['name']);
      $email = sanitize_email($_POST['email']);
      $subject = sanitize_text_field($_POST['subject']);
      $message = sanitize_text_field($_POST['message']);
  
      $post_id = wp_insert_post(array(
        'post_title' => $subject,
        'post_content' => $message,
        'post_status' => 'publish',
        'post_type' => 'contact',
      ));
  
      add_post_meta($post_id, 'name', $name);
      add_post_meta($post_id, 'email', $email);
      add_post_meta($post_id, 'subject', $subject);
      add_post_meta($post_id, 'message', $message);
  
      $_SESSION['form_submitted'] = true;
    }
  }
  add_action('template_redirect', 'save_contact_form');

  function display_success_message() {
    if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted']) {
      ?>
      <script>
        jQuery(document).ready(function($) {
          $('#contact-form').prepend('<div class="success-message">Successfully Sent!</div>');
        });
      </script>
      <?php
      unset($_SESSION['form_submitted']);

      return false;
    }
  }
  add_action('template_redirect', 'display_success_message');

  function add_contact_meta_boxes() {
    add_meta_box(
      'contact_details',
      __('Contact Details'),
      'contact_details_meta_box',
      'contact',
      'advanced',
      'high'
    );
  }
  add_action('add_meta_boxes', 'add_contact_meta_boxes');
  
  function contact_details_meta_box() {
    global $post;
    $name = get_post_meta($post->ID, 'name', true);
    $email = get_post_meta($post->ID, 'email', true);
    $subject = get_post_meta($post->ID, 'subject', true);
    $message = get_post_meta($post->ID, 'message', true);
    ?>
    <table>
      <tr>
        <td><label for="name">Name:</label></td>
        <td><?php echo $name; ?></td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><?php echo $email; ?></td>
      </tr>
      <tr>
        <td><label for="subject">Subject:</label></td>
        <td><?php echo $subject; ?></td>
      </tr>
      <tr>
        <td><label for="message">Message:</label></td>
        <td><?php echo $message; ?></td>
      </tr>
    </table>
    <?php
  }

  function mycustomtheme_customize_register($wp_customize) {
    // Email Address
    $wp_customize->add_setting('email_address', array(
        'default' => 'info@company.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('email_address', array(
        'label' => __('Email Address'),
        'section' => 'title_tagline',
        'type' => 'email',
    ));

    $wp_customize->add_setting('location', array(
        'default' => 'Sunny Isles Beach, FL 33160',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('location', array(
        'label' => __('Location'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));

    $wp_customize->add_section('social_media', array(
        'title' => __('Social Media'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('facebook_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_link', array(
        'label' => __('Facebook Link'),
        'section' => 'social_media',
        'type' => 'url',
    ));

    $wp_customize->add_setting('linkedin_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('linkedin_link', array(
        'label' => __('LinkedIn Link'),
        'section' => 'social_media',
        'type' => 'url',
    ));

    $wp_customize->add_setting('instagram_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('instagram_link', array(
        'label' => __('Instagram Link'),
        'section' => 'social_media',
        'type' => 'url',
    ));
}
add_action('customize_register', 'mycustomtheme_customize_register');

function mycustomtheme_save_customizer_settings($wp_customize) {
    $wp_customize->add_setting('email_address', array(
        'default' => 'info@company.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('email_address', array(
        'label' => __('Email Address'),
        'section' => 'title_tagline',
        'type' => 'email',
    ));

    $wp_customize->add_setting('location', array(
        'default' => 'Sunny Isles Beach, FL 33160',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('location', array(
        'label' => __('Location'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));

    $wp_customize->add_section('social_media', array(
        'title' => __('Social Media'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('facebook_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_link', array(
        'label' => __('Facebook Link'),
        'section' => 'social_media',
        'type' => 'url',
    ));

    $wp_customize->add_setting('linkedin_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('linkedin_link', array(
        'label' => __('LinkedIn Link'),
        'section' => 'social_media',
        'type' => 'url',
    ));

    $wp_customize->add_setting('instagram_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('instagram_link', array(
        'label' => __('Instagram Link'),
        'section' => 'social_media',
        'type' => 'url',
    ));
}
add_action('customize_register', 'mycustomtheme_save_customizer_settings');

function mycustomtheme_customize_register1($wp_customize) {
    add_theme_support('uploads');
    $wp_customize->add_setting('site_title', array(
        'default' => 'Villa',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('site_title', array(
        'label' => __('Site Title'),
        'section' => 'title_tagline',
        'type' => 'text',
    ));

    $wp_customize->add_setting('logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'logo', array(
        'label' => __('Logo'),
        'section' => 'title_tagline',
        'settings' => 'logo',
        'width' => 100,
        'height' => 100,
        'flex_width' => false,
        'flex_height' => false,
    )));
}
add_action('customize_register', 'mycustomtheme_customize_register');


function mycustomtheme_add_contact_meta_boxes() {
    $page_id = 545;
    if(get_the_ID() == $page_id) {
        add_meta_box(
            'mycustomtheme_contact_details',
            __('Contact Details'),
            'mycustomtheme_contact_details_meta_box',
            'page',
            'advanced',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'mycustomtheme_add_contact_meta_boxes');

function mycustomtheme_contact_details_meta_box() {
    global $post;
    $phone_number = get_post_meta($post->ID, 'mycustomtheme_phone_number', true);
    $email_address = get_post_meta($post->ID, 'mycustomtheme_email_address', true);
    ?>
    <table>
        <tr>
            <td><label for="mycustomtheme_phone_number">Phone Number:</label></td>
            <td><input type="text" id="mycustomtheme_phone_number" name="mycustomtheme_phone_number" value="<?php echo $phone_number; ?>"></td>
        </tr>
        <tr>
            <td><label for="mycustomtheme_email_address">Email Address:</label></td>
            <td><input type="email" id="mycustomtheme_email_address" name="mycustomtheme_email_address" value="<?php echo $email_address; ?>"></td>
        </tr>
    </table>
    <?php
}

function mycustomtheme_save_contact_meta_boxes($post_id) {
    if (isset($_POST['mycustomtheme_phone_number'])) {
        update_post_meta($post_id, 'mycustomtheme_phone_number', sanitize_text_field($_POST['mycustomtheme_phone_number']));
    }
    if (isset($_POST['mycustomtheme_email_address'])) {
        update_post_meta($post_id, 'mycustomtheme_email_address', sanitize_email($_POST['mycustomtheme_email_address']));
    }
}
add_action('save_post', 'mycustomtheme_save_contact_meta_boxes');



function mycustomtheme_add_facts_meta_boxes() {
    $page_id = 583;
    if (get_the_ID() == $page_id) {
        add_meta_box(
            'mycustomtheme_facts',
            __('Facts'),
            'mycustomtheme_facts_meta_box',
            'page',
            'advanced',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'mycustomtheme_add_facts_meta_boxes');

function mycustomtheme_facts_meta_box() {
    global $post;
    $buildings_finished = get_post_meta($post->ID, 'mycustomtheme_buildings_finished', true);
    $years_experience = get_post_meta($post->ID, 'mycustomtheme_years_experience', true);
    $awwards_won = get_post_meta($post->ID, 'mycustomtheme_awwards_won', true);
    ?>
    <table>
        <tr>
            <td><label for="mycustomtheme_buildings_finished">Buildings Finished:</label></td>
            <td><input type="text" id="mycustomtheme_buildings_finished" name="mycustomtheme_buildings_finished" value="<?php echo $buildings_finished; ?>"></td>
        </tr>
        <tr>
            <td><label for="mycustomtheme_years_experience">Years Experience:</label></td>
            <td><input type="text" id="mycustomtheme_years_experience" name="mycustomtheme_years_experience" value="<?php echo $years_experience; ?>"></td>
        </tr>
        <tr>
            <td><label for="mycustomtheme_awwards_won">Awwards Won:</label></td>
            <td><input type="text" id="mycustomtheme_awwards_won" name="mycustomtheme_awwards_won" value="<?php echo $awwards_won; ?>"></td>
        </tr>
    </table>
    <?php
}

function mycustomtheme_save_facts_meta_boxes($post_id) {
    if (isset($_POST['mycustomtheme_buildings_finished'])) {
        update_post_meta($post_id, 'mycustomtheme_buildings_finished', sanitize_text_field($_POST['mycustomtheme_buildings_finished']));
    }
    if (isset($_POST['mycustomtheme_years_experience'])) {
        update_post_meta($post_id, 'mycustomtheme_years_experience', sanitize_text_field($_POST['mycustomtheme_years_experience']));
    }
    if (isset($_POST['mycustomtheme_awwards_won'])) {
        update_post_meta($post_id, 'mycustomtheme_awwards_won', sanitize_text_field($_POST['mycustomtheme_awwards_won']));
    }
}
add_action('save_post', 'mycustomtheme_save_facts_meta_boxes');
?>

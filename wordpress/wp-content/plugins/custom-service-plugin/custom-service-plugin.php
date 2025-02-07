<?php
/*
Plugin Name: Custom Service Plugin
Description: A plugin to create a custom post type "Service," a custom taxonomy "Type," a custom tag taxonomy "Service Tags," and custom meta boxes.
Version: 1.0
Author: XYZ
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Register Custom Post Type
function custom_service_post_type()
{
    $labels = array(
        'name'                  => _x('Services', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Service', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Services', 'text_domain'),
        'name_admin_bar'        => __('Service', 'text_domain'),
        'archives'              => __('Service Archives', 'text_domain'),
        'attributes'            => __('Service Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Service:', 'text_domain'),
        'all_items'             => __('All Services', 'text_domain'),
        'add_new_item'          => __('Add New Service', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Service', 'text_domain'),
        'edit_item'             => __('Edit Service', 'text_domain'),
        'update_item'           => __('Update Service', 'text_domain'),
        'view_item'             => __('View Service', 'text_domain'),
        'view_items'            => __('View Services', 'text_domain'),
        'search_items'          => __('Search Service', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into service', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this service', 'text_domain'),
        'items_list'            => __('Services list', 'text_domain'),
        'items_list_navigation' => __('Services list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter services list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Service', 'text_domain'),
        'description'           => __('Post Type for Services', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array('type', 'service_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type('service', $args);
}

add_action('init', 'custom_service_post_type', 0);

// Register Custom Taxonomy "Type"
function custom_service_taxonomy()
{
    $labels = array(
        'name'                       => _x('Types', 'Taxonomy General Name', 'text_domain'),
        'singular_name'              => _x('Type', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name'                  => __('Type', 'text _domain'),
        'all_items'                  => __('All Types', 'text_domain'),
        'parent_item'                => __('Parent Type', 'text_domain'),
        'parent_item_colon'          => __('Parent Type:', 'text_domain'),
        'new_item_name'              => __('New Type Name', 'text_domain'),
        'add_new_item'               => __('Add New Type', 'text_domain'),
        'edit_item'                  => __('Edit Type', 'text_domain'),
        'update_item'                => __('Update Type', 'text_domain'),
        'view_item'                  => __('View Type', 'text_domain'),
        'separate_items_with_commas' => __('Separate types with commas', 'text_domain'),
        'add_or_remove_items'        => __('Add or remove types', 'text_domain'),
        'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
        'not_found'                  => __('Not Found', 'text_domain'),
        'no_terms'                   => __('No types', 'text_domain'),
        'items_list'                 => __('Types list', 'text_domain'),
        'items_list_navigation'      => __('Types list navigation', 'text_domain'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_in_rest'               => true,
    );
    register_taxonomy('type', array('service'), $args);
    // global $wp_roles;

    // $all_roles = $wp_roles->roles;
    // gets the example_role role object
    $custom_service_role = get_role('custom_service_role1');
    $administratorRole = get_role('administrator');
    
    
    //  // add a custom capability 
    //  // you can remove the 'edit_others-post' and add something else (your     own custom capability) which you can use in your code login along with the current_user_can( $capability ) hook.
    $custom_service_role->add_cap('edit_service_page', true);
    $administratorRole->add_cap('edit_service_page', true);
    // echo "<pre>";
    // print_r($custom_service_role);
    // die();
     
}

add_action('init', 'custom_service_taxonomy', 0);

// Register Custom Taxonomy "Service Tags"
function custom_service_tags_taxonomy()
{
    $labels = array(
        'name'                       => _x('Service Tags', 'Taxonomy General Name', 'text_domain'),
        'singular_name'              => _x('Service Tag', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name'                  => __('Service Tags', 'text_domain'),
        'all_items'                  => __('All Service Tags', 'text_domain'),
        'edit_item'                  => __('Edit Service Tag', 'text_domain'),
        'update_item'                => __('Update Service Tag', 'text_domain'),
        'add_new_item'               => __('Add New Service Tag', 'text_domain'),
        'new_item_name'              => __('New Service Tag Name', 'text_domain'),
        'separate_items_with_commas' => __('Separate service tags with commas', 'text_domain'),
        'add_or_remove_items'        => __('Add or remove service tags', 'text_domain'),
        'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
        'not_found'                  => __('Not Found', 'text_domain'),
        'no_terms'                   => __('No service tags', 'text_domain'),
        'items_list'                 => __('Service Tags list', 'text_domain'),
        'items_list_navigation'      => __('Service Tags list navigation', 'text_domain'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_in_rest'               => true,
    );
    register_taxonomy('service_tag', array('service'), $args);
}

add_action('init', 'custom_service_tags_taxonomy', 0);

// Create Custom User Role
function add_custom_service_role()
{
    // remove_role( 'custom_service_role1' );
    // remove_role( 'custom_service_role' );

    add_role('custom_service_role1', __('Custom Service Role1', 'text_domain'), array(
        'read' => true, 
        
        'manage_options' => false, 
        'edit_posts' => false,
        'delete_posts' => false,
        'publish_posts' => false,
        
        'manage_tools' => false,    
        'edit_theme_options' => false,
        'customize' => false,         
        
        'manage_snippets' => false,
        'edit_snippets' => false,
        'activate_snippets' => false,
        
        'upload_files' => false,
        'edit_pages' => false,
        'edit_others_posts' => false,
    ));
}
add_action('init', 'add_custom_service_role');

// Add Custom Meta Box
function custom_service_meta_box()
{
    add_meta_box(
        'service_meta_box',
        __('Service Details', 'text_domain'),
        'render_service_meta_box',
        'service',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'custom_service_meta_box');

function render_service_meta_box($post)
{
?>
    <div>
        <label for="service_description"><?php _e('Service Description', 'text_domain'); ?></label>
        <input type="text" id="service_description" name="service_description" value="<?php echo esc_attr(get_post_meta($post->ID, 'service_description', true)); ?>" />
    </div>
    <div>
        <label for="service_price"><?php _e('Service Price', 'text_domain'); ?></label>
        <input type="text" id="service_price" name="service_price" value="<?php echo esc_attr(get_post_meta($post->ID, 'service_price', true)); ?>" />
    </div>
    <div>
        <label for="service_images"><?php _e('Images', 'text_domain'); ?></label>
        <input type="button" id="add_images" class="button" value="<?php _e('Add Images', 'text_domain'); ?>" />
        <input type="hidden" id="service_images" name="service_images" value="<?php echo esc_attr(get_post_meta($post->ID, 'service_images', true)); ?>" />
        <div id="selected_images"></div>
    </div>
    <script>
        jQuery(document).ready(function($) {
            var mediaUploader;

            $('#add_images').on('click', function() {
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media({
                    title: '<?php _e('Select Images', 'text_domain'); ?>',
                    button: {
                        text: '<?php _e('Use these images', 'text_domain'); ?>'
                    },
                    multiple: true
                }).on('select', function() {
                    var attachments = mediaUploader.state().get('selection').toJSON();
                    var imageIds = [];
                    $('#selected_images').empty();
                    $.each(attachments, function(index, attachment) {
                        imageIds.push(attachment.id);
                        var imageHtml = '<div style="position:relative; display:inline-block; margin:10px;">';
                        imageHtml += '<img src="' + attachment.url + '" style="max-width:200px;" />';
                        imageHtml += '<span class="remove-image" style="position:absolute; top:0; right:0; background:red; color:black; cursor:pointer; padding:2px 5px;">x</span>';
                        imageHtml += '</div>';
                        $('#selected_images').append(imageHtml);
                    });
                    $('#service_images').val(imageIds.join(','));
                }).open();
            });

            $(document).on('click', '.remove-image', function() {
                $(this).parent().remove();
                var remainingIds = [];
                $('#selected_images img').each(function() {
                    var imgSrc = $(this).attr('src');
                    var imgId = imgSrc.split('/').pop().split('.')[0];
                    remainingIds.push(imgId);
                });
                $('#service_images').val(remainingIds.join(','));
            });
        });
    </script>
<?php
}

function save_service_meta_box_data($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['service_description'])) {
        update_post_meta($post_id, 'service_description', sanitize_text_field($_POST['service_description']));
    }

    if (isset($_POST['service_price'])) {
        update_post_meta($post_id, 'service_price', sanitize_text_field($_POST['service_price']));
    }

    if (isset($_POST['service_images'])) {
        $image_ids = sanitize_text_field($_POST['service_images']);
        update_post_meta ($post_id, 'service_images', $image_ids);
    }
}
add_action('save_post', 'save_service_meta_box_data');

function display_services_table() {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'service',
        'posts_per_page' => 5,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'ASC' 
    );
    $services = new WP_Query($args);

    $output = '<style>
        .services-table {
            min-width: 100%;
            max-width: 100%;
            border-collapse: collapse;
        }
        .services-table th, .services-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .services-table th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>';

    $output .= '<table class="services-table">';
    $output .= '<tr><th>' . __('Service Title', 'text_domain') . '</th><th>' . __('Service Price', 'text_domain') . '</th><th>' . __('Actions', 'text_domain') . '</th></tr>';

    if ($services->have_posts()) {
        while ($services->have_posts()) {
            $services->the_post();
            $price = get_post_meta(get_the_ID(), 'service_price', true);
            $output .= '<tr>';
            $output .= '<td>' . get_the_title() . '</td>';
            $output .= '<td>' . esc_html($price) . '</td>';
            $output .= '<td><a href="' . get_edit_post_link() . '">' . __('Edit', 'text_domain') . '</a></td>';
            $output .= '</tr>';
        }
    } else {
        $output .= '<tr><td colspan="3">' . __('No services found', 'text_domain') . '</td></tr>';
    }

    $output .= '</table>';
    $output .= paginate_links(array(
        'total' => $services->max_num_pages,
        'current' => $paged,
    ));

    wp_reset_postdata();
    return $output;
}

function add_services_menu_page() {
    add_menu_page(
        __('Services', 'text_domain'),
        __('Services', 'text_domain'),
        'edit_service_page',
        'services_page',
        'render_services_page',
        'dashicons-hammer',
        6
    );
}

add_action('admin_menu', 'add_services_menu_page');

function render_services_page() {
    echo '<div class="wrap">';
    echo '<h1>' . __('Services', 'text_domain') . '</h1>';
    echo display_services_table();
    echo '</div>';
}


// [TEST PAGE=5]
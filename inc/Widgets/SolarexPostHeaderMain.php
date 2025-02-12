<?php 
namespace Solarex\Core\Widgets;

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class SolarexPostHeaderMain extends Widget
{
    // Constructor for widget setup, with input field for background image
    function __construct()
    {
        $this->setup('SolarexPostHeaderMain', 'Solarex Post Header Main', 'A widget to display a customizable post header with breadcrumb and background image.', array(
            Field::make('image', 'post_header_background_image', 'Background Image'),
        ));
    }

    // Frontend output for the widget
    function front_end($args, $instance)
    {
        // Get the current page title
        $page_title = get_the_title();
        $breadcrumb = '<a href="' . home_url() . '">Home</a>';

        // Generate breadcrumb based on the current view
        if (is_single()) {
            $post_type = get_post_type();
            if ($post_type) {
                $post_type_obj = get_post_type_object($post_type);
                if ($post_type_obj && $post_type_obj->has_archive) {
                    $archive_link = get_post_type_archive_link($post_type);
                    $breadcrumb .= ' / <a href="' . esc_url($archive_link) . '">' . esc_html($post_type_obj->labels->singular_name) . '</a>';
                }
            }
            $breadcrumb .= ' / <span class="secondary-color">' . $page_title . '</span>';
        } elseif (is_page()) {
            $breadcrumb .= ' / <span class="secondary-color">' . $page_title . '</span>';
        } elseif (is_category()) {
            $breadcrumb .= ' / <span class="secondary-color">' . single_cat_title('', false) . '</span>';
        } elseif (is_tag()) {
            $breadcrumb .= ' / <span class="secondary-color">Tag: ' . single_tag_title('', false) . '</span>';
        } elseif (is_search()) {
            $breadcrumb .= ' / <span class="secondary-color">Search Results</span>';
        } elseif (is_archive()) {
            $breadcrumb .= ' / <span class="secondary-color">' . post_type_archive_title('', false) . '</span>';
        } elseif (is_404()) {
            $breadcrumb .= ' / <span class="secondary-color">404 Not Found</span>';
        }

        // Handle background image from widget settings
        $background_image_id = !empty($instance['post_header_background_image']) ? $instance['post_header_background_image'] : '';
        $background_image_url = $background_image_id ? wp_get_attachment_image_url($background_image_id, 'full') : 'https://placehold.co/1920x340'; // Default image

        // Output the widget content with dynamic breadcrumb and background image
        echo '<div class="page-title" style="padding-top: 5rem; min-height: 300px; background-size: cover; background-image: linear-gradient(180deg, rgba(0, 0, 0, 0), rgb(0, 0, 0)), url(' . esc_url($background_image_url) . ');">';
        echo '    <div class="container py-md-5">';
        echo '        <div class="row">';
        echo '            <div class="col">';
        echo '                <h1 class="text-white">' . esc_html($page_title) . '</h1>';
        echo '                <p class="text-white">' . $breadcrumb . '</p>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
}

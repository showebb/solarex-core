<?php

namespace Solarex\Core;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class SolarexCarbonFields
{
    public function __construct()
    {

        $this->registerCustomFields();
    }



    public function registerCustomFields()
    {
        // Fetch Solarex templates dynamically
        $solarex_template_options = array();
        $templates = get_posts(array(
            'post_type' => 'solarex_template',
            'posts_per_page' => -1,
        ));

        if (!empty($templates)) {
            foreach ($templates as $template) {
                $solarex_template_options[$template->ID] = $template->post_title;
            }
        }

        Container::make('post_meta', __('Testimonial Details', 'solarex-core'))
            ->where('post_type', '=', 'solarex_testimonial')
            ->add_fields([
                Field::make('select', 'testimonial_rating', __('Rating', 'solarex-core'))
                    ->set_options([
                        '5' => __('5', 'solarex-core'),
                        '4' => __('4', 'solarex-core'),
                        '3' => __('3', 'solarex-core'),
                        '2' => __('2', 'solarex-core'),
                        '1' => __('1', 'solarex-core'),
                    ])
                    ->set_required(true)
                    ->set_default_value('5')
                    ->set_help_text(__('Select a rating between 1 and 5.', 'solarex-core')),
                Field::make('textarea', 'testimonial_address', __('Address', 'solarex-core'))
                    ->set_required(true)
                    ->set_help_text(__('Enter the address of the person giving the testimonial.', 'solarex-core'))
                    ->set_rows(2),
            ]);


        Container::make('post_meta', __('Post Additional Details', 'solarex-core'))
            ->where('post_type', '=', 'post')
            ->add_fields([
                Field::make('text', 'solarex_custom_subtitle', __('Subtitle', 'solarex-core'))
                    ->set_required(false)
                    ->set_help_text(__('Add a subtitle for this post.', 'solarex-core')),

                // Field::make('image', 'featured_image_cover', __('Featured Image cover', 'solarex-core'))
                //     ->set_required(false)
                //     ->set_help_text(__('Add an cover image for the featured image.', 'solarex-core')),

                Field::make('text', 'solarex_author_name', __('Author Name', 'solarex-core'))
                    ->set_help_text(__('Specify the author\'s name to display below the name.', 'solarex-core')),
            ]);

        Container::make('post_meta', esc_html__('Blog Details', 'solarex-core'))
            ->where('post_type', '=', 'post') // Ensure it appears for blog posts only
            ->add_fields([
                Field::make('file', 'solarex_post_cover_image', esc_html__('Post Cover Image', 'solarex-core'))
                    ->set_value_type('url') // Store only the image URL (optional)
                    ->set_help_text(esc_html__('Upload a cover image for the post', 'solarex-core')),
            ]);

        // Container::make('post_meta', 'Post Header Options')
        //     ->where('post_type', '=', 'page')
        //     ->add_fields(array(
        //         Field::make('radio', 'page_header_option', 'Select Post Header')
        //             ->add_options(array(
        //                 'on' => 'ON Post Header',
        //                 'off' => 'OFF Post Header',
        //             ))
        //             ->set_default_value('on'),
        //         Field::make('select', 'solarex_post_header_template', 'Choose Post Header Template')
        //             ->add_options($solarex_template_options)
        //             ->set_conditional_logic(array(
        //                 array(
        //                     'field' => 'page_header_option',
        //                     'value' => 'on',
        //                 ),
        //             ))
        //             ->set_help_text('Select an Elementor template to use as the pre-footer.'),
        //     ));

        Container::make('post_meta', 'Post Header Options')
            ->where('post_type', '=', 'page')
            ->add_fields(array(
                Field::make('radio', 'page_header_option', 'Select Post Header')
                    ->add_options(array(
                        'inherit' => 'Inherit',
                        'off' => 'No Post Header',
                        'template' => 'Custom Template',
                    ))
                    ->set_default_value('inherit'),
                Field::make('select', 'solarex_post_header_template', 'Choose Post Header Template')
                    ->add_options($solarex_template_options)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'page_header_option',
                            'value' => 'template',
                        ),
                    ))
                    ->set_help_text('Select an Elementor template to use as the post header.'),
            ));


        Container::make('post_meta', 'Main Footer Options')
            ->where('post_type', '=', 'page')
            ->add_fields(array(
                Field::make('radio', 'main_footer_option', 'Select Main Footer')
                    ->add_options(array(
                        'on' => 'ON Main Footer',
                        'off' => 'OFF Main Footer',
                    ))
                    ->set_default_value('on'),
            ));

        Container::make('post_meta', 'Page Pre-Footer Options')
            ->where('post_type', '=', 'page')
            ->add_fields(array(
                Field::make('radio', 'page_prefooter_option', 'Select Pre-Footer')
                    ->add_options(array(
                        'inherit' => 'Inherit',
                        'off' => 'No Pre-Footer',
                        'template' => 'Custom Template',
                    ))
                    ->set_default_value('inherit'),
                Field::make('select', 'solarex_prefooter_template', 'Choose Pre-Footer Template')
                    ->add_options($solarex_template_options)
                    ->set_conditional_logic(array(
                        array(
                            'field' => 'page_prefooter_option',
                            'value' => 'template',
                        ),
                    ))
                    ->set_help_text('Select an Elementor template for the pre-footer.'),
            ));



        Container::make('post_meta', __('Solarex Service Details'))
            ->where('post_type', '=', 'solarex_services_v2')
            ->add_fields([
                Field::make('complex', 'features', __('Features'))
                    ->add_fields([
                        Field::make('text', 'feature_text', __('Feature Text')),
                    ]),

            ]);

        Container::make('post_meta', __('Solarex Team Details'))
            ->where('post_type', '=', 'solarex_team')
            ->add_fields([

                Field::make('text', 'solarex_designation', __('Designation'))
                    ->set_help_text('Enter the designation of the team member.'),


                Field::make('textarea', 'solarex_responsibilities', __('Responsibilities'))
                    ->set_help_text('Describe the responsibilities of the team member.'),


                Field::make('textarea', 'solarex_achievements', __('Achievements'))
                    ->set_help_text('List the achievements of the team member.'),


                Field::make('text', 'solarex_fun_fact', __('Fun Fact'))
                    ->set_help_text('Add a fun fact about the team member.'),


                Field::make('textarea', 'solarex_why_love_solar', __('Why They Love Solar Energy'))
                    ->set_help_text('Explain why this team member loves solar energy.'),


                Field::make('text', 'solarex_contact_email', __('Email Address'))
                    ->set_help_text('Provide the contact email for the team member.')
                    ->set_attribute('type', 'email'),

                Field::make('text', 'solarex_contact_number', __('Phone Number'))
                    ->set_help_text('Provide the contact number for the team member.')
                    ->set_attribute('type', 'tel'),

                Field::make('text', 'solarex_social_facebook', __('Facebook URL'))
                    ->set_help_text('Provide the Facebook profile URL.')
                    ->set_attribute('type', 'url'),

                Field::make('text', 'solarex_social_twitter', __('Twitter URL'))
                    ->set_help_text('Provide the Twitter profile URL.')
                    ->set_attribute('type', 'url'),

                Field::make('text', 'solarex_social_linkedin', __('LinkedIn URL'))
                    ->set_help_text('Provide the LinkedIn profile URL.')
                    ->set_attribute('type', 'url'),

                Field::make('text', 'solarex_social_instagram', __('Instagram URL'))
                    ->set_help_text('Provide the Instagram profile URL.')
                    ->set_attribute('type', 'url'),

                Field::make('text', 'solarex_social_youtube', __('YouTube URL'))
                    ->set_help_text('Provide the YouTube channel or profile URL.')
                    ->set_attribute('type', 'url'),
            ]);



        // for services post type
        Container::make('post_meta', __('Sub Title '))
            ->where('post_type', '=', 'solarex_services')
            ->add_fields([
                Field::make('textarea', 'solarex_sub_title', __('Sub Title'))
                    ->set_rows(3)
                    ->set_help_text('Enter the sub title for the service.')
                    ->set_required(true)
            ]);


        // for services post type
        Container::make('post_meta', __('Solarex Service'))
            ->where('post_type', '=', 'solarex_services')
            ->add_fields([
                Field::make('complex', 'solarex_list', __('List'))
                    ->add_fields([
                        Field::make('textarea', 'solarex_list', __('List'))
                            ->set_rows(3)
                            ->set_required(true)
                    ])
            ]);


        // for services post type
        Container::make('post_meta', __('Solarex Service'))
            ->where('post_type', '=', 'solarex_services')
            ->add_fields([
                Field::make('image', 'solarex_service_icon', __('Icon'))

                    ->set_help_text('max width: 100px, max height: 100px')
                    ->set_required(true)
            ]);


    }

}


<?php
namespace Solarex\Core\ElementorWidgets;
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class SolarexContactInfo extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'solarex_contact_info';
    }

    public function get_title()
    {
        return __('Solarex Contact Info', 'solarex-core');
    }


    public function get_icon()
    {
        return 'eicon-person';
    }

    public function get_categories()
    {
        return ['solarex-elements'];
    }


    protected function _register_controls()
    {
        $this->start_controls_section(
            'solarex_contact_info_section',
            [
                'label' => __('Contact Information', 'solarex-core'),
            ]
        );
        // cover image
        $this->add_control(
            'solarex_cover_image',
            [
                'label' => __('Cover Image', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/625x566',
                ],
            ]

        );

        $this->add_control(
            'solarex_phone_number',
            [
                'label' => __('Phone Number', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => '(123) 456-7890',


            ]
        );

        $this->add_control(
            'solarex_email_address',
            [
                'label' => __('Email Address', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => 'info@smithjohnson.com',

            ]


        );

        $this->end_controls_section();

        // cover image height and width control slider
        $this->start_controls_section(
            'solarex_contact_info_container_section',
            [

                'label' => __('Container', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'solarex_cover_image_height',
            [
                'label' => __('Height', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],

                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 576,
                ],

                'selectors' => [
                    '{{WRAPPER}} .contact-bg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'solarex_cover_image_width',
            [
                'label' => __('Width', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [

                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-bg' => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        // content positoin
        $this->add_control(
            'solarex_content_position',
            [
                'label' => __('Content Position', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Top', 'solarex-core'),
                        'icon' => 'eicon-v-align-top',
                    ],

                    'end' => [
                        'title' => __('Bottom', 'solarex-core'),
                        'icon' => 'eicon-v-align-bottom',
                    ],

                    'center' => [
                        'title' => __('Center', 'solarex-core'),
                        'icon' => 'eicon-v-align-middle',
                    ],

                ],
                'default' => 'end',

                'selectors' => [
                    '{{WRAPPER}} .contact-bg' => 'align-items: {{VALUE}};',
                ],
            ]
        );

        // content gap
        $this->add_responsive_control(
            'solarex_content_gap',
            [
                'label' => __('Content Gap', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'tablet_default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'mobile_default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-bg' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );




        $this->end_controls_section();

        // content toglle option
        $this->start_controls_section(
            'solarex_contact_info_content_section',
            [
                'label' => __('Content', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // contnet align drpdown
        $this->add_control(
            'solarex_contact_info_content_align',
            [
                'label' => esc_html__('Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'end' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-text-align-right',
                    ],

                ],
                'default' => 'start',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .solarex_content' => 'display: flex; justify-content: {{VALUE}};',
                ],


            ]
        );

        $this->add_control(
            'solarex_contact_info_content_background_color',
            [


                'label' => __('Background Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .solarex_content' => 'background-color: {{VALUE}};',
                ],

            ]
        );

        // icon color
        $this->add_control(
            'solarex_icon_color',
            [
                'label' => __('Icon Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .solarex_content i' => 'color: {{VALUE}};',
                ],
            ]

        );

        // title typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'solarex_title_typography',
                'label' => __('Title Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .solarex_content h5',
            ]
        );

        // description typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'solarex_description_typography',
                'label' => __('Description Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .solarex_content p',
            ]
        );



    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $cover_image = $settings['solarex_cover_image'];
        $phone_number = $settings['solarex_phone_number'];
        $email_address = $settings['solarex_email_address'];


        ?>
        <div class="contact-bg d-flex flex-column flex-xl-row justify-content-end " style=" background-image: linear-gradient( 180deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.616)),
            url('<?php echo esc_url($cover_image['url']); ?>');">
            <ul class="solarex_content list-unstyled  p-4 w-100" style="z-index: 100;">
                <li class="d-flex  align-items-start ">
                    <p> <i class="fas fa-phone me-3 pt-2" title="Phone"></i></p>
                    <div>

                        <h5 class="solarex-mb-1">Call Us</h5>
                        <p class="solarex-mb-0"><?php echo esc_html($phone_number); ?></p>
                    </div>
                </li>
            </ul>
            <ul class="solarex_content list-unstyled  p-4 w-100" style="z-index: 100;">
                <li class="d-flex align-items-start">

                    <p> <i class="fas fa-envelope me-3 pt-2" title="Email"></i></p>
                    <div>
                        <h5 class="solarex-mb-1">Email Us</h5>

                        <p class="solarex-mb-0"><?php echo esc_html($email_address); ?></p>
                    </div>
                </li>
            </ul>
        </div>
        <?php
    }
}
?>
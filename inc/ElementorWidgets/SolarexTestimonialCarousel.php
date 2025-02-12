<?php
namespace Solarex\Core\ElementorWidgets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class SolarexTestimonialCarousel extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'solarex_testimonial_carousel';
    }

    public function get_title()
    {
        return __('Solarex Testimonial Carousel', 'solarex');
    }

    public function get_icon()
    {
        return 'fa fa-comments';
    }

    public function get_categories()
    {
        return ['solarex-elements'];
    }

    public function get_script_depends()
    {
        return ['owl-carousel'];
    }

    public function get_style_depends()
    {
        return ['owl-carousel', 'owl-theme'];
    }

    protected function _register_controls()
    {
        // Carousel Content Controls
        $this->start_controls_section(
            'solarex_testimonial_carousel_content',
            [
                'label' => __('Carousel Content', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $slides_to_show = range(1, 10);
        $slides_to_show = array_combine($slides_to_show, $slides_to_show);
        $this->add_responsive_control(
            'solarex_testimonial_carousel_slides_to_show',
            [
                'label' => esc_html__('Slides to Show', 'elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '' => esc_html__('Default', 'elementor'),
                ] + $slides_to_show,
                'frontend_available' => true,

                'render_type' => 'template',
                'selectors' => [
                    '{{WRAPPER}}' => '--e-image-carousel-slides-to-show: {{VALUE}}',
                ],
                'content_classes' => 'elementor-control-field-select-small',
            ]
        );

        // Autoplay Settings
        $this->add_control(
            'solarex_testimonial_carousel_autoplay',
            [
                'label' => __('Autoplay', 'solarex'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'solarex'),
                'label_off' => __('No', 'solarex'),
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'solarex_testimonial_carousel_autoplay_timeout',
            [
                'label' => __('Autoplay Timeout', 'solarex'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'default' => [
                    'unit' => 'ms',
                    'size' => 2000, // Default 2 seconds
                ],
                'range' => [
                    'ms' => [
                        'min' => 1000,
                        'max' => 10000,
                        'step' => 1000,
                    ],
                ],
                'condition' => [
                    'solarex_testimonial_carousel_autoplay' => 'yes',
                ],
            ]
        );

        // show gap between slides when slide show is more than 1

        $this->add_control(
            'solarex_testimonial_carousel_gap_size',
            [
                'label' => __('Gap Size', 'solarex'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 20,
                ],
                'condition' => [
                    'solarex_testimonial_carousel_slides_to_show!' => '1',
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item' => 'margin-right: {{SIZE}}px;',
                ],
            ]
        );
        // Navigation Arrows
        $this->add_control(
            'solarex_testimonial_carousel_nav_arrows',
            [
                'label' => __('Navigation Arrows', 'solarex'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'solarex'),
                'label_off' => __('Hide', 'solarex'),
                'default' => 'no',
            ]
        );
     
        $this->add_control(
            'solarex_testimonial_carousel_arrow_color',
            [
                'label' => __('Arrow Color', 'solarex'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'condition' => [
                    'solarex_testimonial_carousel_nav_arrows' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-nav' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Navigation Dots
        $this->add_control(
            'solarex_testimonial_carousel_nav_dots',
            [
                'label' => __('Navigation Dots', 'solarex'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'solarex'),
                'label_off' => __('Hide', 'solarex'),
                'default' => 'yes',
            ]
        );

        // navigation dot active color
        $this->add_control(
            'solarex_testimonial_carousel_dots_active_color',
            [
                'label' => __('Dots Active Color', 'solarex'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#70AC48',
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // navigation dot inactive color
        $this->add_control(
            'solarex_testimonial_carousel_dots_inactive_color',
            [
                'label' => __('Dots Inactive Color', 'solarex'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .owl-carousel .owl-dots button.owl-dot' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // navigation arrow postion choose
        $this->add_control(
            'solarex_testimonial_carousel_arrow_position',
            [
                'label' => __('Arrow Position', 'solarex'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => __('Left', 'solarex'),
                    'center' => __('Center', 'solarex'),
                    'right' => __('Right', 'solarex'),
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .owl-dots' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        // navigation arrow gap size
        $this->add_control(
            'solarex_testimonial_carousel_arrow_gap_size',
            [
                'label' => __('Arrow Gap Size', 'solarex'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 8,
                ],
                'selectors' => [
                    '{{WRAPPER}} .owl-dot' => 'margin-right: {{SIZE}}px;',
                ],
            ]
        );



        // Testimonial Content Styling
        // $this->add_control(
        //     'testimonial_title_color',
        //     [
        //         'label' => __('Testimonial Title Color', 'solarex'),
        //         'type' => \Elementor\Controls_Manager::COLOR,
        //         'default' => '#333',
        //     ]
        // );
        // $this->add_control(
        //     'testimonial_font_size',
        //     [
        //         'label' => __('Testimonial Content Font Size', 'solarex'),
        //         'type' => \Elementor\Controls_Manager::SLIDER,
        //         'default' => [
        //             'size' => 16,
        //             'unit' => 'px',
        //         ],
        //         'range' => [
        //             'px' => [
        //                 'min' => 12,
        //                 'max' => 40,
        //                 'step' => 1,
        //             ],
        //         ],
        //     ]
        // );
        // $this->add_control(
        //     'testimonial_border_radius',
        //     [
        //         'label' => __('Testimonial Border Radius', 'solarex'),
        //         'type' => \Elementor\Controls_Manager::SLIDER,
        //         'default' => [
        //             'size' => 10,
        //             'unit' => 'px',
        //         ],
        //         'range' => [
        //             'px' => [
        //                 'min' => 0,
        //                 'max' => 50,
        //                 'step' => 1,
        //             ],
        //         ],
        //     ]
        // );



        $this->end_controls_section();
        $this->start_controls_section(
            'solarex_testimonial_style',
            [
                'label' => __('Testimonial Style', 'solarex'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Testimonial Alignment
        $this->add_control(
            'solarex_testimonial_alignment',
            [
                'label' => __('Testimonial Alignment', 'solarex'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'solarex'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'solarex'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'solarex'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'solarex_testimonial_rating',
            [
                'label' => __('Rating Color', 'solarex'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#70AC48',
                'selectors' => [
                    '{{WRAPPER}} .solarex_testimonial_rating_color' => 'color: {{VALUE}};',
                ],
            ]
        );
     
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $autoplay = 'yes' === $settings['solarex_testimonial_carousel_autoplay'] ? 'true' : 'false';
        $autoplay_timeout = $settings['solarex_testimonial_carousel_autoplay_timeout']['size'] ?: 2000;
        $nav_arrows = 'yes' === $settings['solarex_testimonial_carousel_nav_arrows'] ? 'true' : 'false';
        $nav_dots = 'yes' === $settings['solarex_testimonial_carousel_nav_dots'] ? 'true' : 'false';

        // Query Testimonials
        $args = array(
            'post_type' => 'solarex_testimonial',
            'post_status' => 'publish',
        );
        $query = new \WP_Query($args);

        if ($query->have_posts()) {
            ?>
            <div class="testimonial-slider  owl-carousel" data-autoplay="<?php echo $autoplay; ?>"
                data-autoplay-timeout="<?php echo $autoplay_timeout; ?>" data-nav-arrows="<?php echo $nav_arrows; ?>"
                data-nav-dots="<?php echo $nav_dots; ?>">
                <?php
                while ($query->have_posts()):
                    $query->the_post();
                    $rating = carbon_get_post_meta(get_the_ID(), 'testimonial_rating');
                    $address = carbon_get_post_meta(get_the_ID(), 'testimonial_address');
                    ?>
                    <div class="testimonial_item">
                        <!-- Rating -->
                        <?php if (!empty($rating)): ?>
                            <div class="testimonial-rating pt-3">
                                <i class="fa fa-star solarex_testimonial_rating_color"></i>
                                <?php for ($i = 0; $i < $rating; $i++): ?>
                                    <i class="fa fa-star solarex_testimonial_rating_color"></i>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                        <p class="testimonial-content">
                            <?php the_content(); ?>
                        </p>
                        <p class="testimonial-title"><?php the_title(); ?> , <?php echo $address; ?></p>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                    $(".testimonial-slider").owlCarousel({
                        items: <?php echo esc_js($settings['solarex_testimonial_carousel_slides_to_show']); ?>,
                        loop: true,
                        autoplay: <?php echo esc_js($autoplay); ?>,
                        autoplayTimeout: <?php echo esc_js($autoplay_timeout); ?>,
                        autoplayHoverPause: true,
                        nav: <?php echo esc_js($nav_arrows); ?>,
                        dots: <?php echo esc_js($nav_dots); ?>,
                        smartSpeed: 700,
                        navText: ['&#9664;', '&#9654;']
                    });
                });
            </script>
            <style>
                .owl-carousel .owl-dots button.owl-dot {
                    /* background-color: rgba(169, 169, 169, 0.5); */
                    /* Inactive dot: light gray */
                    color: transparent;

                    border: none;
                    border-radius: 50%;
                    /* margin: 0 4px; */
                    width: 10px;
                    height: 10px;
                    font-size: 18px;
                    transition: background-color 0.3s ease;
                }

                /* .owl-carousel .owl-dots button.owl-dot:hover {
                                background-color: rgba(54, 170, 0, 0.5);
                  
                            } */

                /* .owl-carousel .owl-dots button.owl-dot.active {
                                background-color: rgba(54, 54, 54, 0.8);
                  
                                color: transparent;
                  
                            } */

                /* Optional: Active dot focus state */
                /* .owl-carousel .owl-dots button.owl-dot.active:focus {
                                background-color: rgba(54, 54, 54, 1);
                  
                            } */
            </style>


            <?php
        } else {
            echo '<p>' . __('No testimonials found.', 'solarex') . '</p>';
        }
    }
}

<?php

namespace Solarex\Core\ElementorWidgets;
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class SmallCard extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'smallcard';
    }

    public function get_title()
    {
        return __('SmallCard', 'solarex-core');
    }

    public function get_icon()
    {
        return 'eicon-ehp-cta';
    }

    public function get_categories()
    {
        return ['solarex-elements'];
    }


    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Add selector control for image/icon
        $this->add_control(
            'media_type',
            [
                'label' => esc_html__('Media Type', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'solarex-core'),
                    'icon' => esc_html__('Icon', 'solarex-core'),
                ],
            ]
        );

        // Image control with condition
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    // 'url' => 'https://i.ibb.co.com/QJ3j4pY/Residential-Solar-Installation.png',
                    'url' => get_template_directory_uri() . '/images/invoice-02.png',
                ],
                'condition' => [
                    'media_type' => 'image',
                ],
            ]
        );

        // Icon controls with condition
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Choose Icon', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'media_type' => 'icon',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#72A451',
                'selectors' => [
                    '{{WRAPPER}} .media-wrapper i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .media-wrapper svg' => 'fill: {{VALUE}};',
                ],
                'condition' => [
                    'media_type' => 'icon',
                ],
                
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Lower Bills', 'solarex-core'),
            ]
        );

        // add swithcer for description
        $this->add_control(
            'description_switch',
            [
                'label' => esc_html__('Show Description', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'condition' => [
                    'description_switch' => 'yes',
                ],
                'default' => esc_html__('Lower your bills by 30%', 'solarex-core'),
            ]
        );
        $this->add_control(
            'card_link',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'box_section',
            [
                'label' => __('Box', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'box_color',
            [
                'label' => esc_html__('Box Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'background-color: {{VALUE}}',
                ],
                'default' => '#FFFFFF',
            ]
        );
        // Box padding control
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__('Box Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem'],
                'default' => [
                    'top' => '24',
                    'right' => '24',
                    'bottom' => '24',
                    'left' => '24',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // boder radius 
        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'container_position',
            [
                'label' => esc_html__('Container Position', 'elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'top',
                'mobile_default' => 'top',
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => esc_html__('Top', 'elementor'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'elementor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'content_vertical_alignment',
            [
                'label' => esc_html__('Vertical Alignment', 'elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Top', 'elementor'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Middle', 'elementor'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Bottom', 'elementor'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'flex-start',
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'container_position!' => 'top',
                ],
            ]
        );

        // Image spacing
        $this->add_responsive_control(
            'image_spacing',
            [
                'label' => __('Image Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'media_type' => 'image',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon spacing
        $this->add_responsive_control(
            'icon_spacing',
            [
                'label' => __('Icon Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'media_type' => 'icon',
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 24,
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // title spacing
        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Title Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .content-wrapper h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // description spacing
        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Description Spacing', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .content-wrapper p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'description_switch' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'image_style_section',
            [
                'label' => __('Image ', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'media_type' => 'image',
                ],
            ]
        );
        // image size 
        $this->add_responsive_control(
            'image_size',
            [
                'label' => __('Image Size', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .media-wrapper img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]

        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => __('Icon ', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'media_type' => 'icon',
                ],
            ]
        );

        // Icon size control
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Icon Size', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0.1,
                        'max' => 20,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0.1,
                        'max' => 20,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .media-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .media-wrapper svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'media_type' => 'icon',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content', 'elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__('Title', 'elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .content-wrapper h5' => 'color: {{VALUE}};',
                ],
                // 'global' => [
                //     'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
                // ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .content-wrapper h5',
                // 'global' => [
                //     'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
                // ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Stroke::get_type(),
            [
                'name' => 'text_stroke',
                'selector' => '{{WRAPPER}} .content-wrapper h5',

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'selector' => '{{WRAPPER}} .content-wrapper h5',
            ]
        );

        $this->add_control(
            'heading_description',
            [
                'label' => esc_html__('Description', 'elementor'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .content-wrapper p' => 'color: {{VALUE}};',
                ],
                // 'global' => [
                //     'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
                // ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .content-wrapper p',
                // 'global' => [
                //     'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
                // ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'description_shadow',
                'selector' => '{{WRAPPER}} .content-wrapper p',
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $image = $settings['image'];
        $icon = !empty($settings['icon']['value']) ? $settings['icon']['value'] : '';
        $icon_color = !empty($settings['icon_color']) ? $settings['icon_color'] : '#000000';
        $title = $settings['title'];
        $description = $settings['description'];
        $card_link = $settings['card_link'];
        $container_position = $settings['container_position'];

        // Define container classes based on position
        $container_class = 'smallcard-container main_card';
        $container_class .= ' position-' . $container_position;
        ?>
        <a href="<?php echo esc_url($card_link['url']); ?>" class="">
            <div class="<?php echo esc_attr($container_class); ?>">
                <?php if (!empty($image) && !empty($image['url'])): ?>
                    <div class="media-wrapper">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="" class="img-fluid">
                    </div>
                <?php elseif (!empty($icon)): ?>
                    <div class="media-wrapper">
                        <?php \Elementor\Icons_Manager::render_icon($settings['icon'], [
                            'aria-hidden' => 'true',
                            'style' => 'color: ' . esc_attr($icon_color) . ';'
                        ]); ?>
                    </div>
                <?php endif; ?>

                <div class="content-wrapper">
                    <h5><?php echo esc_html($title); ?></h5>
                    <?php if (!empty($description)): ?>
                        <p><?php echo esc_html($description); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </a>

        <style>
            .smallcard-container {
                display: flex;
                gap: 24px; /* Default gap */
            }

            /* Position specific styles */
            .position-top {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .position-left {
                flex-direction: row;
                text-align: left;
            }

            .position-right {
                flex-direction: row-reverse;
                text-align: right;
            }

            .media-wrapper {
                flex: 0 0 auto;
                max-width: 200px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .media-wrapper i,
            .media-wrapper svg {
                display: inline-block;
                line-height: 1;
            }

            .content-wrapper {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                /* This helps with vertical alignment */
            }

            /* Responsive */
            @media (max-width: 767px) {
                .smallcard-container {
                    flex-direction: column !important;
                    align-items: center !important;
                    text-align: center !important;
                }
            }
        </style>
        <?php
    }
}

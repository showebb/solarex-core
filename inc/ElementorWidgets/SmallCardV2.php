<?php

namespace Solarex\Core\ElementorWidgets;
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class SmallCardV2 extends \Elementor\Widget_Base
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

    protected function register_controls()
    {
        // Content Tab
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => __('Icon', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Default Title', 'solarex-core'),
                'placeholder' => __('Enter your title', 'solarex-core'),
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'style_icon_section',
            [
                'label' => __('Icon', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .smallcard-icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __('Size', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => ['min' => 10, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_title_section',
            [
                'label' => __('Title', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .smallcard-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .smallcard-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_container_section',
            [
                'label' => __('Container', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'container_background',
                'label' => __('Background', 'solarex-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .smallcard-container',
            ]
        );
        // $this->add_control(
        //     'container_border_color',
        //     [
        //         'label' => __('Border Color', 'solarex-core'),
        //         'type' => \Elementor\Controls_Manager::COLOR,
        //         'selectors' => [
        //             '{{WRAPPER}} .smallcard-container' => 'border-color: {{VALUE}};',
        //         ],
        //     ]
        // );
        $this->add_responsive_control(
            'container_padding',
            [
                'label' => __('Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                "default" => [
                    "unit" => "px",
                    "top" => "24",
                    "right" => "24",
                    "bottom" => "24",
                    "left" => "24",
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'textdomain'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'textdomain'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'textdomain'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'container_display',
            [
                'label' => __('Display', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'block' => __('Block', 'solarex-core'),
                    'flex' => __('Flex', 'solarex-core'),
                ],
                'default' => 'block',
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'display: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'container_flex_direction',
            [
                'label' => __('Flex Direction', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'row' => __('Row', 'solarex-core'),
                    'row-reverse' => __('Row Reverse', 'solarex-core'),
                    'column' => __('Column', 'solarex-core'),
                    'column-reverse' => __('Column Reverse', 'solarex-core'),
                ],
                'default' => 'row',
                'condition' => [
                    'container_display' => 'flex',
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'container_align_items',
            [
                'label' => __('Align Items', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'flex-start' => __('Flex Start', 'solarex-core'),
                    'center' => __('Center', 'solarex-core'),
                    'flex-end' => __('Flex End', 'solarex-core'),
                    'stretch' => __('Stretch', 'solarex-core'),
                ],
                'default' => 'stretch',
                'condition' => [
                    'container_display' => 'flex',
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'align-items: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'container_justify_content',
            [
                'label' => __('Justify Content', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'flex-start' => __('Flex Start', 'solarex-core'),
                    'center' => __('Center', 'solarex-core'),
                    'flex-end' => __('Flex End', 'solarex-core'),
                    'space-between' => __('Space Between', 'solarex-core'),
                    'space-around' => __('Space Around', 'solarex-core'),
                    'space-evenly' => __('Space Evenly', 'solarex-core'),
                ],
                'default' => 'flex-start',
                'condition' => [
                    'container_display' => 'flex',
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'container_gap',
            [
                'label' => __('Gap', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 100],
                ],
                'condition' => [
                    'container_display' => 'flex',
                ],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'container_border_radius',
            [
                'label' => __('Border Radius', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .smallcard-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo '<div class="smallcard-container">';
        if (!empty($settings['icon']['value'])) {
            echo '<div class="smallcard-icon">';
            echo '<i class="' . esc_attr($settings['icon']['value']) . '"></i>';
            echo '</div>';
        }
        echo '<h5 class="smallcard-title">' . esc_html($settings['title']) . '</h5>';
        echo '</div>';
    }
}



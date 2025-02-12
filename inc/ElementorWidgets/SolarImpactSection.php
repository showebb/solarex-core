<?php

namespace Solarex\Core\ElementorWidgets;

class SolarImpactSection extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'solar_impact_section';
    }

    public function get_title()
    {
        return __('Solar Impact Section', 'solarex-core');
    }

    public function get_icon()
    {
        return 'eicon-inner-section';
    }

    public function get_categories()
    {
        return ['solarex-elements'];
    }

    protected function _register_controls()
    {
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Heading control
        $this->add_control(
            'heading',
            [
                'label' => __('Heading', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => __('With over 25 years of experience, we are dedicated to making solar energy accessible, affordable, and efficient for everyone.', 'solarex-core'),
                'placeholder' => __('Enter your heading here', 'solarex-core'),
            ]
        );

        // Learn More Button Text
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Learn More', 'solarex-core'),
            ]
        );

        // Button URL
        $this->add_control(
            'button_url',
            [
                'label' => __('Button URL', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'solarex-core'),
                'show_external' => true,
            ]
        );

        // Stat 1 Value and Text
        $this->add_control(
            'stat_1_value',
            [
                'label' => __('Stat 1 Value', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '10K+',
                'placeholder' => __('Enter Stat Value', 'solarex-core'),
            ]
        );

        $this->add_control(
            'stat_1_text',
            [
                'label' => __('Stat 1 Text', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => 'Solar Installations Completed',
                'placeholder' => __('Enter Stat Text', 'solarex-core'),
            ]
        );

        // Stat 2 Value and Text
        $this->add_control(
            'stat_2_value',
            [
                'label' => __('Stat 2 Value', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '30%',
                'placeholder' => __('Enter Stat Value', 'solarex-core'),
            ]
        );

        $this->add_control(
            'stat_2_text',
            [
                'label' => __('Stat 2 Text', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => 'Average Customer Savings on Energy Bill',
                'placeholder' => __('Enter Stat Text', 'solarex-core'),
            ]
        );

        // Stat 3 Value and Text
        $this->add_control(
            'stat_3_value',
            [
                'label' => __('Stat 3 Value', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1M',
                'placeholder' => __('Enter Stat Value', 'solarex-core'),
            ]
        );

        $this->add_control(
            'stat_3_text',
            [
                'label' => __('Stat 3 Text', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 5,
                'default' => 'Equivalent of Planting Trees Carbon Emission Reduction',
                'placeholder' => __('Enter Stat Text', 'solarex-core'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'general_style_section',
            [
                'label' => __('General', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Container Padding
        $this->add_responsive_control(
            'container_padding',
            [
                'label' => __('Container Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                // 'default' => [
                //     'top' => '20',
                //     'right' => '20',
                //     'bottom' => '20',
                //     'left' => '20',
                //     'unit' => 'px',
                // ],
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Heading Style
        $this->start_controls_section(
            'heading_style_section',
            [
                'label' => __('Heading', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __('Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} #solarex-impact-section-heading',
            ]
        );

        // Heading Color
        $this->add_control(
            'heading_color',
            [
                'label' => __('Text Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section-heading' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Button Style
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __('Button', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Text Color
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Background Color
        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'transparent',
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button Padding
        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '8',
                    'right' => '20',
                    'bottom' => '8',
                    'left' => '20',
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Border Width
        $this->add_control(
            'button_border_width',
            [
                'label' => __('Border Width', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 2,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section-button' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Border Style
        $this->add_control(
            'button_border_style',
            [
                'label' => __('Border Style', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'solid' => __('Solid', 'solarex-core'),
                    'dashed' => __('Dashed', 'solarex-core'),
                    'dotted' => __('Dotted', 'solarex-core'),
                    'double' => __('Double', 'solarex-core'),
                    'groove' => __('Groove', 'solarex-core'),
                    'ridge' => __('Ridge', 'solarex-core'),
                    'inset' => __('Inset', 'solarex-core'),
                    'outset' => __('Outset', 'solarex-core'),
                    'none' => __('None', 'solarex-core'),
                ],
                'default' => 'solid',
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section-button' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        // Border Color
        $this->add_control(
            'button_border_color',
            [
                'label' => __('Border Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#1F2124',
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section-button' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        // Border Radius
        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 40,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} #solarex-impact-section-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();








        // Statistics Style for Stat 1
        $this->start_controls_section(
            'statistics_style_section',
            [
                'label' => __('Statistics 1', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Value Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stat_value_typography',
                'label' => __('Value Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .fun-1 h1',
            ]
        );

        // Text Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stat_text_typography',
                'label' => __('Text Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .fun-1 p',
            ]
        );

        // Value Color
        $this->add_control(
            'stat_heading_value_color',
            [
                'label' => __('Value Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .fun-1 > h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .fun-1 > p ' => 'color: {{VALUE}};',
                ],
            ]
        );
       

        $this->add_control(
            'fun_1_bg_color',
            [
                'label' => __('Background Color ', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFEFE4', // Default color
                'selectors' => [
                    '{{WRAPPER}} .fun-1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        // Statistics Style for Stat 2
        $this->start_controls_section(
            'statistics_style_section_2',
            [
                'label' => __('Statistics 2', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Value Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stat_value_typography_2',
                'label' => __('Value Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .fun-2 h1',
            ]
        );

        

        // Value Color
        $this->add_control(
            'stat_value_color_2',
            [
                'label' => __('Value Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .fun-2 > h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .fun-2 > p ' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background Color
        $this->add_control(
            'fun_1_bg_color_2',
            [
                'label' => __('Background Color ', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#70AC48', // Default color
                'selectors' => [
                    '{{WRAPPER}} .fun-2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        // Statistics Style for Stat 3
        $this->start_controls_section(
            'statistics_style_section_3',
            [
                'label' => __('Statistics 3', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Value Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stat_value_typography_3',
                'label' => __('Value Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .fun-3 h1',
            ]
        );

        // Text Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stat_text_typography_3',
                'label' => __('Text Typography', 'solarex-core'),
                'selector' => '{{WRAPPER}} .fun-3 p',
            ]
        );

        // Value Color (for h1)
        $this->add_control(
            'stat_value_color_3',
            [
                'label' => __('Value Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333',
                'selectors' => [
                    '{{WRAPPER}} .fun-3 > h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .fun-3 > p ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'fun_1_bg_color_3',
            [
                'label' => __('Background Color ', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .fun-3' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div id="solarex-impact-section" class="solarex_about-fun py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 id="solarex-impact-section-heading" class="mb-4 opacity-75">
                            <?php echo esc_html($settings['heading']); ?>
                        </h3>
                        <!-- primary-button -->
                        <a id="solarex-impact-section-button" href="<?php echo esc_url($settings['button_url']['url']); ?>"
                            class=""><?php echo esc_html($settings['button_text']); ?></a>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-9">
                        <div class="minus-fun">
                            <div class="d-md-flex align-items-end">
                                <div id="solarex-impact-section-stat-1" class="p-5 fun-1">
                                    <h1 class="mb-2 olarex_stat_value_1"><?php echo esc_html($settings['stat_1_value']); ?></h1>
                                    <p class="mb-0 olarex_stat_value_1"><?php echo esc_html($settings['stat_1_text']); ?></p>
                                </div>
                                <div id="solarex-impact-section-stat-2" class="p-5 fun-2">
                                    <h1 class="mb-2 olarex_stat_value_2"><?php echo esc_html($settings['stat_2_value']); ?></h1>
                                    <p class="mb-0 olarex_stat_value_2"><?php echo esc_html($settings['stat_2_text']); ?></p>
                                </div>
                                <div id="solarex-impact-section-stat-3" class="p-5 fun-3">
                                    <h1 class="mb-2 olarex_stat_value_3"><?php echo esc_html($settings['stat_3_value']); ?></h1>
                                    <p class="mb-0 olarex_stat_value_3"><?php echo esc_html($settings['stat_3_text']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


}

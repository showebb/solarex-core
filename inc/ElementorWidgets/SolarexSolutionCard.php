<?php

namespace Solarex\Core\ElementorWidgets;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SolarexSolutionCard extends \Elementor\Widget_Base {

    public function get_name() {
        return 'solarex_solution_card';
    }

    public function get_title() {
        return __( 'Solarex Solution Card', 'solerex-core' );
    }

    public function get_icon() {
        return 'eicon-image-box';
    }

    public function get_categories() {
        return [ 'solarex-elements' ];
    }

    protected function register_controls(): void {

        // Start Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'solerex-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Image Control
        $this->add_control(
            'image',
            [
                'label'   => esc_html__( 'Image', 'solerex-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/406x320',
                ],
            ]
        );

        // Textarea Control
        $this->add_control(
            'description',
            [
                'label'       => esc_html__( 'Description', 'solerex-core' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'placeholder' => esc_html__( 'Enter your description here', 'textdomain' ),
                'default'     => esc_html__( 'Residential Solar Installation - The Camelia Family Home', 'textdomain' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        // Get settings
        $settings = $this->get_settings_for_display();

        // Extract settings
        $image = $settings['image']['url'] ?: 'https://placehold.co/406x406';
        $description = $settings['description'] ?: 'Residential Solar Installation - The Camelia Family Home';

        ?>
        <div class="">
            <img src="<?php echo esc_url( $image ); ?>" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center; aspect-ratio: 4/4;"  alt="">
            <h6 class="mt-4"><?php echo esc_html( $description ); ?></h6>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var image = settings.image.url || 'https://placehold.co/406x320';
        var description = settings.description || 'Residential Solar Installation – The Camelia Family Home';
        #>
        <div class="">
            <img src="{{ image }}" class="img-fluid w-100" alt="" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center; aspect-ratio: 4/4;">
            <h6 class="mt-4">{{{ description }}}</h6>
        </div>
        <?php
    }
}
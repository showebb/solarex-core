<?php

namespace Solarex\Core\ElementorWidgets;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SolarexGalleryGrid extends \Elementor\Widget_Base {

    public function get_name() {
        return 'solarex_gallery';
    }

    public function get_title() {
        return __( 'Solarex Gallery', 'solerex-core' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'solarex-elements' ];
    }

    protected function register_controls(): void {

        // Start Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'textdomain' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Add Image Controls for Each Box
        $this->add_control(
            'image_1',
            [
                'label'   => esc_html__( 'Image 1 (Top Left)', 'textdomain' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/385x320',
                ],
            ]
        );

        $this->add_control(
            'image_2',
            [
                'label'   => esc_html__( 'Image 2 (Top Right)', 'textdomain' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/385x320',
                ],
            ]
        );

        $this->add_control(
            'image_3',
            [
                'label'   => esc_html__( 'Image 3 (Bottom Left)', 'textdomain' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/254x240',
                ],
            ]
        );

        $this->add_control(
            'image_4',
            [
                'label'   => esc_html__( 'Image 4 (Bottom Center)', 'textdomain' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/254x240',
                ],
            ]
        );

        $this->add_control(
            'image_5',
            [
                'label'   => esc_html__( 'Image 5 (Bottom Right)', 'textdomain' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/254x240',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        // Get settings
        $settings = $this->get_settings_for_display();

        // Extract image URLs
        $image_1 = $settings['image_1']['url'] ?: 'https://placehold.co/385x320';
        $image_2 = $settings['image_2']['url'] ?: 'https://placehold.co/385x320';
        $image_3 = $settings['image_3']['url'] ?: 'https://placehold.co/254x240';
        $image_4 = $settings['image_4']['url'] ?: 'https://placehold.co/254x240';
        $image_5 = $settings['image_5']['url'] ?: 'https://placehold.co/254x240';

        ?>
        <div class="d-flex flex-column gap-2">
            <div class="row g-2">
                <div class="col-12 col-md-6">
                    <img src="<?php echo esc_url( $image_1 ); ?>" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
                <div class="col-12 col-md-6">
                    <img src="<?php echo esc_url( $image_2 ); ?>" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
            </div>
            <div class="row g-2">
                <div class="col-4">
                    <img src="<?php echo esc_url( $image_3 ); ?>" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
                <div class="col-4">
                    <img src="<?php echo esc_url( $image_4 ); ?>" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
                <div class="col-4">
                    <img src="<?php echo esc_url( $image_5 ); ?>" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var image1 = settings.image_1.url || 'https://placehold.co/385x320';
        var image2 = settings.image_2.url || 'https://placehold.co/385x320';
        var image3 = settings.image_3.url || 'https://placehold.co/254x240';
        var image4 = settings.image_4.url || 'https://placehold.co/254x240';
        var image5 = settings.image_5.url || 'https://placehold.co/254x240';
        #>
        <div class="d-flex flex-column gap-2">
            <div class="row g-2">
                <div class="col-12 col-md-6">
                    <img src="{{ image1 }}" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
                <div class="col-12 col-md-6">
                    <img src="{{ image2 }}" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%;  background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
            </div>
            <div class="row g-2">
                <div class="col-4">
                    <img src="{{ image3 }}" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
                <div class="col-4">
                    <img src="{{ image4 }}" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%;  background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
                <div class="col-4">
                    <img src="{{ image5 }}" class="img-fluid w-100" style="background-size: cover; height:100%; width:100%; background-repeat: no-repeat; background-position: center;" alt="Solar Image">
                </div>
            </div>
        </div>
        <?php
    }
}

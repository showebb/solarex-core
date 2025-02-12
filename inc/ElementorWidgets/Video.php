<?php
namespace Solarex\Core\ElementorWidgets;
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class Video extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'video_popup';
    }

    public function get_title()
    {
        return __('Video Popup', 'solarex-core');
    }

    public function get_icon()
    {
        return 'eicon-play';
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

        // Video URL Control
        $this->add_control(
            'video_url',
            [
                'label' => __('Video URL', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => 'https://youtu.be/mqWUW6ypo6w?list=PL4Gr5tOAPttKUXrXjulSCYa-L4xIwDyTi',
                'placeholder' => __('Enter video URL', 'solarex-core'),
            ]
        );

        $this->end_controls_section();

        // Thumbnail Image Control
        $this->start_controls_section(
            'thumbnail_image_section',
            [
                'label' => __('Thumbnail Image', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'thumbnail_image',
            [
                'label' => __('Thumbnail Image', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://placehold.co/1920x900',
                ],
            ]
        );
        $this->end_controls_section();



        // start icon section
        $this->start_controls_section(
            'icon_section_section',
            [
                'label' => __('Icon', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Play Icon Control
        $this->add_control(
            'play_icon',
            [
                'label' => __('Play Icon', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa-solid fa-circle-play',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->end_controls_section();

        // add widthe and height style for video_thumbnail
        $this->start_controls_section(
            'video_thumbnail_section',
            [
                'label' => __('Video Thumbnail', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'video_thumbnail_width',
            [
                'label' => __('Width', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1920,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1140,
                ],
                'selectors' => [
                    '{{WRAPPER}} .video_thumbnail' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'video_thumbnail_height',
            [
                'label' => __('Height', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1080,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 500,
                ],
                'selectors' => [
                    '{{WRAPPER}} .video_thumbnail' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // start style section 
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style', 'solarex-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        // Icon Color Control
        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .play-button i' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Overlay Color Control
        $this->add_control(
            'overlay_color',
            [
                'label' => __('Overlay Color', 'solarex-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.5)',
                'selectors' => [
                    '{{WRAPPER}} .video-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }



    private function get_embeddable_youtube_url($url)
    {
        // Parse the URL
        $parsed_url = parse_url($url);

        if (!isset($parsed_url['host'])) {
            return $url; // Return as-is if no host is present
        }

        // Check for youtu.be short URL
        if (strpos($parsed_url['host'], 'youtu.be') !== false) {
            // Convert youtu.be short URL to embed format
            return 'https://www.youtube.com/embed' . $parsed_url['path'];
        }

        // Check for youtube.com URLs
        if (strpos($parsed_url['host'], 'youtube.com') !== false) {
            // Parse query string to get video ID
            if (!empty($parsed_url['query'])) {
                parse_str($parsed_url['query'], $query_vars);
                if (isset($query_vars['v'])) {
                    return 'https://www.youtube.com/embed/' . $query_vars['v'];
                }
            }

            // Check for URLs in /embed/ format
            if (strpos($parsed_url['path'], '/embed/') === 0) {
                return $url; // Already in embed format
            }

            // Check for URLs in /v/ format
            if (strpos($parsed_url['path'], '/v/') === 0) {
                return str_replace('/v/', '/embed/', $url);
            }
        }

        // Return the original URL if it does not match YouTube patterns
        return $url;
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Use the helper function to format the video URL
        $video_url = esc_url($this->get_embeddable_youtube_url($settings['video_url']));
        $thumbnail_url = esc_url($settings['thumbnail_image']['url']);
        $overlay_color = empty($settings['overlay_color']) ? 'rgba(0, 0, 0, 0.5)' : $settings['overlay_color'];
        $icon = $settings['play_icon']['value'];

        ?>
        <div class="position-relative d-inline-block ">
            <img src="<?php echo $thumbnail_url; ?>" alt="Video Thumbnail" class="video_thumbnail ratio ratio-16x9"
                style="object-fit: cover;" />
            <div class="video-overlay position-absolute top-0 start-0 w-100 h-100"
                style="background-color: <?php echo $overlay_color; ?>;"></div>
            <button class="video btn position-absolute top-50 start-50 translate-middle play-button" data-bs-toggle="modal"
                data-bs-target="#videoModal">
                <i class="<?php echo esc_attr($icon); ?> fa-5x"></i>
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel">Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ratio ratio-16x9">
                            <iframe id="videoPlayer" src="" frameborder="0" allow="autoplay; encrypted-media"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function ($) {
                $('.video').on('click', function () {
                    $('#videoPlayer').attr('src', '<?php echo $video_url; ?>?autoplay=1');
                });
                $('#videoModal').on('hidden.bs.modal', function () {
                    $('#videoPlayer').attr('src', '');
                });
            });
        </script>
        <?php
    }

}

<?php
class Elementor_Reviews_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'reviews_widget';
	}

	public function get_title(): string
	{
		return esc_html__('Reviews', 'elementor-delivery');
	}

	public function get_icon(): string
	{
		return 'eicon-code';
	}

	public function get_categories(): array
	{
		return ['delivery'];
	}

	public function get_keywords(): array
	{
		return ['reviews'];
	}

	protected function register_controls(): void
	{

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('On section', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'swiper_prev',
			[
				'label' => esc_html__('Swiper Prev', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'swiper_next',
			[
				'label' => esc_html__('Swiper Next', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'reviews',
			[
				'label' => esc_html__('Reviews', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('', 'elementor-delivery'),
			]
		);

		$repeater->add_control(
			'name',
			[
				'label' => esc_html__('Name', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('', 'elementor-delivery'),
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'reviews_list',
			[
				'label' => __('Reviews List', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ reviews  }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render(): void
	{
		$settings = $this->get_settings_for_display();
?>

		<section class="reviews" id="reviews">
			<div class="container">
				<div class="reviews_title">
					<h1><?php echo esc_html($settings['title']) ?></h1>
				</div>

				<div class="swiper">
					<div class="reviews_slider">
						<ul class="card_list swiper-wrapper">
							<?php if (! empty($settings['reviews_list'])):
								foreach ($settings['reviews_list'] as $item) : ?>
									<li class="card_item swiper-slide">
										<div class="card_title">
											<p><?php echo esc_html($item['reviews']) ?></p>
											<div class="card_name">
												<p><?php echo esc_html($item['name']) ?></p>
												<img src="<?php echo esc_url($item['icon']['url']) ?>" alt="<?php echo esc_attr($item['icon']['alt']) ?>">
											</div>
										</div>
									</li>
							<?php
								endforeach;
							endif; ?>
						</ul>

						<div class="prev"><img src="<?php echo esc_url($settings['swiper_prev']['url']) ?>" alt="<?php echo esc_attr($settings['swiper_prev']['alt']) ?>"></div>
						<div class="next"><img src="<?php echo esc_url($settings['swiper_next']['url']) ?>" alt="<?php echo esc_attr($settings['swiper_next']['alt']) ?>"></div>
					</div>
				</div>
			</div>
		</section>


		<script>
			setTimeout(() => {
				new Swiper('.reviews_slider', {
					loop: true,
					spaceBetween: 30,

					// If we need pagination
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
						dynamicBullets: true
					},

					// Navigation arrows
					navigation: {
						nextEl: '.next',
						prevEl: '.prev',
					},

					// And if we need scrollbar
					scrollbar: {
						el: '.swiper-scrollbar',
					},

					breakpoints: {
						0: {
							slidesPerView: 1
						},
						768: {
							slidesPerView: 1
						},
						1024: {
							slidesPerView: 2
						}
					}
				});
			}, 500)
		</script>

<?php
	}
}

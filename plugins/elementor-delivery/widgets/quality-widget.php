<?php
class Elementor_Quality_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'quality_widget';
	}

	public function get_title(): string
	{
		return esc_html__('Quality', 'elementor-delivery');
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
		return ['quality'];
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
			'desc',
			[
				'label' => esc_html__('Description', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__('Button Text', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'elementor-delivery'),
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
			'quality_list',
			[
				'label' => __('Qualiti List', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title  }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'off_screen_Section',
			[
				'label' => esc_html__('Off section', 'elementor-addon'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXT,
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
			'off_screen_list',
			[
				'label' => __('Off Qualiti List', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title  }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render(): void
	{
		$settings = $this->get_settings_for_display();
?>
		<section class="quality" id="quality">
			<div class="container">
				<div class="quality_title">
					<h1><?php echo esc_html($settings['title']) ?></h1>
					<p><?php echo esc_html($settings['desc']) ?></p>
				</div>

				<div class="card_wrapper quality_cards">

					<?php if (! empty($settings['quality_list'])):
						foreach ($settings['quality_list'] as $item) : ?>
							<div class="item_quality">
								<img src="<?php echo esc_url($item['icon']['url']) ?>" alt="<?php echo esc_attr($item['icon']['alt']) ?>">
								<h2><?php echo esc_html($item['title']) ?></h2>
							</div>
					<?php
						endforeach;
					endif; ?>
				</div>

				<!-- Скрытые блоки -->
				<div class="card_wrapper quality_cards hidden">

					<?php if (! empty($settings['off_screen_list'])):
						foreach ($settings['off_screen_list'] as $item) : ?>
							<div class="item_quality">
								<img src="<?php echo esc_url($item['icon']['url']) ?>" alt="<?php echo esc_attr($item['icon']['alt']) ?>">
								<h2><?php echo esc_html($item['title']) ?></h2>
							</div>
					<?php
						endforeach;
					endif; ?>
				</div>

				<div class="quality_more">
						<button id="toggleButton"><?php echo esc_html($settings['button_text'])?></button>
				</div>
			</div>
		</section>

<?php
	}
}

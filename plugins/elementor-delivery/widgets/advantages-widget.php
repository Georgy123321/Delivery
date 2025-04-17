<?php
class Elementor_Advantages_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'advantages_widget';
	}

	public function get_title(): string
	{
		return esc_html__('Advantages', 'elementor-delivery');
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
		return ['advantages'];
	}

	protected function register_controls(): void
	{

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title And Image', 'elementor-addon'),
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'elementor-wpthefor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'elementor-wpthefor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('', 'elementor-wpthefor'),
			]
		);

		$repeater->add_control(
			'desc',
			[
				'label' => esc_html__('Description', 'elementor-wpthefor'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('', 'elementor-wpthefor'),
			]
		);

		$this->add_control(
			'advantages_list',
			[
				'label' => __('Banner List', 'elementor-wpthefor'),
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

		<section class="advantages" id="about-us">
			<div class="container">
				<div class="advantages-title">
					<h1><?php echo esc_html($settings['title']) ?></h1>
				</div>

				<div class="card_wrapper">
					<?php if (! empty($settings['advantages_list'])):
						foreach ($settings['advantages_list'] as $item) : ?>
							<div class="advantages_item">
								<img src="<?php echo esc_url($item['icon']['url'])?>" alt="<?php echo esc_attr($item['icon']['alt'])?>">
								<div class="item_title">
									<h2><?php echo esc_html($item['title'])?></h2>
									<p><?php echo esc_html($item['desc'])?></p>
								</div>
							</div>
					<?php
						endforeach;
					endif; ?>
				</div>
			</div>
		</section>

<?php
	}
}

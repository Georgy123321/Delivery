<?php
class Elementor_Main_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'main_widget';
	}

	public function get_title(): string
	{
		return esc_html__('Main', 'elementor-delivery');
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
		return ['main'];
	}

	protected function register_controls(): void
	{

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title And Image', 'elementor-addon' ),
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
				'label' => esc_html__('Decription', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__('Image', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'form',
			[
				'label' => esc_html__( 'Form', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'form_title',
			[
				'label' => esc_html__('Form Title', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'form_desc',
			[
				'label' => esc_html__('Form Description', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'calc_shortcode',
			[
				'label' => esc_html__('Form Calculator', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();
	}

	protected function render(): void
	{
		$settings = $this->get_settings_for_display();
?>

		<main class="main" id="main">
			<div class="container">
				<div class="main_hero">
					<div class="main_title">
						<h1><?php echo esc_html($settings['title']); ?></h1>
						<p><?php echo esc_html($settings['desc'])?></p>
					</div>

					<div class="main_img">
						<img src="<?php echo esc_url($settings['image']['url'])?>" alt="<?php echo esc_attr($settings['image']['alt'])?>">
					</div>
				</div>

				<div class="main_form">
					<div class="main_form-title">
						<h3><?php echo esc_html($settings['form_title'])?></h3>
						<p><?php echo esc_html($settings['form_desc'])?></p>
					</div>

					<?php echo do_shortcode($settings['calc_shortcode'])?>
				</div>
			</div>
		</main>

<?php
	}
}

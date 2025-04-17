<?php
class Elementor_Questions_Widget extends \Elementor\Widget_Base
{

	public function get_name(): string
	{
		return 'questions_widget';
	}

	public function get_title(): string
	{
		return esc_html__('Questions', 'elementor-delivery');
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
		return ['questions'];
	}

	protected function register_controls(): void
	{

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Title', 'elementor-addon'),
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
			'questions_shortcode',
			[
				'label' => esc_html__('Form Questions', 'elementor-delivery'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();
	}

	protected function render(): void
	{
		$settings = $this->get_settings_for_display();
?>

		<section class="questions">
			<div class="container">
				<div class="questions-form">
					<div class="questions-form-title">
						<h1><?php echo esc_html($settings['title'])?></h1>
					</div>

					<?php echo do_shortcode($settings['questions_shortcode'])?>
				</div>
			</div>
		</section>

<?php
	}
}

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php global $global_options; ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header class="header">
			<div class="container">
				<div class="header_top">
					<div class="header_logo">
						<img src="<?php echo $global_options['header-logo']['url']; ?>" alt="Logo" class="desctop">
						<img src="<?php echo $global_options['header-mobile-logo']['url']; ?>" alt="logo" class="mobile">
					</div>

					<div class="header_number">
						<h2><?php echo $global_options['header-phone']; ?></h2>
						<p><?php echo $global_options['header-title']; ?></p>

						<div class="overlay"></div>
						<div class="hamburger-menu">
							<div class="off-screen-menu">

								<?php
								wp_nav_menu(
									array(
										'theme_location'  => 'menu-header-mobile',
										'menu_id'         => 'menu-header-mobile',
										'walker'          => new Hamburger_Nav_Walker(),
									)
								);
								?>
								<?php if (isset($global_options['burger-button-text']) && $global_options['burger-button-text'] !== ''): ?>
									<div class="berger_button">
										<button><?php echo esc_html($global_options['burger-button-text'])?></button>
									</div>
								<? endif; ?>
							</div>
							<nav>
								<div class="ham-menu">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</nav>
						</div>
					</div>
				</div>

				<div class="header_bottom">
					<div class="header_menu">

						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'menu-header-pc',
								'menu_id'         => 'menu-header-pc',
								'container'       => 'nav',
								'container_class' => 'header_nav',
								'walker'          => new Header_Nav_Walker(),
							)
						);

						?>
					</div>

					<?php if (isset($global_options['header-button-text']) && $global_options['header-button-text'] !== '') : ?>
						<div class="header_button">
							<button><?php echo esc_html($global_options['header-button-text']); ?></button>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</header>
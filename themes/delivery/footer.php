<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Delivery
 */

?>

<?php global $global_options; ?>

<footer class="footer">
	<div class="container footer_item">
		<div class="footer_logo">
			<img src="<?php echo $global_options['footer-logo']['url']; ?>" alt="logo">
			<p></p>
		</div>

		<div class="footer_nav">
			<nav>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'menu-footer',
						'menu_id'         => 'menu-footer',
						'container'       => false,
						'walker'          => new Footer_Nav_Walker(),
					)
				);
				?>
			</nav>
		</div>

		<div class="footer_num">
			<h2><?php echo $global_options['footer-phone']; ?></h2>
			<p><?php echo $global_options['Footer-title']; ?></p>
			</p>
		</div>
	</div>
</footer>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
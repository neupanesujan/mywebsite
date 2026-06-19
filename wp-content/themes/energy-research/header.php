<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="header-container">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				Energy<span>Research</span>
			</a>
		</div>

		<nav class="main-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'container'      => false,
				'fallback_cb'    => false,
			) );
			?>
			<!-- Fallback menu if no menu is set in WordPress admin -->
			<?php if ( ! has_nav_menu( 'primary' ) ) : ?>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Research</a></li>
				<li><a href="#">Optimization</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<?php endif; ?>
		</nav>
	</div>
</header>

<script>
// Add scrolled class to header when scrolling
window.addEventListener('scroll', () => {
	const header = document.querySelector('.site-header');
	if (window.scrollY > 50) {
		header.classList.add('scrolled');
	} else {
		header.classList.remove('scrolled');
	}
});
</script>

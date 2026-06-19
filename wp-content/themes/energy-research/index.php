<?php
/**
 * The main template file
 *
 * @package Energy_Research
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="hero-section">
		<div class="hero-bg-anim"></div>
		<div class="hero-content">
			<h1>Advancing <span>Energy</span> &amp;<br>Industrial <span>Optimization</span></h1>
			<p>Pioneering research in smart grids, sustainable manufacturing, and data-driven industrial engineering solutions for the future.</p>
			<a href="#research" class="btn-primary">Explore Our Research</a>
		</div>
	</section>

	<section id="research" class="research-grid">
		
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('research-card glass-panel'); ?>>
					<div class="research-card-icon">⚡</div>
					<h3><a href="<?php echo esc_url( get_permalink() ); ?>" style="color: inherit;"><?php the_title(); ?></a></h3>
					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-primary" style="padding: 8px 20px; font-size: 0.8rem; margin-top: 15px;">Read More</a>
				</article>
				<?php
			endwhile;
			
			the_posts_navigation();

		else :
			// If no posts found, show some placeholder content for the theme preview
			?>
			<article class="research-card glass-panel">
				<div class="research-card-icon">⚡</div>
				<h3>Smart Grid Optimization</h3>
				<p>Developing advanced algorithms for efficient energy distribution and load balancing in modern electrical grids.</p>
				<a href="#" class="btn-primary" style="padding: 8px 20px; font-size: 0.8rem; margin-top: 15px;">Learn More</a>
			</article>

			<article class="research-card glass-panel">
				<div class="research-card-icon">⚙️</div>
				<h3>Industrial Engineering</h3>
				<p>Applying state-of-the-art predictive maintenance and operations research to minimize downtime in manufacturing.</p>
				<a href="#" class="btn-primary" style="padding: 8px 20px; font-size: 0.8rem; margin-top: 15px;">Learn More</a>
			</article>

			<article class="research-card glass-panel">
				<div class="research-card-icon">🔋</div>
				<h3>Renewable Integration</h3>
				<p>Researching dynamic solutions for seamlessly integrating solar and wind energy sources into existing infrastructures.</p>
				<a href="#" class="btn-primary" style="padding: 8px 20px; font-size: 0.8rem; margin-top: 15px;">Learn More</a>
			</article>
			<?php
		endif;
		?>

	</section>

</main><!-- #main -->

<?php
get_footer();

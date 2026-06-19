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

	<section id="about" class="about-section" style="max-width: 1200px; margin: 100px auto; padding: 0 20px; display: flex; flex-wrap: wrap; gap: 40px; align-items: center;">
		<div class="about-image" style="flex: 1; min-width: 300px; text-align: center;">
			<img src="<?php echo esc_url( home_url( '/wp-content/uploads/2024/03/sujanneupane_logo.png' ) ); ?>" alt="Sujan Neupane" style="width: 100%; max-width: 350px; border-radius: 20px; box-shadow: var(--shadow-neon);">
		</div>
		<div class="about-content" style="flex: 2; min-width: 300px;">
			<h2 style="font-size: 2.5rem; margin-bottom: 20px;">About <span style="color: var(--accent-green);">Me</span></h2>
			<p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: 20px;">
				Hello, I am Sujan Neupane. I am deeply interested in the Energy sector, Industrial Engineering, and Optimization. 
				My research focuses on smart grids, sustainable manufacturing, and developing predictive models for complex industrial systems.
			</p>
			<a href="#research" class="btn-primary">View My Research</a>
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

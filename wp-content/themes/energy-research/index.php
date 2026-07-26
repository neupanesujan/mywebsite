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
			<h1>Data <span>Analytics</span> &amp;<br>Industrial <span>Engineering</span></h1>
			<p>Analytics Manager with 5+ years of experience at Alibaba Group and Pharmaceutical sectors, specializing in Python, SQL, and Power BI.</p>
			<a href="#experience" class="btn-primary">View My Experience</a>
		</div>
	</section>

	<section id="about" class="about-section" style="max-width: 1200px; margin: 100px auto; padding: 0 20px; display: flex; flex-wrap: wrap; gap: 40px; align-items: center;">
		<div class="about-image" style="flex: 1; min-width: 300px; text-align: center;">
			<img src="<?php echo esc_url( home_url( '/wp-content/uploads/2024/03/sujanneupane_logo.png' ) ); ?>" alt="Sujan Neupane" style="width: 100%; max-width: 350px; border-radius: 20px; box-shadow: var(--shadow-neon);">
		</div>
		<div class="about-content" style="flex: 2; min-width: 300px;">
			<h2 style="font-size: 2.5rem; margin-bottom: 20px;">About <span style="color: var(--accent-green);">Me</span></h2>
			<p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: 20px;">
				Hello, I am Sujan Neupane. I am an Analytics Manager and Industrial Engineer with a strong passion for data-driven decision making and process optimization. I specialize in leveraging tools like Python, SQL, and Power BI to build automated systems, derive commercial insights, and drive strategic growth across aviation, energy, and e-commerce sectors.
			</p>
			<a href="#experience" class="btn-primary">Explore My Journey</a>
		</div>
	</section>

	<section id="experience" style="max-width: 1200px; margin: 100px auto; padding: 0 20px;">
		<h2 style="font-size: 2.5rem; text-align: center; margin-bottom: 50px;">Work <span style="color: var(--accent-green);">Experience</span></h2>
		<div class="research-grid" style="margin: 0; padding: 0; max-width: none;">
			<article class="research-card glass-panel">
				<div class="research-card-icon">✈️</div>
				<h3>Research Assistant</h3>
				<p style="color: var(--accent-blue); font-weight: 600; margin-bottom: 5px;">Central Queensland University</p>
				<p style="font-size: 0.85rem; margin-bottom: 15px; color: var(--text-secondary);">Jan 2026 - April 2026 | Sydney, Australia</p>
				<p>Conducted rigorous data analysis in Python for research workflows, GIS mapping, and structured literature reviews on aviation policy and network optimization.</p>
			</article>

			<article class="research-card glass-panel">
				<div class="research-card-icon">📊</div>
				<h3>Analytics & Performance Manager</h3>
				<p style="color: var(--accent-blue); font-weight: 600; margin-bottom: 5px;">Sumy Pharmaceuticals</p>
				<p style="font-size: 0.85rem; margin-bottom: 15px; color: var(--text-secondary);">Feb 2025 - Sept 2025 | Kathmandu, Nepal</p>
				<p>Built comprehensive daily performance dashboards using Looker Studio, developed custom data models, and conducted advanced forecasting delivering a 15% reduction in production costs.</p>
			</article>

			<article class="research-card glass-panel">
				<div class="research-card-icon">📈</div>
				<h3>Performance Manager</h3>
				<p style="color: var(--accent-blue); font-weight: 600; margin-bottom: 5px;">Alibaba Group</p>
				<p style="font-size: 0.85rem; margin-bottom: 15px; color: var(--text-secondary);">July 2021 - Mar 2024 | Kathmandu, Nepal</p>
				<p>Designed and deployed 100+ KPI performance trackers, built automated dashboards to track campaign ROI, and conducted advanced commercial analytics including RFM modeling.</p>
			</article>
		</div>
	</section>

	<section id="conferences" style="max-width: 1200px; margin: 100px auto; padding: 0 20px;">
		<h2 style="font-size: 2.5rem; text-align: center; margin-bottom: 50px;">Papers & <span style="color: var(--accent-green);">Conferences</span></h2>
		<div class="research-grid" style="margin: 0; padding: 0; max-width: none; grid-template-columns: 1fr;">
			<article class="research-card glass-panel" style="text-align: left; padding: 40px; display: flex; flex-direction: column; gap: 20px;">
				<div style="display: flex; align-items: center; gap: 20px;">
					<div class="research-card-icon" style="margin: 0; font-size: 2.5rem;">🎤</div>
					<div>
						<h3 style="margin: 0; font-size: 1.8rem;">Air Transport Research Society (ATRS)</h3>
						<p style="color: var(--accent-blue); font-weight: 600; margin-top: 5px; font-size: 1.1rem;">Beijing, 2026</p>
					</div>
				</div>
				<p style="font-size: 1.1rem; line-height: 1.6;">Presented at the ATRS Conference highlighting the connectivity gaps in Australia's regional aviation network.</p>
			</article>
		</div>
	</section>

	<section id="projects" style="max-width: 1200px; margin: 100px auto; padding: 0 20px;">
		<h2 style="font-size: 2.5rem; text-align: center; margin-bottom: 50px;">Education & <span style="color: var(--accent-green);">Projects</span></h2>
		<div class="research-grid" style="margin: 0; padding: 0; max-width: none;">
		
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
				<div class="research-card-icon">🔋</div>
				<h3>Mass Deployment of V2G EV Charging</h3>
				<p>Masters by Research at Central Queensland University focusing on bi-directional EV charging infrastructure.</p>
				<a href="#" class="btn-primary" style="padding: 8px 20px; font-size: 0.8rem; margin-top: 15px;">Learn More</a>
			</article>

			<article class="research-card glass-panel">
				<div class="research-card-icon">⚙️</div>
				<h3>Industrial Engineering</h3>
				<p>Bachelor in Industrial Engineering from Tribhuvan University. Relevant Coursework: Operation Research, Supply Chain.</p>
				<a href="#" class="btn-primary" style="padding: 8px 20px; font-size: 0.8rem; margin-top: 15px;">Learn More</a>
			</article>

			<article class="research-card glass-panel">
				<div class="research-card-icon">🧠</div>
				<h3>AI Fundamentals</h3>
				<p>Completed AI fundamentals course from University of Helsinki, strengthening foundation in machine learning concepts.</p>
				<a href="#" class="btn-primary" style="padding: 8px 20px; font-size: 0.8rem; margin-top: 15px;">Learn More</a>
			</article>
			<?php
		endif;
		?>

		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();

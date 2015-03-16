<?php
/* 
Template name: Thoughts 
*/

query_posts( array( 'in__category' => 'thoughts' ) );

get_header(); ?>

	<div class="clearfix">
		
		<div class="archive-page-header" id="content-header">
			<h1 class="entry-title">
				<?php single_cat_title(); ?>
			</h1>
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</div><!-- .page-header -->
		
	</div><!-- .clearfix -->
		<!--breadcrumbs -->
	<?php if(function_exists('bcn_display')){ ?>
		<div class="klein-breadcrumbs clearfix">
			<?php bcn_display(); ?>
		</div>
	<?php } ?>
	<!-- end breadcrumbs -->
	<div class="clear"></div>
	
	<div class="row">
		<section id="primary" class="content-area col-md-8 col-sm-8">
			<div id="content" class="site-content" role="main">
	
			<?php if ( have_posts() ) : ?>
	
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="clearfix klein-blog-article-list">
					<?php
						/* Include the Post-Format-specific template for the content.
						* If you want to overload this in a child theme then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'content', get_post_format() );
					?>
					</div>
				<?php endwhile; ?>
	
				<?php klein_content_nav( 'nav-below' ); ?>
	
			<?php else : ?>
	
				<?php get_template_part( 'no-results', 'archive' ); ?>
	
			<?php endif; ?>
	
			</div><!-- #content -->
		</section><!-- #primary -->
	
		<div class="col-md-4 col-sm-4">
			<?php get_sidebar(); ?>
		</div>
		
	</div><!--.row-->	
<?php get_footer(); ?>
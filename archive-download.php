<?php get_header(); ?>
<div class="thmn-download-banner">
	
</div>
<div class="themncode-main-content">
	<div class="thmn-product-wrapper">
		<div class="thmn-product-row">
		<?php
			$current_page = get_query_var('paged');
			$per_page = get_option('posts_per_page');
			$offset = $current_page > 0 ? $per_page * ($current_page-1) : 0;
			$product_args = array(
				'post_type' => 'download',
				'posts_per_page' => $per_page,
				'offset' => $offset
			);
			$products = new WP_Query($product_args); ?>
			<?php if ($products->have_posts()) : $i = 1; ?>
				<?php while ($products->have_posts()) : $products->the_post(); ?>
				<article>
					<div class="thmn-single-product">
							<div class="thmn-product-thumb">
								<div class="thmn-product-image">
								  <?php the_post_thumbnail('product-image'); ?>
								</div>
								<div class="thmn-product-display-btn">
									<div class="thmn-product-view-btn">
									<?php if(function_exists('edd_price')) : ?>
										<?php if(!edd_has_variable_prices(get_the_ID())): ?>
										    <a href="<?php the_permalink(); ?>">View Details</a>
								  	    <?php endif;?>
									<?php endif;?>
								</div>
								</div>
							</div>
							<div class="thmn-product-details">
								<div class="thmn-download-meta">
									<div class="thmn-download-title">
										<a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
									</div>
									<div class="thmn-download-price">
										<?php if(function_exists('edd_price')): ?>
											<?php 
												if(edd_has_variable_prices(get_the_ID())) {
													// if the download has variable prices, show the first one as a starting price
													echo 'Starting at: '; edd_price(get_the_ID());
												} else {
													edd_price(get_the_ID()); 
												}
											?>
									    <?php endif;?>
								   </div>
								</div>
								<!-- <div class="thmn-download-reviewe"><span class="edd-review-meta-rating"><?php edd_reviews()->render_star_rating(true); ?></span></div> -->
								<div class="thmn-download-post-meta">
									<?php the_content( wp_trim_words(15));?>
								</div>
							</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<div class="thn-pagination">
					<?php 					
						$big = 999999999; // need an unlikely intege					
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, $current_page ),
							'total' => $products->max_num_pages
						) );
					?>
				</div>
			<?php else : ?>
		
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
			<?php endif; ?>
	</div>
</div>
 
<?php get_footer(); ?>
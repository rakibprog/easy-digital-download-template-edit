<?php get_header(); ?>

<div class="thmn-download-banner-wrapper">
    <div class="thmn-download-banner-content">
        <h1><?php the_title();?></h1>
        <?php if (function_exists('thmn_wp_custom_breadcrumbs')) thmn_wp_custom_breadcrumbs(); ?>
    </div>
</div>
<div class="thmn-download-product-area">
    <div class="thmn-download-product-container">
        <div class="thmn-download-product-row">
            <div class="thmn-download-product-col">
                 <div class="thmn-download-single-thumb">
                   <?php the_post_thumbnail('product-image'); ?>
                 </div>
                 <div class="thmn-download-view-demo">
                     <div class="thmn-download-view-btns-">
                            <div class="thmn-previwe-btn btn-one "><a href="#">Live Preivew</a></div>
                            <div class="thmn-previwe-btn btn-two"><a href="#">Video Preview</a></div>
                            <div class="thmn-previwe-btn btn-three"><a href="#">Documentation</a></div>
                     </div>
                 </div>
                 <div class="thmn-download-tabs">
                 <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
                    <label for="tab-btn-1">Item Details</label>
                    <input type="radio" name="tab-btn" id="tab-btn-2" value="">
                    <label for="tab-btn-2">Reviews</label>
                    <input type="radio" name="tab-btn" id="tab-btn-3" value="">
                    <label for="tab-btn-3">Comments</label>
                    <input type="radio" name="tab-btn" id="tab-btn-4" value="">
                    <label for="tab-btn-4">Support</label>
                    <div id="content-1">
                    Content 1...
                    </div>
                    <div id="content-2">          
                        <?php
                            edd_get_template_part( 'reviews' );
                        ?>
                    </div>
                    <div id="content-3">
                    <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                    </div>
                    <div id="content-4">
                    Content 4...
                    </div>
                 </div>
            </div>
            <div class="thmn-download-product-col">
                <div class="thmn-download-price-box">
                     <div class="thmn-download-price-container">
                     <?php if(function_exists('edd_price')) { ?>
								<div class="product-price">
									<?php 
										if(edd_has_variable_prices(get_the_ID())) {
											// if the download has variable prices, show the first one as a starting price
											echo 'Starting at: '; edd_price(get_the_ID());
										} else {
											edd_price(get_the_ID()); 
										}
									?>
								</div><!--end .product-price-->
							<?php } ?>
                            <?php if(function_exists('edd_price')) { ?>
							<div class="product-buttons">
								<?php if(!edd_has_variable_prices(get_the_ID())) { ?>
									<?php echo edd_get_purchase_link(get_the_ID(), 'Purchase', 'button'); ?>
								<?php } ?>
							</div><!--end .product-buttons-->
						<?php } ?>
                     </div>
                </div>
                <div class="thmn-download-info-box">
                    <div class="thmn-downloadin-info-container">
                            
                    </div>
                </div>
                <div class="thmn-download-themncode-box">
                    <div class="thmn-download-themncode-container">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
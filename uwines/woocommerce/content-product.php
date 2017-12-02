<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
 <div class="sell-items-list">
	 <div class="sell-item"> 
       		<?php if(get_post_meta(get_the_ID(), 'wpcf-marker', true) =='хит') { echo ''?>
       				<div class="sell-item-content sell-item-content_hit">
       	<?php } elseif (get_post_meta(get_the_ID(), 'wpcf-marker', true) =='продано') { echo ''?>
       		<div class="sell-item-content sell-item-content_sold">
       	<?php } elseif (get_post_meta(get_the_ID(), 'wpcf-marker', true) =='мало') { echo ''?>
       		<div class="sell-item-content sell-item-content_count">
       	<?php } else { echo ''?>
       		<div class="sell-item-content">
       		<?php }; ?>
	        <h3 class="si-h">
						<?php do_action( 'woocommerce_shop_loop_item_title' );?>
			</h3>
			
			<div class="si-img">
				<? do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
			</div>

			<div  <p class="si-p">
    			<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
			</div>

			<span class="si-price">
				<?php echo $product->get_price_html(); ?>
			</span>
			
			<div class="si-btns">
				<a href="<?php show_more(); ?>" class="def-btn def-btn_si def-btn_yellow">Подробнее</a>
				
				<form  id="cart-add" action="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" method="post" enctype='multipart/form-data' >
					<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="def-btn def-btn_si def-btn_shadow">Купить</a></button>
				</form>
			</div>
			
		</div>
	</div>
</div>
</div>
</div>
</div>


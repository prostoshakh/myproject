<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
	<? get_sidebar(); ?>
	<section class="content barba-container">
	    <div class="content-container content-container_open">	
			<div class="summary entry-summary">
				<h2 class="main-h2">
					<?php the_title();?>
				</h2>
			</div>

			<p class="bd-text">
          		<span class="thin">
          			<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
				</span>
			</p>

			<div class="bd-img">
				<img src="<?php bloginfo('template_directory')?>/img/product.jpg" alt="">
        	</div>

	        <p class="bd-text">
				<?php the_content(); ?>
			</p>

			<span class="bd-price">
            	<span id="price">
           				<?php global $woocommerce;
						$product = new WC_Product(get_the_ID()); 
						echo $product->get_price_html(); //Shows the price ?>
          		</span>
			</span>
			<form  id="cart-add" action="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" method="post" enctype='multipart/form-data' >
          <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="def-btn def-btn_si def-btn_shadow">Купить</a></button>
        </form>
			<form class="cart" method="post" enctype='multipart/form-data' style="display: inline-block;">
			<div class="quantity">
	
		<input type="number" id="quantity_59f1234502167" class="input-text qty text" step="1" min="1" max="10" name="quantity" value="1" title="Кол-во" size="4" pattern="[0-9]*" inputmode="numeric" style="display: none;" />
	</div>
	
		<button type="submit" name="add-to-cart" value="<?php $post = $wp_query->post; echo $post->ID ?>" class="def-btn def-btn_bd def-btn_yellow def-btn_bd-cart def-btn_shadow ><a href="" class="def-btn def-btn_bd def-btn_yellow def-btn_bd-cart def-btn_shadow" style="cursor: pointer;">
            <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve">
              <g>
              	<g id="add">
              		<path d="M357,204H204v153h-51V204H0v-51h153V0h51v153h153V204z" fill="#FFFFFF"/>
              	</g>
              </g>
            </svg>
            
            <svg class="cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
              <g>
              	<g>
              		<path d="M153,408c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S181.05,408,153,408z M0,0v51h51l91.8,193.8L107.1,306    c-2.55,7.65-5.1,17.85-5.1,25.5c0,28.05,22.95,51,51,51h306v-51H163.2c-2.55,0-5.1-2.55-5.1-5.1v-2.551l22.95-43.35h188.7    c20.4,0,35.7-10.2,43.35-25.5L504.9,89.25c5.1-5.1,5.1-7.65,5.1-12.75c0-15.3-10.2-25.5-25.5-25.5H107.1L84.15,0H0z M408,408    c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S436.05,408,408,408z" fill="#ffffff"></path>
              	</g>
              </g>
            </svg>
            </button>

			</form>
         
<div class="product-desc-wide">

        <ul class="wine-list">
          <li class="wine-list-item active">Leyda Reserva Syrah</li>  |
          <li class="wine-list-item">Vina Arnaiz Roble</li>  |
          <li class="wine-list-item">Foggy River Sauvignon Blanc</li>  |
          <li class="wine-list-item">Casa Bataneros Garnacha Rose</li>
          <li class="wine-list-item">Bonpas Costieres de Nimes La Traille</li>  |
          <li class="wine-list-item">Ruwet Carte Or Rose</li>
        </ul>

        <h2 class="main-h2">
          Подробнее о
          <span class="thin">вине</span>
        </h2>

        <div class="owl-carousel" id="slider">

          <!-- SLIDER ITEM -->
          <div class="one-row">

            <div class="product-slider">
              <div class="product-slider-item">
                <span class="product-slider-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/single.jpg" alt="">
                </span>
                <span class="product-slider-item-h">2015 Leyda Reserva Syrah, Долина Лейда,</span>
                <span class="product-slider-item-desc">Чили, красное сухое</span>
              </div>
            </div>

            <ul class="product-icons-list">

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

            </ul>

            <p class="bd-text bd-text_slider">
              Сет для образцового отдыха: на даче – укротит шашлык и поймет отсутствие бокалов, а дома эту самую дачу заменит.
              <span class="thin">
                Тут 3 красных. Шашлычная Лейда из Чили, главное – не выпить бутылку просто так, попав под влияние брутальной малины. Француз Бонпа – черемуха и булки с маком, бодрит и настраивает на хулиганства. И Арнаиз – испанец с шоколадом и тутовником, обеспечит томные вечера.
                <br>
                А еще совиньон Туманная Река, с огурчиками и крыжовником, свеж до хруста, для дачи лучше не придумаешь. И испанское розе с беспечными вишнями, встречать рассветы с бутербродом в руке. Ну и для полного счастья – наш хитовый розовый сидр: яблоки и пастила, прямо окутывает вселенской нежностью.
              </span>
            </p>

          </div>

          <!-- SLIDER ITEM -->
          <div class="one-row">

            <div class="product-slider">
              <div class="product-slider-item">
                <span class="product-slider-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/single.jpg" alt="">
                </span>
                <span class="product-slider-item-h">2015 Leyda Reserva Syrah, Долина Лейда,</span>
                <span class="product-slider-item-desc">Чили, красное сухое</span>
              </div>
            </div>

            <ul class="product-icons-list">

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

              <li class="icon-item">
                <span class="icon-item-img">
                  <img src="<?php bloginfo('template_directory'); ?>/img/icons/desc.jpg" alt="">
                </span>
                <span class="icon-item-h">Вкус</span>
                <span class="icon-item-desc">Смородина и крижовник</span>
              </li>

            </ul>

            <p class="bd-text bd-text_slider">
              Сет для образцового отдыха: на даче – укротит шашлык и поймет отсутствие бокалов, а дома эту самую дачу заменит.
              <span class="thin">
                Тут 3 красных. Шашлычная Лейда из Чили, главное – не выпить бутылку просто так, попав под влияние брутальной малины. Француз Бонпа – черемуха и булки с маком, бодрит и настраивает на хулиганства. И Арнаиз – испанец с шоколадом и тутовником, обеспечит томные вечера.
                <br>
                А еще совиньон Туманная Река, с огурчиками и крыжовником, свеж до хруста, для дачи лучше не придумаешь. И испанское розе с беспечными вишнями, встречать рассветы с бутербродом в руке. Ну и для полного счастья – наш хитовый розовый сидр: яблоки и пастила, прямо окутывает вселенской нежностью.
              </span>
            </p>

          </div>

        </div>

      </div>

      <div class="box-desc-container">
        <div class="bd-elements">
          <span class="bd-price">
            2250 грн
          </span>
          <form  id="cart-add" action="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" method="post" enctype='multipart/form-data' >
          <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="def-btn def-btn_si def-btn_shadow">Купить</a></button>
        </form>
          <a href="" class="def-btn def-btn_bd def-btn_yellow def-btn_bd-cart def-btn_shadow">
            <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 357 357" style="enable-background:new 0 0 357 357;" xml:space="preserve">
              <g>
              	<g id="add">
              		<path d="M357,204H204v153h-51V204H0v-51h153V0h51v153h153V204z" fill="#FFFFFF"/>
              	</g>
              </g>
            </svg>
            <svg class="cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
              <g>
              	<g>
              		<path d="M153,408c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S181.05,408,153,408z M0,0v51h51l91.8,193.8L107.1,306    c-2.55,7.65-5.1,17.85-5.1,25.5c0,28.05,22.95,51,51,51h306v-51H163.2c-2.55,0-5.1-2.55-5.1-5.1v-2.551l22.95-43.35h188.7    c20.4,0,35.7-10.2,43.35-25.5L504.9,89.25c5.1-5.1,5.1-7.65,5.1-12.75c0-15.3-10.2-25.5-25.5-25.5H107.1L84.15,0H0z M408,408    c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S436.05,408,408,408z" fill="#ffffff"></path>
              	</g>
              </g>
            </svg>
          </a>
        </div>
      </div>

		</div>
	</section>

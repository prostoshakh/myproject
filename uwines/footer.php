<footer class="footer">
    
    
    
    <?php wp_nav_menu(array('menu' => 'menu', 'container' => 'div', 'container_class' => 'inner-links-list')); ?>
      
     
    
      <!--<a href="faq.html" class="inner-link">FAQ</a>
      <a href="about.html" class="inner-link">О нас</a>
      <a href="contacts.html" class="inner-link">Контакты</a>
    -->
    <div class="social-links-list">
        <?php $loop = new WP_Query( array( 'post_type' => 'footer') );?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
              <a href="<?php echo get_post_meta(get_the_ID(), 'wpcf-url', true); ?>" class="social-link" target="_blank">
                <img src="img/icons/soc-f.png" alt="">
              </a>  
        <?php endwhile; wp_reset_query(); ?>
  </div>
        <a href="https://mafactory.com.ua" target="_blank" class="mafa-link">Created by MAFACTORY</a>
    

<script src="<?php bloginfo('template_directory'); ?>/js/libs/jquery.min.js" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/libs/owl.carousel.min.js" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/libs/vue.js" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/libs/barba.min.js" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/libs/jquery.nicescroll.iframehelper.min.js" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/libs/jquery.nicescroll.min.js" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/main.js" charset="utf-8"></script>

  </footer>
</html>

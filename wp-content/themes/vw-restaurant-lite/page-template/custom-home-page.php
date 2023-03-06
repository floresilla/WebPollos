<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_restaurant_lite_above_slider' ); ?>

  <?php if( get_theme_mod( 'vw_restaurant_lite_slider_hide_show', false) == 1 || get_theme_mod( 'vw_restaurant_lite_resp_slider_hide_show', false) == 1) { ?>
    <section class="slider">
      <?php if(get_theme_mod('vw_restaurant_lite_slider_type', 'Default slider') == 'Default slider' ){ ?>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_restaurant_lite_slider_speed',4000)) ?>">
          <?php $vw_restaurant_lite_slider_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'vw_restaurant_lite_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $vw_restaurant_lite_slider_pages[] = $mod;
              }
            }
            if( !empty($vw_restaurant_lite_slider_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $vw_restaurant_lite_slider_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>     
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <?php if( get_theme_mod('vw_restaurant_lite_slider_title_hide_show',true) == 1){ ?>
                      <h1 class="wow lightSpeedIn delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <?php } ?>
                    <?php if( get_theme_mod('vw_restaurant_lite_slider_content_hide_show',true) == 1){ ?>
                      <p class="wow lightSpeedIn delay-1000" data-wow-duration="2s"><?php $vw_restaurant_lite_excerpt = get_the_excerpt(); echo esc_html( vw_restaurant_lite_string_limit_words( $vw_restaurant_lite_excerpt, esc_attr(get_theme_mod('vw_restaurant_lite_slider_excerpt_number','30')))); ?></p>
                    <?php } ?>
                    <?php if( get_theme_mod('vw_restaurant_lite_slider_button_hide_show',true) == 1){ ?>
                      <?php if( get_theme_mod('vw_restaurant_lite_slider_button_text','READ MORE') != ''){ ?>
                        <div class="more-btn wow lightSpeedIn delay-1000" data-wow-duration="2s">             
                          <a class="button hvr-sweep-to-right" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_restaurant_lite_slider_button_text',__('READ MORE','vw-restaurant-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_restaurant_lite_slider_button_text',__('READ MORE','vw-restaurant-lite')));?></span></a>
                        </div>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
          endif;?>
          <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
            <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-restaurant-lite' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-restaurant-lite' );?></span>
          </a>
        </div>  
        <div class="clearfix"></div>
          <?php } else if(get_theme_mod('vw_restaurant_lite_slider_type', 'Advance slider') == 'Advance slider'){?>
            <?php echo do_shortcode(get_theme_mod('vw_restaurant_lite_advance_slider_shortcode')); ?>
          <?php } ?>
    </section> 
  <?php }?>
    
  <?php do_action( 'vw_restaurant_lite_below_slider' ); ?>

  <?php /** second section **/ ?>
  <?php if( get_theme_mod('vw_restaurant_lite_belive_post_setting') != ''){ ?>
    <section id="we_belive" class="wow zoomInDown delay-1000" data-wow-duration="2s"> 
      <div class="container">
        <?php
        $vw_restaurant_lite_postData1=  get_theme_mod('vw_restaurant_lite_belive_post_setting');
          if($vw_restaurant_lite_postData1){
          $args = array( 'name' => esc_html($vw_restaurant_lite_postData1 ,'vw-restaurant-lite'));
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="row">
            <?php if(has_post_thumbnail()){ 
              $thumb_col = 'col-md-5 col-sm-5';
              $desc_col = 'col-md-7 col-sm-7';
              }else{
                $desc_col = 'col-md-12';
            } ?>
            <div class="<?php echo esc_attr($thumb_col); ?>">
              <?php the_post_thumbnail('full'); ?>
            </div>
            <div class="<?php echo esc_attr($desc_col); ?>">
              <h2><q><?php the_title(); ?></q></h2>
              <p><?php $vw_restaurant_lite_excerpt = get_the_excerpt(); echo esc_html( vw_restaurant_lite_string_limit_words( $vw_restaurant_lite_excerpt,25 ) ); ?></p>
              <div class="clearfix"></div>
              <?php if( get_theme_mod('vw_restaurant_lite_about_button_text','ABOUT US') != ''){ ?>
                <div><a class="button hvr-sweep-to-right"  href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_restaurant_lite_about_button_text',__('ABOUT US','vw-restaurant-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_restaurant_lite_about_button_text',__('ABOUT US','vw-restaurant-lite')));?></span></a>
                </div>
              <?php } ?>
            </div>
          </div>
          <?php endwhile; 
          wp_reset_postdata();?>
          <?php else : ?>
             <div class="no-postfound"></div>
           <?php
          endif; } ?>
          <div class="clearfix"></div>
      </div> 
    </section>
  <?php }?>

  <?php do_action( 'vw_restaurant_lite_below_we_belive_section' ); ?>

  <div class="container content-vw entry-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>
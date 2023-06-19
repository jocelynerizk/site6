<?php
/**
 * Template part for displaying slider section
 *
 * @package Construction Hub
 * @subpackage construction_hub
 */

?>

<?php if( get_theme_mod( 'construction_hub_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $construction_hub_slide_pages = array();
      for ( $construction_hub_count = 1; $construction_hub_count <= 4; $construction_hub_count++ ) {
        $construction_hub_mod = intval( get_theme_mod( 'construction_hub_slider_page' . $construction_hub_count ));
        if ( 'page-none-selected' != $construction_hub_mod ) {
          $construction_hub_slide_pages[] = $construction_hub_mod;
        }
      }
      if( !empty($construction_hub_slide_pages) ) :
        $construction_hub_args = array(
          'post_type' => 'page',
          'post__in' => $construction_hub_slide_pages,
          'orderby' => 'post__in'
        );
        $construction_hub_query = new WP_Query( $construction_hub_args );
        if ( $construction_hub_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $construction_hub_query->have_posts() ) : $construction_hub_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php $construction_hub_excerpt = get_the_excerpt();echo esc_html( construction_hub_string_limit_words( $construction_hub_excerpt,20 ) ); ?></p>
                <?php if( get_theme_mod( 'construction_hub_slider_button',true) != '' || get_theme_mod( 'construction_hub_slider_buttom_mob',true) != '') { ?>
                  <div class="more-btn">
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','construction-hub'); ?></a>
                  </div>
                <?php }?>
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
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>

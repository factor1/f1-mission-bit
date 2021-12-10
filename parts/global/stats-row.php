<?php
/**
 * Stats Row (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Stats Row Custom Fields 
$prefix = 'stats_row_';
$bg = get_sub_field($prefix . 'section_background_color');

if( have_rows($prefix . 'stats') ) : ?>

  <section class="stats-row" style="background-color: <?php echo $bg; ?>">
    <div class="container">
      <div class="row row--justify-content-center">

        <?php while( have_rows($prefix . 'stats') ) : the_row();
          $image = get_sub_field('image');
          $img = wp_get_attachment_image_src($image, 'medium');
          $alt = get_post_meta($image, '_wp_attachment_image_alt', true); 
          $number = get_sub_field('number');
          $unit = get_sub_field('unit'); // none, plus, percent
          $desc = get_sub_field('description'); ?>

          <div class="col-3">


          
          </div>

        <?php endwhile; ?>

      </div>
    </div>
  </section>

<?php endif; ?>
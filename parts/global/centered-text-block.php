<?php
/**
 * Centered Text Block (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Centered Text Block Custom Fields 
$prefix = 'centered_text_block_';
$bg = get_sub_field($prefix . 'section_background_color');
$colSpan = get_sub_field($prefix . 'column_span'); // 6 - 12 
$content = get_sub_field($prefix . 'content');
$btnAlign = get_sub_field($prefix . 'button_alignment'); // left, center, right ?>

<section class="centered-text-block" style="background-color: <?php echo $bg; ?>">
  <div class="container">
    <div class="row row--justify-content-center">
      <div class="col-<?php echo $colSpan; ?>">

        <?php echo $content; 

        // Optional buttons 
        if( have_rows($prefix . 'buttons') ) : ?>

          <div class="buttons text-<?php echo $btnAlign; ?>">

            <?php while( have_rows($prefix . 'buttons') ) : the_row(); 
              $btnColor = get_sub_field('button_color');
              $btn = get_sub_field('button'); ?>

              <a href="<?php echo esc_url($btn['url']); ?>" class="button button--<?php echo $btnColor; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                <?php echo $btn['title']; ?>
              </a>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
<?php
/**
 * Hero (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Hero Custom Fields 
$prefix = 'hero_';
$bg = wp_get_attachment_image_src(get_field($prefix . 'background'), 'hero');
$hPos = get_field($prefix . 'horizontal_background_alignment'); // 0 - 100
$vPos = get_field($prefix . 'vertical_background_alignment'); // 0 - 100
$colSpan = get_field($prefix . 'column_span'); // 6 - 12
$colAlign = get_field($prefix . 'column_alignment'); // start, center, end
$content = get_field($prefix . 'content');
$btnAlign = get_field($prefix . 'button_alignment'); // left, center, right

// Bg styles 
$xPos = $hPos >= 0 ? $hPos . '%' : '50%'; 
$yPos = $vPos >= 0 ? $vPos . '%' : '50%';
$bgPos = $xPos . ' ' . $yPos; ?>

<section class="hero">
  <div class="hero__bg" style="background: url('<?php echo $bg[0]; ?>') <?php echo $bgPos; ?>/cover no-repeat"></div>

  <div class="container">
    <div class="row row--justify-content-<?php echo $colAlign; ?>">
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
<?php
/**
 * Page Sections (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

if( have_rows('page_sections') ) : while( have_rows('page_sections') ) : the_row();

  if( get_row_layout() == 'centered_text_block' ) : 

    get_template_part('parts/global/centered-text-block');

  elseif( get_row_layout() == 'text_split' ) : 

    get_template_part('parts/global/text-split');

  elseif( get_row_layout() == 'stats_row' ) : 

    get_template_part('parts/global/stats-row');

  endif;

endwhile; endif; ?>
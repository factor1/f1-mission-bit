<?php
/**
 * Page Sections (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

if( have_rows('page_sections') ) : while( have_rows('page_sections') ) : the_row();

  if( get_row_layout() == 'text_split' ) : 

    get_template_part('parts/global/text-split');

  endif;

endwhile; endif; ?>
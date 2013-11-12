<?php

/**
 * Override or insert variables into the page template.
 */
function lei_process_page(&$vars) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Override or insert variables into the page template for HTML
 * output.
 */
function lei_process_html(&$vars) {
  // Toggle full, fluid or fixed width.
  $width = theme_get_setting('lei_width');
  switch ($width) {
    case 'full':
      $vars['classes_array'][] = 'full-width';
      break;
    case 'fluid':
      $vars['classes_array'][] = 'fluid-width';
      break;
  }
  $vars['classes'] = implode(' ', $vars['classes_array']);
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

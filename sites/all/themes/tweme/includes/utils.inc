<?php

/**
 * @file
 * Provides helper functions.
 */

/**
 * Parses title.
 */
function _tweme_parse_title($title) {
  $subtitle = '';
  if (strpos($title, ' ~ ')) {
    $parts = explode(' ~ ', $title);
    $title = trim($parts[0]);
    $subtitle = trim($parts[1]);
  }
  return array($title, $subtitle);
}

/**
  * Displays message for admin.
  */
function _tweme_admin_message($message, $type = 'status') {
  if (user_access('administer')) {
    drupal_set_message($message, $type);
  }
}

/**
  * Returns markup of all blocks in the region.
  */
function _tweme_region_blocks_markup($region) {
  $elems = block_get_blocks_by_region($region);
  if (is_array($elems)) {
    foreach ($elems as &$elem) {
      if (isset($elem['#theme_wrappers'])) {
        unset($elem['#theme_wrappers']);
      }
    }
    return drupal_render($elems);
  }
  return FALSE;
}

/**
 * Upgrades jQuery library.
 */
function _tweme_upgrade_jquery(&$js_config) {
  if (!module_exists('jquery_update') && $path = theme_get_setting('jquery_path')) {
    $path .= '/jquery.min.js';
    $js_config['data'] = $path;
    $js_config['type'] = _tweme_detect_asset_type($path);
    unset($js_config['version']);
  }
}

/**
 * Adds js/css file.
 */
function _tweme_add_asset($type, $data, $options = array()) {
  if (isset($options['browsers']) && !is_array($options['browsers'])) {
    $options['browsers'] = _tweme_browsers_to_array($options['browsers']);
  }
  if (!isset($options['type']) || $options['type'] == 'file') {
    // Data is path:
    global $theme;
    $data = str_replace('%t', drupal_get_path('theme', $theme), $data);
  }
  switch ($type) {
    case 'css':
      drupal_add_css($data, $options);
      break;
    case 'js':
      if (isset($options['browsers'])) {
        $data = file_create_url($data);
        $elements = array(
          '#markup' => '<script type="text/javascript" src="' . $data . '"></script>',
          '#browsers' => $options['browsers'],
        );
        $elements = drupal_pre_render_conditional_comments($elements);
        _tweme_add_html_head_bottom(drupal_render($elements));
      }
      else {
        drupal_add_js($data, $options);
      }
      break;
  }
}

/**
 * Connects library file.
 */
function _tweme_connect_lib($type, $path, $options = array()) {
  $options += array(
    'type' => _tweme_detect_asset_type($path),
  );
  switch ($type) {
    case 'css':
      $options += array(
        'group' => CSS_THEME,
        'weight' => -1000,
        'every_page' => TRUE,
      );
      break;
    
    case 'js':
      $options += array(
        'group' => JS_LIBRARY,
      );
      break;
  }
  _tweme_add_asset($type, $path, $options);
}

/**
 * Detects lib type by a given path.
 */
function _tweme_detect_asset_type($path) {
  return strpos($path, '//') === FALSE ? 'file' : 'external';
}

/**
 * Converts string representation of browsers to the array.
 */
function _tweme_browsers_to_array($browsers) {
  switch ($browsers) {
    case 'modern':
      return array('IE' => 'gte IE 9', '!IE' => TRUE);
    case 'obsolete':
      return array('IE' => 'lt IE 9', '!IE' => FALSE);
  }
  return array('IE' => TRUE, '!IE' => TRUE);
}

/**
 * Allows to add an extra html markup to the bottom of <head>.
 */
function _tweme_add_html_head_bottom($data = NULL) {
  $head_bottom = &drupal_static(__FUNCTION__);
  if (!isset($head_bottom)) {
    $head_bottom = '';
  }

  if (isset($data)) {
    $head_bottom .= $data;
  }
  return $head_bottom;
}

/**
 * Returns primary menu name.
 */
function _tweme_primary_menu_name() {
  return variable_get('menu_main_links_source', 'main-menu');
}

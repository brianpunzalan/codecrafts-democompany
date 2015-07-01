<?php

/**
 * @file
 * template.php
 */

function creative_onepage_menu_link(array $variables){
  $element = $variables['element'];
  $sub_menu = '';
  
  //dpm($variables);
  //$element['#href'] = "'javascript:alert('helloWorld');'";
  //dpm($element); 
  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      // Generate as standard dropdown.
      $element['#title'] .= ' <span class="caret"></span>';
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
      $element['#localized_options']['attributes']['data-target'] = '#';
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  // ($element['href'] == 'node/5')
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page()) ) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  

  //dpm($element['#href']);
  //dpm(strpos($element['#href'],'node/5'));
  if(strpos($element['#href'],'node/5') === 0){
    //dpm("success");
    if((strtolower($element['#title'])) == 'home'){
      $output = '<a href="#" class="page-scroll">'.$element['#title'].'</a>';
    }
    else{
      $output = '<a href="#'.strtolower($element['#title']).'" class="page-scroll">'.$element['#title'].'</a>';
    }
      }
  else{
    //dpm("fail");
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }
  //dpm($output);
  //$element['#href'] = "'javascript:alert('helloWorld');'";
  //dpm($element);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}


function creative_onepage_preprocess_page(&$variables){
  dpm($variables);
  // change from page.tpl.php to page--section.tpl.php template for page
  // located at 'sites/all/theme/creative_onepage/templates'
  if($variables['node']->title == 'Login'){
    //$variables['theme_hook_suggestions'][] = 'page__login';
    dpm($variables);
  }
  elseif($variables['node']->title == 'Page Not Found'){
    $variables['theme_hook_suggestions'][] = 'page__pnf';
  }
  elseif($variables['node']->title == 'Access Denied'){
    $variables['theme_hook_suggestions'][] = 'page__access_denied';
  }
  elseif($variables['is_front']){
    $variables['theme_hook_suggestions'][] = 'page__section';
    unset($variables['page']['content']['system_main']); 
  }
  else{
    //$variables['theme_hook_suggestions'][] = 'page__pnf';
  }
  // unset system_main block because, it is a onepage theme website.
  // This block will occur if no front page content is set,
  // since contents is composed of sections not page.
  //unset($variables['page']['content']['system_main']);
  dpm($variables);
}


function creative_onepage_js_alter(&$javascript){
 // dpm($javascript);
  
  // replace jquery 1.10 to 1.11 from jquery_update module
  //$javascript['sites/all/modules/jquery_update/replace/jquery/1.10/jquery.min.js']['data'] = drupal_get_path('theme','creative_onepage').'/js/jquery.js';

  // replace misc/jquery.js
  //$javascript['misc/jquery.js']['data'] = drupal_get_path('theme','creative_onepage').'/js/jquery.js';
  
  // unset bootstrap.js 3.0.2
  unset($javascript['//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js']);
  
  // unset bootstrap.js in drupal bootstrap theme
  unset($javascript['sites/all/themes/bootstrap/js/bootstrap.js']);
  

  //dpm($javascript);

}

function creative_onepage_css_alter(&$css){
  //dpm($css);
  
  // unset bootstrap.css 3.0.2
  unset($css['//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css']);
  //dpm($css);

}

function creative_onepage_menu_link_alter(&$item){

  //dpm($item); 
  
}

function creative_onepage_theme(){
  $items = array();

  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'creative_onepage').'/templates',
    'template' => 'page--login',
    'preprocess functions' => array(
        'creative_onepage_preprocess_user_login'
      ),
    );

  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'creative_onepage').'/templates',
    'template' => 'user-register-form',
    'preprocess functions' => array(
        'creative_onepage_preprocess_user_register_form'
      ),
    );

  $items['user_pass'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'creative_onepage').'/templates',
    'template' => 'user-pass',
    'preprocess functions' => array(
        'creative_onepage_preprocess_user_pass'
      ),
    );
}

function creative_onepage_preprocess_user_login($variables){
  //$variables['intro_text'] = t('This is awsome');
  dpm($variables);
}
function creative_onepage_preprocess_user_register_form($variables){
  //$variables['intro_text'] = t('This is awsome');
  dpm($variables);
}
function creative_onepage_preprocess_user_pass($variables){
  //$variables['intro_text'] = t('This is awsome');
  dpm($variables);
}


?>

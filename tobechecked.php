<?php

require_once 'tobechecked.civix.php';


function civicrm_add_js ($file,$params, $options = array()) {
  $keys = array_keys ($params);
  $values = array_values($params);
  $keys = implode($keys,',');
  $values = implode($values,',');
  return "<script>(function($keys){\n".file_get_contents($file)."\n}($values));</script>";
}


function tobechecked_civicrm_summary( $contactID, &$content, &$contentPlacement ) {
  $tag_id =  CRM_Core_BAO_Setting::getItem('eu.tttp.publicautocomplete', 'tag_id');
  if (!$tag_id) {
    $tag_id = _tobechecked_init_tag(); 
  } 
  $file =  dirname( __FILE__ ) . '/js/tobechecked.js';
  
  $content = civicrm_add_js($file, 
    array(
      'tag_id' => CRM_Core_BAO_Setting::getItem('eu.tttp.publicautocomplete', 'tag_id'),
      'contact_id' =>  $contactID
     )
  );
}

function _tobechecked_init_tag () {
  $name = 'to be checked';
  $results=civicrm_api("Tag","get", array ('version' => '3','sequential' =>'1', 'name' =>$name));
  if ($results['count'] == 0) {
    $results=civicrm_api("Tag","create", array (
      'version' => 3,
      'sequential' =>1,
      'is_reserved' => 1,
      'name' =>$name, 
      'description' => "Use this tag to flag a contact in error that needs further investigation.\nUsed by \"to be checked\" extension"
    ));
  }
  CRM_Core_BAO_Setting::setItem($results['id'],'eu.tttp.publicautocomplete', 'tag_id');
  return $results['id']; 
}

/**
 * Implementation of hook_civicrm_install
 */
function tobechecked_civicrm_install() {
  if (!_tobechecked_init_tag()) {
    die ("cannot create tag to be checked");
  }
//  return _tobechecked_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 */
function tobechecked_civicrm_uninstall() {
  return _tobechecked_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 */
function tobechecked_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _tobechecked_civix_civicrm_upgrade($op, $queue);
}

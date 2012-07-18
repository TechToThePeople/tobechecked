<?php

require_once 'tobechecked.civix.php';

/**
 * Implementation of hook_civicrm_config
 */
function tobechecked_civicrm_config(&$config) {
  _tobechecked_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 */
function tobechecked_civicrm_xmlMenu(&$files) {
  _tobechecked_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 */
function tobechecked_civicrm_install() {
  return _tobechecked_civix_civicrm_install();
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

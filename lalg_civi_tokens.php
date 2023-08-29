<?php

require_once 'lalg_civi_tokens.civix.php';
use CRM_LalgCiviTokens_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function lalg_civi_tokens_civicrm_config(&$config) {
  _lalg_civi_tokens_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function lalg_civi_tokens_civicrm_install() {
  _lalg_civi_tokens_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function lalg_civi_tokens_civicrm_enable() {
  _lalg_civi_tokens_civix_civicrm_enable();
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function lalg_civi_tokens_civicrm_navigationMenu(&$menu) {
  _lalg_civi_tokens_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _lalg_civi_tokens_civix_navigationMenu($menu);
} // */


/************************************************************/
/*     LALG Functions added manually                        */
/************************************************************/

/************************************************************/
// LALG Custom Tokens
/************************************************************/
/**
 * Implements hook_civicrm_tokens and hook_civicrm_tokenValues.
 */
function lalg_civi_tokens_civicrm_tokens(&$tokens) {
//dpm('hook_civicrm_tokens called');
	CRM_Civitokens_Tokens::civicrm_tokens($tokens);
}
function lalg_civi_tokens_civicrm_tokenValues(&$values, $cids, $job = null, $tokens = array(), $context = null) {
//dpm('hook_civicrm_tokenValues called');
	CRM_Civitokens_Tokens::civicrm_tokenValues($values, $cids, $job, $tokens, $context);
}

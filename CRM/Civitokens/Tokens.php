<?php

/**
* This file contains Custom Tokens, by implementing two hooks
* to declare and define the necessary values.
*/
   
class CRM_Civitokens_Tokens {
	
/** 
* Implements the hook_civicrm_tokens
* Params - Array of tokens to be declared
*/
	public static function civicrm_tokens(&$tokens) {
		$tokens['activity'] = array(
			'activity.scheduled_reminder' => 'Activity - Latest Scheduled Reminder',
		);
	}
	
/** 
* Implements the hook_civicrm_tokens
* Params - 
*	$values	- Values of tokens to be returned
*	$cids	- Contact Ids requiring Token values
*	$tokens	- Tokens for which values required
*/
	public static function civicrm_tokenValues(&$values, $cids, $job = null, $tokens = array(), $context = null) {
//dpm($cids);
//dpm($tokens);
		
		// Activity tokens if these are required
		if (!empty($tokens['activity'])) {  
		// Cycle through the Contacts list
			foreach ($cids as $cid) {
				// Get associated Activities
				$result = civicrm_api3('Activity', 'get', [
				  'sequential' => 1,
				  'target_contact_id' => $cid,
				  'activity_type_id' => "Print Postal Reminder",
				  'status_id' => "Scheduled",
				]);
//dpm($result);
				if (empty($result['values'])) {
					CRM_Core_Session::setStatus('Contact Reference ' . $cid . ' has no Scheduled Reminder. Skipped.', 'Warning');
					continue;						// Move to next Contact
				}
				// Get last result if more than one
				foreach ($result['values'] as $activity) {
				// Set return value
					$values[$cid]['activity.scheduled_reminder'] = $activity['subject'];
				}
//dpm($values);
			}
		}
		
	}	
}
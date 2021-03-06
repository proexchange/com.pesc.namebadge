<?php

require_once 'namebadge.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function namebadge_civicrm_config(&$config) {
  _namebadge_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function namebadge_civicrm_xmlMenu(&$files) {
  _namebadge_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function namebadge_civicrm_install() {
  _namebadge_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function namebadge_civicrm_uninstall() {
  _namebadge_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function namebadge_civicrm_enable() {
  _namebadge_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function namebadge_civicrm_disable() {
  _namebadge_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function namebadge_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _namebadge_civix_civicrm_upgrade($op, $queue);
}



/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function namebadge_civicrm_caseTypes(&$caseTypes) {
  _namebadge_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function namebadge_civicrm_angularModules(&$angularModules) {
_namebadge_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function namebadge_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _namebadge_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 */
/*
function namebadge_civicrm_tokens(&$tokens) {
  $tokens['contact'] = array(
    'contact.city_state' => 'City, State (Primary)',
  );
}

function namebadge_civicrm_tokenValues(&$values, $cids, $job = null, $tokens = array(), $context = null) {

  foreach ($cids as $cid) {

    $r = civicrm_api3('Contact', 'getsingle', [
      'id' => $cid,
    ]);

    watchdog('tokens','API: <pre>'.print_r($r,true).'</pre>');

    $values[$cid]['contact.city_state'] = $r['city'].', '.$r['state_province'];

  }
  $wd = 'tokens: <pre>'.print_r($tokens,true).'</pre>';
  $wd = $wd.'cids: <pre>'.print_r($cids,true).'</pre>';
  $wd = $wd.'values: <pre>'.print_r($values,true).'</pre>';
  watchdog('tokens',$wd);
}

/*
/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function namebadge_civicrm_managed(&$entities) {
  _namebadge_civix_civicrm_managed($entities);

  // City, State Fields
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'CustomGroup',
    'name' => "name_badge_fields",
    'params' => array(
      'version' => 3,
      'title' => "Name Badge Fields",
      'extends' => "Contact",
      'style' => "Inline",
      'collapse_display' => 0,
      'collapse_adv_display' => 1,
      'is_reserved' => 0,
      'name' => "name_badge_fields",
    ),
  );
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'CustomField',
    'params' => array(
      'version' => 3,
      'custom_group_id' => "name_badge_fields",
      'name' => "city_state",
      'label' => "City, State",
      'data_type' => "String",
      'is_view' => 0,
      'html_type' => "Text",
    ),
  );
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'CustomField',
    'params' => array(
      'version' => 3,
      'custom_group_id' => "name_badge_fields",
      'name' => "state_country",
      'label' => "State, Country",
      'data_type' => "String",
      'is_view' => 0,
      'html_type' => "Text",
    ),
  );

  // Name Badge Name 
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'CustomField',
    'params' => array(
      'version' => 3,
      'custom_group_id' => "name_badge_fields",
      'name' => "name_badge_name",
      'label' => "Name Badge Name",
      'data_type' => "String",
      'html_type' => "Text",
      'is_view' => 0,
      'is_searchable' => 1,
    ),
  );

  //Name Badge Ribbon
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'CustomGroup',
    'name' => "name_badge_fields_participant",
    'params' => array(
      'version' => 3,
      'title' => "Name Badge Fields (Participant)",
      'extends' => "Participant",
      'style' => "Inline",
      'collapse_display' => 0,
      'collapse_adv_display' => 1,
      'is_reserved' => "0",
      'name' => "name_badge_fields_participant",
    ),
  );
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'CustomField',
    'params' => array(
      'version' => 3,
      'custom_group_id' => "name_badge_fields_participant",
      'name' => "name_badge_ribbon",
      'label' => "Name Badge Ribbon",
      'data_type' => "String",
      'html_type' => "Select",
      'is_view' => 0,
      'is_searchable' => 1,
    ),
  );




  // Paper Sizes
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'OptionValue',
    'params' => array(
      'version' => 3,
      'option_group_id' => "paper_size",
      'label' => "3x5",
      'name' => "3x5",
      'value' => '{"metric":"in","width":5,"height":3}',
    ),
  );
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'OptionValue',
    'params' => array(
      'version' => 3,
      'option_group_id' => "paper_size",
      'label' => "4.25x5.5",
      'name' => "4.25x5.5",
      'value' => '{"metric":"in","width":4.25,"height":5.5}',
    ),
  );
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'OptionValue',
    'params' => array(
      'version' => 3,
      'option_group_id' => "name_badge",
      'label' => "3x4 ( on 3x5)",
      'name' => "3x4 ( on 3x5)",
      'value' => '{"name":"3x4 Name Badge","paper-size":"3x5","metric":"in","lMargin":".1","tMargin":".1","NX":1,"NY":1,"SpaceX":".01","SpaceY":".01","width":"3.8","height":"2.8","font-size":12,"orientation":"landscape","font-name":"helvetica","font-style":"","lPadding":".01","tPadding":".01"}',
    ),
  );
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'OptionValue',
    'params' => array(
      'version' => 3,
      'option_group_id' => "name_badge",
      'label' => "Avery 5392",
      'name' => "Avery 5392",
      'value' => '{"name":"Avery 5392","paper-size":"letter","metric":"in","lMargin":".25","tMargin":"1","NX":2,"NY":3,"SpaceX":".01","SpaceY":".1","width":4,"height":"2.9","font-size":12,"orientation":"portrait","font-name":"helvetica","font-style":"","lPadding":".05","tPadding":".05"}',
    ),
  );
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'OptionValue',
    'params' => array(
      'version' => 3,
      'option_group_id' => "name_badge",
      'label' => "PESC Name Badge",
      'name' => "PESC Name Badge",
      'value' => '{"name":"PESC Name Badge","paper-size":"4.25x5.5","metric":"in","lMargin":".1","tMargin":".1","NX":1,"NY":1,"SpaceX":"0","SpaceY":"0","width":"4.05","height":"5.3","font-size":12,"orientation":"portrait","font-name":"helvetica","font-style":"","lPadding":"0","tPadding":"0"}',
    ),
  );
  $entities[] = array(
    'module' => 'com.pesc.namebadge',
    'entity' => 'Navigation',
    'params' => array(
      'version' => 3,
      'name' => "event_name_badges",
      'label' => "Event Name Badges",
      'is_active' => 1,
      'parent_id' => "Events",
      'permission' => "access CiviEvent",
      'url' => "civicrm/admin/badgelayout?reset=1",
    ),
  );
}

//Simplyfy qr code 'domain|participantID|ContactID'

function namebadge_civicrm_alterBarcode(&$data, $type, $context ) {
  if ($context == 'name_badge') {
    // change the encoding of barcode
    $url = parse_url($data['current_value']);
    $data['current_value'] = $url['host'].'|'.$data['participant_id'].'|'.$data['contact_id'];
  }
}

// create name badge location fields
function namebadge_civicrm_post($op, $objectName, $objectId, &$objectRef){
  if($objectName == 'Address' && ($op == 'edit' || $op == 'create') && $objectRef->is_primary){

    if(!empty($objectRef->contact_id)) {
      try {
        //state
        $statename = '';
        $stateabv = '';
        if(!empty($objectRef->state_province_id)){
          $state = civicrm_api3('StateProvince', 'getsingle', [
            'id' => $objectRef->state_province_id,
          ]);
          $statename = $state['name'].', ';
          $stateabv = ', '.$state['abbreviation'];
        }

        //country
        $countryname = "";
        if(!empty($address['country_id'])){
          $country = civicrm_api3('Country', 'getsingle', [
            'id' => $address['country_id'],
          ]);
          $countryname = $country['name'];
        }

        $countryname = "";
        if(!empty($objectRef->country_id)){
          $country = civicrm_api3('Country', 'getsingle', [
            'id' => $objectRef->country_id,
          ]);
          $countryname = $country['name'];
        }

        $field_city_state = civicrm_api3('CustomField', 'getsingle', [
          'name' => 'city_state',
        ]);
        $field_state_country = civicrm_api3('CustomField', 'getsingle', [
          'name' => 'state_country',
        ]);
        $contact = civicrm_api3('Contact', 'create', [
          'id' => $objectRef->contact_id,
          'custom_'.$field_city_state['id'] => $objectRef->city.$stateabv,
          'custom_'.$field_state_country['id'] => $statename.$countryname,
        ]);    
      }
      catch(Exception $e) {
        watchdog('com.pesc.namebadge', "Unable to update namebadge custom fields.\n" . $e->getMessage());
        watchdog('com.pesc.namebadge', "<pre>objectName: $objectName\nop: $op\nobjectRef: " . print_r($objectRef, 1) . "</pre>");
      }
    }
  }
}

<?php

/* Prod env config vars */
$config['prod'] = array (
	'partner_id' => 423851,
	'usersecret' => '1654ddb5dd25023bd95480222a0af4cd',
	'user_id' => '__ADMIN__423311',
	'entry_id' => '1_sfrj36g3',
	'clipper' => array( 'uiconf_id' => 4792432, 'width' => 640, 'height' => 150),
	'kdp' => array( 'uiconf_id' => 4949011, 'width' => 640, 'height' => 380)
);


/* Devtests env config vars */
$config['devtests'] = array(
	'host' => 'devtests.kaltura.dev', //devtests.kaltura.co.cc
	'partner_id' => 495779,
	'user_id' => 'michal_rad@mailinator.com',
	'usersecret' => 'bb6f4f8015ae59357db1494cd982a34e',
	'entry_id' => '0_lxaa0a97',
	'overwrite_entry' => true,
	'clipper' => array( 'uiconf_id' => 3550335, 'width' => 640, 'height' => 150),
	'kdp' => array( 'uiconf_id' => 3550432, 'width' => 640, 'height' => 380)
);

if( $configName == 'kmc' ) {
	
	if( !isset($_COOKIE['kmcks']) || empty($_COOKIE['kmcks']) ) {
		die('Error: Missing KS');
	}

	if( !isset($_GET['partnerId']) ) {
		die('Error: Missing Partner ID');
	}

	if( !isset($_GET['kclipUiconf']) || !isset($_GET['kdpUiconf']) ) {
		die('Error: Missing Uiconfs for KDP/kClip');
	}

	$config['kmc'] = array(
		'host' => $_SERVER['HTTP_HOST'],
		'partner_id' => intval($_GET['partnerId']),
		'user_id' => $_COOKIE['uid'],
		'ks' => $_COOKIE['kmcks'],
		'overwrite_entry' => ($_GET['mode'] == "trim") ? true : false,
		'clipper' => array( 'uiconf_id' => $_GET['kclipUiconf'], 'width' => 640, 'height' => 150),
		'kdp' => array( 'uiconf_id' => $_GET['kdpUiconf'], 'width' => 640, 'height' => 380)
	);

}
<?php

/**
* @file
* Flag application administration
*/

function flag_application_form($form, $form_state) {
	$form = array();

	$header = array(
		'title' => t('Flagged Content'),
		'name' =>t('Username'),
		'entity_id' => t('Node ID'),
		'uid' => t('User ID'),
		'flagging_id' => t('Flag ID'),
		'status' => t('Status'),
	);

	$sql = db_select('flag_application', 'fa')->extend('PagerDefault');
	$sql->join('flagging', 'f', 'f.flagging_id = fa.flagging_id');
	$sql->join('node', 'n', 'f.entity_id = n.nid');
	$sql->join('users', 'u', 'f.uid = u.uid');
	$sql
		->fields('fa', array('status'))
		->fields('f', array('entity_id', 'timestamp', 'flagging_id'))
		->fields('n', array('title'))
		->fields('u', array('name', 'uid'))
		->orderBy('timestamp', 'DESC')
		->limit(25);
	$results = $sql->execute();

	$rows = array();

	
	
	return $form;
}
<?php

require_once dirname(__FILE__) . '/../../config.php';

$link = mysqli_connect( $credentials['host'], $credentials['user'], $credentials['pass'], $credentials['db'] );
$vars = $_GET;
foreach( $vars as $key => $value ) {
	$vars[$key] = trim( mysqli_real_escape_string( $link, $value ) );
}

$wiki      = isset( $vars['wiki'] ) ? $vars['wiki'] : '';
$pageId    = isset( $vars['page'] ) ? $vars['page'] : '';
$revId     = isset( $vars['rev'] ) ? $vars['rev'] : '';
$fixed     = isset( $vars['numf'] ) ? $vars['numf'] : '';
$notFixed  = isset( $vars['numn'] ) ? $vars['numn'] : '';
$bot       = isset( $vars['bot'] ) ? $vars['bot'] : '';
$service   = isset( $vars['service'] ) ? $vars['service'] : '';
$status    = isset( $vars['status'] ) ? $vars['status'] : '';
$pageTitle = isset( $vars['title'] ) ? $vars['title'] : '';
$password  = isset( $vars['pass'] ) ? $vars['pass'] : '';

if ( $credentials['password'] == $password ) {
	$query = "INSERT INTO bot_log ( wiki, page_id, rev_id, links_fixed, links_not_fixed, bot, service, status, page_title )
	          VALUES ( '$wiki' , '$pageId' , '$revId' , '$fixed', '$notFixed' , '$bot' , '$service' , '$status', '$pageTitle' )";
	$result = mysqli_query( $link, $query );
	if ( $result ) {
		echo json_encode( 'true' );
	} else {
		echo json_encode( 'false' );
	}
} else {
	echo json_encode( 'false' );
}

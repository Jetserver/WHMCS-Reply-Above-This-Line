<?php
/*
*
* Reply Above This Line
* Created By Idan Ben-Ezra
*
* Copyrights @ Jetserver Web Hosting
* www.jetserver.net
*
* Hook version 1.0.0
*
**/

if (!defined("WHMCS"))
	die("This file cannot be accessed directly");

/*********************
 Reply Above This Line Settings
*********************/
function jetserverReplyAboveThisLine_settings()
{
	return array(
		'breakrow' 	=> "*** Reply above this line ***", // this line will be added to the selected email. * all content below this line will be deleted from the client reply.
	);
}
/********************/

function jetserverReplyAboveThisLine_cleanReply($vars) 
{
	$settings = jetserverReplyAboveThisLine_settings();
	
	if(strpos($vars['message'], $settings['breakrow']) !== false) 
	{
		list($message) = explode($settings['breakrow'], $vars['message']);

		$sql = "UPDATE tblticketreplies
			SET message = '" . mysql_real_escape_string(trim($message)) . "'
			WHERE id = '" . intval($vars['replyid']) . "'";
		mysql_query($sql);
	}
}	

function jetserverReplyAboveThisLine_addBreakRow($vars) 
{
	return jetserverReplyAboveThisLine_settings();
}
 
add_hook('EmailPreSend',	0, 'jetserverReplyAboveThisLine_addBreakRow');
add_hook('TicketUserReply', 	0, 'jetserverReplyAboveThisLine_cleanReply');

?>
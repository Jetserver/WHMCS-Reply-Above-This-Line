# WHMCS-Reply-Above-This-Line

This revolutionary WHMCS Hook will clean up all the unnecessary information from your tickets !

All you need to do is to add our smarty tag (“Reply Above This Line”) to the email templates.
Once a client replies to the ticket, all the information below our tag will be discarded.

Avoid the unnecessary information that usualy comes when answering by email replies.

# Installation

Upload the hook file to your WHMCS hooks folder (“includes/hooks“).

Our default string is “*** Reply above this line ***“, you can change that by editing the code under the settings section –

```
/*********************
 Reply Above This Line Settings
*********************/
function jetserverReplyAboveThisLine_settings()
{
	return array(
		'breakrow' 	=> "*** Reply above this line ***",
	);
}
/********************/
```

Use WHMCS Email template editor and add our smarty tag – {$breakrow} to the first line of the email tempalate (this should come first, before everything).

A “Support ticket reply” template for example, should look like this –

```
{$breakrow}

{$ticket_message}

----------------------------------------------
Ticket ID: #{$ticket_id}
Subject: {$ticket_subject}
Status: {$ticket_status}
Ticket URL: {$ticket_link}
----------------------------------------------
```

# More Information

https://docs.jetapps.com/category/whmcs-addons/whmcs-reply-above-this-line

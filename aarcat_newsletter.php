<?php
/*
Plugin Name: Aarcat Newsletter
Plugin URI: http://fadendaten.ch
Description: Manages the newsletter sub- and unsubscription by the aarcat newsletter service.
Version: 0.1.5
Author: fadendaten (felix langenegger)
Author URI: mailto:f.langenegger@fadendaten.ch 
*/


add_shortcode('newsletter', 'newsletter_form');

function newsletter_form($atts, $content="") {
	if($_POST["subscribe"]){
		return subscribe();
	} elseif($_POST["unsubscribe"]) {
		return unsubscribe();
	} else {
		return form($atts, $content);
	}
}

function subscribe() {
	$url = "https://ww1.aarcat.ch/mailingbijou/newsletter/manage2.jsp";	
	$action = "{$url}?action=subscribe&email={$_POST[email]}&firstname={$_POST[firstname]}&lastname={$_POST['lastname']}";
	$ok_text = "Besten Dank für ihre Anmeldung zum newsletter.";
	$not_ok_text = "Sie haben die E-mailadresse: {$_POST[email]} bereits registriert.";

	return post_form($action, $ok_text, $not_ok_text);
} 

function unsubscribe() {
	$url = "https://ww1.aarcat.ch/mailingbijou/newsletter/manage2.jsp";	
	$action = "{$url}?action=unsubscribe&email={$_POST[email]}";
	$ok_text = "Schade Schade Schade.";
	$not_ok_text = "Die E-mailadresse: {$_POST[email]} war nicht registriert.";

	return post_form($action, $ok_text, $not_ok_text); 
} 

function post_form($action, $ok_text, $not_ok_text) {
	$file = file ($action);

	while (list ($line_num, $line) = each ($file)) {
		if (preg_match ("/\bERROR\b/i", htmlspecialchars($line))) {
			return $not_ok_text;	
		}
	}
	return $ok_text;
}

function form($atts, $content) {
	extract( shortcode_atts(array(
	'action'     => '',
	'method'     => '',
	'id'         => '',
	'class'      => ''
	), $atts ));

	
	return "<form id='{$id}' class='{$class}' action='' method='post' >
		{$content}
	</form>";
}

?>

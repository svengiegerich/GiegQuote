#GiegQuote
##About
GiegQuote is an API wrapper for the [Quote.fm API](https://quote.fm/labs)

##Getting started
It´s pretty simple:
	
	<?php
	
	require('GiegQuote.php');
	$giegQuote = new GiegQuote();
	
	//Example
	$giegQuote->getCategories();
	
##Available Methods
Look at the [wiki]() for list of methods with their documentation.
	
##Requirements
The server has to support 'CURL PHP extension', the 'JSON PHP extension' and all data should be encoded with UTF-8.
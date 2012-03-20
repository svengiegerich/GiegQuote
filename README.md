#GiegQuote
##About
**GiegQuote is an API wrapper for the [Quote.fm API](https://quote.fm/labs)**

##Getting started
It´s pretty simple:
	
	<?php
	
	require('GiegQuote.php');
	$giegQuote = new GiegQuote();
	
	//Example
	$giegQuote->getCategories();
	
**or** have a look at my [blog post](http://gieglabs.net/index.php/blog/quote_fm-api)
	
##Available Methods
Look at the [wiki](https://github.com/svengiegerich/GiegQuote/wiki) for list of methods with their documentation.
	
##Requirements
The server has to support 'CURL PHP extension', the 'JSON PHP extension' and all data should be encoded with UTF-8.
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

##Example
You can find a live demo of the 'Quote-Banner' example at [gieglabs.net/projects/GiegQuote](http://gieglabs.net/projects/quote-banner/index.php?username=martinwolf). PS: try to change the username parameter in your desired.
	
##Requirements
The server has to support the 'JSON PHP extension' and all data should be encoded with UTF-8, cURL-Support is desired, but not required.

<br />

#### Copyright
2012, Sven Giegerich, GiegLabs, www.gieglabs.net. Licensed under the MIT License. Redistributions of files must retain the above copyright notice.
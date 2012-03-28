<?php 
/*****************************************************************************************
    ____                           _____                     __              
   /\  _`\    __                  /\  __`\                  /\ \__           
   \ \ \L\_\ /\_\      __      __ \ \ \/\ \   __  __    ___ \ \ ,_\     __   
    \ \ \L_L \/\ \   /'__`\  /'_ `\\ \ \ \ \ /\ \/\ \  / __`\\ \ \/   /'__`\ 
     \ \ \/, \\ \ \ /\  __/ /\ \L\ \\ \ \\'\\\ \ \_\ \/\ \L\ \\ \ \_ /\  __/ 
      \ \____/ \ \_\\ \____\\ \____ \\ \___\_\\ \____/\ \____/ \ \__\\ \____\
       \/___/   \/_/ \/____/ \/___L\ \\/__//_/ \/___/  \/___/   \/__/ \/____/
                               /\____/                                       
                               \_/__/                                                     

GiegQuote: Quote.fm API Wrapper
 * Copyright 2012, Sven Giegerich, GiegLabs, www.gieglabs.net
 * Licensed under the MIT License.
 * Redistributions of files must retain the above copyright notice.
 
 * @author Sven Giegerich (sven@gieglabs.net) at GiegLabs (www.gieglabs.net)
 * @version 0.1
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 
 * Function Reference: https://github.com/svengiegerich/GiegQuote/wiki
                      
*****************************************************************************************/

if (!function_exists('json_decode')) {
	throw new Exception('This API needs the JSON PHP extension.');
}

class GiegQuote {
	const VERSION = '0.1';
	const API_BASE = 'https://quote.fm/api/';
	
	/*
	---- Recommendation
	*/
	public function getRecommendation($id) {
		$recommendationUrl = self::API_BASE . 'recommendation/get/?id=' . $id;
		return GiegQuote::request($recommendationUrl);
	}
	
	public  function getRecommendationList($param) {
		if (is_numeric($param)) {
			$this->getRecommendationListByArticle($articleId, 0);
		} else if (is_string($param)) {
			$this->getRecommendationListByUser($param);
		}
		return false;
	}
	
	public function getRecommendationListByUser($username, $page = 0) {
		$recommendationListByUserUrl = self::API_BASE . 'recommendation/listByUser/?username=' . $username;
		$recommendationListByUserUrl .= GiegQuote::appendPage($page);
		return GiegQuote::request($recommendationListByUserUrl);
	}
	
	public function getRecommendationListByArticle($articleId, $page = 0) {
		$recommendationListByArticleUrl = self::API_BASE . 'recommendation/listByArticle/?id=' . $articleId;
		$articleListUrl .= GiegQuote::appendPage($page);
		return GiegQuote::request($recommendationListByArticleUrl);
	}
	
	/*
	---- Article
	*/
	public function getArticle($param) {
		if (is_numeric($param)) {
			$this->getArticleById($articleId, 0);
		} else if ($this->checkUrl($param)) {
			$this->getArticleByUrl($param);
		}
		return false;
	}
	
	public function getArticleById($id) {
		$articleUrl = self::API_BASE . '/article/get?id=' . $id;
		return GiegQuote::request($articleUrl);
	}
	
	public function getArticleByUrl($url) {
		$articleUrl = self::API_BASE . '/article/get?url=' . $url;
		return GiegQuote::request($articleUrl);
	}
	
	public function getArticleListByPage($pageId, $page = 0) {
		$articleListByPageUrl = self::API_BASE . 'article/listbyPage?id=' . $pageId;
		$articleListByPageUrl .= GiegQuote::appendPage($page);
		return GiegQuote::request($articleListByPageUrl);
	}
	
	public function getArticleListByCategories($categoryIds, $language = 'any', $scope = 'time', $page = 0) {
		$articleListUrl =  self::API_BASE . '/article/listByCategories/?ids=';
		if (is_array($categoryIds)) {
			foreach ($categoryIds as $categoryId) {
				$articleListUrl .= $categoryId . ',';	
			}
			substr($category, -1);
		} else {
			$articleListUrl .= $categoryIds;
		}
		
		$articleListUrl .= GiegQuote::appendPage($page);
		
		if ($language != 'any' && ($language == 'de' || $language == 'en')) {
			$articleListUrl .= '&language=' . $language;
		}
		if ($scope == 'time' || $scope == 'popular') {
			$articleListUrl .= '&scope=' . $scope;
		}
		return GiegQuote::request($articleListUrl);
	}
	
	/*
	---- Page
	*/
	public function getPage($param) {
		if (is_numeric($param)) {
			$this->getPageById($param);
		} else if ($this->checkUrl($param)) {
			$this->getPageByDomain($param);
		}
		return false;
	}
	
	public function getPageByDomain($domain) {
		$pageUrl = self::API_BASE . 'page/get/?domain=' . $domain;
		return GiegQuote::request($pageUrl);
	}
	
	public function getPageById($pageId) {
		$pageUrl = self::API_BASE . 'page/get/?id=' . $pageId;
		return GiegQuote::request($pageUrl);
	}
	
	public function getPageList($page = 0) {
		$pageListUrl = self::API_BASE . 'page/list/?';
		$pageListUrl .= GiegQuote::appendPage($page);
		return GiegQuote::request($pageListUrl);
	}
	
	/*
	---- User
	*/
	public function getUser($param) {
		if (is_numeric($param)) {
			$this->getUserById($param);
		} else if (is_string($param)) {
			$this->getUserByName($param);
		}
		return false;
	}
	
	public function getUserByName($userName) {
		$url = self::API_BASE . 'user/get/?username=' . $userName;
		return GiegQuote::request($url);
	}
	
	public function getUserById($userId) {
		$url = self::API_BASE . 'user/get/?id=' . $userId;
		return GiegQuote::request($url);
	}
	
	public function userListFollowers($username, $page = 0) {
		$userListFollowersUrl = self::API_BASE . 'user/listFollowers/?username=' . $username;
		$userListFollowersUrl .= GiegQuote::appendPage($page);
		return GiegQuote::request($userListFollowersUrl);
	}
	
	public function userListFollowings($username, $page = 0) {
		$userListFollowingsUrl = self::API_BASE . 'user/listFollowings/?username=' . $username;
		$userListFollowingsUrl .= GiegQuote::appendPage($page);
		return GiegQuote::request($userListFollowingsUrl);
	}
	
	/*
	---- Category
	*/
	public function getCategories() {
		$categoriesUrl = self::API_BASE . 'category/list';
		return GiegQuote::request($categoriesUrl);
	}
	
	public function getCategoryByName($categoryName) {
		$categories = self::getCategories();
		
		foreach ($categories->entities as $category) {
			if ($category->name == $categoryName) {
				return $category;
			}
		}	
		return false;
	}
	
	/*
	---- General
	*/
	private function appendPage($page) {
		$query = '&page=';
		
		if (is_array($page)) {
			foreach ($pages as $id) {
				$query .= $id . ',';
			}
			substr($query, -1);
			return $query;
		} else if (is_numeric($page) && $page != 0) {
			$query .= $page;
			return $query;
		}
		return;
	}
	
	private static function checkUrl($url) {
		//"Validate URL Using PHP Regex" : http://www.blog.highub.com/regular-expression/php-regex-regular-expression/php-regex-validating-a-url/
		$pattern = '/^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&amp;?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/';
		return preg_match($pattern, $url);
	}
	
	/*
	---- cURL
	*/
	private static $curl = null;
	private static $response = null;
	private static $last_url = null;
	private static $curl_options = array();
	
	public static function request($url) {
	 	if (!function_exists('curl_init')) {
	 		self::$response = json_decode(file_get_contents($url));
	 	} else {
	  	self::$curl = curl_init($url);
	  	self::setOptions();
	  	  
	  	self::$response = json_decode(curl_exec(self::$curl));
	  	curl_close(self::$curl);
	  }
	  
	 	if(empty(self::$response)) {
			$e = new GiegQuoteException('Something went wrong with the last request to the Quote.fm API! URL: ' . $url);
			throw $e;
			
		}
		
		if (isset(self::$response->code)) {
			$e = new GiegQuoteException('Something went wrong with the last request to the Quote.fm API! Message: ' . self::$response->message . '. URL: ' . $url, self::$response->code);
			throw $e;
		}
	    
	  return self::$response;
	}
	  
	private function setOptions() {
		if(!empty(self::$curl)) {
			curl_setopt_array(self::$curl, array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_USERAGENT => 'GiegQuote | Quote.FM API PHP Wrapper',
				CURLOPT_TIMEOUT => 60,
				CURLOPT_CONNECTTIMEOUT => 10
		) + self::$curl_options);
			          
		// reset options
		self::$curl_options = array();
		}
	}
}

class GiegQuoteException extends Exception { }
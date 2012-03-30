<?php
require_once('../GiegQuote.php');

class BaseTest {
	static $success = 0;
	static $error = 0;
	static $exceptions = array();
	
	private function error($e) {
		self::$exceptions[] = $e;
		return self::$error++;
	}
	
	private function success() {
		return self::$success++;
	}
	
	/*
	---- Recommendation
	*/
	public function testGetRecommendation($id = 900) {
		try {
			GiegQuote::getRecommendation($id);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetRecommendationListByUser($username = 'uarrr', $scope = 'time', $page = 0, $pageSize = 2) {
		try {
			GiegQuote::getRecommendationListByUser($username, $scope, $page, $pageSize);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetRecommendationListByArticle($articleId = 123, $scope = 'time', $page = 0, $pageSize = 2) {
		try {
			GiegQuote::getRecommendationListByArticle($articleId, $scope, $page, $pageSize);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	/*
	---- Article
	*/
	public function testGetArticleById($id = 2111) {
		try {
			GiegQuote::getArticleById($id);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetArticleByUrl($url = 'http://uarrr.org/2012/03/21/was-gegen-einen-connect-via-facebook-und-twitter-spricht/') {
		try {
			GiegQuote::getArticleByUrl($url);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetArticleListByPage($pageId = 23, $scope = 'time', $page = 0, $pageSize = 2) {
		try {
			GiegQuote::getArticleListByPage($pageId, $scope, $page, $pageSize);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetArticleListByCategories($categoryIds = 1, $language = 'any', $scope = 'time', $page = 0, $pageSize = 2) {
		try {
			GiegQuote::getArticleListByCategories($categoryIds, $language, $scope, $page, $pageSize);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	/*
	---- Page
	*/
	public function testGetPageByDomain($domain = 'zeit.de') {
		try {
			GiegQuote::getPageByDomain($domain);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetPageById($id = 1234) {
		try {
			GiegQuote::getPageById($id);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetPageList($page = 0) {
		try {
			GiegQuote::getPageList($page);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	/*
	---- User
	*/
	public function testGetUserByName($username = 'uarrr') {
		try {
			GiegQuote::getUserByName($username);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetUserById($id = 1) {
		try {
			GiegQuote::getUserById($id);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testUserListFollowers($username = 'pwaldhauer', $page = 0, $pageSize = 2) {
		try {
			GiegQuote::userListFollowers($username, $page, $pageSize);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testUserListFollowings($username = 'uarrr', $page = 0, $pageSize = 2) {
		try {
			GiegQuote::userListFollowings($username, $page, $pageSize);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	/*
	---- Category
	*/
	public function testGetCategories() {
		try {
			GiegQuote::getCategories();
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
}

$class_methods = get_class_methods('BaseTest');
foreach ($class_methods as $method_name) {
    $p = stripos($method_name, 'e');
    if ($p !== false) {
    	BaseTest::$method_name();
    }
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>GiegQuote | Unit testing</title>
		<meta http-equiv="Content-type" value="text/html; charset=utf-8">
		<style>
			/*!
			* Bootstrap v2.0.2
			*
			* Copyright 2012 Twitter, Inc
			* Licensed under the Apache License v2.0
			* http://www.apache.org/licenses/LICENSE-2.0
			*
			* Designed and built with all the love in the world @twitter by @mdo and @fat.
			*/
			body {
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-size: 13px;
				line-height: 18px;
				color: #333;
				margin: 100px;
			}
			
			.alert {
			  padding: 8px 35px 8px 14px;
			  margin-bottom: 18px;
			  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
			  background-color: #fcf8e3;
			  border: 1px solid #fbeed5;
			  -webkit-border-radius: 4px;
			  -moz-border-radius: 4px;
			  border-radius: 4px;
			  color: #c09853;
			  max-width: 500px;
			}
			
			.alert-success {
			  background-color: #dff0d8;
			  border-color: #d6e9c6;
			  color: #468847;
			}
			.alert-danger,
			.alert-error {
			  background-color: #f2dede;
			  border-color: #eed3d7;
			  color: #b94a48;
			}
			
			h1, h2, h3, h4, h5, h6 {
				margin: 0;
				font-family: inherit;
				font-weight: bold;
				color: inherit;
				text-rendering: optimizelegibility;
				margin-bottom: 20px;
			}
			
			h1 {
				font-size: 30px;
				line-height: 36px;
			}
		</style>
	</head>
	<body>
		<h1>GiegQuote | Unit testing:</h1>
		<?php if (BaseTest::$error > 0): ?>
			<div class="alert alert-error">
				<strong>Oh snap!</strong> <?php echo BaseTest::$error ?> error[s] occurred.
				<?php foreach (BaseTest::$exceptions as $exception): ?>
					<pre>
						<?php print_r($exception->getMessage()) ?>
					</pre>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<div class="alert alert-success">
				<strong>Well done!</strong> Everything went right.
			</div>
		<?php endif; ?>
	</body>
</html>
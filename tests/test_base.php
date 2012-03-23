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
	public function testGetRecommendation() {
		try {
			GiegQuote::getRecommendation(900);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetRecommendationListByUser() {
		try {
			GiegQuote::getRecommendationListByUser('uarrr', 0);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetRecommendationListByArticle() {
		try {
			GiegQuote::getRecommendationListByArticle(123, 0);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	/*
	---- Article
	*/
	public function testGetArticleById() {
		try {
			GiegQuote::getArticleById(2111);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetArticleByUrl() {
		try {
			GiegQuote::getArticleByUrl('http://uarrr.org/2012/03/21/was-gegen-einen-connect-via-facebook-und-twitter-spricht/');
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetArticleListByPage() {
		try {
			GiegQuote::getArticleListByPage(23, 0);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetArticleListByCategories() {
		try {
			GiegQuote::getArticleListByCategories(1, 'de', 'time', 0);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	/*
	---- Page
	*/
	public function testGetPageByDomain() {
		try {
			GiegQuote::getPageByDomain('zeit.de');
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetPageById() {
		try {
			GiegQuote::getPageById(1234);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetPageList() {
		try {
			GiegQuote::getPageList(0);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	/*
	---- User
	*/
	public function testGetUserByName() {
		try {
			GiegQuote::getUserByName('uarrr');
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testGetUserById() {
		try {
			GiegQuote::GetUserById(1);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testUserListFollowers() {
		try {
			GiegQuote::UserListFollowers('pwaldhauer', 0);
			BaseTest::success();
		} catch (Exception $e) {
			BaseTest::error($e);
		}
	}
	
	public function testUserListFollowings() {
		try {
			GiegQuote::userListFollowings('uarrr', 0);
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
					<?php print_r($exception->getMessage()) ?>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
			<div class="alert alert-success">
				<strong>Well done!</strong> Everything went right.
			</div>
		<?php endif; ?>
	</body>
</html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="quote-banner-style.css">
</head>
<body>
<?php
if (isset($_GET['username'])) {
	$username = $_GET['username'];
} else {
	$username = 'martinwolf';
}
$i = 0;

include 'GiegQuote.php';
$quote = new GiegQuote();
$recommendationList = $quote->getRecommendationListByUser($username);
?>
<?php if (!isset($recommendationList->code)): ?>
	<?php foreach ($recommendationList->entities as $recommendation): ?>
		<?php if ($i == 0): ?>
			<?php
				$user = $recommendationList->user;
				$article = $quote->getArticleById($recommendation->article_id);
			?>
			<div id="quote-banner">
				<div id="quote-banner-header">
					<img src="<?php echo $user->avatar ?>" widht="40" height="40" alt="<?php echo $user->username ?>">
					<h3><?php echo $user->username ?> latests recommendation on <a href="http://quote.fm">quote.fm</a>:</h3>
				</div>
				<div class="quote">
					<div class="quote-content">
						<p><?php echo $recommendation->quote ?></p>
					</div>
					<div class="triangle"></div>
					<div class="quote-title">
						<p>
							<?php echo $article->title ?>
						</p>
					</div>
				</div>
			</div>
		<?php else: ?>
			<?php return; ?>
		<?php endif; ?>
		<?php $i++; ?>
	<?php endforeach; ?>
<?php else: ?>
	<div class="quote">
		<br />
		<div class="quote-content">
			<p><strong>Error!</strong> The User does not exists :(</p>
		</div>
	</div>
<?php endif; ?>
</body>
</html>
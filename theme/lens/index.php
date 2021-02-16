<?php if (!defined('__Crystal_DIR_Theme__')) exit(); ?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<title>
		<?= $config->title ?> -
		<?= $config->subtitle ?>
	</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<link rel="stylesheet" href="./theme/lens/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="./theme/lens/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload-0 is-preload-1 is-preload-2">
	<div id="main">
		<header id="header">
			<h1>
				<?= $config->title ?>
			</h1>
			<p>
				<?= $config->description ?></a>
			</p>
			<ul class="icons">
				<?php foreach ($config->socials as $social) : ?>
					<li>
						<a href="<?= $social[2] ?>" class="icon <?= $social[1] ?>">
							<span class="label">
								<?= $social[0] ?>
							</span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</header>
		<section id="thumbnails">
			<?php foreach ($data->images as $image) : ?>
				<article>
					<a class="thumbnail" href="./image/<?= $image->file ?>" data-position="left center">
						<img src="./temp/thumb/<?= $image->file ?>" alt="" />
					</a>
					<h2>
						<?= $image->title ?>
					</h2>
					<p>
						<?= $image->date ?>&nbsp;&nbsp;<?= $image->desc ?>
					</p>
				</article>
			<?php endforeach; ?>
		</section>
		<footer id="footer">
			<ul class="copyright">
				<li>&copy;
					<?= $config->copyright ?>.
				</li>
				<li>Powered by <a href="https://github.com/FlyingSky-CN/Crystal">Crystal</a>.</li>
				<li>Theme Lens by <a href="http://html5up.net">HTML5 UP</a>.</li>
			</ul>
		</footer>
	</div>
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/browser.min.js"></script>
	<script src="./assets/js/breakpoints.min.js"></script>
	<script src="./theme/lens/assets/js/main.js"></script>
</body>

</html>
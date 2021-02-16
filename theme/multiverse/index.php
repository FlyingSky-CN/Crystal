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
	<link rel="stylesheet" href="./theme/multiverse/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="./theme/multiverse/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<div id="wrapper">
		<header id="header">
			<h1>
				<a href="index.html">
					<strong>
						<?= $config->title ?>
					</strong>
					<?= $config->subtitle ?>
				</a>
			</h1>
			<nav>
				<ul>
					<li><a href="#footer" class="icon solid fa-info-circle">About</a></li>
				</ul>
			</nav>
		</header>
		<div id="main">
			<?php foreach ($data->images as $image) : ?>
				<article class="thumb">
					<a class="image" href="./image/<?= $image->file ?>">
						<img src="./temp/thumb/<?= $image->file ?>" alt="" />
					</a>
					<?php if ($config->option->show_title) : ?>
						<h2>
							<?= $image->title ?>
						</h2>
					<?php endif; ?>
					<p>
						<?= $image->date ?>&nbsp;&nbsp;<?= $image->desc ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>
		<footer id="footer" class="panel">
			<div class="inner split">
				<div>
					<section>
						<h2>
							About
						</h2>
						<p>
							<?= $config->description ?>
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
					</section>
					<p class="copyright">
						&copy; <?= $config->copyright ?>.
						Powered by <a href="https://github.com/FlyingSky-CN/Crystal">Crystal</a>.
						Theme Multiverse by <a href="http://html5up.net">HTML5 UP</a>.
					</p>
				</div>
			</div>
		</footer>
	</div>
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/jquery.poptrox.min.js"></script>
	<script src="./assets/js/browser.min.js"></script>
	<script src="./assets/js/breakpoints.min.js"></script>
	<script src="./theme/multiverse/assets/js/util.js"></script>
	<script src="./theme/multiverse/assets/js/main.js"></script>
</body>

</html>
<?php
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<span class="navbar-brand">Daniel Wu</span>
		</div>
		<ul class="nav navbar-nav">
			<li class="nav-item <?php if ($file === 'about') echo 'active' ?>">
				<a href="home.php">Home</a>
			</li>
			<li class="nav-item <?php if ($file === 'about') echo 'active' ?>">
				<a href="assignments.php">Assignments</a>
			</li>
		</ul>
	</div>
</nav>
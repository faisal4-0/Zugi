<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
	<title>ZUGI</title>
<link rel="stylesheet" href="CSS/style.css">
	
</head>
<body>
<div class="header">
	<div class="container">
		<div class="logo">
			<a href="index.php" class="logo-link">
				<span class="logo-ring">
					<span class="logo-badge">Z</span>
				</span>
				<h1>ZUGI</h1>
			</a>
		</div>
		<div class="navi">
			<ul>
				<li><a href="men.php">MEN</a></li>
				<li><a href="women.php">WOMEN</a></li>
				<li><a href="kids.php">KIDS</a></li>
				<li><a href="beauty.php">BEAUTY</a></li>
			</ul>
		</div>
		<div class="header-icons">
			<div class="search-widget">
				<button type="button" class="search-btn" id="search-btn" aria-label="Search">
					<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
				</button>
				<form action="search.php" method="GET" class="search-panel" id="search-panel">
					<input type="text" name="q" id="search-input" placeholder="Search products..." autocomplete="off">
					<button type="submit">GO</button>
				</form>
			</div>
			<a href="cart.php">CART (<?php echo array_sum($_SESSION['cart'] ?? []); ?>)</a>
			<a href="reg.php" class="register">REGISTRATION</a>

			<div class="color-picker">
				<button type="button" class="color-picker-btn" id="color-picker-btn" aria-label="Change theme color"></button>
				<div class="color-picker-panel" id="color-picker-panel">
					<button type="button" class="color-swatch" data-color="#ff3b3b" style="background:#ff3b3b;" aria-label="Red" title="Red"></button>
					<button type="button" class="color-swatch" data-color="#3b82f6" style="background:#3b82f6;" aria-label="Blue" title="Blue"></button>
					<button type="button" class="color-swatch" data-color="#22c55e" style="background:#22c55e;" aria-label="Green" title="Green"></button>
					<button type="button" class="color-swatch" data-color="#a855f7" style="background:#a855f7;" aria-label="Purple" title="Purple"></button>
					<button type="button" class="color-swatch" data-color="#f97316" style="background:#f97316;" aria-label="Orange" title="Orange"></button>
					<button type="button" class="color-swatch" data-color="#ec4899" style="background:#ec4899;" aria-label="Pink" title="Pink"></button>
					<button type="button" class="color-swatch" data-color="#14b8a6" style="background:#14b8a6;" aria-label="Teal" title="Teal"></button>
				</div>
			</div>

			<button id="theme-toggle" type="button" class="theme-switch" aria-label="Toggle dark mode">
				<span class="theme-switch-track">
					<svg class="sun-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
					<svg class="moon-icon" viewBox="0 0 24 24" fill="currentColor"><path d="M21 12.8A9 9 0 1111.2 3a7 7 0 009.8 9.8z"/></svg>
					<span class="theme-switch-thumb"></span>
				</span>
			</button>
		</div>
	</div>
</div>
<div class="content4">
	<div class="container">
		<div class="footer-top">
			<div class="footer-brand">
				<h2>ZUGI</h2>
				<p>Fashion that moves with you. Elevated basics for every day.</p>
			</div>
			<div class="footer-col">
				<h4>SHOP</h4>
				<ul>
					<li><a href="">Men</a></li>
					<li><a href="">Women</a></li>
					<li><a href="">Kids</a></li>
					<li><a href="">Beauty</a></li>
				</ul>
			</div>
			<div class="footer-col">
				<h4>HELP</h4>
				<ul>
					<li><a href="">Track Order</a></li>
					<li><a href="">Returns &amp; Exchanges</a></li>
					<li><a href="">Shipping Info</a></li>
					<li><a href="">Contact Us</a></li>
				</ul>
			</div>
			<div class="footer-col">
				<h4>COMPANY</h4>
				<ul>
					<li><a href="">About Us</a></li>
					<li><a href="">Careers</a></li>
					<li><a href="">Store Locator</a></li>
				</ul>
			</div>
			<div class="footer-newsletter">
				<h4>SEND US A MESSAGE</h4>
				<p>Questions, feedback, or just say hi.</p>
				<form class="footer-form" action="save_message.php" method="POST">
					<input type="text" name="name" placeholder="Your name" required>
					<input type="email" name="email" placeholder="Your email" required>
					<textarea name="comment" placeholder="Your comment" rows="3" required></textarea>
					<button type="submit">SEND</button>
				</form>
			</div>
		</div>
		<div class="footer-divider"></div>
		<div class="footer-bottom">
			<p>&copy; 2026 FAISAL. All rights reserved.</p>
			<div class="footer-social">
				<a href="">INSTAGRAM</a>
				<a href="">FACEBOOK</a>
				<a href="">TIKTOK</a>
			</div>
			<div class="footer-legal">
				<a href="">Privacy Policy</a>
				<a href="">Terms of Service</a>
			</div>
		</div>
	</div>
</div>

<script>
	// ---- Dark / light mode ----
	const themeBtn = document.getElementById('theme-toggle');
	const body = document.body;

	if (localStorage.getItem('theme') === 'dark') {
		body.classList.add('dark-mode');
	}

	themeBtn.addEventListener('click', function(){
		body.classList.toggle('dark-mode');
		localStorage.setItem('theme', body.classList.contains('dark-mode') ? 'dark' : 'light');
	});

	// ---- Accent color picker ----
	const colorBtn = document.getElementById('color-picker-btn');
	const colorPanel = document.getElementById('color-picker-panel');
	const swatches = document.querySelectorAll('.color-swatch');

	function setAccent(color){
		document.documentElement.style.setProperty('--accent', color);
		localStorage.setItem('accentColor', color);
		swatches.forEach(function(s){
			s.classList.toggle('active', s.dataset.color === color);
		});
	}

	const savedAccent = localStorage.getItem('accentColor');
	if (savedAccent) {
		setAccent(savedAccent);
	}

	colorBtn.addEventListener('click', function(e){
		e.stopPropagation();
		colorPanel.classList.toggle('open');
	});

	swatches.forEach(function(s){
		s.addEventListener('click', function(){
			setAccent(s.dataset.color);
			colorPanel.classList.remove('open');
		});
	});

	// ---- Search widget ----
	const searchBtn = document.getElementById('search-btn');
	const searchPanel = document.getElementById('search-panel');
	const searchInput = document.getElementById('search-input');

	searchBtn.addEventListener('click', function(e){
		e.stopPropagation();
		searchPanel.classList.toggle('open');
		if (searchPanel.classList.contains('open')) {
			searchInput.focus();
		}
	});

	document.addEventListener('click', function(e){
		if (!colorPanel.contains(e.target) && e.target !== colorBtn) {
			colorPanel.classList.remove('open');
		}
		if (!searchPanel.contains(e.target) && e.target !== searchBtn && !searchBtn.contains(e.target)) {
			searchPanel.classList.remove('open');
		}
	});

	// ---- Scroll reveal ----
	const revealSelector = '.product-card, .shop-title, .cart-item, .cart-total, .product-detail, .content .txt, .content .txt2, .content .image, .t1, .t2, .t3, .text, .text2';
	const revealItems = document.querySelectorAll(revealSelector);

	const revealObserver = new IntersectionObserver(function(entries, observer){
		entries.forEach(function(entry){
			if (entry.isIntersecting) {
				entry.target.classList.add('in-view');
				observer.unobserve(entry.target);
			}
		});
	}, { threshold: 0.15 });

	revealItems.forEach(function(item){
		revealObserver.observe(item);
	});
</script>
</body>
</html>
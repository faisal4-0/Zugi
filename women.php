<?php include('header.php'); require('products.php'); ?>
<div class="shop-page">
	<div class="shop-title">
		<h1>WOMEN</h1>
		<p>Effortless style for every you.</p>
	</div>
	<div class="product-grid">
		<?php foreach ($products as $id => $p):
			if ($p['category'] !== 'women') continue;
		?>
		<div class="product-card">
			<a href="product.php?id=<?php echo $id; ?>" class="product-link">
				<div class="product-img" style="background-image: url(<?php echo $p['img']; ?>);"></div>
				<div class="product-name"><?php echo htmlspecialchars($p['name']); ?></div>
				<div class="product-price">$<?php echo number_format($p['price'], 2); ?></div>
			</a>
			<form action="cart.php" method="POST" class="quick-add-form">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="qty" value="1">
				<button type="submit">ADD TO CART</button>
			</form>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<?php include('footer.php'); ?>
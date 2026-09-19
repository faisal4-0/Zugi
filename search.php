<?php
include('header.php');
require('products.php');

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$results = [];

if ($q !== '') {
	foreach ($products as $id => $p) {
		if (stripos($p['name'], $q) !== false
			|| stripos($p['category'], $q) !== false
			|| stripos($p['color'], $q) !== false) {
			$results[$id] = $p;
		}
	}
}
?>
<div class="shop-page">
	<div class="shop-title">
		<h1>SEARCH</h1>
		<?php if ($q !== ''): ?>
			<p><?php echo count($results); ?> result<?php echo count($results) === 1 ? '' : 's'; ?> for "<?php echo htmlspecialchars($q); ?>"</p>
		<?php else: ?>
			<p>Type something in the search box to find products.</p>
		<?php endif; ?>
	</div>

	<?php if ($q !== '' && empty($results)): ?>
		<p class="cart-empty">No products found for "<?php echo htmlspecialchars($q); ?>". <a href="explore.php">Browse all products →</a></p>
	<?php elseif (!empty($results)): ?>
	<div class="product-grid">
		<?php foreach ($results as $id => $p): ?>
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
	<?php endif; ?>
</div>
<?php include('footer.php'); ?>
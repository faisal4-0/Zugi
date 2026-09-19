<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require('products.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = $products[$id] ?? null;

include('header.php');
?>
<div class="shop-page">
	<?php if (!$product): ?>
		<div class="shop-title">
			<h1>PRODUCT NOT FOUND</h1>
			<p><a href="index.php">Back to home →</a></p>
		</div>
	<?php else: ?>
		<div class="product-detail">
			<div class="product-detail-img-wrap">
				<div class="product-detail-img" style="background-image: url(<?php echo $product['img']; ?>);"></div>
			</div>
			<div class="product-detail-info">
				<h1><?php echo htmlspecialchars($product['name']); ?></h1>
				<div class="product-detail-price">$<?php echo number_format($product['price'], 2); ?></div>
				<p class="product-detail-desc"><?php echo htmlspecialchars($product['details']); ?></p>

				<div class="product-detail-meta">
					<p><strong>Color:</strong> <?php echo htmlspecialchars($product['color']); ?></p>
					<p>
						<strong>Size:</strong><br>
						<?php foreach ($product['sizes'] as $size): ?>
							<span class="size-box"><?php echo htmlspecialchars($size); ?></span>
						<?php endforeach; ?>
					</p>
				</div>

				<form action="cart.php" method="POST" class="add-to-cart-form">
					<input type="hidden" name="action" value="add">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="number" name="qty" value="1" min="1">
					<button type="submit">ADD TO CART</button>
				</form>

				<p class="back-link"><a href="<?php echo $product['category']; ?>.php">← Back to <?php echo strtoupper($product['category']); ?></a></p>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php include('footer.php'); ?>
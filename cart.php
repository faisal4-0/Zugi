<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require('products.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$action = $_POST['action'] ?? '';
	$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

	if ($action === 'add' && isset($products[$id])) {
		$qty = isset($_POST['qty']) ? max(1, (int)$_POST['qty']) : 1;
		$_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + $qty;
	} elseif ($action === 'update' && isset($products[$id])) {
		$qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
		if ($qty <= 0) {
			unset($_SESSION['cart'][$id]);
		} else {
			$_SESSION['cart'][$id] = $qty;
		}
	} elseif ($action === 'remove') {
		unset($_SESSION['cart'][$id]);
	}

	header('Location: cart.php');
	exit;
}

include('header.php');

$cart = $_SESSION['cart'] ?? [];
?>
<div class="shop-page">
	<div class="shop-title">
		<h1>YOUR CART</h1>
	</div>

	<?php if (empty($cart)): ?>
		<p class="cart-empty">Your cart is empty. <a href="index.php">Continue shopping →</a></p>
	<?php else:
		$total = 0;
	?>
		<div class="cart-list">
			<?php foreach ($cart as $id => $qty):
				if (!isset($products[$id])) continue;
				$p = $products[$id];
				$subtotal = $p['price'] * $qty;
				$total += $subtotal;
			?>
			<div class="cart-item">
				<div class="cart-item-img" style="background-image: url(<?php echo $p['img']; ?>);"></div>
				<div class="cart-item-info">
					<div class="cart-item-name"><?php echo htmlspecialchars($p['name']); ?></div>
					<div class="cart-item-price">$<?php echo number_format($p['price'], 2); ?> each</div>
				</div>
				<form action="cart.php" method="POST" class="cart-item-qty">
					<input type="hidden" name="action" value="update">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="number" name="qty" value="<?php echo $qty; ?>" min="1">
					<button type="submit">UPDATE</button>
				</form>
				<div class="cart-item-subtotal">$<?php echo number_format($subtotal, 2); ?></div>
				<form action="cart.php" method="POST">
					<input type="hidden" name="action" value="remove">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<button type="submit" class="cart-remove-btn">REMOVE</button>
				</form>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="cart-total">TOTAL: $<?php echo number_format($total, 2); ?></div>
	<?php endif; ?>
</div>
<?php include('footer.php'); ?>
<?php
$host = "localhost";
$user = "root";
$pass = "";        // default XAMPP password is empty
$dbname = "zugi_db";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$comment = trim($_POST['comment'] ?? '');
if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) && $comment !== '') {
    $stmt = $conn->prepare("INSERT INTO messages (name, email, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $comment);
    if ($stmt->execute()) {
        header("Location: thankyou.php");
    } else {
        header("Location: index.php?sent=0");
    }
    $stmt->close();
} else {
    header("Location: index.php?sent=invalid");
}
$conn->close();
?>
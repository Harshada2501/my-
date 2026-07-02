<?php
session_start();
include "db.php";

$product_id = $_GET['id'] ?? 0;

$reviews = mysqli_query($conn, "
SELECT reviews.*, users.full_name 
FROM reviews 
JOIN users ON reviews.user_id = users.id
WHERE product_id = '$product_id'
ORDER BY created_at DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Reviews</title>
<link rel="stylesheet" href="../css/review.css">
</head>

<body>

<div class="review-box">

<h2>⭐ Give Review</h2>

<form action="submit-review.php" method="POST">

<input type="hidden" name="product_id" value="<?= $product_id ?>">

<label>Rating</label>
<select name="rating" required>
<option value="">Select</option>
<option value="5">⭐⭐⭐⭐⭐</option>
<option value="4">⭐⭐⭐⭐</option>
<option value="3">⭐⭐⭐</option>
<option value="2">⭐⭐</option>
<option value="1">⭐</option>
</select>

<label>Comment</label>
<textarea name="comment"></textarea>

<button type="submit">Submit Review</button>

</form>

</div>

<div style="width:600px;margin:30px auto;">

<h2>💬 Customer Reviews</h2>

<?php if(mysqli_num_rows($reviews) > 0){ ?>

<?php while($row = mysqli_fetch_assoc($reviews)){ ?>

<div style="background:#fff;padding:15px;margin:10px 0;border-radius:10px;box-shadow:0 5px 10px rgba(0,0,0,0.1);">

<p><strong><?= $row['full_name'] ?></strong></p>

<p>
<?php for($i=1;$i<=5;$i++){
    echo ($i <= $row['rating']) ? "⭐" : "☆";
} ?>
</p>

<p><?= $row['comment'] ?></p>

<small><?= $row['created_at'] ?></small>

</div>

<?php } ?>

<?php } else { ?>
<p>No reviews yet 😶</p>
<?php } ?>

</div>

</body>
</html>

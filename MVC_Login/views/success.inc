<h1>Success!</h1>

<p>Welcome Back, <?php echo htmlentities($data[0]['fullname']); ?></p>

<?php include 'newHeader.inc'; ?>
<?php include 'views/body.php'; ?>


<p><a href="logout.php">Log Out</a></p>

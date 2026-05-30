
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
</head>
<body>
    <?php if ($message !== ''): ?>
        <p style="color:red;"><?php echo htmlspecialchars($message); ?></p>
        <p><a href="login.html">Back to login</a></p>
    <?php else: ?>
        <p>Open <a href="login.html">login page</a> to submit the form.</p>
    <?php endif; ?>
</body>
</html>

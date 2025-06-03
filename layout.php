<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="/assets/logo.png" type="image/png">
    <title><?= $title ?? 'Universitas Dragonara' ?></title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>
    <?php include 'templates/topbar.php'; ?>
    <!-- <main class="px-4 md:px-10 lg:px-20 py-4"> -->
    <?php include $content; ?>
    <!-- </main> -->
    <!-- <?php include 'templates/footer.php'; ?> -->
</body>

</html>
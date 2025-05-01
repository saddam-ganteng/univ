<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title><?= $title ?? 'Universitas Dragonara' ?></title>
</head>

<body>
    <?php include 'components/topbar.php'; ?>
    <!-- <main class="px-4 md:px-10 lg:px-20 py-4"> -->
    <?php include $content; ?>
    <!-- </main> -->
    <!-- <?php include 'components/footer.php'; ?> -->
</body>

</html>
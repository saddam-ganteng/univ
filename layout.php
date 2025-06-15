<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">
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
    <?php include $content; ?>
    <?php include 'templates/footer.php'; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        let clickCount = 0;
        const trigger = document.getElementById('admin-access-trigger');

        if (trigger) {
            trigger.addEventListener('click', () => {
                clickCount++;
                if (clickCount === 3) {
                    window.location.href = '/admin';
                }

                setTimeout(() => {
                    clickCount = 0;
                }, 1000);
            });
        }
    </script>
</body>

</html>
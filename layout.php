<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'Universitas Dragonara' ?></title>

    <!-- Fonts & Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="icon" href="/assets/logo.png" type="image/png" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body>

    <?php if ($isAdminOnlyPage ?? false): ?>
        <!-- Layout untuk admin -->
        <div class="flex">
            <?php include 'templates/sidebar.php'; ?>
            <?= $pageContent ?>
        </div>
    <?php else: ?>
        <!-- Layout untuk publik -->
        <!-- <?php include 'templates/topbar.php'; ?> -->
        <?= $pageContent ?>
        <?php include 'templates/footer.php'; ?>
    <?php endif; ?>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
        let clickCount = 0;
        const trigger = document.getElementById('admin-access-trigger');
        if (trigger) {
            trigger.addEventListener('click', () => {
                clickCount++;
                if (clickCount === 3) {
                    window.location.href = '/admin';
                }
                setTimeout(() => { clickCount = 0 }, 1000);
            });
        }
    </script>
</body>

</html>
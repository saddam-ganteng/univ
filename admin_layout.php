<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="/assets/logo.png" type="image/png">
    <title><?= $title ?? 'Admin Panel' ?></title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-stone-900">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r p-4">
            <h2 class="text-xl font-semibold mb-4">Admin Panel</h2>
            <ul class="space-y-2">
                <li><a href="/admin/dashboard" class="text-blue-600 hover:underline">Dashboard</a></li>
                <li><a href="/admin/pendaftar" class="text-blue-600 hover:underline">Pendaftar</a></li>
                <li><a href="/admin/jurnal" class="text-blue-600 hover:underline">Jurnal</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <?php include $content; ?>
        </main>
    </div>
</body>

</html>
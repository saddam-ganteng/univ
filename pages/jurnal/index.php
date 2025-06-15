<?php
$journals = [
    [
        'id' => 1,
        'judul' => 'Studi Strategi Pertahanan Aegis dalam Perang Naga',
        'penulis' => 'Prof. Galen Ironshield',
        'tanggal' => '2025-05-20',
        'abstrak' => 'Penelitian ini membahas formasi perisai sihir kuno yang digunakan oleh Aegis dalam pertempuran besar di Era Naga.',
        'gambar' => 'https://images.unsplash.com/photo-1609875151961-58284200b4ec?auto=format&fit=crop&w=800&q=80',
        'isi' => 'Jurnal ini mengkaji taktik defensif Aegis selama Perang Naga. Fokus utama pada penggunaan barrier crystal dan rotasi formasi perisai untuk mempertahankan garis depan melawan serangan udara.'
    ],
    [
        'id' => 2,
        'judul' => 'Ekologi Hutan Sylvaran dan Konservasi Magic Tree',
        'penulis' => 'Dr. Elira Moonwhisper',
        'tanggal' => '2025-04-12',
        'abstrak' => 'Hutan Sylvaran menyimpan ribuan pohon sihir yang langka. Penelitian ini mengeksplorasi simbiosis antara flora dan energi spiritual.',
        'gambar' => 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?auto=format&fit=crop&w=800&q=80',
        'isi' => 'Magic Tree Sylvaran merupakan sumber utama energi alami di wilayah barat benua Eldoria. Jurnal ini menyoroti pentingnya regenerasi akar dalam menjaga kestabilan energi hutan.'
    ],
    [
        'id' => 3,
        'judul' => 'Evolusi Genetik Bangsa Orc dan Potensi Magisnya',
        'penulis' => 'Magister Drokgar Fistbane',
        'tanggal' => '2025-03-30',
        'abstrak' => 'Bangsa Orc tidak hanya kuat secara fisik, tapi juga menyimpan potensi sihir purba. Penelitian ini menganalisis DNA orc dari dataran utara.',
        'gambar' => 'https://images.unsplash.com/photo-1620840945550-c2587db40907?auto=format&fit=crop&w=800&q=80',
        'isi' => 'Orc Utara menunjukkan aktivitas genetik unik pada kromosom ke-9, yang berkaitan erat dengan kemampuan elemental seperti petir dan tanah. Studi ini membuka jalan untuk pelatihan sihir bagi orc muda.'
    ],
    [
        'id' => 4,
        'judul' => 'Ritual Transformasi Wizard: Kajian Energi Kosmik',
        'penulis' => 'Archmage Talia Voidweaver',
        'tanggal' => '2025-02-18',
        'abstrak' => 'Transformasi seorang murid menjadi wizard penuh bukan hanya simbolik. Kajian ini mengungkap bagaimana energi kosmik dikatalisasi.',
        'gambar' => 'https://images.unsplash.com/photo-1587387119725-962037a4c28e?auto=format&fit=crop&w=800&q=80',
        'isi' => 'Transmutasi energi dalam ritual wizard terjadi dalam 3 fase: penyatuan aura, channeling elemen, dan pencapaian resonansi batin. Jurnal ini membedah detailnya secara mendalam.'
    ],
    [
        'id' => 5,
        'judul' => 'Rekonstruksi Arsitektur Draconis Kuno dari Sisa Reruntuhan',
        'penulis' => 'Prof. Kael Drakthorn',
        'tanggal' => '2025-01-05',
        'abstrak' => 'Bangunan Draconis kuno memiliki struktur unik yang tahan terhadap suhu lava. Studi ini merekonstruksi blueprint aslinya.',
        'gambar' => 'https://images.unsplash.com/photo-1597751442266-e864bdbd10e7?auto=format&fit=crop&w=800&q=80',
        'isi' => 'Blueprint reruntuhan Draconis menunjukkan penggunaan batu obsidian dan rune pelindung yang mampu menahan tekanan panas tinggi. Penelitian ini melibatkan teknik rekonstruksi 3D dan runic-mapping.'
    ],
];

?>

<div class="min-h-screen bg-gradient-to-b from-stone-50 via-white to-rose-100 px-6 py-16 pt-30">
    <div class="max-w-5xl mx-auto space-y-12">

        <div class="text-center">
            <h1 class="text-4xl font-bold text-stone-800 mb-2">Jurnal Akademik Dragonara</h1>
            <p class="text-stone-600 text-lg">Penelitian dari seluruh fakultas yang terbit resmi</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <?php foreach ($journals as $j): ?>
                <div
                    class="bg-white/80 border border-stone-200 backdrop-blur-md rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="<?= $j['gambar'] ?>" alt="Gambar jurnal" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-stone-800"><?= htmlspecialchars($j['judul']) ?></h2>
                        <p class="text-sm text-stone-500">Oleh <?= htmlspecialchars($j['penulis']) ?> —
                            <?= date('F j, Y', strtotime($j['tanggal'])) ?>
                        </p>
                        <p class="text-stone-700 mt-2 line-clamp-3"><?= htmlspecialchars($j['abstrak']) ?></p>
                        <div class="mt-4">
                            <a href="/jurnal/detail?id=<?= $j['id'] ?>"
                                class="text-amber-600 hover:text-amber-800 text-sm font-medium">Baca selengkapnya →</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
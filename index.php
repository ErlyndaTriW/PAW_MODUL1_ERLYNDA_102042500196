<?php
// Data produk tema Fashion tersimpan dalam Array Multidimensi PHP
$products = [
    [
        "nama" => "Jaket Denim Vintage",
        "kategori" => "Outerwear",
        "harga" => 1250000,
        "stok" => 5
    ],
    [
        "nama" => "Kaos Oversized Cotton",
        "kategori" => "Pakaian Pria",
        "harga" => 250000,
        "stok" => 15
    ],
    [
        "nama" => "Sepatu Sneakers Canvas",
        "kategori" => "Alas Kaki",
        "harga" => 1100000,
        "stok" => 4
    ],
    [
        "nama" => "Tas Kulit Leather Tote",
        "kategori" => "Aksesoris",
        "harga" => 1850000,
        "stok" => 0
    ],
    [
        "nama" => "Celana Chino Slim Fit",
        "kategori" => "Pakaian Pria",
        "harga" => 450000,
        "stok" => 8
    ],
    [
        "nama" => "Topi Bucket Hat Corduroy",
        "kategori" => "Aksesoris",
        "harga" => 180000,
        "stok" => 10
    ]
];

// Menghitung total produk secara otomatis
$total_produk = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Fashion Catalog</title>
    <!-- Menghubungkan ke File CSS Terpisah -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Header / Navbar -->
    <header>
        <div class="container navbar">
            <div class="brand-logo">Cia Store</div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
    </header>

    <div class="container">
        <!-- Hero Section -->
        <section class="hero">
            <p class="hero-subtitle">CIA STORE</p>
            <h1 class="hero-title">Trendy Fashion Collection.</h1>
            <p class="hero-description">Temukan berbagai pakaian dan aksesoris fashion terkini untuk menunjang penampilannmu.</p>
            <a href="#products" class="btn-primary">Lihat Produk</a>
        </section>

        <!-- Header Katalog & Total Produk -->
        <section id="products">
            <div class="catalog-header">
                <div>
                    <p class="catalog-subtitle">OUR PRODUCTS</p>
                    <h2 class="catalog-title">Katalog Produk</h2>
                </div>
                <div class="total-badge">
                    Total Produk: <?php echo $total_produk; ?>
                </div>
            </div>

            <!-- Grid Katalog Produk -->
            <div class="product-grid">
                <?php foreach ($products as $item): ?>
                    <?php
                    // Logika Perhitungan Diskon 10% (Challenge)
                    $harga_normal = $item["harga"];
                    $is_discount = $harga_normal >= 1000000;
                    $diskon_persen = 10;
                    
                    if ($is_discount) {
                        $potongan = $harga_normal * ($diskon_persen / 100);
                        $harga_akhir = $harga_normal - $potongan;
                    } else {
                        $harga_akhir = $harga_normal;
                    }

                    // Logika Status Stok
                    $is_available = $item["stok"] > 0;
                    ?>

                    <div class="product-card">
                        <!-- Tag Diskon Jika Memenuhi Syarat -->
                        <?php if ($is_discount): ?>
                            <span class="discount-badge"><?php echo $item["kategori"]; ?> DISKON <?php echo $diskon_persen; ?>%</span>
                        <?php endif; ?>

                        <div>
                            <p class="product-category"><?php echo $item["kategori"]; ?></p>
                            <h3 class="product-name"><?php echo $item["nama"]; ?></h3>

                            <!-- Menampilkan Harga (Format Rupiah) -->
                            <div class="price-container">
                                <?php if ($is_discount): ?>
                                    <p class="original-price">Rp<?php echo number_format($harga_normal, 0, ',', '.'); ?></p>
                                <?php endif; ?>
                                <p class="final-price">Rp<?php echo number_format($harga_akhir, 0, ',', '.'); ?></p>
                            </div>

                            <p class="stock-info">Stok: <?php echo $item["stok"]; ?></p>
                        </div>

                        <!-- Status Stok & Tombol Beli -->
                        <div class="card-footer">
                            <?php if ($is_available): ?>
                                <span class="status-badge status-available">Tersedia</span>
                                <button class="btn-buy">Beli Sekarang</button>
                            <?php else: ?>
                                <span class="status-badge status-out">Stok Habis</span>
                                <button class="btn-buy btn-disabled" disabled>Tidak Tersedia</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2026 Cia Store. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
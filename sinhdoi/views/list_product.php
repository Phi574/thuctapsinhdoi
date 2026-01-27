<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Bất Động Sản - SINHDOILAND</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Playfair+Display:ital,wght@1,700;1,900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #ff5722;
            --dark: #0f172a;
        }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8fafc;
            background-image: radial-gradient(circle at 0% 0%, rgba(255, 87, 34, 0.03) 0%, transparent 50%),
                              radial-gradient(circle at 100% 100%, rgba(255, 87, 34, 0.03) 0%, transparent 50%);
        }

        .brand-font { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; }
        .serif-italic { font-family: 'Playfair Display', serif; font-style: italic; }

        /* Header Kính mờ */
        .glass-header {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Hiệu ứng gạch chân Menu */
        .nav-link { position: relative; opacity: 0.8; transition: 0.3s; }
        .nav-link:hover { opacity: 1; color: var(--primary); }
        .nav-link::after {
            content: ""; position: absolute; bottom: -4px; left: 50%;
            width: 0; height: 2px; background: var(--primary);
            transition: all 0.3s ease; transform: translateX(-50%);
        }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }

        /* Thẻ Bất Động Sản kiểu Modern-Clean */
        .property-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.03);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .property-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 40px 80px -20px rgba(15, 23, 42, 0.15);
        }

        /* Nút tìm kiếm Gradient */
        .btn-search {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a65 100%);
            transition: 0.3s;
        }
        .btn-search:hover {
            box-shadow: 0 10px 20px -5px rgba(255, 87, 34, 0.5);
            transform: scale(1.02);
        }

        /* Badge loai BĐS */
        .badge-type {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            color: var(--dark);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* Tùy chỉnh thanh cuộn */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="text-slate-900">

<header class="glass-header text-white sticky top-0 z-50">
    <div class="container mx-auto px-6 h-24 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-[#ff5722] rounded-2xl flex items-center justify-center rotate-3 hover:rotate-0 transition-transform shadow-lg shadow-orange-500/20">
                <i class="fa-solid fa-house-lock text-white text-2xl"></i>
            </div>
            <span class="brand-font text-2xl tracking-tighter uppercase">
                SINHDOI<span class="text-[#ff5722]">LAND</span>
            </span>
        </div>

        <nav class="hidden md:flex space-x-10 text-[11px] uppercase font-extrabold tracking-[0.2em]">
            <a href="index.php?action=trangchu" class="nav-link">Home</a>
            <a href="index.php?action=list_product" class="nav-link active text-[#ff5722]">Properties</a>
            <a href="index.php?action=introduce" class="nav-link">Story</a>
            <a href="index.php?action=contact" class="nav-link">Contact</a>
        </nav>

        <a href="tel:0123456789" class="hidden md:flex items-center gap-3 bg-white/10 hover:bg-[#ff5722] px-6 py-3 rounded-2xl transition-all border border-white/10 group">
            <i class="fa-solid fa-phone text-[#ff5722] group-hover:text-white"></i>
            <span class="font-bold text-sm">0123.456.789</span>
        </a>
    </div>
</header>

<main class="container mx-auto px-6 py-12">
    
    <div class="mb-20 text-center max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-black text-slate-900 mb-6 tracking-tighter">
            Tìm không gian <span class="serif-italic text-[#ff5722]">lý tưởng</span>
        </h1>
        <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-[#ff5722] to-orange-300 rounded-[2.5rem] blur opacity-20 group-focus-within:opacity-40 transition"></div>
            <div class="relative flex items-center bg-white p-3 rounded-[2rem] shadow-xl shadow-slate-200/50">
                <i class="fa-solid fa-magnifying-glass ml-6 text-slate-400"></i>
                <input type="text" placeholder="Thành phố, khu vực hoặc tên dự án..." 
                       class="w-full px-6 py-3 outline-none font-medium text-slate-700 bg-transparent">
                <button class="btn-search text-white px-10 py-4 rounded-[1.5rem] font-bold uppercase text-[11px] tracking-widest flex items-center gap-2">
                    Search <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-16">
        <aside class="lg:w-1/4">
            <div class="sticky top-32 space-y-10">
                <div>
                    <h3 class="brand-font text-xs uppercase tracking-[0.3em] text-slate-400 mb-6">Filter by category</h3>
                    <div class="space-y-3">
                        <label class="flex items-center justify-between p-4 rounded-2xl border border-slate-200 hover:border-[#ff5722] cursor-pointer transition group">
                            <span class="font-bold text-slate-600 group-hover:text-slate-900">Residential</span>
                            <input type="checkbox" class="w-5 h-5 accent-[#ff5722]">
                        </label>
                        <label class="flex items-center justify-between p-4 rounded-2xl border border-slate-200 hover:border-[#ff5722] cursor-pointer transition group">
                            <span class="font-bold text-slate-600 group-hover:text-slate-900">Land Plots</span>
                            <input type="checkbox" class="w-5 h-5 accent-[#ff5722]">
                        </label>
                    </div>
                </div>
            </div>
        </aside>

        <section class="lg:w-3/4">
            <div class="flex justify-between items-center mb-10">
                <p class="text-slate-400 font-medium">Hiển thị <span class="text-slate-900 font-extrabold"><?= count($list_product) ?></span> kết quả</p>
                <select class="bg-transparent font-bold text-xs uppercase tracking-widest outline-none border-b-2 border-slate-200 focus:border-[#ff5722] pb-1 cursor-pointer">
                    <option>Sort by: Newest</option>
                    <option>Price: Low to High</option>
                </select>
            </div>

            <div id="productList" class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <?php foreach ($list_product as $row): ?>
                <?php
                    $imgPath = $row['hinh_anh'];
                    $imgShow = (!empty($row['hinh_anh']) && file_exists($imgPath)) ? $imgPath : "img/anh1.jpg";
                ?>
                <a href="index.php?action=sanpham&id=<?= $row['id'] ?>&loai=<?= $row['loai'] ?>" class="product-item group">
                    <div class="property-card rounded-[2.5rem] overflow-hidden flex flex-col h-full">
                        <div class="relative h-72 overflow-hidden">
                            <img src="<?= $imgShow ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                            <div class="absolute top-6 left-6 badge-type px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest">
                                <?= $row['loai'] === 'dat' ? 'Land Plot' : 'Residential' ?>
                            </div>
                            <div class="absolute bottom-6 right-6 bg-white/20 backdrop-blur-md p-3 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fa-solid fa-expand text-white"></i>
                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-1">
                            <h3 class="brand-font text-xl text-slate-800 mb-3 group-hover:text-[#ff5722] transition-colors line-clamp-1">
                                <?= $row['tieu_de'] ?>
                            </h3>
                            
                            <div class="flex items-center gap-2 text-slate-400 text-xs mb-6 font-medium">
                                <i class="fa-solid fa-location-dot"></i>
                                <?= $row['dia_chi'] ?>
                            </div>

                            <div class="mt-auto pt-6 border-t border-slate-100 flex justify-between items-center">
                                <div>
                                    <span class="block text-[9px] uppercase font-black text-slate-400 tracking-widest mb-1">Asking Price</span>
                                    <span class="text-[#ff5722] font-black text-2xl tracking-tighter">
                                        <?= number_format($row['gia'],0,',','.') ?> <small class="text-xs">đ</small>
                                    </span>
                                </div>
                                <div class="bg-slate-50 px-4 py-2 rounded-xl">
                                    <span class="text-slate-800 font-bold text-sm"><?= $row['dien_tich'] ?></span>
                                    <span class="text-[9px] font-black text-slate-400">m²</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <div id="pagination" class="flex justify-center gap-3 mt-20"></div>
        </section>
    </div>
</main>

<footer class="bg-slate-900 text-slate-400 py-20 mt-20">
    <div class="container mx-auto px-6 text-center">
        <div class="flex justify-center items-center space-x-3 mb-10">
            <div class="w-10 h-10 bg-[#ff5722] rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-house-lock text-white text-xl"></i>
            </div>
            <span class="brand-font text-xl text-white tracking-tighter uppercase">SINHDOI<span class="text-[#ff5722]">LAND</span></span>
        </div>
        <p class="max-w-md mx-auto text-sm leading-loose mb-10">
            Đơn vị cung cấp giải pháp bất động sản số hóa hàng đầu. Minh bạch - Chuyên nghiệp - Hiệu quả.
        </p>
        <div class="border-t border-white/5 pt-10 text-[10px] uppercase tracking-[0.4em]">
            &copy; 2026 SINHDOILAND Ecosystem
        </div>
    </div>
</footer>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".product-item");
    const pagination = document.getElementById("pagination");
    const perPage = 6;
    let page = 1;
    const total = Math.ceil(items.length / perPage);

    function render() {
        items.forEach((el, i) => {
            el.style.display = (i >= (page-1)*perPage && i < page*perPage) ? "block" : "none";
        });
        pagination.innerHTML = "";
        if (total <= 1) return;
        for (let i=1; i<=total; i++) {
            const btn = document.createElement("button");
            btn.textContent = i;
            btn.className = `w-12 h-12 rounded-2xl font-black transition-all ${
                i===page ? "bg-[#ff5722] text-white shadow-lg shadow-orange-500/30" : "hover:bg-slate-200 text-slate-400"
            }`;
            btn.onclick = () => { page=i; render(); window.scrollTo({top:0, behavior:'smooth'}) };
            pagination.appendChild(btn);
        }
    }
    render();
});
</script>

</body>
</html>
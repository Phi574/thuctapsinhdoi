<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SinhDoiLand - Bất Động Sản Cao Cấp</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
        :root {
            --primary: #ff5722;
            --primary-dark: #e64a19;
            --dark-bg: #0f172a;
        }

        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; overflow-x: hidden; }
        h1, h2, h3, h4, .brand-font { font-family: 'Montserrat', sans-serif; }

        /* Glassmorphism Header */
        .glass-header {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .text-gradient {
            background: linear-gradient(135deg, #ff5722 0%, #ff8a65 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Card Layout */
        .premium-card {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(226, 232, 240, 0.8);
            display: none; 
        }
        .premium-card.is-visible { display: block; animation: fadeIn 0.6s ease forwards; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .premium-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 40px 80px -15px rgba(15, 23, 42, 0.1);
        }

        .badge-category {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .img-zoom { transition: transform 1.2s cubic-bezier(0.22, 1, 0.36, 1); }
        .premium-card:hover .img-zoom { transform: scale(1.15); }

        .tab-btn.active {
            background: var(--primary);
            color: white;
            box-shadow: 0 10px 25px -5px rgba(255, 87, 34, 0.4);
        }

        .nav-link { position: relative; }
        .nav-link::after {
            content: ""; position: absolute; bottom: -4px; left: 0;
            width: 0; height: 2px; background: var(--primary);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }

        .hidden-filter { display: none !important; }

        /* Footer Styles */
        footer a { transition: all 0.3s ease; }
        footer a:hover { color: var(--primary); transform: translateX(5px); }
        .social-icon {
            width: 40px; height: 40px;
            display: flex, items-center, justify-center;
            border-radius: 10px; background: rgba(255,255,255,0.05);
            transition: all 0.3s ease;
        }
        .social-icon:hover { background: var(--primary); color: white; transform: translateY(-3px); }

        .hero-swiper { width: 100%; height: 550px; border-radius: 3rem; }
        .swiper-pagination-bullet-active { background: var(--primary) !important; }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

<header id="main-header" class="fixed w-full top-0 z-[100] transition-all duration-500 py-4">
    <div class="container mx-auto px-6 flex justify-between items-center">
        <div class="flex items-center space-x-3 group cursor-pointer">
            <div class="w-12 h-12 bg-[#ff5722] rounded-2xl flex items-center justify-center shadow-lg group-hover:rotate-12 transition-transform">
                <i class="fa-solid fa-house-chimney text-white text-2xl"></i>
            </div>
            <span class="brand-font font-extrabold text-2xl tracking-tighter text-white uppercase">
                SINHDOI<span class="text-[#ff5722]">LAND</span>
            </span>
        </div>

        <ul class="hidden lg:flex space-x-10 text-[13px] uppercase font-bold tracking-widest text-white/80">
            <li><a href="index.php?action=trangchu" class="nav-link active hover:text-white transition">Trang Chủ</a></li>
            <li><a href="index.php?action=list_product" class="nav-link hover:text-white transition">Bất Động Sản</a></li>
            <li><a href="index.php?action=introduce" class="nav-link hover:text-white transition">Giới Thiệu</a></li>
            <li><a href="index.php?action=contact" class="nav-link hover:text-white transition">Liên Hệ</a></li>
        </ul>

        <div class="hidden md:block">
            <a href="tel:0123456789" class="bg-[#ff5722] hover:bg-[#e64a19] text-white px-7 py-3 rounded-full font-bold text-sm shadow-xl transition-all hover:-translate-y-1 flex items-center">
                <i class="fa-solid fa-phone-volume mr-3 animate-pulse"></i> 0123.456.789
            </a>
        </div>
    </div>
</header>

<section class="relative min-h-screen flex items-center bg-[#0b0f19] pt-20 overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0b0f19] via-transparent to-transparent z-10"></div>
        <img src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?auto=format&fit=crop&w=1920&q=80" class="w-full h-full object-cover">
    </div>

    <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center relative z-20">
        <div data-aos="fade-right">
            <div class="inline-flex items-center space-x-3 mb-6 bg-white/5 border border-white/10 px-4 py-2 rounded-full backdrop-blur-md">
                <span class="text-white text-xs font-bold tracking-[0.3em] uppercase">Nâng tầm giá trị sống</span>
            </div>
            <h1 class="text-6xl md:text-8xl font-extrabold text-white leading-none mb-8">
                TÌM KIẾM <br>
                <span class="text-gradient">AN CƯ</span>
            </h1>
            <p class="text-gray-400 text-lg mb-12 max-w-lg font-light leading-relaxed">
                Kiến tạo không gian sống thượng lưu và giải pháp đầu tư bất động sản an toàn, sinh lời bền vững.
            </p>
            <div class="flex flex-wrap gap-5">
                <button onclick="document.getElementById('danh-muc-san-pham').scrollIntoView()" class="bg-[#ff5722] hover:bg-[#e64a19] text-white px-10 py-5 rounded-2xl font-bold transition-all shadow-2xl flex items-center group">
                    Khám phá dự án <i class="fa-solid fa-arrow-right-long ml-3 group-hover:translate-x-2 transition-transform"></i>
                </button>
            </div>
        </div>

        <div class="relative hidden lg:block" data-aos="zoom-in">
            <div class="absolute -inset-4 bg-orange-500/20 blur-3xl rounded-full"></div>
            <div class="relative z-10 rounded-[4rem] overflow-hidden border-[15px] border-white/5 shadow-2xl transform rotate-2">
                <div class="swiper hero-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6191da004c?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1600607687940-47a0f9259017?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="danh-muc-san-pham" class="py-32 bg-slate-50">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-8">
            <div data-aos="fade-up">
                <span class="text-[#ff5722] font-bold tracking-widest text-sm uppercase mb-3 block">Dự án mới nhất</span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 uppercase leading-tight">Danh mục <span class="text-gradient">sản phẩm</span></h2>
                <div class="h-1.5 w-40 bg-gradient-to-r from-[#ff5722] to-orange-300 rounded-full mt-4"></div>
            </div>
            
            <div class="flex bg-white p-1.5 rounded-2xl shadow-xl border border-slate-100" data-aos="fade-left">
                <button onclick="filterProducts('all')" data-tab="all" class="tab-btn active px-8 py-3 rounded-xl font-bold text-sm transition-all">Tất Cả</button>
                <button onclick="filterProducts('dat')" data-tab="dat" class="tab-btn px-8 py-3 rounded-xl font-bold text-sm text-slate-400 transition-all hover:text-slate-600">Đất Nền</button>
                <button onclick="filterProducts('nha')" data-tab="nha" class="tab-btn px-8 py-3 rounded-xl font-bold text-sm text-slate-400 transition-all hover:text-slate-600">Nhà Phố</button>
            </div>
        </div>

        <div id="product-container" class="grid grid-cols-1 xl:grid-cols-2 gap-12">
            <?php foreach ($data_index_nha as $nha): ?>
            <div class="product-item premium-card bg-white rounded-[2.5rem] overflow-hidden group shadow-sm" data-category="nha">
                <a href="index.php?action=sanpham&id=<?= $nha['id_nha'] ?>&loai=nha" class="flex flex-col md:flex-row h-full">
                    <div class="md:w-5/12 relative overflow-hidden h-64 md:h-auto">
                        <img src="<?= $nha['img_1'] ?>" class="w-full h-full object-cover img-zoom">
                        <span class="absolute top-6 left-6 z-10 badge-category text-white text-[10px] font-bold px-4 py-2 rounded-full uppercase shadow-lg">
                            <i class="fa-solid fa-city mr-1 text-orange-400"></i> Nhà Phố
                        </span>
                    </div>
                    <div class="md:w-7/12 p-10 flex flex-col justify-between relative bg-white">
                        <div>
                            <div class="flex items-baseline gap-2 mb-4">
                                <span class="text-3xl font-black text-[#ff5722] tracking-tighter"><?= number_format($nha['gia_nha'],0,',','.') ?></span>
                                <span class="text-slate-400 font-medium text-xs uppercase italic">VNĐ</span>
                            </div>
                            <h3 class="font-extrabold text-slate-800 text-2xl line-clamp-2 mb-5 group-hover:text-[#ff5722] transition-colors leading-snug"><?= $nha['tieude_nha'] ?></h3>
                            <div class="flex items-start text-slate-500 text-sm leading-relaxed mb-6">
                                <span class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center shrink-0 mr-3 mt-0.5">
                                    <i class="fa-solid fa-location-dot text-[#ff5722]"></i>
                                </span>
                                <span><?= $nha['dia_chi_nha'] ?></span>
                            </div>
                        </div>
                        <div class="flex items-center gap-8 pt-8 border-t border-slate-100">
                            <div class="flex items-center text-slate-700 font-semibold text-sm">
                                <i class="fa-solid fa-vector-square mr-3 text-orange-400 text-lg"></i>
                                <span><?= $nha['dientich_nha'] ?> m²</span>
                            </div>
                            <div class="flex items-center text-slate-700 font-semibold text-sm">
                                <i class="fa-solid fa-bed mr-3 text-orange-400 text-lg"></i>
                                <span>3 PN</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>

            <?php foreach ($data_index_dat as $dat): ?>
            <div class="product-item premium-card bg-white rounded-[2.5rem] overflow-hidden group shadow-sm" data-category="dat">
                <a href="index.php?action=sanpham&id=<?= $dat['id_dat'] ?>&loai=dat" class="flex flex-col md:flex-row h-full">
                    <div class="md:w-5/12 relative overflow-hidden h-64 md:h-auto">
                        <img src="<?= $dat['img_1'] ?: 'anh1.jpg' ?>" class="w-full h-full object-cover img-zoom">
                        <span class="absolute top-6 left-6 z-10 badge-category text-white text-[10px] font-bold px-4 py-2 rounded-full uppercase shadow-lg border border-white/10">
                            <i class="fa-solid fa-map-location-dot mr-1 text-blue-400"></i> Đất Nền
                        </span>
                    </div>
                    <div class="md:w-7/12 p-10 flex flex-col justify-between relative bg-white">
                        <div>
                            <div class="flex items-baseline gap-2 mb-4">
                                <span class="text-3xl font-black text-[#ff5722] tracking-tighter"><?= number_format($dat['gia_dat'],0,',','.') ?></span>
                                <span class="text-slate-400 font-medium text-xs uppercase italic">VNĐ</span>
                            </div>
                            <h3 class="font-extrabold text-slate-800 text-2xl line-clamp-2 mb-5 group-hover:text-[#ff5722] transition-colors leading-snug"><?= $dat['tieude_dat'] ?></h3>
                            <div class="flex items-start text-slate-500 text-sm leading-relaxed mb-6">
                                <span class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center shrink-0 mr-3 mt-0.5">
                                    <i class="fa-solid fa-location-dot text-blue-600"></i>
                                </span>
                                <span><?= $dat['diachi_dat'] ?></span>
                            </div>
                        </div>
                        <div class="flex items-center gap-8 pt-8 border-t border-slate-100">
                            <div class="flex items-center text-slate-700 font-semibold text-sm">
                                <i class="fa-solid fa-ruler-combined mr-3 text-blue-500 text-lg"></i>
                                <span><?= $dat['dientich_dat'] ?> m²</span>
                            </div>
                            <div class="flex items-center text-slate-700 font-semibold text-sm">
                                <i class="fa-solid fa-file-shield mr-3 text-blue-500 text-lg"></i>
                                <span>Sổ đỏ</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="flex justify-center mt-20 gap-6">
            <button id="loadMoreBtn" onclick="loadMore()" class="bg-[#0f172a] text-white px-12 py-5 rounded-2xl font-bold hover:bg-[#ff5722] transition-all shadow-xl flex items-center gap-3 active:scale-95">
                XEM THÊM <i class="fa-solid fa-chevron-down"></i>
            </button>
            <button id="collapseBtn" onclick="collapseItems()" class="hidden bg-slate-200 text-slate-700 px-12 py-5 rounded-2xl font-bold hover:bg-slate-300 transition-all flex items-center gap-3">
                THU GỌN <i class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
    </div>
</section>

<footer class="bg-[#0b0f19] text-gray-400 pt-24 pb-12 overflow-hidden relative">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-[#ff5722]/5 blur-[120px] rounded-full -mr-20"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
            <div data-aos="fade-up">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-[#ff5722] rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-house-chimney text-white text-xl"></i>
                    </div>
                    <span class="brand-font font-extrabold text-xl tracking-tighter text-white uppercase">
                        SINHDOI<span class="text-[#ff5722]">LAND</span>
                    </span>
                </div>
                <p class="leading-relaxed mb-8 text-sm">
                    SinhDoiLand tự hào là đơn vị tiên phong trong lĩnh vực môi giới bất động sản cao cấp, mang lại giá trị thực và niềm tin bền vững cho khách hàng.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="social-icon"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="100">
                <h4 class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4">Khám Phá</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="index.php?action=trangchu" class="block">Trang chủ</a></li>
                    <li><a href="index.php?action=list_product" class="block">Danh sách dự án</a></li>
                    <li><a href="index.php?action=introduce" class="block">Về SinhDoiLand</a></li>
                    <li><a href="#" class="block">Tin tức thị trường</a></li>
                    <li><a href="index.php?action=contact" class="block">Liên hệ hợp tác</a></li>
                </ul>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <h4 class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4">Sản Phẩm</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="#" onclick="filterProducts('nha')" class="block">Nhà phố cao cấp</a></li>
                    <li><a href="#" onclick="filterProducts('dat')" class="block">Đất nền dự án</a></li>
                    <li><a href="#" class="block">Biệt thự nghỉ dưỡng</a></li>
                    <li><a href="#" class="block">Căn hộ Penthouse</a></li>
                    <li><a href="#" class="block">Bất động sản công nghiệp</a></li>
                </ul>
            </div>

            <div data-aos="fade-up" data-aos-delay="300">
                <h4 class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4">Liên Hệ</h4>
                <ul class="space-y-6 text-sm">
                    <li class="flex items-start">
                        <i class="fa-solid fa-map-location-dot text-[#ff5722] mt-1 mr-4 text-lg"></i>
                        <span>123 Đường Bất Động Sản, Quận 1, TP. Hồ Chí Minh</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-phone-volume text-[#ff5722] mr-4 text-lg"></i>
                        <span class="text-white font-bold text-lg">0123.456.789</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-envelope-open-text text-[#ff5722] mr-4 text-lg"></i>
                        <span>info@sinhdoiland.vn</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/5 pt-12 mt-12 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-xs tracking-widest uppercase">
                &copy; 2024 <span class="text-white font-bold">SinhDoiLand</span>. All Rights Reserved.
            </p>
            <div class="flex space-x-8 text-xs tracking-widest uppercase font-bold">
                <a href="#" class="hover:text-white transition">Chính sách bảo mật</a>
                <a href="#" class="hover:text-white transition">Điều khoản sử dụng</a>
            </div>
        </div>
    </div>
</footer>
<div id="contactModal" class="fixed inset-0 z-[200] hidden items-center justify-center p-6 bg-black/70 backdrop-blur-sm">
    <div class="bg-white w-full max-w-lg rounded-[3rem] shadow-2xl overflow-hidden relative">
        <button onclick="closeModal()" class="absolute top-6 right-6 w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:bg-[#ff5722] hover:text-white transition-all"><i class="fa-solid fa-xmark"></i></button>
        <div class="bg-[#ff5722] p-8 text-white text-center">
            <h3 class="text-2xl font-bold uppercase">Nhận tư vấn ngay</h3>
            <p class="text-orange-100 text-sm opacity-80">Chúng tôi sẽ liên hệ lại sau 5 phút</p>
        </div>
        <form id="form-tuvan" method="POST" action="index.php?action=gui_tuvan" class="p-8 space-y-4">
            <input type="hidden" name="is_ajax" value="1">
            <input type="text" name="ten_khach" required placeholder="Họ và tên" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-[#ff5722]">
            <input type="text" name="phone" required placeholder="Số điện thoại" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-[#ff5722]">
            <input type="text" name="email" required placeholder="Email" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-[#ff5722]">
            <textarea name="noi_dung" rows="2" placeholder="Bạn cần tư vấn gì?" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-[#ff5722]"></textarea>
            <button type="submit" class="w-full bg-[#ff5722] text-white font-bold py-5 rounded-2xl shadow-lg hover:bg-[#e64a19] transition-all uppercase tracking-widest">Gửi Thông Tin</button>
        </form>
    </div>
</div>

<script>
    AOS.init({ duration: 1000, once: true });

    // Header Logic
    window.addEventListener('scroll', () => {
        const header = document.getElementById('main-header');
        window.scrollY > 50 ? header.classList.add('glass-header', 'py-3') : header.classList.remove('glass-header', 'py-3');
    });

    // LOAD MORE & FILTER LOGIC
    let visibleCount = 4;
    const step = 4;
    let currentType = 'all';

    function showItems() {
        const allItems = Array.from(document.querySelectorAll('.product-item'));
        const filteredItems = allItems.filter(item => {
            if (currentType === 'all') return true;
            return item.getAttribute('data-category') === currentType;
        });

        allItems.forEach(item => {
            item.classList.remove('is-visible');
            item.classList.add('hidden-filter');
        });

        filteredItems.forEach((item, index) => {
            if (index < visibleCount) {
                item.classList.remove('hidden-filter');
                setTimeout(() => item.classList.add('is-visible'), 50);
            }
        });

        const loadMoreBtn = document.getElementById('loadMoreBtn');
        const collapseBtn = document.getElementById('collapseBtn');

        if (visibleCount >= filteredItems.length) loadMoreBtn.classList.add('hidden');
        else loadMoreBtn.classList.remove('hidden');

        if (visibleCount > 4) collapseBtn.classList.remove('hidden');
        else collapseBtn.classList.add('hidden');
    }

    function loadMore() {
        visibleCount += step;
        showItems();
    }

    function collapseItems() {
        visibleCount = 4;
        showItems();
        document.getElementById('danh-muc-san-pham').scrollIntoView({ behavior: 'smooth' });
    }

    function filterProducts(type) {
        currentType = type;
        visibleCount = 4;
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.toggle('active', btn.getAttribute('data-tab') === type);
        });
        showItems();
        // Cuộn về danh sách sản phẩm nếu nhấn từ footer
        if(window.scrollY > 1500) {
            document.getElementById('danh-muc-san-pham').scrollIntoView({ behavior: 'smooth' });
        }
    }

    function openModal() {
        document.getElementById('contactModal').classList.remove('hidden');
        document.getElementById('contactModal').classList.add('flex');
    }
    function closeModal() {
        document.getElementById('contactModal').classList.add('hidden');
        document.getElementById('contactModal').classList.remove('flex');
    }

    document.getElementById('form-tuvan').addEventListener('submit', function(e) 
    {
        e.preventDefault();
        const btn = this.querySelector('button');
        btn.innerText = 'ĐANG GỬI...';
        fetch(this.action, { method: 'POST', body: new FormData(this) })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            if(data.status === 'success') { this.reset(); closeModal(); }
        })
        .finally(() => btn.innerText = 'GỬI THÔNG TIN');
    });

    document.addEventListener('DOMContentLoaded', () => {
        showItems();
        setTimeout(openModal, 8000); // 8 giây hiện popup tư vấn

        new Swiper('.hero-swiper', {
            loop: true,
            autoplay: { delay: 3500, disableOnInteraction: false },
            effect: 'fade',
            fadeEffect: { crossFade: true },
            pagination: { el: '.swiper-pagination', clickable: true },
            speed: 1000,
        });
    });
</script>

</body>
</html>
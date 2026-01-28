<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= htmlspecialchars($product['tieu_de'] ?? $product['tieude_dat'] ?? $product['tieude_nha'] ?? 'Chi tiết bất động sản') ?> 
        - SinhDoiLand
    </title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        .text-orange-main { color: #ff5722; }
        .bg-orange-main { background-color: #ff5722; }
        .border-orange-main { border-color: #ff5722; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ff5722; border-radius: 10px; }

        /* Glassmorphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        /* Badge Animation */
        .badge-pulse {
            animation: pulse-orange 2s infinite;
        }
        @keyframes pulse-orange {
            0% { box-shadow: 0 0 0 0 rgba(255, 87, 34, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(255, 87, 34, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 87, 34, 0); }
        }

        .nav-link { position: relative; transition: all 0.3s; }
        .nav-link::after {
            content: ""; position: absolute; bottom: -4px; left: 0;
            width: 0; height: 2px; background: #ff5722; transition: 0.3s;
        }
        .nav-link:hover::after { width: 100%; }
        
        #mainImage { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .thumb-active { border-color: #ff5722 !important; transform: scale(0.95); opacity: 0.6; }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-900">

    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100">
        <div class="container mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-11 h-11 bg-orange-main rounded-2xl flex items-center justify-center shadow-lg shadow-orange-500/30">
                    <i class="fa-solid fa-house-chimney text-white text-xl"></i>
                </div>
                <span class="font-extrabold text-2xl tracking-tighter uppercase italic">
                    SINHDOI<span class="text-orange-main">LAND</span>
                </span>
            </div>

            <nav class="hidden md:flex space-x-10 text-[13px] uppercase font-bold tracking-widest text-slate-600">
                <a href="index.php?action=trangchu" class="nav-link hover:text-orange-main">Trang Chủ</a>
                <a href="index.php?action=list_product" class="nav-link text-orange-main">Bất Động Sản</a>
                <a href="index.php?action=introduce" class="nav-link hover:text-orange-main">Giới Thiệu</a>
                <a href="index.php?action=contact" class="nav-link hover:text-orange-main">Liên Hệ</a>
            </nav>

            <a href="tel:0123456789" class="bg-zinc-900 text-white px-6 py-3 rounded-2xl font-bold text-sm hover:bg-orange-main transition-all duration-300 shadow-xl hover:shadow-orange-500/20">
                <i class="fa-solid fa-phone-volume mr-2"></i> 0123.456.789
            </a>
        </div>
    </header>

    <div class="bg-white py-4 border-b border-slate-50">
        <div class="container mx-auto px-6">
            <div class="flex items-center gap-3 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                <a href="index.php?action=trangchu" class="hover:text-orange-main transition">Home</a>
                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                <a href="index.php?action=list_product" class="hover:text-orange-main transition">Bất động sản</a>
                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                <span class="text-orange-main truncate max-w-[200px]"><?= htmlspecialchars($product['tieude_dat'] ?? $product['tieude_nha'] ?? 'Chi tiết') ?></span>
            </div>
        </div>
    </div>

    <main class="container mx-auto px-6 py-10">
        <div class="flex flex-col lg:flex-row gap-10">

            <div class="lg:w-[68%] space-y-10">
                
                <section>
                    <div class="relative group">
                        <div class="absolute top-5 left-5 z-10">
                            <span class="bg-orange-main text-white text-[10px] font-black px-4 py-2 rounded-xl shadow-lg uppercase tracking-widest badge-pulse">
                                Hot Deal
                            </span>
                        </div>
                        <div class="h-[550px] rounded-[3rem] overflow-hidden shadow-2xl shadow-slate-200 bg-slate-100 border-4 border-white">
                            <img id="mainImage" src="<?= htmlspecialchars($product['img_1']) ?>" class="w-full h-full object-cover">
                        </div>
                        
                        <div class="absolute bottom-8 right-8 left-8 flex justify-between items-end">
                            <div class="glass-card p-6 rounded-[2rem] shadow-xl">
                                <p class="text-[10px] font-bold text-orange-600 uppercase mb-1">Vị trí thực tế</p>
                                <p class="text-sm font-bold text-slate-800"><i class="fa fa-location-dot mr-2 text-orange-main"></i> <?= $product['diachi_dat'] ?? $product['dia_chi_nha'] ?? 'Đang cập nhật' ?></p>
                            </div>
                            <button class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-slate-800 shadow-xl hover:bg-orange-main hover:text-white transition-all">
                                <i class="fa fa-expand"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-6 overflow-x-auto pb-4 no-scrollbar">
                        <?php for ($i = 0; $i <= 10; $i++): 
                            $columnName = 'img_' . $i;
                            if (!empty($product[$columnName])): ?>
                            <div class="min-w-[100px] h-[70px] md:min-w-[120px] md:h-[85px] rounded-2xl overflow-hidden cursor-pointer border-2 border-white shadow-md hover:shadow-orange-200 transition-all flex-shrink-0">
                                <img src="<?= htmlspecialchars($product[$columnName]) ?>" 
                                     class="thumb w-full h-full object-cover transition duration-500 hover:scale-110 <?= ($i === 1) ? 'thumb-active' : '' ?>">
                            </div>
                        <?php endif; endfor; ?>
                    </div>
                </section>

                <section class="bg-white p-10 rounded-[3rem] shadow-sm border border-slate-100">
                    <div class="flex flex-col md:flex-row justify-between items-start gap-6 mb-10">
                        <div class="space-y-4">
                            <div class="flex gap-2">
                                <span class="bg-orange-50 text-orange-main px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-tighter">
                                    <i class="fa fa-tag mr-1"></i> <?= htmlspecialchars($product['loai_nha'] ?? 'Bất động sản') ?>
                                </span>
                                <span class="bg-emerald-50 text-emerald-600 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-tighter border border-emerald-100">
                                    <i class="fa fa-check-circle mr-1"></i> Pháp lý an toàn
                                </span>
                            </div>
                            <h1 class="text-4xl font-extrabold text-slate-900 leading-tight tracking-tight">
                                <?= htmlspecialchars($product['tieude_dat'] ?? $product['tieude_nha'] ?? 'Sản phẩm chưa có tiêu đề') ?>
                            </h1>
                        </div>
                        <div class="flex gap-3">
                            <button class="w-14 h-14 rounded-2xl bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all shadow-sm border border-slate-100"><i class="fa-regular fa-heart text-xl"></i></button>
                            <button class="w-14 h-14 rounded-2xl bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-500 transition-all shadow-sm border border-slate-100"><i class="fa fa-share-nodes text-xl"></i></button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                        <div class="bg-slate-50/50 p-6 rounded-[2rem] border border-slate-100 group hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-4 group-hover:bg-orange-main group-hover:text-white transition-colors">
                                <i class="fa fa-vector-square text-xl"></i>
                            </div>
                            <p class="text-[10px] uppercase font-black text-slate-400 mb-1">Diện tích</p>
                            <p class="font-bold text-slate-800 text-lg"><?= $product['dientich_dat'] ?? $product['dientich_nha'] ?? '-' ?> <span class="text-xs">m²</span></p>
                        </div>
                        
                        <div class="bg-slate-50/50 p-6 rounded-[2rem] border border-slate-100 group hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-4 group-hover:bg-orange-main group-hover:text-white transition-colors">
                                <i class="fa fa-bed text-xl"></i>
                            </div>
                            <p class="text-[10px] uppercase font-black text-slate-400 mb-1">Phòng ngủ</p>
                            <p class="font-bold text-slate-800 text-lg"><?= $product['so_phong'] ?? '0' ?> <span class="text-xs">Phòng</span></p>
                        </div>

                        <div class="bg-slate-50/50 p-6 rounded-[2rem] border border-slate-100 group hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-4 group-hover:bg-orange-main group-hover:text-white transition-colors">
                                <i class="fa fa-stairs text-xl"></i>
                            </div>
                            <p class="text-[10px] uppercase font-black text-slate-400 mb-1">Tầng cao</p>
                            <p class="font-bold text-slate-800 text-lg"><?= $product['so_tang'] ?? '1' ?> <span class="text-xs">Tầng</span></p>
                        </div>

                        <div class="bg-slate-50/50 p-6 rounded-[2rem] border border-slate-100 group hover:bg-white hover:shadow-xl hover:shadow-slate-200/50 transition-all">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-sm mb-4 group-hover:bg-orange-main group-hover:text-white transition-colors">
                                <i class="fa fa-compass text-xl"></i>
                            </div>
                            <p class="text-[10px] uppercase font-black text-slate-400 mb-1">Hướng</p>
                            <p class="font-bold text-slate-800 text-lg">Đông Nam</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-2xl font-black text-slate-800 flex items-center gap-4">
                            <span class="w-10 h-1 bg-orange-main rounded-full"></span>
                            Thông tin mô tả
                        </h3>
                        <div class="text-slate-600 leading-relaxed text-lg bg-slate-50 p-8 rounded-[2rem] border-l-4 border-orange-main italic">
                            <?= nl2br($product['mota_dat'] ?? $product['mota_nha'] ?? 'Chưa có nội dung mô tả.') ?>
                        </div>
                    </div>
                </section>
            </div>

            <div class="lg:w-[32%]">
                <div class="sticky top-28 space-y-6">
                    
                    <div class="bg-zinc-900 rounded-[3rem] p-10 text-white shadow-2xl shadow-orange-500/20 relative overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-orange-main rounded-full blur-[80px] opacity-40"></div>
                        <p class="text-orange-main text-[11px] font-black uppercase tracking-[0.3em] mb-4">Giá bán niêm yết</p>
                        <div class="text-5xl font-black mb-2">
                            <?= number_format($product['gia_dat'] ?? $product['gia_nha'] ?? 0, 0, ',', '.') ?> <span class="text-lg text-slate-400">VNĐ</span>
                        </div>
                        <p class="text-slate-500 text-xs font-medium">* Giá đã bao gồm thuế và phí chuyển nhượng</p>
                    </div>

                    <div class="bg-white rounded-[3rem] p-8 border border-slate-100 shadow-xl space-y-8">
                        <div class="flex items-center gap-4 p-2 bg-slate-50 rounded-3xl">
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-700 rounded-2xl flex items-center justify-center text-white text-2xl font-black shadow-lg">
                                    SD
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-500 border-4 border-white rounded-full"></div>
                            </div>
                            <div>
                                <p class="font-black text-slate-800 text-lg">Chuyên viên SinhDoi</p>
                                <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest flex items-center gap-1">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full animate-ping"></span> Đang trực tuyến
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <a href="tel:0123456789" class="flex flex-col items-center justify-center gap-2 bg-orange-main text-white py-4 rounded-[2rem] font-bold text-sm transition-all hover:scale-[1.05] shadow-lg shadow-orange-500/20">
                                <i class="fa fa-phone-volume"></i> Gọi điện
                            </a>
                            <a href="#" class="flex flex-col items-center justify-center gap-2 bg-blue-600 text-white py-4 rounded-[2rem] font-bold text-sm transition-all hover:scale-[1.05] shadow-lg shadow-blue-500/20">
                                <i class="fa-solid fa-comment-dots"></i> Nhắn Zalo
                            </a>
                        </div>

                        <div class="relative py-4">
                            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-100"></div></div>
                            <div class="relative flex justify-center text-[10px] font-black uppercase"><span class="bg-white px-4 text-slate-400 tracking-widest">Hoặc để lại lời nhắn</span></div>
                        </div>

                        <form method="POST" action="index.php?action=gui_tuvan" class="space-y-4">
                            <input type="hidden" name="bai_dang_id" value="<?= $product['id_nha'] ?? $product['id_dat'] ?>">
                            <input type="hidden" name="user_nhan_id" value="<?= $product['user_id'] ?>">
                            
                            <div class="space-y-3">
                                <div class="relative group">
                                    <i class="fa fa-user absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-orange-main transition-colors"></i>
                                    <input required class="w-full bg-slate-50 border border-transparent px-12 py-4 rounded-2xl text-sm focus:bg-white focus:border-orange-main/30 focus:ring-4 focus:ring-orange-main/5 transition-all outline-none" name="ten_khach" placeholder="Họ và tên">
                                </div>
                                <div class="relative group">
                                    <i class="fa fa-phone absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-orange-main transition-colors"></i>
                                    <input required class="w-full bg-slate-50 border border-transparent px-12 py-4 rounded-2xl text-sm focus:bg-white focus:border-orange-main/30 focus:ring-4 focus:ring-orange-main/5 transition-all outline-none" name="phone" placeholder="Số điện thoại">
                                </div>
                                <div class="relative group">
                                    <i class="fa fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-orange-main transition-colors"></i>
                                    <input required class="w-full bg-slate-50 border border-transparent px-12 py-4 rounded-2xl text-sm focus:bg-white focus:border-orange-main/30 focus:ring-4 focus:ring-orange-main/5 transition-all outline-none" name="email" placeholder="Địa chỉ Email">
                                </div>
                                <textarea required class="w-full bg-slate-50 border border-transparent px-6 py-4 rounded-2xl text-sm focus:bg-white focus:border-orange-main/30 focus:ring-4 focus:ring-orange-main/5 transition-all outline-none min-h-[100px]" name="noi_dung" placeholder="Bạn cần chúng tôi tư vấn điều gì về bất động sản này?"></textarea>
                            </div>

                            <button class="w-full bg-zinc-900 text-white py-5 rounded-[2rem] font-black text-sm tracking-widest transition-all hover:bg-orange-main active:scale-95 shadow-xl shadow-slate-200" type="submit">
                                GỬI YÊU CẦU TƯ VẤN
                            </button>
                        </form>
                    </div>

                    <div class="bg-emerald-50 p-6 rounded-[2rem] border border-emerald-100 flex items-center gap-4">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-emerald-500 shadow-sm flex-shrink-0">
                            <i class="fa fa-shield-halved text-xl"></i>
                        </div>
                        <p class="text-[11px] text-emerald-800 font-bold leading-relaxed uppercase">Cam kết bảo mật thông tin & pháp lý độc quyền bởi SinhDoiLand.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-zinc-950 text-white pt-24 pb-12 mt-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-16">
                <div class="space-y-6">
                    <span class="font-black text-3xl tracking-tighter uppercase italic">
                        SINHDOI<span class="text-orange-main">LAND</span>
                    </span>
                    <p class="text-zinc-500 text-sm leading-loose">Hệ thống phân phối và tư vấn bất động sản chuyên nghiệp hàng đầu, mang lại giá trị thực cho khách hàng.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-xl bg-zinc-900 flex items-center justify-center hover:bg-orange-main transition-all group">
                            <i class="fab fa-facebook-f group-hover:scale-110"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-xl bg-zinc-900 flex items-center justify-center hover:bg-orange-main transition-all group">
                            <i class="fab fa-youtube group-hover:scale-110"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-bold mb-8 text-lg flex items-center gap-2">
                        <span class="w-2 h-2 bg-orange-main rounded-full"></span> Danh mục
                    </h4>
                    <ul class="text-zinc-500 text-sm space-y-4 font-medium">
                        <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><i class="fa fa-chevron-right text-[10px]"></i> Căn hộ cao cấp</a></li>
                        <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><i class="fa fa-chevron-right text-[10px]"></i> Đất nền ven biển</a></li>
                        <li><a href="#" class="hover:text-white transition-colors flex items-center gap-2"><i class="fa fa-chevron-right text-[10px]"></i> Biệt thự nghỉ dưỡng</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-8 text-lg flex items-center gap-2">
                        <span class="w-2 h-2 bg-orange-main rounded-full"></span> Dịch vụ
                    </h4>
                    <ul class="text-zinc-500 text-sm space-y-4 font-medium">
                        <li><a href="#" class="hover:text-white transition-colors">Thẩm định giá</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Ký gửi nhà đất</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Hỗ trợ vay vốn</a></li>
                    </ul>
                </div>

                <div class="bg-zinc-900 p-8 rounded-[2rem] border border-zinc-800">
                    <h4 class="font-bold mb-4 text-lg">Liên hệ nhanh</h4>
                    <p class="text-orange-main font-black text-2xl mb-4">0123.456.789</p>
                    <p class="text-zinc-500 text-xs leading-relaxed">Địa chỉ: Tầng 12, Tòa nhà SinhDoi, Quận 1, TP. Hồ Chí Minh.</p>
                </div>
            </div>
            
            <div class="border-t border-zinc-900 mt-20 pt-10 flex flex-col md:flex-row justify-between items-center gap-4 text-zinc-600 text-[10px] font-bold uppercase tracking-[0.2em]">
                <p>© 2026 SinhDoiLand. All rights reserved.</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-white">Chính sách bảo mật</a>
                    <a href="#" class="hover:text-white">Điều khoản sử dụng</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
    const thumbs = document.querySelectorAll(".thumb");
    const mainImage = document.getElementById("mainImage");

    thumbs.forEach(img => {
        img.onclick = () => {
            // Hiệu ứng mờ và đẩy ảnh nhẹ
            mainImage.style.opacity = "0";
            mainImage.style.transform = "scale(0.98)";
            
            setTimeout(() => {
                mainImage.src = img.src;
                mainImage.style.opacity = "1";
                mainImage.style.transform = "scale(1)";
                
                // Cập nhật class thumbnail
                thumbs.forEach(t => t.classList.remove("thumb-active"));
                img.classList.add("thumb-active");
            }, 300);
        }
    });

    // Hiệu ứng khi scroll thay đổi header
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.classList.add('shadow-xl', 'h-16');
            header.classList.remove('h-20');
        } else {
            header.classList.remove('shadow-xl', 'h-16');
            header.classList.add('h-20');
        }
    });
    </script>

</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - SINHDOILAND</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .text-orange-main { color: #ff5722; }
        .bg-orange-main { background-color: #ff5722; }
        .bg-hero-contact {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }
         .nav-link {
                position: relative;
                padding-bottom: 4px; /* Tạo khoảng cách giữa chữ và gạch chân */
            }

            .nav-link::after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                width: 0;
                height: 2px;
                background-color: #ff5722; /* Màu cam chính của bạn */
                transition: width 0.3s ease-in-out;
            }

            .nav-link:hover::after {
                width: 100%;
            }

            /* Giữ cho gạch chân cố định nếu đang ở trang đó (Active state) */
            .nav-link.active::after {
                width: 100%;
            }
    </style>
</head>
<body class="bg-slate-50 font-sans">

    <header class="bg-[#1a1a1a] text-white sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto px-6 h-20 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <div class="w-10 h-10 bg-orange-main rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-house-chimney text-white text-xl"></i>
            </div>
            <span class="font-bold text-2xl tracking-tighter uppercase">
                SINHDOI<span class="text-orange-main">LAND</span>
            </span>
        </div>

        <ul class="hidden md:flex space-x-8 text-sm uppercase font-bold tracking-wide">
            <li><a href="index.php?action=trangchu" cclass="nav-link">Trang Chủ</a></li>
            <li><a href="index.php?action=list_product" class="nav-link">Bất Động Sản</a></li>
            <li><a href="index.php?action=introduce" class="nav-link">Giới Thiệu</a></li>
            <li><a href="index.php?action=contact" class="nav-link text-orange-main active">Liên Hệ</a></li>
        </ul>

        <div class="hidden md:block">
            <a href="tel:0123456789" class="bg-orange-main px-5 py-2 rounded-full font-bold text-sm hover:bg-orange-600 transition">
                <i class="fa-solid fa-phone mr-2"></i> 0123.456.789
            </a>
        </div>
    </div>
</header>

    <section class="bg-hero-contact py-20 text-center text-white">
        <h1 class="text-4xl font-bold uppercase mb-4">Liên Hệ Với Chúng Tôi</h1>
        <p class="text-gray-300 max-w-2xl mx-auto px-4">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn. Hãy gửi tin nhắn cho chúng tôi ngay hôm nay.</p>
    </section>

    <main class="container mx-auto px-4 py-16">
        
        <?php if(isset($_GET['status'])): ?>
            <?php if($_GET['status'] == 'success'): ?>
                <div class="mb-8 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
                    <i class="fa fa-check-circle mr-2"></i> Cảm ơn bạn! Thông tin liên hệ đã được gửi thành công. Chúng tôi sẽ phản hồi sớm nhất.
                </div>
            <?php else: ?>
                <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded shadow-sm">
                    <i class="fa fa-exclamation-triangle mr-2"></i> Có lỗi xảy ra. Vui lòng kiểm tra lại thông tin hoặc thử lại sau.
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-1/3 space-y-4">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-orange-main shrink-0">
                        <i class="fa fa-phone-alt text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Điện Thoại</h3>
                        <p class="text-orange-main font-bold text-lg mt-1">0346 619 632</p>
                        <p class="text-gray-400 text-xs mt-1">Hỗ trợ tư vấn 24/7</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-orange-main shrink-0">
                        <i class="fa fa-envelope text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Email</h3>
                        <p class="text-gray-600 font-medium mt-1">contact@sinhdoiland.com</p>
                        <p class="text-gray-400 text-xs mt-1">Phản hồi trong vòng 24 giờ làm việc</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-orange-main shrink-0">
                        <i class="fa fa-map-marker-alt text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Địa Chỉ</h3>
                        <p class="text-gray-600 font-medium mt-1">Thủ Đức, TP. Hồ Chí Minh</p>
                        <p class="text-gray-400 text-xs mt-1">Văn phòng đại diện SINHDOILAND</p>
                    </div>
                </div>
            </div>

            <div class="lg:w-2/3 bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-8">Gửi Lời Nhắn Cho Chúng Tôi</h2>
                
                <form action="index.php?act=contact_submit" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600">Họ và Tên *</label>
                            <input type="text" name="ho_ten" required placeholder="Nhập họ và tên" class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600">Email *</label>
                            <input type="email" name="email" required placeholder="Nhập địa chỉ email" class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600">Số Điện Thoại</label>
                            <input type="tel" name="so_dien_thoai" placeholder="Nhập số điện thoại" class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600">Tiêu Đề *</label>
                            <input type="text" name="tieu_de" required placeholder="Bạn quan tâm đến dự án nào?" class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Nội Dung Tin Nhắn *</label>
                        <textarea name="noi_dung" required rows="4" placeholder="Nhập nội dung tin nhắn chi tiết..." class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition"></textarea>
                    </div>
                    
                    <button type="submit" name="gui_lien_he" class="w-full bg-orange-main text-white font-bold py-4 rounded-lg hover:bg-orange-600 transition flex items-center justify-center gap-2 shadow-lg shadow-orange-100">
                        <i class="fa fa-paper-plane"></i> GỬI TIN NHẮN NGAY
                    </button>
                    <p class="text-center text-xs text-gray-400 italic font-medium">* Chúng tôi cam kết bảo mật thông tin của bạn</p>
                </form>
            </div>
        </div>
    </main>

    <footer class="bg-zinc-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-6 text-center">
             <p class="text-gray-500 text-sm">© 2026 SINHDOILAND. Tất cả quyền được bảo lưu.</p>
        </div>
    </footer>

</body>
</html>
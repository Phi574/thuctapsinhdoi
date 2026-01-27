<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về chúng tôi - SINHDOILAND</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .text-orange-main { color: #ff5722; }
        .bg-orange-main { background-color: #ff5722; }
        .bg-hero-dark {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?auto=format&fit=crop&w=1920&q=80');
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
<body class="bg-white font-sans text-gray-800">

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
            <li><a href="index.php?action=trangchu" class="nav-link">Trang Chủ</a></li>
            <li><a href="index.php?action=list_product" class="nav-link">Bất Động Sản</a></li>
            <li><a href="index.php?action=introduce" class="nav-link text-orange-main active"">Giới Thiệu</a></li>
            <li><a href="index.php?action=contact" class="nav-link">Liên Hệ</a></li>
        </ul>

        <div class="hidden md:block">
            <a href="tel:0123456789" class="bg-orange-main px-5 py-2 rounded-full font-bold text-sm hover:bg-orange-600 transition">
                <i class="fa-solid fa-phone mr-2"></i> 0123.456.789
            </a>
        </div>
    </div>
</header>

    <section class="bg-hero-dark h-[500px] flex items-center justify-center text-center px-4">
        <div class="max-w-4xl bg-black/30 p-8 rounded-lg backdrop-blur-sm">
            <h1 class="text-white text-2xl md:text-4xl font-bold leading-relaxed uppercase italic">
                "SINHDOILAND nỗ lực mang đến nhiều sản phẩm được xác minh thông qua nền tảng công nghệ, giúp bạn dễ dàng tìm được mảnh đất ưng ý với mức giá cả hợp lý"
            </h1>
        </div>
    </section>

    <section class="container mx-auto px-6 py-20 max-w-5xl">
        <div class="space-y-16">
            
            <div>
                <h2 class="text-2xl font-bold text-gray-700 mb-6 uppercase tracking-wide border-l-4 border-orange-main pl-4">Giới thiệu về SINHDOILAND</h2>
                <p class="leading-loose text-gray-600 text-justify">
                    SINHDOILAND là đơn vị hoạt động trong lĩnh vực bất động sản tại Thái Nguyên, được thành lập với đội ngũ giàu kinh nghiệm, am hiểu thị trường địa phương. Chúng tôi chuyên tư vấn, môi giới và phân phối các sản phẩm bất động sản đa dạng như đất nền, nhà ở và dự án đầu tư, nhằm mang đến cho khách hàng những giải pháp phù hợp, minh bạch và hiệu quả. SINHDOILAND luôn đặt uy tín và lợi ích của khách hàng làm trọng tâm trong mọi hoạt động.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-gray-700 mb-8 uppercase tracking-wide border-l-4 border-orange-main pl-4">Giá trị cốt lõi</h2>
                <div class="space-y-8 ml-4">
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Chính trực:</h4>
                        <p class="text-gray-600 pl-4">Liêm chính, trung thực trong ứng xử và trong tất cả các giao dịch.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Khát vọng:</h4>
                        <p class="text-gray-600 pl-4">Chuyển mình cùng thời cuộc, nỗ lực để vươn đến sự thịnh vượng, thành công.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Hợp tác:</h4>
                        <p class="text-gray-600 pl-4">Đặt mục tiêu thấu hiểu, tôn trọng, chia sẻ thông tin một cách trung thực và cởi mở đến Quý đối tác & Quý khách hàng.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Tiên phong:</h4>
                        <p class="text-gray-600 pl-4">Mogivi luôn cống hiến, dẫn đầu về công nghệ trong lĩnh vực môi giới bất động sản bằng hành động và kết quả.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Con người:</h4>
                        <p class="text-gray-600 pl-4">Con người là trọng tâm, là nhân tố quyết định sự phát triển của doanh nghiệp.</p>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-gray-700 mb-8 uppercase tracking-wide border-l-4 border-orange-main pl-4">Tầm nhìn và sứ mệnh</h2>
                <div class="space-y-6 ml-4">
                    <p class="text-gray-600">
                        <strong class="text-gray-800">Tầm nhìn:</strong> Trở thành công ty công nghệ bất động sản phát triển bền vững, gia nhập vào hệ sinh thái Proptech tại Việt Nam.
                    </p>
                    <p class="text-gray-600">
                        <strong class="text-gray-800">Sứ mệnh:</strong> Góp phần minh bạch hóa các giao dịch trên thị trường bất động sản, tận tâm mang đến giá trị thiết thực cho Đối tác và Khách hàng.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <footer class="bg-[#1a1a1a] text-white pt-16 pb-8">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
                <h3 class="font-bold mb-6 text-lg">Nha Thầu Hưng</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Chúng tôi chuyên cung cấp giải pháp thiết kế nội thất hiện đại cho ngôi nhà của bạn.</p>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-lg">Sản Phẩm</h4>
                <ul class="text-gray-400 text-sm space-y-3">
                    <li><a href="#" class="hover:text-orange-main transition">Phòng Khách</a></li>
                    <li><a href="#" class="hover:text-orange-main transition">Phòng Ngủ</a></li>
                    <li><a href="#" class="hover:text-orange-main transition">Phòng Ăn</a></li>
                    <li><a href="#" class="hover:text-orange-main transition">Phòng Tắm</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-lg">Dịch Vụ</h4>
                <ul class="text-gray-400 text-sm space-y-3">
                    <li><a href="#" class="hover:text-orange-main transition">Tư Vấn Miễn Phí</a></li>
                    <li><a href="#" class="hover:text-orange-main transition">Thiết Kế</a></li>
                    <li><a href="#" class="hover:text-orange-main transition">Thi Công</a></li>
                    <li><a href="#" class="hover:text-orange-main transition">Bảo Hành</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-6 text-lg">Liên Hệ</h4>
                <ul class="text-gray-400 text-sm space-y-3">
                    <li><i class="fa fa-phone w-5"></i> 0123456789</li>
                    <li><i class="fa fa-envelope w-5"></i> contact@nhathauhung.com</li>
                    <li><i class="fa fa-map-marker-alt w-5"></i> Hà Nội, Việt Nam</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-16 pt-8 container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-gray-500 text-xs gap-4">
                <p>© 2024 Nha Thầu Hưng. Tất cả quyền được bảo lưu.</p>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-white transition">Chính sách riêng tư</a>
                    <a href="#" class="hover:text-white transition">Điều khoản sử dụng</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
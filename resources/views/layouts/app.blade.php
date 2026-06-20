<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ديوان الأيتام')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800;900&family=Tajawal:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        /* خلفية ذهبية متحركة */
        .bg-luxury {
            background: radial-gradient(ellipse at 50% 0%, #1a0a0a 0%, #0d0d0d 60%, #1a0a0a 100%);
            position: relative;
        }
        .bg-luxury::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(212, 175, 55, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(212, 175, 55, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(212, 175, 55, 0.02) 0%, transparent 70%);
            pointer-events: none;
        }

        /* تأثير التوهج الذهبي */
        .gold-glow {
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.3),
                         0 0 60px rgba(212, 175, 55, 0.1);
        }

        /* حدود ذهبية */
        .gold-border {
            border: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 0 40px rgba(212, 175, 55, 0.05),
                        inset 0 0 40px rgba(212, 175, 55, 0.03);
        }

        /* زخارف ذهبية */
        .ornament {
            color: rgba(212, 175, 55, 0.15);
            font-size: 3rem;
            letter-spacing: 20px;
            user-select: none;
        }

        /* تأثير الكتابة الذهبية */
        .gold-text {
            background: linear-gradient(180deg, #f6e5a0 0%, #d4af37 40%, #b8960f 70%, #d4af37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: none;
        }

        /* بطاقة فخمة */
        .luxury-card {
            background: linear-gradient(145deg, rgba(20, 10, 10, 0.9), rgba(10, 5, 5, 0.95));
            backdrop-filter: blur(30px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.8),
                        0 0 60px rgba(212, 175, 55, 0.03),
                        inset 0 1px 0 rgba(212, 175, 55, 0.1);
        }

        /* إدخالات فخمة */
        .luxury-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(212, 175, 55, 0.15);
            color: #f0e6d3;
            transition: all 0.4s ease;
        }
        .luxury-input:focus {
            border-color: rgba(212, 175, 55, 0.5);
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.05),
                        inset 0 0 30px rgba(212, 175, 55, 0.03);
            background: rgba(255, 255, 255, 0.05);
        }

        /* زر فخم */
        .luxury-btn {
            background: linear-gradient(135deg, #d4af37, #b8960f, #d4af37);
            background-size: 200% 200%;
            animation: shimmer-gold 3s ease-in-out infinite;
            box-shadow: 0 10px 40px rgba(212, 175, 55, 0.3);
            transition: all 0.4s ease;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }
        .luxury-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 60px rgba(212, 175, 55, 0.4);
        }

        @keyframes shimmer-gold {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* عنوان فخم */
        .luxury-title {
            font-family: 'Tajawal', 'Cairo', sans-serif;
            font-weight: 900;
            letter-spacing: 3px;
        }

        /* أيقونات ذهبية */
        .gold-icon {
            color: #d4af37;
            filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.2));
        }

        /* خط فاصل ذهبي */
        .gold-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.3), rgba(212, 175, 55, 0.6), rgba(212, 175, 55, 0.3), transparent);
            margin: 30px 0;
        }
    </style>
</head>
<body class="bg-luxury min-h-screen font-cairo text-[#f0e6d3]">

    <!-- Navigation فخم -->
    <nav class="relative z-50 border-b border-[rgba(212,175,55,0.1)] bg-[rgba(0,0,0,0.5)] backdrop-blur-xl">
        <div class="container mx-auto px-4 py-4 flex justify-center items-center gap-12">
            <div class="flex items-center gap-4">
                <span class="text-3xl gold-icon">👑</span>
                <span class="text-2xl font-black gold-text luxury-title">ديوان الأيتام</span>
                <span class="text-3xl gold-icon">👑</span>
            </div>
            <div class="flex gap-6">
                <a href="{{ route('register') }}" class="text-[#f0e6d3]/60 hover:text-[#d4af37] transition-colors duration-300 text-sm tracking-wider">الرئيسية</a>
                <a href="{{ route('list') }}" class="text-[#f0e6d3]/60 hover:text-[#d4af37] transition-colors duration-300 text-sm tracking-wider">القائمة</a>
            </div>
        </div>
    </nav>

    <!-- Main Content - كل شيء في المنتصف -->
    <main class="relative z-10 container mx-auto px-4 py-12 max-w-5xl">
        <div class="flex justify-center">
            <div class="w-full">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 text-center py-8 border-t border-[rgba(212,175,55,0.05)]">
        <div class="ornament">✦ ✦ ✦</div>
        <p class="text-[#f0e6d3]/20 text-sm tracking-widest mt-4">جميع الحقوق محفوظة © {{ date('Y') }}</p>
    </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSTERIUM - Despre Noi | About Us</title>
    <meta name="description" content="Descoperă povestea MYSTERIUM - cafea de lux cu aur comestibil care face diferența în lume.">
    <link rel="icon" href="../favicon.ico" type="image/x-icon"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #000000;
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Animated background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at top, rgba(15, 15, 15, 1) 0%, rgba(0, 0, 0, 1) 50%),
                radial-gradient(circle at 80% 20%, rgba(184, 134, 11, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 20% 80%, rgba(218, 165, 32, 0.02) 0%, transparent 40%);
            pointer-events: none;
            z-index: 0;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(0deg, rgba(255,255,255,0.015) 0px, transparent 1px, transparent 2px, rgba(255,255,255,0.015) 3px),
                repeating-linear-gradient(90deg, rgba(255,255,255,0.015) 0px, transparent 1px, transparent 2px, rgba(255,255,255,0.015) 3px);
            pointer-events: none;
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 15px 0;
            background: rgba(0, 0, 0, 0.95);
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .logo:hover {
            opacity: 0.7;
        }

        .logo img {
            width: 40px;
            height: 40px;
        }

        .logo-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 600;
            color: #ffffff;
            letter-spacing: 2px;
        }

        .nav-home-btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
            padding: 10px 24px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .nav-home-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Google Translate Selector - Premium Integration */
        #google_translate_element {
            display: inline-block;
        }

        .goog-te-gadget {
            font-family: 'Inter', sans-serif !important;
        }

        .goog-te-gadget-simple {
            background: transparent !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 30px !important;
            padding: 8px 16px !important;
            font-size: 14px !important;
            transition: all 0.3s ease !important;
            display: inline-flex !important;
            align-items: center !important;
        }

        .goog-te-gadget-simple:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            border-color: rgba(212, 175, 55, 0.5) !important;
        }

        .goog-te-gadget-simple .goog-te-menu-value {
            color: #ffffff !important;
            font-family: 'Inter', sans-serif !important;
            font-weight: 500 !important;
        }

        .goog-te-gadget-simple .goog-te-menu-value span {
            color: #ffffff !important;
            border-left-color: rgba(255, 255, 255, 0.3) !important;
        }

        .goog-te-gadget-simple .goog-te-menu-value span:hover {
            color: #d4af37 !important;
        }

        .goog-te-gadget-simple .goog-te-menu-value span[style] {
            color: #ffffff !important;
        }

        .goog-te-gadget-icon {
            display: none !important;
        }

        .goog-te-menu-value span:first-child {
            color: #ffffff !important;
        }

        /* Force white color on all text elements */
        #google_translate_element * {
            color: #ffffff !important;
        }

        #google_translate_element a {
            color: #ffffff !important;
        }

        #google_translate_element span {
            color: #ffffff !important;
        }

        /* Dropdown Menu Styling */
        .goog-te-menu2 {
            background: rgba(0, 0, 0, 0.95) !important;
            border: 1px solid rgba(212, 175, 55, 0.3) !important;
            border-radius: 12px !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5) !important;
            padding: 8px 0 !important;
            backdrop-filter: blur(10px) !important;
        }

        .goog-te-menu2-item {
            color: #ffffff !important;
            font-family: 'Inter', sans-serif !important;
            padding: 8px 20px !important;
            transition: all 0.2s ease !important;
        }

        .goog-te-menu2-item:hover {
            background: rgba(212, 175, 55, 0.1) !important;
            color: #d4af37 !important;
        }

        .goog-te-menu2-item-selected {
            background: rgba(212, 175, 55, 0.2) !important;
            color: #d4af37 !important;
        }

        .goog-te-menu2-item div {
            color: inherit !important;
        }

        /* Hide Google Translate banner and branding */
        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget img {
            display: none !important;
        }

        body {
            top: 0 !important;
        }

        .skiptranslate {
            display: inline-block;
        }

        /* Navigation Right Section */
        .nav-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        @media (max-width: 768px) {
            .nav-right {
                gap: 10px;
            }

            .goog-te-gadget-simple {
                padding: 6px 12px !important;
                font-size: 13px !important;
            }
        }

        /* Hero Section */
        .hero {
            padding: 140px 0 80px;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(42px, 6vw, 72px);
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #ffffff 0%, #d4af37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .hero p {
            font-size: clamp(16px, 2vw, 20px);
            color: rgba(255, 255, 255, 0.7);
            max-width: 700px;
            margin: 0 auto 40px;
            line-height: 1.6;
        }

        /* Sections Grid */
        .sections-grid {
            padding: 60px 0 100px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }

        .section-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 32px;
            text-decoration: none;
            color: #ffffff;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .section-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(212, 175, 55, 0.1) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .section-card:hover::before {
            opacity: 1;
        }

        .section-card:hover {
            transform: translateY(-8px);
            border-color: rgba(212, 175, 55, 0.4);
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.15);
        }

        .section-card-icon {
            font-size: 32px;
            margin-bottom: 16px;
            display: block;
        }

        .section-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .section-card p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        .section-card-arrow {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 20px;
            opacity: 0.5;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .section-card:hover .section-card-arrow {
            transform: translateX(5px);
            opacity: 1;
        }

        /* Footer */
        .footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 40px 0;
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .navbar .container {
                padding: 0 20px;
            }

            .logo-text {
                font-size: 18px;
            }

            .hero {
                padding: 120px 0 60px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .section-card {
                padding: 24px;
            }
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <a href="../" class="logo">
                <img src="../logo/iso.svg" alt="MYSTERIUM Logo">
                <span class="logo-text">MYSTERIUM</span>
            </a>
            <div class="nav-right">
                <div id="google_translate_element"></div>
                <a href="../" class="nav-home-btn">← Acasă</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <h1>Despre MYSTERIUM</h1>
            <p>Descoperă povestea, valorile și viziunea brandului de cafea de lux care face diferența în lume.</p>
        </div>
    </div>

    <!-- Sections Grid -->
    <div class="sections-grid">
        <div class="container">
            <div class="grid">
                <!-- Povestea Noastră -->
                <a href="./pov-noastra/" class="section-card">
                    <span class="section-card-icon">📖</span>
                    <h3>POVESTEA NOASTRĂ</h3>
                    <p>Descoperi originea și călătoria MYSTERIUM - de la idee la brand de lux.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Misiunea Noastră -->
                <a href="./misiunea-noastra/" class="section-card">
                    <span class="section-card-icon">🎯</span>
                    <h3>MISIUNEA NOASTRĂ</h3>
                    <p>Scopul nostru de a îmbina luxul cu impactul social pozitiv.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Viziunea Noastră -->
                <a href="./viziunea-noastra/" class="section-card">
                    <span class="section-card-icon">🔮</span>
                    <h3>VIZIUNEA NOASTRĂ</h3>
                    <p>Unde ne îndre Păm și cum vrem să transformăm industria cafelei.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Valorile Noastre -->
                <a href="./valorile-noastre/" class="section-card">
                    <span class="section-card-icon">💎</span>
                    <h3>VALORILE NOASTRE</h3>
                    <p>Principiile fundamentale care ne ghidează fiecare decizie.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- De Ce Există MYSTERIUM -->
                <a href="./de-ce-exista-mysterium/" class="section-card">
                    <span class="section-card-icon">⭐</span>
                    <h3>DE CE EXISTĂ MYSTERIUM</h3>
                    <p>Motivul profund al creării brandului și impactul nostru social.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Sistemul de Premio -->
                <a href="./sistemul-de-premiere/" class="section-card">
                    <span class="section-card-icon">🏆</span>
                    <h3>SISTEMUL DE PREMIERE</h3>
                    <p>Cashback progresiv și recompense pentru clienți loiali.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Produse -->
                <a href="./produse/" class="section-card">
                    <span class="section-card-icon">☕</span>
                    <h3>PRODUSE</h3>
                    <p>Colecțiile noastre exclusive de cafea premium cu aur comestibil.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Mașini de Cafea -->
                <a href="./masini-de-cafea/" class="section-card">
                    <span class="section-card-icon">⚙️</span>
                    <h3>MAȘINI DE CAFEA</h3>
                    <p>Echipamente premium pentru experiența perfectă de cafea.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Marketplace -->
                <a href="./marketplace/" class="section-card">
                    <span class="section-card-icon">🛍️</span>
                    <h3>MARKETPLACE</h3>
                    <p>Cumpără produsele MYSTERIUM și descoperă oferte exclusive.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Înscriere și Contract Colaborator -->
                <a href="./contract-colaborator/" class="section-card">
                    <span class="section-card-icon">🤝</span>
                    <h3>ÎNSCRIERE ȘI CONTRACT COLABORATOR</h3>
                    <p>Alătură-te echipei MYSTERIUM și devino partener.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Fundația MYSTERIUM -->
                <a href="./fundatia-mysterium/" class="section-card">
                    <span class="section-card-icon">❤️</span>
                    <h3>FUNDAȚIA MYSTERIUM</h3>
                    <p>La Fontana Della Fortuna - impactul nostru caritabil global.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Cardurile Precampanie -->
                <a href="./cardurile-precampanie/" class="section-card">
                    <span class="section-card-icon">💳</span>
                    <h3>CARDURILE PRECAMPANIE</h3>
                    <p>Beneficii exclusive pentru early adopters și susținători.</p>
                    <span class="section-card-arrow">→</span>
                </a>

                <!-- Contact / Suport / QR -->
                <a href="./contact-suport/" class="section-card">
                    <span class="section-card-icon">📞</span>
                    <h3>CONTACT / SUPORT / QR</h3>
                    <p>Contactează-ne pentru întrebări, suport sau scanează QR-ul nostru.</p>
                    <span class="section-card-arrow">→</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>© 2025 MYSTERIUM M. AI Coffee. Toate drepturile rezervate.</p>
        </div>
    </div>

    <!-- Google Translate Script -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'ro',
                includedLanguages: 'en,ro,es,fr,de,it,pt,ru,zh-CN,ja,ar,rom',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Card hover effect - track mouse position
        document.querySelectorAll('.section-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                card.style.setProperty('--mouse-x', x + '%');
                card.style.setProperty('--mouse-y', y + '%');
            });
        });
    </script>
</body>
</html>


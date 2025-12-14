<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSTERIUM - Misiunea Noastră</title>
    <meta name="description" content="Misiunea MYSTERIUM: să reconstruim economia pornind de la OM, nu de la corporații">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Inter:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #000000;
            color: #ffffff;
            line-height: 1.8;
            -webkit-font-smoothing: antialiased;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at top, rgba(15, 15, 15, 1) 0%, rgba(0, 0, 0, 1) 50%),
                        radial-gradient(circle at 80% 20%, rgba(184, 134, 11, 0.03) 0%, transparent 40%);
            pointer-events: none;
            z-index: 0;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
            padding: 120px 20px 80px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 40px;
            transition: color 0.3s ease;
        }

        .back-btn:hover {
            color: #d4af37;
        }

        h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 700;
            margin-bottom: 40px;
            background: linear-gradient(135deg, #ffffff 0%, #d4af37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        p {
            font-size: 17px;
            line-height: 1.9;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 24px;
        }

        .quote {
            background: rgba(212, 175, 55, 0.05);
            border-left: 4px solid #d4af37;
            padding: 24px 32px;
            margin: 40px 0;
            font-style: italic;
            font-size: 18px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
        }

        strong {
            color: #d4af37;
            font-weight: 600;
        }

        ul {
            margin: 24px 0;
            padding-left: 40px;
        }

        li {
            margin-bottom: 12px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.85);
        }

        @media (max-width: 768px) {
            .container {
                padding: 100px 20px 60px;
            }

            .quote {
                padding: 20px 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../" class="back-btn">← Înapoi</a>
        
        <h1>MISIUNEA NOASTRĂ</h1>

        <p>Misiunea MYSTERIUM – La Fontana della Fortuna M AI® este să reconstruiască economia pornind de la OM, nu de la corporații.</p>

        <p>Să creăm primul ecosistem în care:</p>

        <ul>
            <li>fiecare achiziție devine câștig</li>
            <li>fiecare client devine colaborator</li>
            <li>fiecare muncitor devine antreprenor</li>
            <li>fiecare pas este răsplătit</li>
            <li>iar MAIA transformă oamenii în prima generație de putere economică umană</li>
        </ul>

        <p>Misiunea noastră este să dăm OMULUI ceea ce economia nu i-a oferit niciodată:</p>

        <ul>
            <li>🔥 putere economică</li>
            <li>🔥 evoluție reală</li>
            <li>🔥 recompense progresive</li>
            <li>🔥 independență fără investiție</li>
            <li>🔥 rolul central într-un nou model economic global</li>
        </ul>

        <p>Construim un ecosistem în care nu roboții domină economia, ci oamenii și inteligența artificială lucrează împreună pentru prosperitate.</p>

        <div class="quote">
            Aceasta este misiunea noastră: Să transformăm fiecare om într-o forță economică evoluată.
        </div>
    </div>
</body>
</html>


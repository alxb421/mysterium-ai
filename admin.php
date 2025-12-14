<?php
session_start();

// Configurație
define('ADMIN_PASSWORD', 'Password1234+');
define('PROJECTS_FILE', __DIR__ . '/projects.json');

// Verificare autentificare
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

if (isset($_POST['password'])) {
    if ($_POST['password'] === ADMIN_PASSWORD) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $error = "Parolă incorectă!";
    }
}

$isLoggedIn = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'];

// Funcții CRUD
function loadProjects() {
    if (file_exists(PROJECTS_FILE)) {
        $content = file_get_contents(PROJECTS_FILE);
        return json_decode($content, true) ?: [];
    }
    return [];
}

function saveProjects($projects) {
    $json = json_encode($projects, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    $result = file_put_contents(PROJECTS_FILE, $json);
    if ($result === false) {
        error_log("Failed to save projects to " . PROJECTS_FILE);
        error_log("JSON: " . $json);
    }
    return $result !== false;
}

// Procesare acțiuni
if ($isLoggedIn && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $projects = loadProjects();
    
    // Adăugare proiect
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        $newProject = [
            '_id' => uniqid('proj_', true),
            'title' => [
                'en' => $_POST['title_en'] ?? '',
                'ro' => $_POST['title_ro'] ?? '',
                'es' => $_POST['title_es'] ?? '',
                'fr' => $_POST['title_fr'] ?? '',
                'de' => $_POST['title_de'] ?? ''
            ],
            'description' => [
                'en' => $_POST['desc_en'] ?? '',
                'ro' => $_POST['desc_ro'] ?? '',
                'es' => $_POST['desc_es'] ?? '',
                'fr' => $_POST['desc_fr'] ?? '',
                'de' => $_POST['desc_de'] ?? ''
            ],
            'clientName' => $_POST['clientName'] ?? '',
            'type' => $_POST['type'] ?? '',
            'media' => json_decode($_POST['media'] ?? '[]', true),
            'date' => date('c'),
            'visible' => isset($_POST['visible'])
        ];
        array_unshift($projects, $newProject);
        if (saveProjects($projects)) {
            header('Location: admin.php?success=added');
            exit;
        }
    }
    
    // Editare proiect
    if (isset($_POST['action']) && $_POST['action'] === 'edit') {
        $id = $_POST['project_id'];
        foreach ($projects as $key => $project) {
            if ($project['_id'] === $id) {
                $projects[$key]['title'] = [
                    'en' => $_POST['title_en'] ?? '',
                    'ro' => $_POST['title_ro'] ?? '',
                    'es' => $_POST['title_es'] ?? '',
                    'fr' => $_POST['title_fr'] ?? '',
                    'de' => $_POST['title_de'] ?? ''
                ];
                $projects[$key]['description'] = [
                    'en' => $_POST['desc_en'] ?? '',
                    'ro' => $_POST['desc_ro'] ?? '',
                    'es' => $_POST['desc_es'] ?? '',
                    'fr' => $_POST['desc_fr'] ?? '',
                    'de' => $_POST['desc_de'] ?? ''
                ];
                $projects[$key]['clientName'] = $_POST['clientName'] ?? '';
                $projects[$key]['type'] = $_POST['type'] ?? '';
                $projects[$key]['media'] = json_decode($_POST['media'] ?? '[]', true);
                $projects[$key]['visible'] = isset($_POST['visible']);
                break;
            }
        }
        if (saveProjects($projects)) {
            header('Location: admin.php?success=updated');
            exit;
        }
    }
    
    // Ștergere proiect
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $id = $_POST['project_id'];
        $projects = array_filter($projects, function($project) use ($id) {
            return $project['_id'] !== $id;
        });
        $projects = array_values($projects);
        if (saveProjects($projects)) {
            $success = "Proiect șters cu succes!";
            header('Location: admin.php?success=deleted');
            exit;
        } else {
            $error = "Eroare la ștergerea proiectului!";
        }
    }
}

$projects = $isLoggedIn ? loadProjects() : [];
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSTERIUM Admin - Gestionare Colecții</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            background: rgba(255,255,255,0.05);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .header h1 {
            font-size: 28px;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .login-box {
            max-width: 400px;
            margin: 100px auto;
            background: rgba(255,255,255,0.05);
            padding: 40px;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #FFD700;
            font-weight: 600;
        }
        input[type="text"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            background: rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            color: #fff;
            font-size: 14px;
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        button {
            background: linear-gradient(135deg, #FFD700, #FFA500);
            color: #000;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            font-size: 14px;
            transition: transform 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
        }
        .btn-secondary {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .btn-danger {
            background: linear-gradient(135deg, #ff4444, #cc0000);
            color: #fff;
        }
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .alert-success {
            background: rgba(0,255,0,0.1);
            border: 1px solid rgba(0,255,0,0.3);
            color: #0f0;
        }
        .alert-error {
            background: rgba(255,0,0,0.1);
            border: 1px solid rgba(255,0,0,0.3);
            color: #f00;
        }
        .project-card {
            background: rgba(255,255,255,0.05);
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .project-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .project-title {
            font-size: 20px;
            color: #FFD700;
        }
        .project-actions {
            display: flex;
            gap: 10px;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            z-index: 1000;
            overflow-y: auto;
        }
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background: #2d2d2d;
            padding: 40px;
            border-radius: 15px;
            max-width: 800px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            border: 1px solid rgba(255,255,255,0.2);
        }
        .lang-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid rgba(255,255,255,0.1);
        }
        .lang-tab {
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            background: transparent;
            color: rgba(255,255,255,0.5);
            border-bottom: 3px solid transparent;
        }
        .lang-tab.active {
            color: #FFD700;
            border-bottom-color: #FFD700;
        }
        .lang-content {
            display: none;
        }
        .lang-content.active {
            display: block;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #FFD700;
            text-decoration: none;
            padding: 10px 20px;
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
            transition: background 0.2s;
        }
        .back-btn:hover {
            background: rgba(255,255,255,0.1);
        }
        small {
            color: rgba(255,255,255,0.5);
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!$isLoggedIn): ?>
            <!-- Login Form -->
            <div class="login-box">
                <h1 style="text-align: center; margin-bottom: 30px;">
                    🔒 MYSTERIUM Admin
                </h1>
                <?php if (isset($error)): ?>
                    <div class="alert alert-error"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label>Parolă:</label>
                        <input type="password" name="password" required autofocus>
                    </div>
                    <button type="submit" style="width: 100%;">🔓 Autentificare</button>
                </form>
                <div style="margin-top: 20px; text-align: center;">
                    <a href="/webgl/" class="back-btn">← Înapoi la site</a>
                </div>
            </div>
        <?php else: ?>
            <!-- Admin Dashboard -->
            <div class="header">
                <div>
                    <h1>☕ MYSTERIUM Admin Panel</h1>
                    <small>Gestionare Colecții de Cafea</small>
                </div>
                <form method="POST" style="margin: 0;">
                    <button type="submit" name="logout" class="btn-secondary">Deconectare</button>
                </form>
            </div>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    ✓ <?php 
                        if ($_GET['success'] === 'added') echo 'Proiect adăugat cu succes!';
                        elseif ($_GET['success'] === 'updated') echo 'Proiect actualizat cu succes!';
                        elseif ($_GET['success'] === 'deleted') echo 'Proiect șters cu succes!';
                    ?>
                </div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="alert alert-error">✗ <?= $error ?></div>
            <?php endif; ?>

            <!-- Buton Adăugare -->
            <button onclick="openAddModal()" style="margin-bottom: 20px;">
                ➕ Adaugă Colecție Nouă
            </button>

            <!-- Lista Proiecte -->
            <div id="projects-list">
                <?php foreach ($projects as $project): ?>
                    <div class="project-card">
                        <div class="project-header">
                            <div>
                                <div class="project-title"><?= htmlspecialchars($project['title']['ro'] ?? $project['title']['en']) ?></div>
                                <small><?= htmlspecialchars($project['clientName']) ?> • <?= htmlspecialchars($project['type']) ?></small>
                            </div>
                            <div class="project-actions">
                                <button onclick="editProject(<?= htmlspecialchars(json_encode($project), ENT_QUOTES) ?>)" class="btn-secondary">
                                    ✏️ Editează
                                </button>
                                <form method="POST" style="display: inline;" onsubmit="return confirm('Sigur vrei să ștergi această colecție?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="project_id" value="<?= $project['_id'] ?>">
                                    <button type="submit" class="btn-danger">🗑️ Șterge</button>
                                </form>
                            </div>
                        </div>
                        <p style="margin-top: 10px; opacity: 0.7; font-size: 14px;">
                            <?= htmlspecialchars(substr($project['description']['ro'] ?? $project['description']['en'], 0, 200)) ?>...
                        </p>
                        <div style="margin-top: 15px;">
                            <span style="background: rgba(255,215,0,0.2); padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                                <?= count($project['media'] ?? []) ?> media files
                            </span>
                            <?php if ($project['visible']): ?>
                                <span style="background: rgba(0,255,0,0.2); padding: 5px 10px; border-radius: 5px; font-size: 12px; margin-left: 10px;">
                                    ✓ Vizibil
                                </span>
                            <?php else: ?>
                                <span style="background: rgba(255,0,0,0.2); padding: 5px 10px; border-radius: 5px; font-size: 12px; margin-left: 10px;">
                                    ✗ Ascuns
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Modal Adăugare/Editare -->
            <div id="projectModal" class="modal">
                <div class="modal-content">
                    <h2 id="modalTitle">Adaugă Colecție Nouă</h2>
                    <form method="POST" id="projectForm">
                        <input type="hidden" name="action" id="formAction" value="add">
                        <input type="hidden" name="project_id" id="projectId">

                        <!-- Language Tabs -->
                        <div class="lang-tabs">
                            <button type="button" class="lang-tab active" onclick="switchLang('en')">🇬🇧 EN</button>
                            <button type="button" class="lang-tab" onclick="switchLang('ro')">🇷🇴 RO</button>
                            <button type="button" class="lang-tab" onclick="switchLang('es')">🇪🇸 ES</button>
                            <button type="button" class="lang-tab" onclick="switchLang('fr')">🇫🇷 FR</button>
                            <button type="button" class="lang-tab" onclick="switchLang('de')">🇩🇪 DE</button>
                        </div>

                        <!-- English -->
                        <div class="lang-content active" data-lang="en">
                            <div class="form-group">
                                <label>Title (English):</label>
                                <input type="text" name="title_en" id="title_en" required>
                            </div>
                            <div class="form-group">
                                <label>Description (English):</label>
                                <textarea name="desc_en" id="desc_en" required></textarea>
                            </div>
                        </div>

                        <!-- Romanian -->
                        <div class="lang-content" data-lang="ro">
                            <div class="form-group">
                                <label>Titlu (Română):</label>
                                <input type="text" name="title_ro" id="title_ro">
                            </div>
                            <div class="form-group">
                                <label>Descriere (Română):</label>
                                <textarea name="desc_ro" id="desc_ro"></textarea>
                            </div>
                        </div>

                        <!-- Spanish -->
                        <div class="lang-content" data-lang="es">
                            <div class="form-group">
                                <label>Título (Español):</label>
                                <input type="text" name="title_es" id="title_es">
                            </div>
                            <div class="form-group">
                                <label>Descripción (Español):</label>
                                <textarea name="desc_es" id="desc_es"></textarea>
                            </div>
                        </div>

                        <!-- French -->
                        <div class="lang-content" data-lang="fr">
                            <div class="form-group">
                                <label>Titre (Français):</label>
                                <input type="text" name="title_fr" id="title_fr">
                            </div>
                            <div class="form-group">
                                <label>Description (Français):</label>
                                <textarea name="desc_fr" id="desc_fr"></textarea>
                            </div>
                        </div>

                        <!-- German -->
                        <div class="lang-content" data-lang="de">
                            <div class="form-group">
                                <label>Titel (Deutsch):</label>
                                <input type="text" name="title_de" id="title_de">
                            </div>
                            <div class="form-group">
                                <label>Beschreibung (Deutsch):</label>
                                <textarea name="desc_de" id="desc_de"></textarea>
                            </div>
                        </div>

                        <!-- Common Fields -->
                        <div class="form-group">
                            <label>Nume Client:</label>
                            <input type="text" name="clientName" id="clientName" placeholder="MYSTERIUM Collection">
                        </div>

                        <div class="form-group">
                            <label>Tip Colecție:</label>
                            <select name="type" id="type">
                                <option value="premium blend">Premium Blend</option>
                                <option value="dark roast">Dark Roast</option>
                                <option value="light roast">Light Roast</option>
                                <option value="limited edition">Limited Edition</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Media (JSON):</label>
                            <textarea name="media" id="media" placeholder='[{"url":"/textures/planet.jpg","type":"image","order":1}]'></textarea>
                            <small>Format: Array JSON cu obiecte {url, type, order}</small>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="visible" id="visible" checked style="width: auto; margin-right: 10px;">
                                Vizibil pe site
                            </label>
                        </div>

                        <div style="display: flex; gap: 10px; margin-top: 30px;">
                            <button type="submit" style="flex: 1;">💾 Salvează</button>
                            <button type="button" onclick="closeModal()" class="btn-secondary">✖️ Anulează</button>
                        </div>
                    </form>
                </div>
            </div>

        <?php endif; ?>
    </div>

    <script>
        function switchLang(lang) {
            document.querySelectorAll('.lang-tab').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.lang-content').forEach(content => content.classList.remove('active'));
            
            document.querySelector(`.lang-tab[onclick*="${lang}"]`).classList.add('active');
            document.querySelector(`.lang-content[data-lang="${lang}"]`).classList.add('active');
        }

        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Adaugă Colecție Nouă';
            document.getElementById('formAction').value = 'add';
            document.getElementById('projectForm').reset();
            document.getElementById('projectModal').classList.add('active');
        }

        function editProject(project) {
            console.log('Editing project:', project);
            document.getElementById('modalTitle').textContent = 'Editează Colecție';
            document.getElementById('formAction').value = 'edit';
            document.getElementById('projectId').value = project._id;
            
            // Populate form with delay to ensure DOM is ready
            setTimeout(() => {
                document.getElementById('title_en').value = project.title?.en || '';
                document.getElementById('title_ro').value = project.title?.ro || '';
                document.getElementById('title_es').value = project.title?.es || '';
                document.getElementById('title_fr').value = project.title?.fr || '';
                document.getElementById('title_de').value = project.title?.de || '';
                
                document.getElementById('desc_en').value = project.description?.en || '';
                document.getElementById('desc_ro').value = project.description?.ro || '';
                document.getElementById('desc_es').value = project.description?.es || '';
                document.getElementById('desc_fr').value = project.description?.fr || '';
                document.getElementById('desc_de').value = project.description?.de || '';
                
                document.getElementById('clientName').value = project.clientName || '';
                document.getElementById('type').value = project.type || '';
                document.getElementById('media').value = JSON.stringify(project.media || [], null, 2);
                document.getElementById('visible').checked = project.visible === true;
            }, 100);
            
            document.getElementById('projectModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('projectModal').classList.remove('active');
        }

        // Close modal on outside click
        document.getElementById('projectModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>


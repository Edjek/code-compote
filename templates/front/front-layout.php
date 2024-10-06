<?php

use App\Core\Session;

$session = new Session;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code et Compote - Forum des Developpeur en herbe</title>
    <meta name="description" content="Rejoignez Code et Compote, le forum des développeurs en herbe ! Partagez vos connaissances, posez des questions et collaborez sur des projets. Développez vos compétences en programmation avec notre communauté passionnée." />
    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="/code-et-compote/public/css/style.css">

    <link rel="shortcut icon" href="/code-et-compote/public/img/icon/favicon.png" type="image/x-icon">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-primary" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="/code-et-compote/">
                    <i class="bi bi-lightning-charge-fill mx-2"></i>
                    Code et Compote
                    <img src="/code-et-compote/public/img/icon/camaro.png" alt="" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                        <?php if ($session->isAdmin()) : ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/code-et-compote/tableau-de-bord-admin">Backoffice</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/code-et-compote/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/code-et-compote/contactez-nous">Contact</a>
                        </li>
                        <?php if ($session->isLoggedIn()) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/code-et-compote/deconnexion">Deconnexion</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/code-et-compote/inscription">Inscription</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/code-et-compote/connexion">Connexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php
        $session->displayFlashMessage();
        echo $content;
        ?>

    </main>

    <footer></footer>
</body>

</html>
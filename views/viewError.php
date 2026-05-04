<?php  require_once('views/_header.php') ?>

    <div class="error-container">
        <h1>Oups ! Une erreur est survenue</h1>
        <p><strong>Détail de l'erreur :</strong> <?= $errorMsg ?></p>
        <br>
        <a href="index.php" style="color: #721c24; font-weight: bold;">Retour à l'accueil</a>
    </div>

    <?php require_once('views/_footer.php') ?>
</body>
</html>
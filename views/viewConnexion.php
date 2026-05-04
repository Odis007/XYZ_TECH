<?php require_once('views/_header.php'); ?>

    <main class="auth-section">
        <div class="auth-card">
            
            <div class="auth-page-title">
                <h1 class="auth-title">Connexion</h1>
                <p class="auth-subtitle">Accédez à votre espace personnel</p>
            </div>

            <form action="index.php?url=connexion/authentifier" method="POST" class="auth-form">
                <div class="form-div">
                    <label for="email">ADRESSE E-MAIL</label>
                    <input type="email" id="email" name="email" placeholder="exemple@domaine.com" required>
                </div>

                <div class="form-div">
                    <label for="password">MOT DE PASSE</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="auth-options">
                    <a href="#">Mot de passe oublié ?</a>
                </div>

                <div class="auth-button"><button type="submit" class="btn btn-CTA">Se connecter</button></div>
            </form>

            <div class="auth-ou">ou</div>

            <div class="auth-register">
                <p>Pas encore de compte ?</p>
                <a href="index.php?url=inscription" class="btn btn-CTA width-100">Créer un compte</a>
            </div>
        </div>
    </main>

    <?php require_once('views/_footer.php'); ?>

</body>
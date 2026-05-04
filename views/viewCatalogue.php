<?php  require_once('views/_header.php') ?>

    <main class="container section">
        
        <div class="page-title">
            <h1>Notre Catalogue</h1>
            <p>Explorez notre sélection complète de composants haute performance pour votre setup.</p>
        </div>

        <form action="index.php" method="GET" class="filters">
            <input type="hidden" name="url" value="catalogue">
            
            <div class="filter-elements">
                <div class="filter-ctgr">
                    <label for="categorie">Catégorie</label>
                    <select name="categorie" id="categorie" class="filter-input">
                        <option value="">Tous les produits</option>
                        <option value="Cartes Graphiques" <?= (isset($_GET['categorie']) && $_GET['categorie'] === 'Cartes Graphiques') ? 'selected' : '' ?>>Cartes Graphiques</option>
                        <option value="Processeurs" <?= (isset($_GET['categorie']) && $_GET['categorie'] === 'Processeurs') ? 'selected' : '' ?>>Processeurs</option>
                        <option value="Cartes Mères" <?= (isset($_GET['categorie']) && $_GET['categorie'] === 'Cartes Mères') ? 'selected' : '' ?>>Cartes Mères</option>
                        <option value="Mémoire RAM" <?= (isset($_GET['categorie']) && $_GET['categorie'] === 'Mémoire RAM') ? 'selected' : '' ?>>Mémoire RAM</option>
                    </select>
                </div>

                <div class="filter_price">
                    <label for="prix_max">Budget Maximum</label>
                    <input type="number" name="prix_max" id="prix_max" class="filter-input" placeholder="Ex: 800" min="0" step="10" value="<?= isset($_GET['prix_max']) ? htmlspecialchars($_GET['prix_max']) : '' ?>">
                </div>
            </div>

            <div class="filters-actions">
                <a href="index.php?url=catalogue" class="btn btn-outline">Effacer</a>
                <button type="submit" class="btn btn-CTA">Filtrer les résultats</button>
            </div>
        </form>

        <div class="product-catal">
            
            <?php 
                if (isset($produits) && !empty($produits)): 
                    foreach ($produits as $p): 
            ?>
                <div class="card">
                    <div class="card-image"><img src="<?= htmlspecialchars($p -> getImage()) ?>" alt="Image d'un produit"></div>
                    <h3 class="card-title"><?= htmlspecialchars($p->getNom()) ?></h3>
                    <div class="card-category">
                        Année <?= htmlspecialchars($p->getAnnee()) ?> - <?= htmlspecialchars($p->getCategorie()) ?>
                    </div>
                    <div class="card-price">
                        <span><?= number_format($p->getPrix(), 2, ',', ' ') ?> €</span>
                        <a href="index.php?url=product/detail/<?= $p->getId_produit() ?>" class="btn btn-outline">Voir Détails</a>
                    </div>
                </div>

            <?php 
                endforeach; 
            else: 
            ?>
                <div class="default-message">
                    <h3>Aucun produit trouvé</h3>
                    <p>Modifiez vos filtres ou revenez plus tard pour découvrir nos nouveautés.</p>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <?php require_once('views/_footer.php'); ?>
</body>
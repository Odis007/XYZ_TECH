<?php  require_once('views/_header.php') ?>

    <main class="container section">

        <?php 
            if (isset($product) && !empty($product)): 
        ?>
        
            <nav class="path">
                <a href="index.php">Accueil</a>
                <span class="separator">/</span>
                <a href="index.php?url=catalogue">Catalogue</a>
                <span class="separator">/</span>
                <a href="#"><?= htmlspecialchars($product->getCategorie()) ?></a>
                <span class="separator">/</span>
                <span class="current"><?= htmlspecialchars($product->getNom()) ?></span>
            </nav>

            <div class="product-grid">
                
                <div class="product-gallery">
                    <div class="product-image">
                        <span><img src="<?= htmlspecialchars($product -> getImage()) ?>" alt="Image d'un produit"></span>
                    </div>
                    <div class="miniature-list">
                        <div class="miniature  miniature-active">Image 1</div>
                        <div class="miniature">Image 2</div>
                        <div class="miniature">Image 3</div>
                    </div>
                </div>

                <div class="product-info">
                    <div class="product-meta">
                        <span class="badge category-badge">Année <?= htmlspecialchars($product->getAnnee()) ?></span>
                        
                        <?php if ($product->getStock() > 0): ?>
                            <span class="badge stock-badge">En Stock (<?= htmlspecialchars($product->getStock()) ?>)</span>
                        <?php else: ?>
                            <span class="badge stock-badge" style="background-color: #fdeaea; color: #d93025;">Rupture de stock</span>
                        <?php endif; ?>
                    </div>
                    
                    <h1 class="product-title"><?= htmlspecialchars($product->getNom()) ?></h1>
                    <p class="product-reference">Réf: PRODUIT-<?= htmlspecialchars($product->getId_produit()) ?></p>
                    
                    <div class="product-price"><?= number_format($product->getPrix(), 2, ',', ' ') ?> €</div>
                    
                    <p class="product-description">
                        Découvrez les performances exceptionnelles du modèle <?= htmlspecialchars($product->getNom()) ?>. 
                        Conçu pour répondre aux exigences techniques actuelles, ce composant de la catégorie <?= htmlspecialchars($product->getCategorie()) ?> 
                        optimisera votre configuration.
                    </p>

                    <hr class="divider">

                    <div class="purchase-actions">
                        <div class="quantity-selector">
                            <label for="quantity">Quantité</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?= htmlspecialchars($product->getStock()) ?>" 
                            class="quantity-input" <?= ($product->getStock() <= 0) ? 'disabled' : '' ?>>
                        </div>
                        <button class="btn btn-CTA btn-large" <?= ($product->getStock() <= 0) ? 'disabled style="background: #ccc; cursor: not-allowed;"' : '' ?>>
                            Ajouter au panier
                        </button>
                    </div>
                </div>
            </div>

            <div class="product-specs-section">
                <h2 class="specs-title">Caractéristiques Techniques</h2>
                <table class="specs-table">
                    <tbody>
                        <tr>
                            <th>Modèle</th>
                            <td><?= htmlspecialchars($product->getNom()) ?></td>
                        </tr>
                        <tr>
                            <th>Catégorie</th>
                            <td><?= htmlspecialchars($product->getCategorie()) ?></td>
                        </tr>
                        <tr>
                            <th>Année de sortie</th>
                            <td><?= htmlspecialchars($product->getAnnee()) ?></td>
                        </tr>
                        <tr>
                            <th>Date d'ajout catalogue</th>
                            <td>
                                <?php
                                $date = new DateTime($product->getDate_ajout());
                                echo $date->format('d/m/Y'); 
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        <?php 
        else: 
        ?>
            <div style="text-align: center; padding: 5rem 0;">
                <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">Produit introuvable</h1>
                <p class="text-gray-text" style="margin-bottom: 2rem;">L'article que vous recherchez n'existe pas ou a été retiré du catalogue.</p>
                <a href="index.php?url=catalogue" class="btn btn-primary">Retourner au catalogue</a>
            </div>
        <?php endif; ?>
    </main>

    <?php require_once('views/_footer.php'); ?>

</body>

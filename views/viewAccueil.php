<?php  require_once('views/_header.php') ?>

    <main>
        <section class="section-hero">
            <div class="hero-left">
                <h1 class="hero-title">L’Excellence du<br><span class="text-blue">Matériel High-Tech</span></h1>
                <p class="hero-text">Des composants premium soigneusement sélectionnés. Améliorez instantanément votre setup avec notre matériel 
                    testé par des professionnels de l'industrie.
                </p>
                <div class="hero-CTA">
                    <a href="index.php?url=catalogue" class="btn btn-CTA">Découvrir</a>
                    <a href="#" class="btn btn-video"><img src="public/icons/lecture.svg" alt="icone lecture">Voir la vidéo</a>
                </div>
            </div>
            
            <div class="hero-right">
                <div class="hero-blob"></div>
                <div class="hero-image"><img src="public/images/PC Gamer Hero (1) 1.png" alt="PC Gamer"></div>
                
                <div class="hero-badges">
                    <div class="badge">
                        <span class="badge-icon"><img src="public/icons/marque.svg" alt="icone"></span>
                        <div>
                            <span class="badge-val">29</span><br>
                            <span class="badge-lbl">MARQUES</span>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="badge-icon"><img src="public/icons/reference.svg" alt="icone"></span>
                        <div>
                            <span class="badge-val">1322</span><br>
                            <span class="badge-lbl">REFERENCES</span>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="badge-icon"><img src="public/icons/expedition.svg" alt="icone"></span>
                        <div>
                            <span class="badge-val">France</span><br>
                            <span class="badge-lbl">EXPEDITION</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container section">
            <div class="dnr_ajout">
                <h2>Derniers ajouts</h2>
                <p>
                    Découvrez nos dernières acquisitions certifiées haute performance.
                </p>
            </div>
            
            <div class="last_product">
                <?php if(isset($produits) && !empty($produits)): 
                    foreach($produits as $p): 
                ?>
                    <div class="card">
                        <div class="card-image"></div>
                        <h3 class="card-title"><?= htmlspecialchars($p->getNom()) ?></h3>
                        <div class="card-category">Année <?= htmlspecialchars($p->getAnnee()) ?> - <?= htmlspecialchars($p->getCategorie()) ?></div>
                        <div class="card-price">
                            <span><?= number_format($p->getPrix(), 2) ?>€</span>
                            <a href="index.php?url=product/detail/<?= $p->getId_produit() ?>" class="btn btn-card">Voir Détails</a>
                        </div>
                    </div>
                <?php endforeach; else: ?>
                <?php for($i=0; $i<4; $i++): ?>
                    <div class="card">
                        <div class="card-image bg-gray"></div>
                        <h3 class="card-title">Nom du Produit</h3>
                        <div class="card-category">Année 2026-Composant</div>
                        <div class="card-price">
                            <span>199.00€</span>
                            <a href="#" class="btn btn-outline">Voir Détails</a>
                        </div>
                    </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="section section-ecosystem">
            <div class="container">
                <div class="ecosystem-title">
                    <span>Galerie Intuitive</span>
                    <h2>Notre Ecosystème</h2>
                    <p>Continuez de défiler vers le bas pour explorer nos setups.</p>
                </div>
                
                <div class="ecosystem-gallery">
                    <div class="gallery-item fade-in-section delay-1">
                        <img src="" alt="">
                        <h3>Epuré & Performant</h3>
                        <p>L'alliance parfaite de l'esthétique et de la puissance.</p>
                    </div>
                    <div class="gallery-item fade-in-section delay-2">
                        <img src="" alt="">
                        <h3>Immersion Totale</h3>
                        <p>Des couleurs vibrantes pour une expérience ultime</p>
                    </div>
                    <div class="gallery-item fade-in-section delay-3">
                        <img src="" alt="">
                        <h3>Studio Créatif</h3>
                        <p>Conçu sur-mesure pour les professionnels</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container section section-avis">
            <div class="avis-image"></div>
            <div class="avis-content">
                <h2>Avis de nos clients</h2>
                <p id="comment">"La qualité du service est irréprochable. Les composants commandés (RTX 4090 et i9) sont arrivés parfaitement emballés en 24h. Le montage de ma station de travail a pu se faire sans aucun délai. Je recommande XYZ Tech à 100%."</p>
                <div class="client-info">
                    <div class="client-avatar"></div>
                    <div>
                        <strong>Thomas D.</strong><br>
                        <span class="client-role">Ingénieur IA</span><br>
                        <span class="client-stars"><img src="public/icons/etoile.svg" alt="icone"></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="container section">
            <div class="newsletter-section">
                <div class="newsletter-content">
                    <h2>Abonnez-vous à la Newsletter</h2>
                    <p>Recevez nos dernières actualités, les réassorts de cartes graphiques et nos offres exclusives directement dans votre boîte mail.</p>
                </div>
                <form class="newsletter-form">
                    <input type="email" placeholder="Saisissez votre adresse email" required>
                    <button type="submit" class="btn-submit"><img src="public/icons/envoyer.svg" alt="icone"></button>
                </form>
            </div>
        </section>
    </main>

    <?php require_once('views/_footer.php') ?>

    <script>
        document.getElementById('menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });

        document.addEventListener('DOMContentLoaded', () => {
            const menuBtn = document.getElementById('menu-btn');
            if(menuBtn) {
                menuBtn.addEventListener('click', function() {
                    document.querySelector('.nav-links').classList.toggle('active');
                });
            }

            const observerOptions = {
                root: null, 
                rootMargin: '0px',
                threshold: 0.15 
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); 
                    }
                });
            }, observerOptions);

            const elementsToFadeIn = document.querySelectorAll('.fade-in-section');
    
            elementsToFadeIn.forEach(element => {
                observer.observe(element);
                });
        });
    </script>
</body>
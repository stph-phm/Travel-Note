<?php $title = "Homepage" ?>
<?php ob_start(); ?>
    <!---=========================================PART SLIDE=========================================-->
    <div class="slider-container slider1">
        <div class="slider-items">
            <div class="item">
                <img src="Assets/Images/hero.jpg" alt="slide">
                <div class="caption"> Retrouvez ici mes aventures</div>
            </div>

            <div class="item">
                <img src="Assets/Images/image2.jpg" alt="slide">
                <div class="caption"> <a href="index.php?action=listAllArticles">Tous les articles</a></div>
            </div>

            <div class="item">
                <img src="Assets/Images/image3.jpg" alt="slide">
                <div class="caption"> <a href="index.php?action=signIn">Connectez vous</a> </div>
            </div>
        </div>

        <!-- slide controls -->
        <div class="prev-slide">&#8249;</div>

        <div class="next-slide">&#8250;</div>
        <!-- slide controls -->
    </div>

<!--=========================================================LAST ARTICLE-=========================================================-->
<section>
    <div class="section-article">

        <?php foreach ($lastArticle as $listArticle): ?>
        <div class="article-header">
            <h2><?= htmlspecialchars($listArticle['title'])?></h2>
            <p>
                <span><i class="fas fa-user"> &nbsp; </i> Stéphanie Pham | &nbsp;</span>
                <span><i class="fas fa-calendar-alt"> &nbsp; </i> <?= date_format(date_create($listArticle['published_at']), 'd/m/Y') ?> | &nbsp;</span>
                <span><?= htmlspecialchars($listArticle['country']) ?> - <?= htmlspecialchars($listArticle['city']) ?></span>
            </p>
        </div>

        <div class="article-body">
            <?=  nl2br(mb_substr($listArticle['content'], 0, 450)) ?> 

                <a href="index.php?action=article&amp;id=<?= $listArticle['id'] ?>">Lire la suite...</a>

        </div>
        <?php endforeach; ?>
    </div>

    <!--=====================================================-PART ABOUT ME =====================================================-->
    <div class="section-category">
        <div class="about-me">
            <h2>A propos de moi</h2>
            <div class="about-me-img">
                <img src="Assets/Images/6.jpg" alt="photo de l'auteur">
            </div>
            <p>Etudiante en developpement web et voyageuse dans l'âme, jusqu'à ce jours j'ai pu visité plusieurs pays tel que Bali, L'USA, Rome etc.. je partage ici mes aventures </p>
        </div>
        <div class="category"></div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>
<?php $title = "Homepage" ?>
<?php ob_start(); ?>
    <div class="slider-container slider1">
        <div class="slider-items">
            <div class="item">
                <img src="Assets/Images/hero.jpg" alt="slide">
                <div class="caption"> slide 1</div>
            </div>

            <div class="item">
                <img src="Assets/Images/image2.jpg" alt="slide">
                <div class="caption">
                    slide 2
                </div>
            </div>

            <div class="item">
                <img src="Assets/Images/image3.jpg" alt="slide">
                <div class="caption">
                    slide 3
                </div>
            </div>
        </div>

        <!-- slide controls -->
        <div class="prev-slide">&#8249;</div>

        <div class="next-slide">&#8250;</div>
        <!-- slide controls -->
    </div>


<section>
    <div class="section-article">

        <?php foreach ($articles as $listArticle): ?>
        <div class="article-header">
            <h2><?= htmlspecialchars($listArticle['title'])?></h2>
            <p>
                <span><i class="fas fa-user"> &nbsp; </i> Stéphanie Pham | &nbsp;</span>
                <span><i class="fas fa-calendar-alt"> &nbsp; </i> <?= date_format(date_create($listArticle['published_at']), 'd/m/Y') ?> | &nbsp;</span>
                <span><?= htmlspecialchars($listArticle['country']) ?> - <?= htmlspecialchars($listArticle['city']) ?></span>
            </p>
        </div>

        <div class="article-body">
            <p><?=  nl2br(mb_substr($listArticle['content'], 0, 300)) ?> </p>
            <button><a href="index.php?action=article&amp;id=<?= $listArticle['id'] ?>">Lire la suite...</a></button>
        </div>
        <?php endforeach; ?>
    </div>


    <div class="section-category">
        <div class="about-me">
            <h2>A propos de moi</h2>
            <div class="about-me-img">
                <img src="Assets\Images\6.jpg">
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur ipsum ipsa reiciendis voluptates
                dolorum debitis rem odio accusantium, error sit vero, facere, sequi dolore veritatis reprehenderit
                architecto saepe quam. Voluptatum.</p>
        </div>
        <div class="category"></div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>
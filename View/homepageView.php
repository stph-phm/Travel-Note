<?php $title = "hHmepage" ?>
<?php ob_start(); ?>
<div class="slider-container slider1">
    <div class="slider-items">
        <div class="item">
            <img src="Assets/Images/hero.jpg" alt="slide">
            <div class="caption">
                slide 1
            </div>
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
</header>
<section>
    <div class="section-container">
        <?php foreach ($articles as $a): ?>
        <div class="section-header">
            <?= $a['title'] ?>
        </div>
        <div class="section-body">
            <?=  nl2br(mb_substr($a['content'], 0, 300)) ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>
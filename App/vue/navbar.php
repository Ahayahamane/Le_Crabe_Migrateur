<nav>
    <div class="burger fondCanard">
        <p>Menu</p>
        <i class="fa-solid fa-bars"></i>
    </div>

    <ul class="menuPrincipal fondCanard">

        <li class="fondBleuCiel"><a href="?path=accueil">Accueil</a></li>
        <li class="fondBleuCiel"><a href="?path=asso">L'association</a></li>
        <li class="fondBleuCiel"><a href="?path=event_list">Evenements</a></li>
        <li class="fondBleuCiel"><a href="?path=itinerary_list">Itinéraires</a></li>
        <li class="fondBleuCiel">Nous contacter</li>
    </ul>

    <ol class="breadcrumb">
        <?php foreach ($breadcrumb as $index => $crumb): ?>
            <li>
                <?php if ($crumb['label'] || empty($crumb['url'])): ?>
                    <span aria-current="page"><?= htmlspecialchars($crumb['label']) ?></span>
                <?php else: ?>
                    <a href="<?= htmlspecialchars($crumb['url']) ?>"><?= htmlspecialchars($crumb['label']) ?></a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>
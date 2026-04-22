<nav>
    <button id="burger" class="burger fondCanard">
        Menu
        <i class="fa-solid fa-bars"></i>
</button>

    <ul id="menuPrincipal" class="menuPrincipal fondCanard">

        <li class="fondBleuCiel"><a href="?path=accueil">Accueil</a></li>
        <li class="fondBleuCiel"><a href="?path=asso">L'association</a></li>
        <li class="fondBleuCiel"><a href="?path=event_list">Evenements</a></li>
        <li class="fondBleuCiel"><a href="?path=itinerary_list">Itinéraires</a></li>
        <li class="fondBleuCiel"><a href="?path=first_contact_form">Nous contacter</a></li>
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

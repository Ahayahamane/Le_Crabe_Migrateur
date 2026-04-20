<div class="banner">
    <h1>Le Crabe Migrateur <br> L'aventure ne se fait pas en ligne droite.</h1>
    <p>
        Bienvenue chez Le Crabe Migrateur,
        où l'on préfère les détours aux chemins battus.
        Ici, chaque randonnée est une invitation à marcher
        de côté pour mieux voir le monde. Nous guidons les
        curieux vers des sentiers sauvages, loin de la foule
        et de la hâte. Parce que l'aventure ne se mesure pas
        à la vitesse, mais à la singularité du parcours.
        Rejoignez notre tribu de marcheurs et redécouvrez
        la nature, autrement.
    </p>
</div>
<div class="content">
    <div class="events">
        <div class="slider-box">
            <h2>Nos derniers événements organisé</h2>
            <p>
                Retrouvez ici nos dernières sorties organisées en groupe.<br>
                Venez y participer si l'envie vous en prend
            </p>

            <div class="slider">

                <div class="slide active" data-index="0">

                    <h2 class="slide-title"><?= $datas["event"][0]->get("title") ?></h2>
                    <picture class="slide-image">
                        <img src="public/img/randoneur1.jpg" alt="Slide 1"> <!-- voir media pour source en fonction de media-->
                    </picture>
                    <p class="summary">
                        <?= $datas["event"][0]->get("summary") ?>
                    </p>
                </div>

                <div class="slide active main" data-index="1">
                    <h2 class="slide-title"><?= $datas["event"][1]->get("title") ?></h2>
                    <picture class="slide-image">
                        <img src="public/img/randoneur2.jpg" alt="Slide 2"> <!-- voir media pour source en fonction de media-->
                    </picture>
                    <p class="summary">
                        <?= $datas["event"][1]->get("summary") ?>
                    </p>
                </div>

                <div class="slide active last" data-index="2">
                    <h2 class="slide-title"><?= $datas["event"][2]->get("title") ?></h2>
                    <picture class="slide-image">
                        <img src="public/img/randoneur3.jpg" alt="Slide 3"> <!-- voir media pour source en fonction de media-->
                    </picture>
                    <p class="summary">
                        <?= $datas["event"][2]->get("summary") ?>
                    </p>
                </div>

                <div class="slide hidden" data-index="3">
                    <h2 class="slide-title"><?= $datas["event"][3]->get("title") ?></h2>
                    <picture class="slide-image">
                        <img src="public/img/randoneur3.jpg" alt="Slide 4"> <!-- voir media pour source en fonction de media-->
                    </picture>
                    <p class="summary">
                        <?= $datas["event"][3]->get("summary") ?>
                    </p>
                </div>

                <div class="slide hidden" data-index="4">
                    <h2 class="slide-title"><?= $datas["event"][3]->get("title") ?></h2>
                    <picture class="slide-image">
                        <img src="public/img/randoneur3.jpg" alt="Slide 5"> <!-- voir media pour source en fonction de media-->
                    </picture>
                    <p class="summary">
                        <?= $datas["event"][4]->get("summary") ?>
                    </p>
                </div>

            </div>

        </div>
        <div class="buttons">
            <button class="left"><-< /button>
                    <button class="right">-></button>
        </div>
    </div>
    <div class="side">
        <div class="weather-container">
            <!-- Météo Actuelle -->
            <div class="weather-current">
                <div class="weather-icon" id="weather-icon">⛅</div>
                <div class="text">
                    <div class="temperature" id="current-temp">--°C</div>
                    <div class="location" id="location">Quimper, France</div>
                    <div class="condition" id="condition">Partiellement nuageux</div>
                </div>
            </div>

            <!-- Détails Supplémentaires -->
            <div class="weather-details">
                <div class="detail-item">
                    <span class="detail-label">Vent</span>
                    <span class="detail-value" id="wind-speed">-- km/h</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Direction</span>
                    <span class="detail-value" id="wind-dir">--°</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Précipitations</span>
                    <span class="detail-value" id="precip-prob">--%</span>
                </div>
            </div>

            <!-- Prévisions Horaires -->
            <div class="weather-hourly">
                <h3>Aujourd'hui</h3>
                <div class="hourly-scroll" id="hourly-forecast">
                    <!-- Généré par JS -->
                </div>
            </div>
        </div>
        <div class="itinerary">
            <h2>Nos dérnier itinéraires</h2>
            <?php for ($i = 0; $i < count($datas['itinerary']); $i++): ?>
                <p>
                    <a href="#"><?= $datas['itinerary'][$i]->get('title') ?></a>
                    <?= $datas['itinerary'][$i]->get('start') ?>
                </p>
            <?php endfor ?>
        </div>
    </div>
</div>
<script src="public/js/weather.js"></script>
<script src="public/js/slider.js"></script>
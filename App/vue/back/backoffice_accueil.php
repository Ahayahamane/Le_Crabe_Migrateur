<section id="choice">
    <button class="fondVertClair"><a href="?path=first_new_event">Créer un événement</a></button>
    <button class="fondVertClair"><a href="?path=first_new_itinerary">Créer un itinéraire</a></button>
    <?php if (!empty($_SESSION) && ($_SESSION['user']->get('role') > 2)): ?>
        <button class="fondVertSombre"><a href="#">Modération</a></button>
    <?php endif ?>

</section>
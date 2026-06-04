<section class="content"><!-- section principale -->
    <section class="contacts fondCanard"><!-- sous-section information -->
        <div class="phone fondVertClair">
            <i class="fa-solid fa-phone"></i>
            <p id="phone_num">n° telephone: 06 55 55 55 55</p>
            <p id="open">du Lundi au Vendredi de 10h à 18h</p>
        </div>
        <div class="address fondVertClair">
            <i class="fa-solid fa-house-chimney-user"></i>
            <p id="add">25 rue du Général Julien<br>56100 LORIENT</p>
            <p id="open">Ouvert le Mardi,Jeudi et Vendredi de 10h à 18h</p>
        </div>
        <div class="social">
            <div class="facebook fondVertClair">
                <a href=""><i class="fab fa-facebook"></i></a>
            </div>
            <div class="tweeter fondVertClair">
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </section>
    <section class="message fondCanard"><!-- sous-section formulaire de contact -->
        <form method="POST" action="?path=contact_form">

            <div id="firstname" class="fondVertClair">
                <label>Prénom</label>
                <input type="text" name="firstname" <?php if (!empty($_POST["firstname"])): ?>
                    value=<?= $_POST["firstname"] ?>
                    <?php endif ?>>
                <?php
                if (isset($datas['firstname'])) {
                    foreach ($datas['firstname'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div id="name" class="fondVertClair">
                <label>Nom</label>
                <input type="text" name="name" <?php if (!empty($_POST["name"])): ?>
                    value=<?= $_POST["name"] ?>
                    <?php endif ?>>
                <?php
                if (isset($datas['name'])) {
                    foreach ($datas['name'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div id="email" class="fondVertClair">
                <label>votre adresse mail</label>
                <input type="text" name="email" <?php if (!empty($_POST["email"])): ?>
                    value=<?= $_POST["email"] ?>
                    <?php endif ?>>
                <?php
                if (isset($datas['email'])) {
                    foreach ($datas['email'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div id="subject" class="fondVertClair">
                <label>Sujet du message</label>
                <input type="text" name="subject" <?php if (!empty($_POST["subject"])): ?>
                    value=<?= $_POST["subject"] ?>
                    <?php endif ?>>
                <?php
                if (isset($datas['subject'])) {
                    foreach ($datas['subject'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div id="content" class="fondVertClair">
                <label>Votre message</label>
                <input type="text" name="content" id="content" <?php if (!empty($_POST["content"])): ?>
                    value=<?= $_POST["content"] ?>
                    <?php endif ?>>
                <?php
                if (isset($datas['content'])) {
                    foreach ($datas['content'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <input type="submit" name="envoyer">
        </form>   
    </section>
</section>
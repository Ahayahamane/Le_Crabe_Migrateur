<section id="new_account">
    <form class="fondCanard" method="POST" action="?path=register">
        <div class="fields-box">
            <div id="mail" class="field fondVertClair">
                <label>Votre adresse mail</label>
                <input type="text" name="email" placeholder="Votre e-mail"
                    <?php if (!empty($_POST["email"])): ?>
                    value=<?= $_POST["email"] ?>
                    <?php endif ?>>
                <?php
                if (!empty($datas['errors']['email'])) {
                    foreach ($datas['errors']['email'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div class="field fondVertClair">
                <label>Votre psedonyme </label>
                <input type="text" name="psedonym" placeholder="Votre psedo"
                    <?php if (!empty($_POST["psedonym"])): ?>
                    value=<?= $_POST["psedonym"] ?>
                    <?php endif ?>>
                <?php
                if (!empty($datas['errors']['psedonym'])) {
                    foreach ($datas['errors']['psedonym'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div class="field fondVertClair">
                <label>Votre prénom</label>
                <input type="text" name="firstname" placeholder="Votre prénom"
                    <?php if (!empty($_POST["firstname"])): ?>
                    value=<?= $_POST["firstname"] ?>
                    <?php endif ?>>
                <?php

                if (!empty($datas['errors']['firstname'])) {
                    foreach ($datas['errors']['firstname'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div class="field fondVertClair">
                <label>Votre nom</label>
                <input type="text" name="name" placeholder="Votre nom"
                    <?php if (!empty($_POST["name"])): ?>
                    value=<?= $_POST["name"] ?>
                    <?php endif ?>>
                <?php
                if (!empty($datas['errors']['name'])) {
                    foreach ($datas['errors']['name'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
            <div class="field fondVertClair">
                <label>Votre mot de passe</label>
                <input type="password" name="password" placeholder="Votre mot de passe"
                    <?php if (!empty($_POST["password"])): ?>
                    value=<?= $_POST["password"] ?>
                    <?php endif ?>>
                <?php
                if (!empty($datas['errors']['password'])) {
                    foreach ($datas['errors']['password'] as $data) {
                        echo ("<br><span class='error'>" . $data . "</span>");
                    }
                } ?>
            </div>
        </div>
        <input class="button fondVertClair" type="submit" name="register" value="S'enregistrer">
    </form>
</section>
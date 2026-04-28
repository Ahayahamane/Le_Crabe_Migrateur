    <meta charset="UTF-8">
    <!-- Responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mots-clés -->
    <?php if (!empty($datas["meta"]["keywords"])): ?>
        <meta name="keywords" content="<?= $datas["meta"]["keywords"] ?>">
    <?php endif ?>
    <!-- Description affichée dans les résultats Google -->
    <?php if (!empty($datas["meta"]["description"])): ?>
        <meta name="description" content="<?= $datas["meta"]["description"] ?>">
    <?php endif ?>

    <title><?= $datas["meta"]["title"] ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fonts -->
    

    <?= $datas["links"] ?>
    <?php if (isset($datas["script"])) {
        $datas["script"];
    } ?>
    <script defer src="public/js/interactiveMessage.js"></script>
    <script defer src="public/js/burger.js"></script>
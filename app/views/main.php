<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>
<body>
    <h2>PHP PRO</h2>
    <div>
    <?php
        require VIEWS.$returnView;
    ?>
    </div>
</body>
</html>
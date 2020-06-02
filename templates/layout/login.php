<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Multigraph | Área do cliente.</title>
    <meta name="description" content="Area exclusiva de clientes Multigraph" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <?= $this->Html->css('/css/style.css') ?>
    <?= $this->Html->css('/css/custom.css') ?>

</head>

<body>

    <?= $this->fetch('content') ?>

    <?= $this->Html->script('/plugins/jquery/dist/jquery.min.js');?>
    <?= $this->Html->script('/plugins/popper.js/dist/umd/popper.min.js');?>
    <?= $this->Html->script('/plugins/bootstrap/dist/js/bootstrap.min.js');?>
    <?= $this->Html->script('/plugins/owl.carousel/dist/owl.carousel.min.js');?>

    <?= $this->Html->script('/js/jquery.slimscroll.js');?>
    <?= $this->Html->script('/js/jquery.slimscroll.js');?>
    <?= $this->Html->script('/js/dropdown-bootstrap-extended.js');?>
    <?= $this->Html->script('/js/feather.min.js');?>
    <?= $this->Html->script('/js/init.js');?>
    <?= $this->Html->script('/js/login-data.js');?>
    <?= $this->Html->script('/js/panel/utills.js');?>

</body>

</html>
<!DOCTYPE html><html lang="en"><head>    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php echo $this->Html->script('/js/jsPDF/dist/jspdf.min.js') ?>
    <?php echo $this->Html->script('/js/html2canvas/dist/html2canvas.min.js') ?>
    <link href="https://fonts.googleapis.com/css?family=Source Sans Pro" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Archivo Black" rel="stylesheet" />

    <title>Card - JS</title>

    <style>
     body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #333;
            height: 100%;
            padding-bottom: 20px;
        }
        
        .print {
            background-color: transparent;
            border: 1px solid #fff;
            font-size: 20px;
            padding: 10px 30px;
            margin: 40px;
            color: #fff;
            transition: 300ms;
        }
        
        .print:hover {
            cursor: pointer;
            background-color: #fff;
            color: #333;
        }

    </style>

    <?= $this->Html->css('templates' . $cartao->css) ?>

</head>

<body>
    <button class="print">Gerar</button>

    <?php echo $this->element('templates\cartoes' . $cartao->html) ?>

    <?php echo $this->Html->script('/js/pdf.js') ?>
    
</body>

</html>


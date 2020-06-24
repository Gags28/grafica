<div id="canvas">
    <div id="card" class="card-container">

        <?php
        foreach ($produto['campos'] as $campo) {
            echo '<input type="text" id="' . $campo['nome'] . '" value="' . $campo['valor'] . '" />';
        }
        ?>

        <?php echo $this->Html->image('/img/cartoes/cartao-sem-texto.jpg') ?>
    </div>
</div>

<div id="canvas2">
    <div id="card2" class="card-container">
        <?php echo $this->Html->image('/img/cartoes/cartao-fundo.jpg') ?>
    </div>
</div>
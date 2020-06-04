<nav class="pagination-wrap justify-content-end mb-25" aria-label="Page navigation example">
    <ul class="pagination">
        <?= $this->Paginator->prev('Anterior') ?>
        <div class="numbers">
            <?= $this->Paginator->numbers() ?>
        </div>
        <?= $this->Paginator->next('Próximo') ?>
    </ul>
</nav>
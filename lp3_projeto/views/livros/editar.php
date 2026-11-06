<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Produto</h3>
        </div>

        <form action="/lp3_projeto/produtos/editar?id=<?= $dado['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="produto">Produto</label>
                <input type="text" id="produto" name="produto" value="<?= htmlspecialchars($dado['produto']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" step="0.01" id="valor" name="valor" value="<?= htmlspecialchars($dado['valor']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select id="categoria" name="categoria" required class="form-select">
                    <option value="">Selecione uma categoria</option>
                    <?php foreach ($categorias as $categoria) { ?>
                        <option <?= $dado['categoria_id'] == $categoria['id'] ? 'selected' : '' ?> value="<?= $categoria['id'] ?>"><?= htmlspecialchars($categoria['categoria']) ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required class="form-control"><?= htmlspecialchars($dado['descricao']) ?></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/produtos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
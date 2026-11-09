<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Livro</h3>
        </div>

        <form action="/lp3_projeto/livros/editar?id=<?= $dado['id'] ?>" method="POST" class="card-form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($dado['titulo']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($dado['autor']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="isbn">Isbn:</label>
                <input type="number" step="1" id="isbn" name="isbn" value="<?= htmlspecialchars($dado['isbn']) ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="number" step="1" id="ano_publicacao" name="ano_publicacao" value="<?= htmlspecialchars($dado['ano_publicacao']) ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label for="sinopse">Sinopse:</label>
                <input type="text" name="sinopse" id="sinopse" value="<?= htmlspecialchars($dado['sinopse']) ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="capa">Capa:</label>
                <input type="file" id="capa" name="capa" value="<?= htmlspecialchars($dado['capa']) ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="id_genero">Gênero:</label>
                <select id="id_genero" name="id_genero" required class="form-select">
                    <option value="">Selecione um gênero</option>
                    <?php foreach ($generos as $genero) { ?>
                        <option <?= $dado['id_genero'] == $genero['id'] ? 'selected' : '' ?> value="<?= $genero['id'] ?>"><?= htmlspecialchars($genero['nome']) ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="criado_em">Data de Criação:</label>
                <input type="date" id="criado_em" name="criado_em" value="<?= ($dado['criado_em']) ?>" class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/livros" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
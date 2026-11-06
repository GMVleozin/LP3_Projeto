<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Livro</h3>
        </div>

        <form action="/lp3_projeto/livros/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required class="form-control">
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required class="form-control">
            </div>

            <div class="form-group">
                <label for="isbn">Isbn:</label>
                <input type="text" id="isbn" name="isbn" class="form-control">
            </div>

            <div class="form-group">
                <label for="ano_publicacao">Ano de Publicação:</label>
                <input type="number" step="1" id="ano_publicacao" name="ano_publicacao" class="form-control">
            </div>

            <div class="form-group">
                <label for="sinopse">Sinopse:</label>
                <input type="text" id="sinopse" name="sinopse" class="form-control">
            </div>

            <div class="form-group">
                <label for="capa">Capa:</label>
                <input type="text" id="capa" name="capa" class="form-control">
            </div>

            <div class="form-group">
                <label for="id_genero">Gênero:</label>
                <select id="id_genero" name="id_genero" required class="form-select">
                    <option value="">Selecione um gênero</option>
                    <?php foreach ($generos as $genero) { ?>
                        <option value="<?= $genero['id'] ?>"><?= htmlspecialchars($genero['nome']) ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="criado_em">Criado em:</label>
                <input type="text" id="criado_em" name="criado_em" class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/livros" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Filme</h3>
        </div>

        <form action="/lp3_projeto/filmes/adicionar" method="POST" class="card-form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="filme">Filme:</label>
                <input type="text" id="filme" name="filme" required class="form-control">
            </div>

            <div class="form-group">
                <label for="diretor">Diretor:</label>
                <input type="text" id="diretor" name="diretor" required class="form-control">
            </div>

            <div class="form-group">
                <label for="duracao">Duração:</label>
                <input type="number" step="1" id="duracao" name="duracao" required class="form-control">
            </div>

            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem" class="form-control">
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/filmes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
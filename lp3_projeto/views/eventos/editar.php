<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Evento</h3>
        </div>

        <form action="/lp3_projeto/eventos/editar?id=<?= $evento['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($evento['titulo']) ?>" required
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="email" name="descricao" value="<?= htmlspecialchars($evento['descricao']) ?>" required
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="local_evento">Local:</label>
                <input type="text" id="local_evento" name="local_evento" required class="form-control" value="<?= htmlspecialchars($evento['local_evento']) ?>">
            </div>

            <div class="form-group">
                <label for="data_evento">Data:</label>
                <input type="date" id="data_evento" name="data_evento" required class="form-control" value="<?= htmlspecialchars($evento['data_evento']) ?>">
            </div>

            <div class="form-group">
                <label for="capacidade">Capacidade:</label>
                <input type="number" id="capacidade" name="capacidade" step="1" required class="form-control" value="<?= htmlspecialchars($evento['capacidade']) ?>">
            </div>

            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <?php 
                if ($evento['ativo'] === 1) {
                    $ativoSelecionado = 1;
                } elseif ($evento['ativo'] === 0) {
                    $ativoSelecionado = 0;
                }
                ?>
                <select id="ativo" name="ativo" required class="form-control">
                    <option value="">Selecione</option>
                    <option value= 1 <?= $ativoSelecionado === 1 ? 'selected' : '' ?>>Ativo</option>
                    <option value= 0 <?= $ativoSelecionado === 0 ? 'selected' : '' ?>>Inativo</option>
                </select>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/eventos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
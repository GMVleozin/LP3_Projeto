<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Evento</h3>
        </div>

        <form action="/lp3_projeto/eventos/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required class="form-control">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" required class="form-control">
            </div>

            <div class="form-group">
                <label for="local_evento">Local:</label>
                <input type="text" id="local_evento" name="local_evento" required class="form-control">
            </div>

            <div class="form-group">
                <label for="data_evento">Data:</label>
                <input type="date" id="data_evento" name="data_evento" required class="form-control">
            </div>

            <div class="form-group">
                <label for="capacidade">Capacidade:</label>
                <input type="number" id="capacidade" name="capacidade" required class="form-control">
            </div>

            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select id="ativo" name="ativo" required class="form-control">
                    <option value="">Selecione</option>
                    <option value= 1 >Ativo</option>
                    <option value= 0 >Inativo</option>
                </select>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/eventos" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
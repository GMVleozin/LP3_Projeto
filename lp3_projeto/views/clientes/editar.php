<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Editar Cliente</h3>
        </div>

        <form action="/lp3_projeto/clientes/editar?id=<?= $cliente['id'] ?>" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required class="form-control" value="<?= htmlspecialchars($cliente['cpf']) ?>" placeholder="Ex: 123.456.789-00">
            </div>

            <div class="form-group">
                <label for="salario">Salário:</label>
                <input type="number" id="salario" name="salario" step="0.01" required class="form-control" value="<?= htmlspecialchars($cliente['salario']) ?>" placeholder="Ex: 2500.00">
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>

                <?php 
                if ($cliente['sexo'] === 'M') {
                    $sexoSelecionado = 'M';
                } elseif ($cliente['sexo'] === 'F') {
                    $sexoSelecionado = 'F';
                } elseif ($cliente['sexo'] === 'N') {
                    $sexoSelecionado = 'N';
                } else {
                    $sexoSelecionado = 'O';
                }
                ?>
                <select id="sexo" name="sexo" required class="form-control">
                    <option value="">Selecione</option>
                    <option value="M" <?= $sexoSelecionado === 'M' ? 'selected' : '' ?>>Masculino</option>
                    <option value="F" <?= $sexoSelecionado === 'F' ? 'selected' : '' ?>>Feminino</option>
                    <option value="N" <?= $sexoSelecionado === 'N' ? 'selected' : '' ?>>Prefiro não dizer</option>
                    <option value="O" <?= $sexoSelecionado === 'O' ? 'selected' : '' ?>>Outro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data de Nascimento:</label>
                <input type="date" id="data" name="data" required class="form-control" value="<?= htmlspecialchars($cliente['data']) ?>">
            </div>

            <div class="form-group">
                <label for="obs">Observações:</label>
                <textarea id="obs" name="obs" class="form-control" placeholder="Ex: Cliente desde 2020"><?= htmlspecialchars($cliente['obs']) ?></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Atualizar</button>
                <a href="/lp3_projeto/clientes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Cadastrar Novo Cliente</h3>
        </div>

        <form action="/lp3_projeto/clientes/adicionar" method="POST" class="card-form">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required class="form-control" placeholder="Ex: João Silva">
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required class="form-control" placeholder="Ex: joao@email.com">
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required class="form-control" placeholder="Ex: 123.456.789-00">
            </div>

            <div class="form-group">
                <label for="salario">Salário:</label>
                <input type="number" id="salario" name="salario" step="0.01" required class="form-control" placeholder="Ex: 2500.00">
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required class="form-control">
                    <option value="">Selecione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                    <option value="O">Outro</option>
                        <option value= "N">Prefiro não dizer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data">Data de Nascimento:</label>
                <input type="date" id="data" name="data" required class="form-control">
            </div>

            <div class="form-group">
                <label for="obs">Observações:</label>
                <textarea id="obs" name="obs" class="form-control" placeholder="Ex: Cliente desde 2020"></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/lp3_projeto/clientes" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
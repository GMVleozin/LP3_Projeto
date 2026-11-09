<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="page-layout">
    <?php include __DIR__ . '/../layout/nav.php'; ?>

    <div class="content-panel">
        <div class="header-action">
            <h3>Eventos Cadastrados</h3>
            <a href="/lp3_projeto/eventos/adicionar" class="btn btn-success btn-sm">+ Novo Evento</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Local</th>
                    <th>Data</th>
                    <th>Capacidade</th>
                    <th>Ativo</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($eventos)): ?>
                    <?php foreach ($eventos as $evento): ?>
                        <tr>
                            <td><?= $evento['id'] ?></td>
                            <td><?= htmlspecialchars($evento['titulo']) ?></td>
                            <td><?= htmlspecialchars($evento['descricao']) ?></td>
                            <td><?= htmlspecialchars($evento['local_evento']) ?></td>
                            <td><?= htmlspecialchars($evento['data_evento']) ?></td>
                            <td><?= htmlspecialchars($evento['capacidade']) ?></td>
                            <td><?= htmlspecialchars($evento['ativo']) ?></td>

                            <td class="text-center">
                                <a href="/lp3_projeto/eventos/editar?id=<?= $evento['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/lp3_projeto/eventos/excluir?id=<?= $evento['id'] ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Tem certeza que deseja excluir este evento?');">
                                   Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" style="text-align: center;">Nenhum evento cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
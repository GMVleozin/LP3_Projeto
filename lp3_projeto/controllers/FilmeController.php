<?php
class FilmeController
{
    private $model;

    public function __construct()
    {
        $this->model = new Filme();
    }

    public function index()
    {
        $filmes = $this->model->listar();
        require __DIR__ . '/../views/filmes/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filme = filter_input(INPUT_POST, 'filme', FILTER_SANITIZE_SPECIAL_CHARS);
            $diretor = filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_SPECIAL_CHARS);
            $duracao = filter_input(INPUT_POST, 'duracao', FILTER_VALIDATE_INT);

            if ($filme && $diretor) {
                $imagem = $this->processarImagem($_FILES['imagem']  ?? null);
                $this->model->salvar($filme, $diretor, $duracao, $imagem);
                header('Location: /lp3_projeto/filmes');
                exit();
            }
        }

        require __DIR__ . '/../views/filmes/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /lp3_projeto/filmes');
            exit;
        }

        $dado = $this->model->buscarPorId($id);

        if (!$dado) {
            header('Location: /lp3_projeto/filmes');
            exit;
        }

        // Verifica se house post e faz a gravação dos dados no banco
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filme = filter_input(INPUT_POST, 'filme', FILTER_SANITIZE_SPECIAL_CHARS);
            $diretor = filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_SPECIAL_CHARS);
            $duracao = filter_input(INPUT_POST, 'duracao', FILTER_VALIDATE_INT);
           
            if ($filme && $diretor ) {
                $imagem = $this->processarImagem($_FILES['imagem']  ?? null, $dado['imagem']);
                $this->model->atualizar($id, $filme, $diretor, $duracao, $imagem);
                header('Location: /lp3_projeto/filmes');
                exit;
            }
        }

        require __DIR__ . '/../views/filmes/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $this->model->excluir($id);
        }

        header('Location: /lp3_projeto/filmes');
        exit;

    }

    private function processarImagem($arquivo, ?string $imagemAtual = null): ?string {
        // Verifica se o arquivo foi enviado
        if (!isset($arquivo) || empty($arquivo['name'])) {
            return $imagemAtual;
        }

        // Confere se não houve erro no upload
        if ($arquivo['error'] !== UPLOAD_ERR_OK) {
            return $imagemAtual;
        }

        // Permite apenas imagens válidas
        $permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($arquivo['type'], $permitidos, true)) {
            return $imagemAtual;
        }

        // Cria a pasta de upload, se necessário
        $diretorio = __DIR__ . '/../uploads/filmes';
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        // Gera nome único para a imagem
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $nomeArquivo = time() . '_' . uniqid() . '.' . strtolower($extensao);
        $destino = $diretorio . '/' . $nomeArquivo;

        // Move a imagem para a pasta e remove a antiga, se existir
        if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
            if ($imagemAtual && file_exists($diretorio . '/' . $imagemAtual)) {
                unlink($diretorio . '/' . $imagemAtual);
            }
            return $nomeArquivo;
        }

        // Se falhar, mantém a imagem atual
        return $imagemAtual;
    }
}

?>
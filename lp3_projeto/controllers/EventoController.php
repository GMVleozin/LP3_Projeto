<?php
class EventoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Evento();
    }

    public function index()
    {
        $eventos = $this->model->listar();
        require __DIR__ . '/../views/eventos/index.php';
    }

    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $local_evento = filter_input(INPUT_POST, 'local_evento', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_evento = filter_input(INPUT_POST, 'data_evento', FILTER_SANITIZE_SPECIAL_CHARS);
            $capacidade = filter_input(INPUT_POST, 'capacidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_NUMBER_INT);

            if ($titulo != "") {
                $this->model->salvar($titulo, $descricao, $local_evento, $data_evento, $capacidade, $ativo);
                header('Location: /lp3_projeto/eventos');
                exit();
            }
        }

        require __DIR__ . '/../views/eventos/criar.php';
    }

    public function editar()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /lp3_projeto/eventos');
            exit;
        }

        // Verifica se house post e faz a gravação dos dados no banco
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $local_evento = filter_input(INPUT_POST, 'local_evento', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_evento = filter_input(INPUT_POST, 'data_evento', FILTER_SANITIZE_SPECIAL_CHARS);
            $capacidade = filter_input(INPUT_POST, 'capacidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_NUMBER_INT);

            if ($titulo) {
                $this->model->atualizar($id, $titulo, $descricao, $local_evento, $data_evento, $capacidade, $ativo);
                header('Location: /lp3_projeto/eventos');
                exit();
            }
        }

        // Busca dados do cliente selecionado e carrega tela com os dados
        $evento = $this->model->buscarPorId($id);

        if (!$evento) {
            header('Location: /lp3_projeto/eventos');
            exit;
        }

        require __DIR__ . '/../views/eventos/editar.php';
    }

    public function excluir()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $this->model->excluir($id);
        }

        header('Location: /lp3_projeto/eventos');
        exit;

    }
}

?>
<?php
require_once __DIR__ . '/../config/Database.php';

class Evento
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM eventos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $titulo, string $descricao, string $local_evento, string $data_evento, int $capacidade, int $ativo)
    {
        $sql = "INSERT INTO eventos (titulo, descricao, local_evento, data_evento, capacidade, ativo) VALUES (:titulo, :descricao, :local_evento, :data_evento, :capacidade, :ativo)";
        $stmt = $this->db->prepare($sql);
        $values = [     
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':local_evento' => $local_evento,
            ':data_evento' => $data_evento,
            ':capacidade' => $capacidade,
            ':ativo' => $ativo,
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $titulo, string $descricao, string $local_evento, string $data_evento, int $capacidade, int $ativo)
    {
        $sql = "UPDATE eventos SET titulo = :titulo, descricao = :descricao, local_evento = :local_evento, data_evento = :data_evento, capacidade = :capacidade, ativo = :ativo WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':local_evento' => $local_evento,
            ':data_evento' => $data_evento,
            ':capacidade' => $capacidade,
            ':ativo' => $ativo,
            ':id' => $id
        ];
        return $stmt->execute($values);
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT * FROM eventos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        $stmt->execute($values);
        return $stmt->fetch();
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM eventos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        return $stmt->execute($values);
    }
}
?>
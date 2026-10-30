<?php
require_once __DIR__ . '/../config/Database.php';

class Genero
{
    private $db;
    private $table = 'generos';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table ORDER BY id ASC");
        return $stmt->fetchAll();
    }

    public function salvar(string $nome, string $descricao)
    {
        $sql = "INSERT INTO $this->table (nome, descricao) VALUES (:nome, :descricao)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':descricao' => $descricao
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $nome, string $descricao)
    {
        $sql = "UPDATE $this->table SET nome = :nome, descricao = :descricao WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':id' => $id
        ];
        return $stmt->execute($values);
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        $stmt->execute($values);
        return $stmt->fetch();
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        return $stmt->execute($values);
    }
}
?>
<?php
require_once __DIR__ . '/../config/Database.php';

class Produto
{
    private $db;
    private $table = 'produtos';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $produto, float $valor, int $categoria_id, string $descricao)
    {
        $sql = "INSERT INTO $this->table (produto, valor, categoria_id, descricao) VALUES (:produto, :valor, :categoria_id, :descricao)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':produto' => $produto,
            ':valor' => $valor,
            ':categoria_id' => $categoria_id,
            ':descricao' => $descricao
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $produto, float $valor, int $categoria_id, string $descricao)
    {
        $sql = "UPDATE $this->table SET produto = :produto, valor = :valor, categoria_id = :categoria_id, descricao = :descricao WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':produto' => $produto,
            ':valor' => $valor,
            ':categoria_id' => $categoria_id,
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
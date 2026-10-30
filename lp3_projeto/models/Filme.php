<?php
require_once __DIR__ . '/../config/Database.php';

class Filme
{
    private $db;
    private $table = 'filmes';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $filme, string $diretor, int $duracao, string $imagem)
    {
        $sql = "INSERT INTO $this->table (filme, diretor, duracao, imagem) VALUES (:filme, :diretor, :duracao, :imagem)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':filme' => $filme,
            ':diretor' => $diretor,
            ':duracao' => $duracao,
            ':imagem' => $imagem
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $filme, string $diretor, int $duracao, string $imagem)
    {
        $sql = "UPDATE $this->table SET filme = :filme, diretor = :diretor, duracao = :duracao, imagem = :imagem WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':filme' => $filme,
            ':diretor' => $diretor,
            ':duracao' => $duracao,
            ':imagem' => $imagem,
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
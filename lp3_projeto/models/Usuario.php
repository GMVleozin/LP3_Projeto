<?php
require_once __DIR__ . '/../config/Database.php';

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM usuarios ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $nome, string $email)
    {
        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':email' => $email
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $nome, string $email)
    {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':email' => $email,
            ':id' => $id
        ];
        return $stmt->execute($values);
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        $stmt->execute($values);
        return $stmt->fetch();
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        return $stmt->execute($values);
    }
}
?>
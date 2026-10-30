<?php
require_once __DIR__ . '/../config/Database.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM clientes ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $nome, string $email, string $cpf, float $salario, string $sexo, string $data, string $obs)
    {
        $sql = "INSERT INTO clientes (nome, email, cpf, salario, sexo, data, obs) VALUES (:nome, :email, :cpf, :salario, :sexo, :data, :obs)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':email' => $email,
            ':cpf' => $cpf,
            ':salario' => $salario,
            ':sexo' => $sexo,
            ':data' => $data,
            ':obs' => $obs
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $nome, string $email, string $cpf, float $salario, string $sexo, string $data, string $obs)
    {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, cpf = :cpf, salario = :salario, sexo = :sexo, data = :data, obs = :obs WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':nome' => $nome,
            ':email' => $email,
            ':cpf' => $cpf,
            ':salario' => $salario,
            ':sexo' => $sexo,
            ':data' => $data,
            ':obs' => $obs,
            ':id' => $id
        ];
        return $stmt->execute($values);
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        $stmt->execute($values);
        return $stmt->fetch();
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [':id' => $id];
        return $stmt->execute($values);
    }
}
?>
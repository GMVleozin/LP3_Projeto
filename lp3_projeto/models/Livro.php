<?php
require_once __DIR__ . '/../config/Database.php';

class Livro
{
    private $db;
    private $table = 'livros';

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function salvar(string $titulo, string $autor, string $isbn, int $ano_publicacao, string $sinopse, string $capa, int $id_genero, string $criado_em)
    {
        $sql = "INSERT INTO $this->table (titulo, autor, isbn, ano_publicacao, sinopse, capa, id_genero, criado_em) VALUES (:titulo, :autor, :isbn, :ano_publicacao, :sinopse, :capa, :id_genero, :criado_em)";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':isbn' => $isbn,
            ':ano_publicacao' => $ano_publicacao,
            ':sinopse' => $sinopse,
            ':capa' => $capa,
            ':id_genero' => $id_genero,
            ':criado_em' => $criado_em,
        ];
        return $stmt->execute($values);
    }

    public function atualizar(int $id, string $titulo, string $autor, string $isbn, int $ano_publicacao, string $sinopse, string $capa, int $id_genero, string $criado_em)
    {
        $sql = "UPDATE $this->table SET titulo = :titulo, autor = :autor, isbn = :isbn, ano_publicacao = :ano_publicacao, sinopse = :sinopse, capa = :capa, id_genero = :id_genero, criado_em = :criado_em WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $values = [
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':isbn' => $isbn,
            ':ano_publicacao' => $ano_publicacao,
            ':sinopse' => $sinopse,
            ':capa' => $capa,
            ':id_genero' => $id_genero,
            ':criado_em' => $criado_em,
            ':id' => $id,
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
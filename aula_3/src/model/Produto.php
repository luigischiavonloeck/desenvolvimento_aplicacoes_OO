<?php

namespace Daoo\Aula03\model;

use Exception;
use Daoo\Aula03\interfaces\iDAO;

class Produto extends Model implements iDAO
{
    private $id, $nome, $descricao,
        $quantidadeEstoque, $preco, $importado;

    public function __construct(
        string $nome = '',
        string $descricao = '',
        int $quantidade = 0,
        float $preco = 0,
        bool $importado = false
    ) {
        $this->table = 'produtos';
        $this->primary = 'id_prod';
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->quantidadeEstoque = $quantidade;
        $this->preco = $preco;
        $this->importado = $importado;
        try {
            parent::init();
            error_log("Produto: " . print_r($this, TRUE));
        } catch (Exception $error) {
            throw $error;
        }
    }

    public function read(int $id = null): array
    {
        try {
            $sql = "SELECT * FROM $this->table ";
            if (isset($id))
                $sql .= "WHERE $this->primary = :id";

            $prepStmt = $this->conn->prepare($sql);
            
            if (isset($id))
                $prepStmt->bindValue(':id', $id);

            if (!$prepStmt->execute())
                throw new Exception("Erro no select!");

            return $prepStmt->fetchAll(self::FETCH);
        } catch (Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            throw new Exception($error->getMessage());
        }finally{
            $this->dumpQuery($prepStmt);
        }
    }

    public function create():bool
    {
        try {
            $sql = "INSERT INTO $this->table ($this->columns) "
                . "VALUES ($this->params)";

            error_log(print_r([
                "colunas" => $this->columns,
                "param" => $this->params,
                "valores" => $this->values,
                "SQL" => $sql
            ], true));

            $prepStmt = $this->conn->prepare($sql);
            $result = $prepStmt->execute($this->values);

            if (!$result || $prepStmt->rowCount() != 1)
                throw new Exception("Erro ao inserir produto!!");

            $this->id = $this->conn->lastInsertId();
            $this->dumpQuery($prepStmt);
            return true;
        } catch (Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            $prepStmt ?? $this->dumpQuery($prepStmt);
            return false;
        }
    }

    public function update():bool
    {
        try {
            $this->values[':id'] = $this->id;
            $sql = "UPDATE $this->table SET $this->updated
                  WHERE $this->primary = :id";
            $prepStmt = $this->conn->prepare($sql);

            $prepStmt->bindValue(':importado', $this->importado);

            if ($prepStmt->execute($this->values)) {
                $this->dumpQuery($prepStmt);
                return $prepStmt->rowCount() > 0;
            }
        } catch (Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            $this->dumpQuery($prepStmt);
            return false;
        }
    }

    public function delete($id):bool
    {
        $sql = "DELETE FROM $this->table WHERE id_prod = :id";
        $prepStmt = $this->conn->prepare($sql);
        if ($prepStmt->execute([':id' => $id]))
            return $prepStmt->rowCount() > 0;
        else return false;
    }

    public function filter($arrayFilter):array
    {
        try {
            if (!sizeof($arrayFilter))
                throw new Exception("Filtros vazios!");
            $this->setFilters($arrayFilter);
            $sql = "SELECT * FROM $this->table WHERE $this->filters";
            $prepStmt = $this->conn->prepare($sql);
            if (!$prepStmt->execute($this->values))
                return false;
            $this->dumpQuery($prepStmt);
            return $prepStmt->fetchAll(self::FETCH);
        } catch (Exception $error) {
            error_log("ERRO: " . print_r($error, TRUE));
            if (isset($prepStmt))
                $this->dumpQuery($prepStmt);
            throw new Exception($error->getMessage());
        }
    }

    public function getColumns(): array
    {
        $columns = [
            "nome" => $this->nome,
            "descricao" => $this->descricao,
            "qtd_estoque" => $this->quantidadeEstoque,
            "preco" => $this->preco,
            "importado" => $this->importado
        ];
        if ($this->id) $columns['id_prod'] = $this->id;
        return $columns;
    }

    public function __toString(): string{
        return print_r($this->getColumns(), true);
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        if ($name != 'id') $this->mapColumns($this);
    }

    public function __get($name)
    {
        return $this->$name;
    }

}

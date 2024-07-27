<?php

namespace Tsi\Atividade3e4\model;

use Exception;
use Tsi\Atividade3e4\interfaces\iDAO;

class Usuario extends Model implements iDAO
{
    private 
    $id, 
    $nome, 
    $email,
    $cpf, 
    $cidade, 
    $cep;

    public function __construct(
        string $nome = '',
        string $email = '',
        string $cpf = '',
        string $cidade = '',
        string $cep = ''
    ) {
        $this->table = 'usuarios';
        $this->primary = 'id_user';
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->cidade = $cidade;
        $this->cep = $cep;
        try {
            parent::init();
            error_log("Usuario: " . print_r($this, TRUE));
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
                throw new Exception("Erro ao inserir usuario!!");

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
            error_log("=======================================================================================");
            error_log("ID: " . $this->id);
            error_log(print_r($this->values, true));
            error_log("=======================================================================================");
            $sql = "UPDATE $this->table SET $this->updated
                  WHERE $this->primary = :id";
            $prepStmt = $this->conn->prepare($sql);

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
        $sql = "DELETE FROM $this->table WHERE id_user = :id";
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
            'nome' => $this->nome,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'cidade' => $this->cidade,
            'cep' => $this->cep
        ];
        if ($this->id) $columns['id_user'] = $this->id;
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
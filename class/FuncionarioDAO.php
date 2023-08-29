<?php

class FuncionarioDAO extends Conexao{

    public function update($salario, $id){
        $sql = "
            UPDATE funcionarios
            SET salario = ?
            WHERE id_funcionario = ?
        ";
        
        $pdo = $this->conectaMySQL();
        $prepare = $pdo->prepare($sql);

        $prepare->bindValue(1, $salario);
        $prepare->bindValue(2, $id);
        
        try{
            return $prepare->execute();
        }catch(Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    //Listar
    public function list(){
        $sql = "
            SELECT *
            FROM funcionarios
         ";

        $array = [];
        foreach($this->conectaMySQL()->query($sql) as $valor){
            $array[$valor['id_funcionario']] = array(
                "nome" => $valor['nome'],
                "salario" => $valor['salario']
            );
        }
        return $array;
    }

}
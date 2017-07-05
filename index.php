<?php

require 'autoload.php';

use LuizHenrique\Database;
use LuizHenrique\Produto;
use LuizHenrique\Usuario;

$dbh = DataBase::getConnection('root', "", 'localhost', 'trabalho_pos_2017');

$produto = new Produto();

try {
    $dbh->beginTransaction();
    if (!$produto->save(
        $dbh,
        [
            'nome' => 'Notebook acer Aspire V5',
            'valor' => 1200.00
        ]
    )
    ) {
        throw new \PDOException();
    }
    echo "Produto salvo com sucesso!" . "</br>";
    $dbh->commit();
} catch (\Exception $Exception) {
    $dbh->rollBack();
    echo $Exception->getMessage() . "</br>";
}

$usuario = new Usuario();

try {
    $dbh->beginTransaction();
    if (!$usuario->save(
        $dbh,
        [
            'email' => 'lluiz.heenrique@gmail.com',
            'senha' => 123456
        ]
    )
    ) {
        throw new \PDOException();
    }
    echo "Usuário salvo com sucesso!" . "</br>";
    $dbh->commit();
} catch (\Exception $Exception) {
    $dbh->rollBack();
    echo $Exception->getMessage() . "</br>";
}

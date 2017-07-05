<?php

namespace LuizHenrique;

/**
 * Class Produto
 *
 * @author Luiz Henrique
 */
class Produto
{

    private $idproduto;
    private $nome;
    private $valor;

    /**
     * Produto constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIdproduto()
    {
        return $this->idproduto;
    }

    /**
     * @param int $idproduto
     */
    public function setIdproduto($idproduto)
    {
        $this->idproduto = $idproduto;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return double
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param double $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    use Hidratador;

}
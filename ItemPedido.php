<?php

/**
 * Representa um item dentro de um pedido.
 *
 * Esta classe não possui relacionamentos estruturais próprios.
 * É parte integrante de uma **composição** com a classe Pedido:
 * os objetos ItemPedido são criados e destruídos pelo próprio Pedido,
 * não existindo de forma independente no sistema.
 */
final class ItemPedido
{
    /**
     * @param string $nomeProduto Nome do produto solicitado no pedido.
     * @param int    $quantidade  Quantidade de unidades do produto.
     */
    public function __construct(
        public string $nomeProduto,
        public int $quantidade,
    ){}
}
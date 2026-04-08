<?php

final class Pedido
{
    public array $itensPedido;

    public function __construct(
        public int $numero,
        public string $nomeCliente,
    ) {}

    public function addProduto(string $produto, int $quantidade): void
    {
        $this->itensPedido[] = new ItemPedido($produto, $quantidade);
    }
}
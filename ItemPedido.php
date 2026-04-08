<?php

final class ItemPedido
{
    public function __construct(
        public string $nomeProduto,
        public int $quantidade,
    ){}
}
<?php

final class Disciplina
{
    public function __construct(
        public string $nome,
        public int $cargaHoraria
    ) {}
}
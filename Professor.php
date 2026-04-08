<?php

declare(strict_types=1);

final class Professor
{
    public function __construct(
        public int $registro,
        public string $nome,
        public int $pis,
        public Disciplina $disciplina
    ) {}

    public function darAula(Projetor $projetor): void
    {
        echo 'Aula iniciada' . PHP_EOL;
        $projetor->ligar() . PHP_EOL;
        
        echo 'Aula finalizada' . PHP_EOL;
        $projetor->desligar() . PHP_EOL;
    }

}
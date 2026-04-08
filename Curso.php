<?php

final class Curso
{
    public array $disciplinas;

    public function __construct(
        public string $nome
    ) {}

    public function addDisciplina(Disciplina $disciplina): void
    {
        $this->disciplinas[] = $disciplina;
    }
}
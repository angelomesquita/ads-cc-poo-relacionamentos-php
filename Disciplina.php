<?php

/**
 * Representa uma disciplina acadêmica.
 *
 * Esta classe não possui relacionamentos com outras classes;
 * é utilizada como parte de associações e agregações por outras entidades.
 */
final class Disciplina
{
    /**
     * @param string $nome         Nome da disciplina (ex.: "Programação Orientada a Objetos").
     * @param int    $cargaHoraria Carga horária total da disciplina, em horas.
     */
    public function __construct(
        public string $nome,
        public int $cargaHoraria
    ) {}
}
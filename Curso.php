<?php

/**
 * Representa um curso acadêmico.
 *
 * ## Relacionamento: Agregação com Disciplina
 *
 * Curso agrega um conjunto de objetos Disciplina. Trata-se de uma **agregação**
 * porque as disciplinas existem de forma independente do curso: uma Disciplina
 * pode ser criada, utilizada em vários contextos e continuar existindo mesmo
 * que o Curso seja destruído. O Curso apenas referencia as disciplinas em seu
 * array, sem ser responsável pelo ciclo de vida delas.
 *
 * ```
 * Curso  <>----  Disciplina   (agregação — "todo/parte" fraca)
 * ```
 */
final class Curso
{
    /**
     * Lista de disciplinas agregadas ao curso.
     *
     * **Agregação**: as instâncias de Disciplina são criadas externamente e
     * apenas referenciadas aqui. Sua existência não depende do Curso.
     *
     * @var Disciplina[]
     */
    public array $disciplinas;

    /**
     * @param string $nome Nome do curso (ex.: "Análise e Desenvolvimento de Sistemas").
     */
    public function __construct(
        public string $nome
    ) {}

    /**
     * Adiciona uma disciplina ao curso (agregação).
     *
     * O objeto Disciplina é criado fora desta classe e apenas associado ao
     * curso, caracterizando uma relação de agregação.
     *
     * @param Disciplina $disciplina Instância de Disciplina a ser agregada.
     */
    public function addDisciplina(Disciplina $disciplina): void
    {
        $this->disciplinas[] = $disciplina;
    }
}
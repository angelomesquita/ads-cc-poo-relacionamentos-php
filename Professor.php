<?php

declare(strict_types=1);

/**
 * Representa um professor.
 *
 * ## Relacionamentos
 *
 * ### Associação com Disciplina
 * Professor possui uma referência permanente a um objeto Disciplina, armazenada
 * no atributo `$disciplina`. Trata-se de uma **associação** porque o Professor
 * "conhece" a Disciplina (a referencia como atributo), mas não é responsável
 * pelo seu ciclo de vida: a Disciplina é criada externamente e injetada via
 * construtor — ambas as classes existem de forma independente.
 *
 * ```
 * Professor -----> Disciplina   (associação — referência permanente via atributo)
 * ```
 *
 * ### Dependência com Projetor
 * O método `darAula()` recebe um objeto Projetor como parâmetro. Trata-se de
 * uma **dependência** porque Professor utiliza Projetor apenas localmente,
 * dentro desse método, sem armazená-lo como atributo. Uma mudança na interface
 * de Projetor impacta diretamente Professor.
 *
 * ```
 * Professor  - - -> Projetor    (dependência — uso pontual via parâmetro de método)
 * ```
 */
final class Professor
{
    /**
     * @param int        $registro   Número de registro funcional do professor.
     * @param string     $nome       Nome completo do professor.
     * @param int        $pis        Número do PIS do professor.
     * @param Disciplina $disciplina Disciplina associada ao professor.
     *                               **Associação**: referência armazenada como atributo;
     *                               a Disciplina existe independentemente do Professor.
     */
    public function __construct(
        public int $registro,
        public string $nome,
        public int $pis,
        public Disciplina $disciplina
    ) {}

    /**
     * Executa uma aula utilizando o projetor fornecido.
     *
     * **Dependência** com Projetor: o objeto é recebido como parâmetro,
     * usado localmente e não mantido como atributo, caracterizando um
     * acoplamento temporário (uso pontual).
     *
     * @param Projetor $projetor Projetor a ser utilizado durante a aula.
     *                           **Dependência**: parâmetro de método, sem armazenamento.
     */
    public function darAula(Projetor $projetor): void
    {
        echo 'Aula iniciada' . PHP_EOL;
        $projetor->ligar() . PHP_EOL;
        
        echo 'Aula finalizada' . PHP_EOL;
        $projetor->desligar() . PHP_EOL;
    }

}
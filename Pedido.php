<?php

/**
 * Representa um pedido realizado por um cliente.
 *
 * ## Relacionamento: Composição com ItemPedido
 *
 * Pedido compõe objetos ItemPedido. Trata-se de uma **composição** porque:
 * - Os itens são **criados dentro** da própria classe Pedido (método `addProduto`);
 * - Os itens não existem de forma independente — seu ciclo de vida está
 *   completamente atrelado ao Pedido que os originou;
 * - Se o Pedido for destruído, seus itens também deixam de existir.
 *
 * ```
 * Pedido  <>-----  ItemPedido   (composição — "todo/parte" forte)
 * ```
 */
final class Pedido
{
    /**
     * Lista de itens que compõem o pedido.
     *
     * **Composição**: os objetos ItemPedido são instanciados e gerenciados
     * exclusivamente por esta classe, sem existência independente.
     *
     * @var ItemPedido[]
     */
    public array $itensPedido;

    /**
     * @param int    $numero      Número identificador do pedido.
     * @param string $nomeCliente Nome do cliente que realizou o pedido.
     */
    public function __construct(
        public int $numero,
        public string $nomeCliente,
    ) {}

    /**
     * Cria e adiciona um novo item ao pedido (composição).
     *
     * O objeto ItemPedido é instanciado **dentro** deste método, evidenciando
     * a composição: Pedido controla completamente o ciclo de vida de seus itens.
     *
     * @param string $produto    Nome do produto a ser adicionado.
     * @param int    $quantidade Quantidade de unidades do produto.
     */
    public function addProduto(string $produto, int $quantidade): void
    {
        $this->itensPedido[] = new ItemPedido($produto, $quantidade);
    }
}
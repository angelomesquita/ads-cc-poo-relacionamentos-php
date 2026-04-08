# Relacionamentos em POO — Exemplos em PHP 8.3

> Códigos de exemplo utilizados na disciplina de **Programação Orientada a Objetos (POO)**  
> dos cursos de **Análise e Desenvolvimento de Sistemas** e **Ciência da Computação**  
> do **Grupo Educacional Unis**.

---

## Sobre o projeto

Este repositório contém exemplos práticos em **PHP 8.3** que ilustram os quatro tipos de relacionamento entre classes na Programação Orientada a Objetos:

| Relacionamento | Força do vínculo | Exemplo neste projeto |
|---|---|---|
| Dependência | Fraco (uso pontual) | `Professor` → `Projetor` |
| Associação | Médio (referência permanente) | `Professor` → `Disciplina` |
| Agregação | Médio-forte (todo/parte fraca) | `Curso` ◇→ `Disciplina` |
| Composição | Forte (todo/parte forte) | `Pedido` ◆→ `ItemPedido` |

---

## Tipos de relacionamento

### Dependência

Ocorre quando uma classe utiliza outra **apenas localmente**, como parâmetro de método ou variável local, sem armazená-la como atributo. A classe depende da outra, mas o vínculo é temporário.

```php
// Professor usa Projetor somente dentro do método darAula()
final class Professor
{
    public function darAula(Projetor $projetor): void // <- dependência
    {
        $projetor->ligar();
        // ...
        $projetor->desligar();
    }
}
```

---

### Associação

Ocorre quando uma classe **armazena uma referência** a outra como atributo. Ambas as classes existem de forma independente, mas uma "conhece" a outra de maneira permanente.

```php
// Professor referencia Disciplina como atributo — ambas existem independentemente
final class Professor
{
    public function __construct(
        public Disciplina $disciplina // <- associação
    ) {}
}
```

---

### Agregação

É uma associação mais forte que representa uma relação **"todo/parte"**, porém sem dependência de ciclo de vida: a parte pode existir sem o todo. O todo apenas **agrega** referências a partes criadas externamente.

```php
// Curso agrega Disciplinas criadas fora dele — Disciplina sobrevive sem Curso
final class Curso
{
    /** @var Disciplina[] */
    public array $disciplinas; // <- agregação

    public function addDisciplina(Disciplina $disciplina): void
    {
        $this->disciplinas[] = $disciplina;
    }
}
```

---

### Composição

É a relação **"todo/parte"** mais forte: o todo **cria e controla** o ciclo de vida das partes. Se o todo for destruído, as partes também o são. As partes não existem de forma independente.

```php
// Pedido cria ItemPedido internamente — ItemPedido não existe sem Pedido
final class Pedido
{
    /** @var ItemPedido[] */
    public array $itensPedido; // <- composição

    public function addProduto(string $produto, int $quantidade): void
    {
        $this->itensPedido[] = new ItemPedido($produto, $quantidade); // criado aqui
    }
}
```

---

## Estrutura do projeto

```
.
├── Disciplina.php   # Entidade base sem relacionamentos próprios
├── Projetor.php     # Usado via dependência por Professor
├── Curso.php        # Agrega Disciplinas (agregação)
├── Professor.php    # Associa Disciplina + depende de Projetor
├── ItemPedido.php   # Parte de Pedido (composição)
├── Pedido.php       # Compõe ItemPedidos (composição)
└── index.php        # Exemplo de uso das classes
```

---

## Requisitos

- **PHP 8.3** ou superior

## Como executar

```bash
php index.php
```

---

## Referências

- MARTIN, Robert C. *Clean Code*. Prentice Hall, 2008.
- GAMMA, Erich et al. *Design Patterns: Elements of Reusable Object-Oriented Software*. Addison-Wesley, 1994.
- Documentação oficial do PHP 8.3: <https://www.php.net/releases/8.3/pt_BR.php>

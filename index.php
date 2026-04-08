<?php

declare(strict_types=1);

require_once('Disciplina.php');
require_once('Curso.php');
require_once('Projetor.php');
require_once('Professor.php');
require_once('Pedido.php');

$curso01 = new Curso("ADS/Ciência da Computação");

$projetor = new Projetor();

$disciplina01 = new Disciplina("POO", 60);
$disciplina02 = new Disciplina("IHM", 60);

$curso01->addDisciplina($disciplina01);
$curso01->addDisciplina($disciplina02);

$professor01 = new Professor(1, "Prof.1", 123, $disciplina01);
$professor01->darAula($projetor);

$pedido01 = new Pedido(1, "José da Silva");
$pedido01->addProduto("miojo frango caipira", 2);
<?php

/**
 * Representa um projetor utilizado em sala de aula.
 *
 * Esta classe não possui relacionamentos estruturais com outras classes.
 * É utilizada como dependência pela classe Professor (passada como parâmetro
 * no método darAula), sem ser armazenada como atributo.
 */
final class Projetor 
{
    /**
     * Liga o projetor, exibindo mensagem de confirmação.
     */
    public function ligar(): void 
    {       
        echo 'Projetor ligado' . PHP_EOL; 
    }
    
    /**
     * Desliga o projetor, exibindo mensagem de confirmação.
     */
    public function desligar(): void
    {
        echo 'Projetor desligado' . PHP_EOL;   
    }
    
}
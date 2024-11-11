<?php
/**
 * Plugin Name: Add class on Paragraph
 * Description: Adiciona uma classe personalizada a todos os parágrafos no conteúdo dos posts.
 * Version: 1.0
 * Author: Rodolfo Lara Cassaro
 */


//Medidas de segurança para impedir acesso direto ao arquivo do plugin
if (!defined('ABSPATH')) {
    exit;
}

function adiciona_classes($content)
{
    $dom = new DOMDocument();

    $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

    $paragrafos = $dom->getElementsByTagName('p');

    // Itera sobre todos os parágrafos e adiciona a classe "custom-class"
    foreach ($paragrafos as $paragrafo) {
        //Salva todas as classes anteriores para não sobrescrever
        $classes_anteriores = $paragrafo->getAttribute('class');
        //Faz o trim para concatenar as classes anteriores com a nova classe e uma o setAtttribute para inserir no elemento.
        $paragrafo->setAttribute('class', trim($classes_anteriores . ' custom-class'));
    }

    // Retorna o conteúdo atualizado como string
    return $dom->saveHTML($dom->documentElement);
}


//adiciona o filtro que carrega junto com o conteudo, seleciona o conteudo do post e ativa a função 
add_filter('the_content', 'adiciona_classes');
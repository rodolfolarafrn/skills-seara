<?php
/**
 * Plugin Name: ShortCode para posts similares
 * Description: Exibe uma lista de links para posts relacionados da mesma categoria.
 * Version: 1.0
 * Author: Rodolfo Lara Cassaro
 * Author URI: 
 */

//Medidas de segurança para impedir acesso direto ao arquivo do plugin se não estiver no wordpress
if (!defined('ABSPATH')) {
    exit;
}

// Função para gerar a lista de posts relacionados
function posts_similares()
{
    // Verifica se é um unico post, se não já cancela a ação da função
    if (!is_singular('post')) {
        return '';
    }

    //Variavel que resgata os dados do post atual
    global $post;

    // Resgata as categorias do post atual
    $categorias = get_the_category($post->ID);

    // Verifica se o post possui categorias, se ele não possuir, encerra a função
    if (empty($categorias)) {
        return '';
    }

    // Obtém o ID da primeira categoria do post
    $category_id = $categorias[0]->term_id;

    //Resgata os posts da mesma categoria
    $args = [
        'category__in' => [$category_id],
        'post__not_in' => [$post->ID], //Ignora o post atual para não repetilo na lista
        'posts_per_page' => 5, // Número de posts a serem exibidos
        'ignore_sticky_posts' => 1, //Ignora posts fixos
    ];

    $query = new WP_Query($args); //Faz a requisição com todos os posts da determinada categoria

    // Verifica se há posts relacionados, se não houver cancela a função
    if (!$query->have_posts()) {
        return '';
    }

    // criação do HTML da lista de posts relacionados.
    $output = '<h3>Mais Artigos</h3><ul>';
    while ($query->have_posts()) {
        $query->the_post();
        $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    }
    $output .= '</ul>';

    // Restaura o post original
    wp_reset_postdata();

    return $output;
}

// Função para registrar o shortcode
function registrar_short()
{
    add_shortcode('post_similar', 'posts_similares');
}
add_action('init', 'registrar_short');
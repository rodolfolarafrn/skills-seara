<?php
/**
 * Plugin Name: GitHub URL Config
 * Description: Adiciona uma página no admin para salvar a URL do perfil do GitHub e exibe como uma meta tag no head do site.
 * Version: 1.0
 * Author: Rodolfo Lara Cassaro
 * Author URI: https://seusite.com
 * Requires PHP: 8.0
 */

// Impedir acesso direto ao arquivo
if (!defined('ABSPATH')) {
    exit;
}

// Função que registra a página na config do wordpress
function github_url_add_admin_menu()
{
    add_options_page(
        'Configuração GitHub', // Título da página
        'GitHub URL',          // Nome do menu
        'manage_options',      // Capacidade necessária
        'github-url-config',   // Slug do menu
        'github_url_settings_page' // Função que renderiza a página
    );
}

//Hook que configura e ativa a função criada acima
add_action('admin_menu', 'github_url_add_admin_menu');

//função que cria a parte visual do novo campo na página
function github_url_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Configuração do Perfil do GitHub</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('github_url_options');
            do_settings_sections('github-url-config');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

//Função para registrar e carregara configuração no WP
function github_url_settings_init()
{

    // Registro da nova opção no wordpress
    register_setting('github_url_options', 'github_profile_url');

    add_settings_section(
        'github_url_section',
        'Configuração de URL do GitHub',
        null,
        'github-url-config'
    );

    add_settings_field(
        'github_profile_url_field',
        'URL do Perfil do GitHub',
        'github_url_field_callback',
        'github-url-config',
        'github_url_section'
    );
}
add_action('admin_init', 'github_url_settings_init');

// Função pque de fato mostra o campo de entrada
function github_url_field_callback()
{
    $value = get_option('github_profile_url', '');
    echo '<input type="text" name="github_profile_url" value="' . esc_attr($value) . '" class="regular-text" />';
}

//Função para de inserir e mostrar a meta tag no head do meu site
function github_url_add_meta_tag()
{
    $github_url = get_option('github_profile_url', '');

    // Valida para saber se a url foi de fato cadastrada, pois se não houver não faz nada e nem trava o projeto
    if (!empty($github_url)) {
        echo '<meta name="verify-skills" content="' . esc_attr($github_url) . '">';
    }
}

//Action para ativar as configurações criadas antteriormente dentro do head do wordpress
add_action('wp_head', 'github_url_add_meta_tag');

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function htmlFormat($html)
{
    $dom = new DOMDocument();

    $dom->preserveWhiteSpace = false;
    $dom->loadHTML($html);
    $dom->formatOutput = true;

    return $dom->saveXML();
}
function htmlMinify($html)
{
    $html = trim(preg_replace('/\s+/', ' ', $html));
    $html = str_replace('> <', '><', $html);

    return $html;	
}
function htmlIndent($html)
{
    $indenter = new \Gajus\Dindent\Indenter();
    return $indenter->indent($html);
}
function minify_html($html)
{
    $search = array(
        '/(\n|^)(\x20+|\t)/',
        '/(\n|^)\/\/(.*?)(\n|$)/',
        '/\n/',
        '/\<\!--.*?-->/',
'/(\x20+|\t)/', # Delete multispace (Without \n)
'/\>\s+\</', # strip whitespaces between tags
'/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
'/=\s+(\"|\')/'); # strip whitespaces between = "'

    $replace = array(
        "\n",
        "\n",
        " ",
        "",
        " ",
        "><",
        "$1>",
        "=$1");

    $html = preg_replace($search, $replace, $html);
    return $html;
}
function json_response($status, ...$args)
{
    $ci =& get_instance();

    $data = array_merge(['status' => $status], ...$args);

    $ci->output
    ->set_status_header(200)
    ->set_content_type('application/json', 'utf-8')
    ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
    ->_display();

    exit;
}
function group_rows($items, $len_per_group)
{
    $len = count($items);

    $rows = array();

    for ($start_index = 0; $start_index < $len; $start_index += $len_per_group)
    {
        $row_data = array();

        for ($index = $start_index; $index < min($start_index + $len_per_group, $len); $index++)
        {
            $row_data[] = $items[$index];
        }

        $rows[] = $row_data;
    }

    return $rows;
}
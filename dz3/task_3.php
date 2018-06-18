<?php
$mysqli = new mysqli("localhost", "root", "753159", "php_algo");
$res = $mysqli->query("select c.`category_name`, nl.* from `categories` c join `nested_links` nl on nl.`category_id` = c.`id_category` order by nl.`left_key`");

$menu = $res->fetch_all(MYSQLI_ASSOC);

function build_html(array $menu)
{
    $html = "";
    $level = 0;
    foreach ($menu as $item) {
        if ($item['level'] > $level) {
            $html .= "<ul>";
        } else if ($item['level'] < $level) {
            $html .= str_repeat('</ul>', $level - $item['level']);
        }

        $level = $item['level'];
        $html .= "<li>{$item['category_name']}</li>";

        //echo str_repeat('.', $item['level']) . " " . $item['category_name'] . PHP_EOL;
    }
    if ($level)
        $html .= str_repeat('</ul>', $level);

    return $html;
}

echo build_html($menu);
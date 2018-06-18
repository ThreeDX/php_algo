<?php
/**
 * Дано слово, состоящее только из строчных латинских букв.
 * Проверить, является ли это слово палиндромом.
 * При решении этой задачи нельзя пользоваться циклами.
 */

function bool_str($b) {
    return $b?"true":"false";
}

function is_pol($str)
{
    return $str == strrev($str);
}

function is_pol_rec($str, $from = 0)
{
    $to = strlen($str) - 1 - $from;

    if ($from >= $to)
        return true;

    if ($str[$from] != $str[$to])
        return false;
    else
        return is_pol_rec($str, ++$from);
}

echo "level = ".bool_str(is_pol("level")).", ".bool_str(is_pol_rec("level")).PHP_EOL;
echo "abba = ".bool_str(is_pol("abba")).", ".bool_str(is_pol_rec("abba")).PHP_EOL;
echo "levels = ".bool_str(is_pol("levels")).", ".bool_str(is_pol_rec("levels")).PHP_EOL;
<?php
// Меняем элемнеты местами
function swap(&$a, &$b)
{
    $a ^= $b;
    $b ^= $a;
    $a ^= $b;
}

// Заполняем массив элемнетами (всегда одинаковая последовательность)
function fillArr(array &$arr, $len)
{
	srand(0); // чтобы всегда одинаковая последовательность была

    for($i = 0; $i < $len; $i++)
        $arr[$i] = rand(1, 100);
}

// Печатает массив
function printArr(array &$arr)
{
    $len = count($arr);
    for($i = 0; $i < $len; $i++)
        echo "{$arr[$i]} ";
    echo PHP_EOL;
}

// Сортировка слиянием
function mergeSort(array &$arr, $left, $right)
{
    $x = $right - $left;

    if ($left < $right)
        // Обрабатываемый фрагмент массива состоит более,
        // чем из одного элемента
        if ($x == 1) {
            if ($arr[$right] < $arr[$left])
            {
                swap($arr[$left], $arr[$right]);
            }
        }
        else
        { // Разбиваем заданный фрагмент на два массива
            // Рекурсивно вызываем функции MergeSort
            $l = $left;
            $r = $left + intval($x / 2) + 1;
            $temp = [];

            mergeSort($arr, $left, $left + intval($x / 2));
            mergeSort($arr, $r, $right);

            // Сливаем массивы, через временный массив
            for ($i = 0; $i < $x + 1; $i++)
                if ($l <= $left + $x / 2 && ($r > $right || $arr[$l] <= $arr[$r]))
                    $temp[$i] = $arr[$l++];
                else
                    $temp[$i] = $arr[$r++];

            for ($i = 0; $i < $x + 1; $i++)
                $arr[$left + $i] = $temp[$i];
        }
}


$size = 25;
$arr = [];

fillArr($arr, $size);
printArr($arr);
mergeSort($arr, 0, $size - 1);
printArr($arr);

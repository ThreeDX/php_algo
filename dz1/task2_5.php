<?php
/**
 * Метод проверки правильности расстановки скобочек с помощью стека.
 * @param $str
 * @return bool|int
 */
function check_braces($str) {
    $braces = ['(' => ')', '[' => ']', '{' => '}' ];
    $stack = new SplStack();

    for ($i = 0; $i < strlen($str); $i++)
    {
        foreach ($braces as $ob => $cb) {
            // Открывающая скобка
            if ($ob == $str[$i]) {
                $stack->push($cb);
                continue 2;
            }

            // Закрывающая скобка
            if ($cb == $str[$i]) {
                if (!$stack->count())
                    return false; // Стек пустой

                if ($stack->pop() != $cb) // Закрывающая скобка отличается
                    return false;
                continue 2;
            }
        }
    }

    return !$stack->count(); // Стек должен остаться пустым
}

/**
 * @param $b
 * @return string
 */
function bool_str($b) {
    return $b?"true":"false";
}


echo "([]){} = ".bool_str(check_braces("([]){}")).PHP_EOL;
echo "([){} = ".bool_str(check_braces("([){}")).PHP_EOL;
echo "( = ".bool_str(check_braces("(")).PHP_EOL;
echo "([)] = ".bool_str(check_braces("([)]")).PHP_EOL;
echo "{(2+2)*(2)} = ".bool_str(check_braces("{(2+2)*(2)}")).PHP_EOL;

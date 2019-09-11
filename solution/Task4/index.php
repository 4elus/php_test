<?php
$arr  = array(1,21,31,41);

echo get_missed_number($arr);


function get_missed_number($sequence){

    if (count($sequence) <= 1)
        return false;

    $len = count($sequence);
    $last = count($sequence)-1;
    $res = 0;
    $d = ($sequence[$last] - $sequence[0]) / $len;
    echo "Арифм. разница: " . $d . "<br>";


    for($i = 0; $i < $len; $i++){
        try{
            if ($sequence[$i] + $d != $sequence[$i+1]){
                $res = ($sequence[$i] + $d);
                break;
            }
        } catch (Exception $e){
            echo 'Поймано исключение: ',  $e->getMessage(), "\n";
        }
    }

    return "Отсуствует число: " . $res;
}
<?php 

function maxCharCount($string){
    $prevChar = '';
    $charCount = [];
    for ($i=0; $i < strlen($string) ; $i++) { 
        $char = $string[$i];
        if ($char == $prevChar) {
            if (isset($charCount[$char])) {
                $charCount[$char]++;
            }else{
                $charCount[$char] = 2;
            }
        }
        $prevChar = $char;
    }

    $result = '';
    foreach ($charCount as $char => $count) {
        $result .= "$char $count"."x, ";
    }

    $result = rtrim($result, ', ');
    
    return $result;
}
$input = 'strawberry';
echo maxCharCount($input);
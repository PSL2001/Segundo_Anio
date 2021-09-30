<?php
function isPrimo(int $n) : bool {
    if ($n<2) return false;
    for ($i=2; $i < $n; $i++) { 
        if($n%$i==0) return false;
    }
    return true;
}
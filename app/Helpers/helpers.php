<?php
function signedNumber($number)
{
    if($number > 0) return '+' . number_format($number, 2);
    return number_format($number, 2);
}
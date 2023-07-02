function bc_arb_decode($num, $basestr)
{
    if (!function_exists('bcadd')) Throw new Exception('You need the BCmath extension.');
    $base = strlen($basestr);
    $dec = '0';
    $num_arr = str_split((string)$num);
    $cnt = strlen($num);
    for ($i = 0; $i < $cnt; $i++) {
        $pos = strpos($basestr, $num_arr[$i]);
        if ($pos === false) Throw new Exception(sprintf('Unknown character %s at offset %d', $num_arr[$i], $i));
        $dec = bcadd(bcmul($dec, $base), $pos);
    }
    return $dec;
}

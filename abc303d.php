<?php
list($X, $Y, $Z) = explode(' ', trim(fgets(STDIN)));
$S = trim(fgets(STDIN));

$n = strlen($S);
$dp = [0, $Z];
for ($i = 0; $i < $n; $i++) {
    $dp_new = [0, 0];
    if ($S[$i] === 'a') {
        $dp_new[0] = min($dp[0] + $X, $dp[1] + $Y + $Z);
        $dp_new[1] = min($dp[0] + $X + $Z, $dp[1] + $Y);
    } else {  // $S[$i] === 'A'
        $dp_new[0] = min($dp[0] + $Y, $dp[1] + $X + $Z);
        $dp_new[1] = min($dp[0] + $Y + $Z, $dp[1] + $X);
    }
    $dp = $dp_new;
}

echo min($dp);
?>

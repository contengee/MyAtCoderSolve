<?php
list($N) = fscanf(STDIN, "%d\n");
$A = array_map('intval', explode(' ', fgets(STDIN)));
list($M) = fscanf(STDIN, "%d\n");
$B = array_map('intval', explode(' ', fgets(STDIN)));
list($X) = fscanf(STDIN, "%d\n");

$mochi = array_fill(0, $X+1, false);
foreach($B as $b) {
    $mochi[$b] = true;
}

// $dp[$i]: $i段目に到達できるかどうか
$dp = array_fill(0, $X+1, false);
$dp[0] = true;

for($i = 0; $i <= $X; $i++) {
    if(!$dp[$i] || $mochi[$i]) continue;
    foreach($A as $a) {
        $next = $i + $a;
        // Xを飛び越してなければロボットを進める
        if($next <= $X){
            $dp[$next] = true;
        }
    }
}
echo ($dp[$X] ? "Yes\n" : "No\n");
?>

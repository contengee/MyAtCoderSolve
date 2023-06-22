<?php
function knapsack($N, $W, $items){
    $dp = array_fill(0, $N+1, array_fill(0, $W+1, 0));
    
    for($i = 1; $i <= $N; $i++){
        $w = $items[$i-1][0];
        $v = $items[$i-1][1];
        for($j = 0; $j <= $W; $j++){
            if($j - $w >= 0){
                $dp[$i][$j] = max($dp[$i-1][$j], $dp[$i-1][$j-$w] + $v);
            }else{
                $dp[$i][$j] = $dp[$i-1][$j];
            }
        }
    }
    
    return $dp[$N][$W];
}

fscanf(STDIN, "%d %d", $N, $W);
$items = [];
for($i = 0; $i < $N; $i++){
    fscanf(STDIN, "%d %d", $w, $v);
    $items[] = [$w, $v];
}

echo knapsack($N, $W, $items);

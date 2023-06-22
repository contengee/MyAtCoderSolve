<?php

fscanf(STDIN, "%d\n", $N);
$G = array_fill(0, $N, []);
$visited = array_fill(0, $N, false);
$ans = [];

for($i=0; $i<$N-1; $i++){
    fscanf(STDIN, "%d %d\n", $A, $B);
    $A--; $B--;
    $G[$A][] = $B;
    $G[$B][] = $A;
}

foreach($G as $key => $value){
    sort($G[$key]);
}

dfs(0, $G, $visited, $ans);

for($i=0; $i<count($ans); $i++){
    echo ($i > 0 ? " " : "") . ($ans[$i]+1);
}
echo "\n";

function dfs($v, &$G, &$visited, &$ans, $p=-1){
    $visited[$v] = true;
    array_push($ans, $v);
    foreach($G[$v] as $u){
        if($u == $p || $visited[$u]) continue;
        dfs($u, $G, $visited, $ans, $v);
        array_push($ans, $v);
    }
}

?>

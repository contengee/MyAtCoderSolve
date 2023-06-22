<?php

list($H, $W) = explode(' ', trim(fgets(STDIN)));
$sy = $sx = 0;
$gy = $H - 1;
$gx = $W - 1;
$S = [];
for($i = 0; $i < $H; $i++){
    $S[] = trim(fgets(STDIN));
}
$que = new SplQueue();
$que->enqueue([$sy, $sx]);

$inf = 10 ** 8;
$dist = array_fill(0, $H, array_fill(0, $W, $inf));
$dist[$sy][$sx] = 0;

$dy = [-1, 0, 1, 0];
$dx = [0, -1, 0, 1];

while(!$que->isEmpty()){
    list($y, $x) = $que->dequeue();

    if($y == $gy && $x == $gx){
        echo $dist[$y][$x] . PHP_EOL;
        exit;
    }

    for($i = 0; $i < 4; $i++){
        $ny = $y + $dy[$i];
        $nx = $x + $dx[$i];

        if($ny < 0 || $ny >= $H || $nx < 0 || $nx >= $W){
            continue;
        }
        if($S[$ny][$nx] == "#"){
            continue;
        }
        if($dist[$y][$x] < $dist[$ny][$nx]){
            $dist[$ny][$nx] = $dist[$y][$x];
            $que->unshift([$ny, $nx]);
        }
    }

    for($iy = -2; $iy < 3; $iy++){
        for($ix = -2; $ix < 3; $ix++){
            if(abs($iy) == abs($ix) && abs($iy) == 2){
                continue;
            }
            $ny = $y + $iy;
            $nx = $x + $ix;
            if($ny < 0 || $ny >= $H || $nx < 0 || $nx >= $W){
                continue;
            }
            if($dist[$y][$x] + 1 < $dist[$ny][$nx]){
                $dist[$ny][$nx] = $dist[$y][$x] + 1;
                $que->enqueue([$ny, $nx]);
            }
        }
    }
}

echo "-1\n";

?>

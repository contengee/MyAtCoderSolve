<?php
fscanf(STDIN, '%d', $Q);

$tube = new SplQueue();

while ($Q--) {
    $query = explode(' ', trim(fgets(STDIN)));

    if ($query[0] == 1) {  // クエリタイプ1の場合
        $x = $query[1];
        $c = $query[2];
        $tube->enqueue([$x, $c]);  // ボールを筒に入れる
    } else {  // クエリタイプ2の場合
        $c = $query[1];
        $sum = 0;
        
        while ($c > 0) {
            $ball = $tube->dequeue();  // ボールを筒から取り出す
            
            $extract = min($ball[1], $c);
            $sum += $ball[0] * $extract;
            $c -= $extract;
            $ball[1] -= $extract;
            
            if ($ball[1] > 0) {
                $tube->unshift($ball);  // ボールが残っている場合は再度筒の先頭に入れる
            }
        }
        
        echo $sum . PHP_EOL;  // ボールに書かれた数の合計を出力
    }
}
?>

<?php

function dfs($idx, $prod, &$memo, $bags, $N, $X){
    if($idx == $N){
        if($prod == $X){
            return 1;
        } else {
            return 0;
        }
    }
    if(isset($memo["$idx-$prod"])){ // メモ化されている結果を再利用
        return $memo["$idx-$prod"];
    }

    $cnt = 0;
    foreach($bags[$idx] as $i){
        $cnt += dfs($idx+1, $prod*$i, $memo, $bags, $N, $X);
    }

    $memo["$idx-$prod"] = $cnt; // 結果をメモ化
    return $cnt;
}

list($N, $X) = explode(' ', trim(fgets(STDIN)));

$bags = [];
for($i=0; $i<$N; $i++){
    $input = explode(' ', trim(fgets(STDIN)));
    array_shift($input); // 要素削除
    $bags[] = $input;
}

$memo = []; // 結果を保存する辞書
echo dfs(0, 1, $memo, $bags, $N, $X) . "\n";

?>

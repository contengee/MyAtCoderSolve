#!/bin/bash
 
# 入力から最初の行 (N) を読み込む
read N
 
# N行分の靴下の色を読み込み、それらを空白で連結する
socks=$(cat)
 
# awkで色別靴下数カウントし、各色でペアを作れる最大数を計算
echo "$socks" | awk '
BEGIN { RS=" "; total=0; }
{
    socks[$1]++;
}
END {
    for (i in socks) {
        total += int(socks[i] / 2);
    }
    print total;
}'
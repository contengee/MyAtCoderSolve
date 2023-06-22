#!/bin/bash
 
# 最初の行を読み込み、HとWを取得
read H W
 
# H行分ループ
for ((i=0; i<$H; i++))
do
    read line
#    while echo $line | grep -q 'TT'; do
#        line=$(echo $line | sed 's/TT/PC/')
#    done
#    echo $line
    # awkで高速化
    echo $line | awk '{while (sub("TT","PC"));}1'
done

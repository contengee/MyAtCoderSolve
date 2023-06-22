#高速化したけど10^5でTLEするのでダメ awkのみ通る。テキスト処理系はAWKが最強
#!/bin/bash

while IFS= read -r line; do
    # 最初の行は無視
    if ((line_num++)); then
        arr=($line)
        for num in "${arr[@]}"; do
            if ((num == 0)); then
                printf "."
            else
                # ASCII値を計算して文字に変換
                printf "\\x$(printf %x $((num + 64)))"
            fi
        done
        printf "\n"
    fi
done
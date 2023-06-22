NR > 1 {
    for (i = 1; i <= NF; i++) {
        if ($i == 0)
            printf "."
        else
            printf "%c", $i + 64
    }
    printf "\n"
}

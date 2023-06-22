#!/usr/bin/awk -f
NR == 1 {
    h = $1
    w = $2
    next
}
{
    line[NR-1] = $0
}
END {
    for (i = 1; i <= h; i++) {
        for (j = 1; j < w; j++) {
            if (substr(line[i], j, 1) == "T" && substr(line[i], j+1, 1) == "T") {
                line[i] = substr(line[i], 1, j-1) "PC" substr(line[i], j+2)
            }
        }
        print line[i]
    }
}

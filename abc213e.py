from collections import deque

inf = 10 ** 8

H, W = map(int, input().split())
sy, sx = 0,0
gy, gx = H - 1, W - 1

S = [input() for _ in range(H)]

que = deque()
que.append([sy, sx])

dist = [[inf] * W for _ in range(H)]
dist[sy][sx] = 0

dy, dx = [-1, 0, 1, 0], [0, -1, 0, 1]

while len(que) > 0:
    y, x = que.popleft()
#    print(y, x)
    
    # 到達している時
    if y == gy and x == gx:
        print(dist[y][x])
        exit()

    # 歩行
    for i in range(4):
        ny, nx = y + dy[i], x + dx[i]

        if not(0 <= ny < H and 0 <= nx < W):
            continue
        if S[ny][nx] == "#":
            continue

        if dist[y][x] < dist[ny][nx]:
            dist[ny][nx] = dist[y][x]
            que.appendleft([ny, nx])
    
    # パンチ
    for iy in range(-2, 3):
        for ix in range(-2, 3):
            # パンチ範囲有効外
            if abs(iy) == abs(ix) == 2:
                   continue

            ny, nx = y + iy, x + ix

            if not(0 <= ny < H and 0 <= nx < W):
                continue

            if dist[y][x] + 1 < dist[ny][nx]:
                dist[ny][nx] = dist[y][x] + 1
                que.append([ny, nx])

print(-1)
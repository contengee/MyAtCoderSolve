def dfs(idx, prod):
    if idx == N:
        if prod == X:
            return 1
        else:
            return 0
    if (idx, prod) in memo:  # メモ化されている結果を再利用
        return memo[(idx, prod)]
        
    cnt = 0
    for i in range(len(bags[idx])):
        cnt += dfs(idx+1, prod*bags[idx][i])
    
    memo[(idx, prod)] = cnt  # 結果をメモ化
    return cnt

N, X = map(int, input().split())
bags = []
for _ in range(N):
    L, *balls = map(int, input().split())
    bags.append(balls)

memo = {}  # 結果を保存する辞書
print(dfs(0, 1))

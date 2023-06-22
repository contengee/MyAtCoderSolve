def knapsack(N, W, items):
    dp = [[0]*(W+1) for _ in range(N+1)]
    
    for i in range(1, N+1):
        w, v = items[i-1]
        for j in range(W+1):
            if j-w >= 0:
                dp[i][j] = max(dp[i-1][j], dp[i-1][j-w] + v)
            else:
                dp[i][j] = dp[i-1][j]
                
    return dp[N][W]

def main():
    N, W = map(int, input().split())
    items = [list(map(int, input().split())) for _ in range(N)]

    print(knapsack(N, W, items))

if __name__ == "__main__":
    main()

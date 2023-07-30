X, Y, Z = map(int, input().split())
S = input()

n = len(S)
dp = [0, Z] # dp[Capsオフの時の最小値、Capオンの時の最小値] でdpする
for i in range(n):
    dp_new = [0, 0]
    if S[i] == 'a':
        dp_new[0] = min(dp[0] + X, dp[1] + Y + Z)
        dp_new[1] = min(dp[0] + X + Z, dp[1] + Y)
    else:  # S[i] == 'A'
        dp_new[0] = min(dp[0] + Y, dp[1] + X + Z)
        dp_new[1] = min(dp[0] + Y + Z, dp[1] + X)
    dp = dp_new

print(min(dp))

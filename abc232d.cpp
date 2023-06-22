#include <iostream>
#include <vector>
#include <string>
using namespace std;

int H, W;
vector<string> grid;
vector<vector<int>> dp;

int dfs(int i, int j) {
    if (i < 0 || i >= H || j < 0 || j >= W || grid[i][j] == '#') {
        return 0;
    }
    if (i == H - 1 && j == W - 1) {
        return 1;
    }

    if (dp[i][j] != -1) {
        return dp[i][j];
    }

    dp[i][j] = max(dfs(i + 1, j), dfs(i, j + 1));

    return dp[i][j] + 1;
}

int main() {
    cin >> H >> W;
    grid.resize(H);
    for (int i = 0; i < H; i++) {
        cin >> grid[i];
    }

    dp.resize(H, vector<int>(W, -1));

    cout << dfs(0, 0) << endl;

    return 0;
}

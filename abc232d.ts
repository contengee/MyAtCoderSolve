let H: number, W: number;
let grid: string[];
let dp: number[][];

function dfs(i: number, j: number): number {
    if (i < 0 || i >= H || j < 0 || j >= W || grid[i][j] == '#') {
        return 0;
    }
    if (i == H - 1 && j == W - 1) {
        return 1;
    }

    if (dp[i][j] != -1) {
        return dp[i][j];
    }

    dp[i][j] = Math.max(dfs(i + 1, j), dfs(i, j + 1));

    return dp[i][j] + 1;
}

function solve() {
    const input = require('fs').readFileSync('/dev/stdin', 'utf8').split('\n');
    [H, W] = input[0].split(' ').map(Number);
    grid = input.slice(1, H+1);
    dp = Array.from({length: H}, () => Array(W).fill(-1));

    console.log(dfs(0, 0));
}

solve();

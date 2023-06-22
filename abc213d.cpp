#include <bits/stdc++.h>
using namespace std;

vector<vector<int>> G;
vector<bool> visited;
vector<int> ans;

void dfs(int v, int p = -1){
    visited[v] = true;
    ans.push_back(v+1);
    for(auto &u : G[v]){
        if(u == p || visited[u]) continue;
        dfs(u, v);
        ans.push_back(v+1);
    }
}

int main(){
    int N; cin >> N;
    G.resize(N);
    visited.assign(N, false);

    for(int i=0; i<N-1; i++){
        int A, B; cin >> A >> B;
        A--; B--;
        G[A].push_back(B);
        G[B].push_back(A);
    }

    for(int i=0; i<N; i++){
        sort(G[i].begin(), G[i].end());
    }

    dfs(0);
    
    for(int i=0; i<ans.size(); i++){
        if(i > 0) cout << " ";
        cout << ans[i];
    }
    cout << endl;
}

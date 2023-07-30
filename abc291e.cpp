#include<bits/stdc++.h>
using namespace std;

int main(){
	int n,m;
	cin >> n >> m;
	
	vector<vector<int>>G(n);
	vector<int>deg(n);
	for(int i=0;i<m;i++){
		int x,y;
		cin >> x >> y;
		x--,y--;
		G[x].push_back(y);
		deg[y]++; # 入次数をカウント
	}
	
	vector<int>ans(n);
	queue<int>q;
	int cnt=0;
	for(int i=0;i<n;i++)if(deg[i]==0)q.push(i); # 一筆書きの最初の地点を検索
	while(!q.empty()){
		if(q.size()!=1){ # 開始地点が2つ以上ある時は無条件でNo
			cout << "No" << endl;
			return 0;
		}
		int v=q.front();q.pop(); # qに入っている指し示す頂点vを取り出す
		ans[v]=++cnt;
		for(auto vv:G[v])if(!--deg[vv])q.push(vv); # 入次数が1の時にpush
	}

	cout << "Yes" << endl;
	for(int i=0;i<n;i++)cout << ans[i] << " \n"[i==n-1];
}

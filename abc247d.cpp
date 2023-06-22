#include <bits/stdc++.h>
using namespace std;

int main() {
    int Q;
    cin >> Q;
    
    deque<pair<long long, long long>> tube;  // 筒を表現するデック
    
    while(Q--) {
        int type;
        cin >> type;
        
        if(type == 1) {  // クエリタイプ1の場合
            long long x, c;
            cin >> x >> c;
            tube.push_back({x, c});  // ボールを筒に入れる
        } else {  // クエリタイプ2の場合
            long long c;
            cin >> c;
            long long sum = 0;
            
            while(c > 0) {
                auto ball = tube.front();  // ボールを筒から取り出す
                
                long long extract = min(ball.second, c);
                sum += ball.first * extract;
                c -= extract;
                ball.second -= extract;
                
                if(ball.second > 0) {
                    tube.front() = ball;  // ボールが残っている場合は再度筒の先頭に入れる
                } else {
                    tube.pop_front();
                }
            }
            
            cout << sum << endl;  // ボールに書かれた数の合計を出力
        }
    }
    
    return 0;
}

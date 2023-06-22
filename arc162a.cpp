#include <iostream>
#include <vector>
#include <algorithm>

using namespace std;

int main() {
    int T;
    cin >> T;
    while(T--){
        int N;
        cin >> N;
        vector<int> P(N);
        for(int i = 0; i < N; i++) cin >> P[i];

        int mini = N + 1;
        int cnt = 0;
        for(int i = N-1; i >= 0; i--){
            if(P[i] > mini) cnt++;
            mini = min(mini, P[i]);
        }
        cout << N - cnt << "\n";
    }
    return 0;
}

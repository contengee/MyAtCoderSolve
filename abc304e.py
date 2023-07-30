class UnionFind:
    def __init__(self, n):
        self.parent = list(range(n))
        self.rank = [0] * n

    def find(self, x):
        if self.parent[x] != x:
            self.parent[x] = self.find(self.parent[x])
        return self.parent[x]

    def union(self, x, y):
        x = self.find(x)
        y = self.find(y)
        if x != y:
            if self.rank[x] < self.rank[y]:
                x, y = y, x
            if self.rank[x] == self.rank[y]:
                self.rank[x] += 1
            self.parent[y] = x

N, M = map(int, input().split())
edges = [list(map(int, input().split())) for _ in range(M)]
K = int(input())
XY = [list(map(int, input().split())) for _ in range(K)]
Q = int(input())
PQ = [list(map(int, input().split())) for _ in range(Q)]

uf = UnionFind(N+1)
for u, v in edges:
    uf.union(u, v)

no_path = set()
for x, y in XY:
    no_path.add((uf.find(x), uf.find(y)))

for p, q in PQ:
  if (uf.find(p), uf.find(q)) in no_path or (uf.find(q), uf.find(p)) in no_path:
    print('No')
  else:
    print('Yes')

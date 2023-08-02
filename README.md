# MyAtCoderSolve

## 概要
このリポジトリでは、AtCoderの問題を解いたコードを一部まとめています。

## AtCoderの問題へのリンク

AtCoderの問題への便利なリンクを提供しているサイトがあるので、そちらを参照すると便利です（kenkoooo様作）。

- [AtCoder Problems](https://kenkoooo.com/atcoder/#/table/)

## 使用技術
- C++ (GCC 9.2.1)
- Python (PyPy 7.3.0)
- PHP (7.4.4)
- Bash (5.0.11)
- Awk (GNU Awk 4.1.4)
- TypeScript (3.8)

## インストールと使用方法
各ファイルは、独立したファイルとして提供されています。
適切なコンパイラまたはインタープリタを使用してコードを実行して下さい。

### C++
C++をコンパイル・実行するには以下のコマンドを使用します：
```bash
g++ abc213d.cpp -std=c++17 -I . -o abc213d
./abc213d input.txt
```

### Python
Pythonを実行するには以下のコマンドを使用します：
```bash
pypy abc213d.py input.txt
```

### PHP
PHPを実行するには以下のコマンドを使用します：
```bash
php abc213d.php input.txt
```

### Bash
Bashを実行するには以下のコマンドを使用します：
```bash
chmod +x abc213d.sh
./abc213d.sh input.txt
```

### Awk
Awkを実行するには以下のコマンドを使用します：
```bash
awk -f abc213d.awk input.txt
```

### TypeScript
TypeScriptを実行するには以下のコマンドを使用します：
```bash
tsc abc213d.ts
node abc213d.js input.txt
```

### WSL2上での設定
```bash
alias g++ac='g++ -std=gnu++17 -Wall -Wextra -O2 -D_DEBUG -I .'
```

# Redisを利用したデータ分析

## データの内容

WorldCupの6日目〜20日目までにとあるサイトを訪問したユーザー数及びPV数が保存されています。

参考 : http://ita.ee.lbl.gov/html/contrib/WorldCup.html

- daysXX_count 訪問PV
- daysXX_bit : 訪問ユーザー

訪問ユーザーはsetbitコマンドを用いて、ビット形式でされています。保存方法は以下の通りです。

- 各訪問者に対して一意に整数を割り振る。
- 各日付のkey（例. day06）のn番目のbitに対してビットを立てる（1を保存する）

参照 : http://redis.io/commands/setbit


## 課題

これから皆さんには上記データを利用してアクセス解析を行って頂きます。

各課題のデータを作成した後、必ず何かしらのツールを使って可視化すること。

（Google SpreadsheetやExcel等でも問題ありません）

- それぞれの日で、何PVあったのかを計算して下さい。

calculate and make any graph of pv for each days

- それぞれの日で、何人の訪問者がいたのかを計算して下さい。
calculate and make any graph of number of users for each days

- それぞれの日で、訪問者あたりの平均PV数を計算して下さい。

calculate average pv/user for each days

- 6 〜 19日までのデータを利用して、20日目のPV数と訪問者数を推測し、推測結果と実際の結果を比較して下さい。

predict pv and number of users for 20th day with previous(6 - 19th day) data and evaluate it with 20th day's original data.

- 全日を通して、訪問日数のヒストグラムを作成して下さい。

create histogram(x: count of visited days, y: number of user)

- 全日を通して、ユーザーのこのサイトでの平均訪問日数を計算して下さい。

calculate average count of visited days in total

- サイト利用者の継続率のコホート分析を作成して下さい（縦軸 : 初回訪問日、横軸 : 継続率）

create cohort table(x: percentage of continuity of visiting, y: first visited day)

## ipアドレス一覧

- 54.65.136.108
- 54.65.134.200
- 54.65.136.125
- 54.65.136.119
- 54.65.136.115
- 54.65.136.126

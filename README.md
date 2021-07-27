# charlet

PHP 製のポートフォリオです。開発途中(開発開始日：2021/07/21)。

# 概要

Twitter と同じ感覚で知見を投稿し、ハッシュタグで整理して後から見やすくする Web アプリです。

まだ開発途中なので一部機能が使用できませんが、ポートフォリオとして公開します。

# イメージ

![img1](https://user-images.githubusercontent.com/59781920/126909545-f78679d2-06a9-4f80-b884-1933befcf8ce.PNG)

ハッシュタグ別に閲覧できます
![img2](https://user-images.githubusercontent.com/59781920/126909551-715db2da-4ec1-447d-af3f-3eca91814c90.PNG)

複数のハッシュタグをグループにまとめることも可能です
![img3](https://user-images.githubusercontent.com/59781920/126909555-95df7fab-6783-4d7c-8edd-8ecbd10c460b.PNG)

# 動作環境

・Apache

・PHP(7.2.14)

・MySQL(5.7.24)

# 注意事項

・メール送信ができる状態にしておかないと、システムからアカウントの新規登録ができません

# インストール

１．このソースコードを取得します

２．/var/www/html/~ 以降のどこかに配置します

３．以下のフォルダのパーミッションを 777 に変更します

- ~/config

- ~/templates/templates_c

４．後は http://~/にアクセスし、セットアップを開始してください

# 今後の予定

現在の予定は以下の通りです。

・未実装の機能を追加する

・パーミッションの設定の自動化(できれば)

・アカウントのアイコンの登録

・セキュリティ関連の強化

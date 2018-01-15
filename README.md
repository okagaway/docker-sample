# ECS調査用 Dockerサンプル

nginxイメージのみで起動、docker-composeでnginx+php-pfmで起動の2種類を準備

## nginx単体で起動

コンテナ起動

```bash
$ cd nginx-only
$ docker build . -t nginx-only
$ docker run --name nginx-only-test -p 80:80 nginx-only -d
```

ブラウザで確認

http://127.0.0.1/index.html

## docker-composeで起動

コンテナ起動

```bash
$ docker-compose up --build -d
```

ブラウザで確認

* http://127.0.0.1/index.html
* http://127.0.0.1/index.php

## ecs-cli

ecs-cliでcomposeする場合は、nginx、php-fpmのイメージをプッシュしておく必要がある
---
title: 静的サイト生成（SSG）
description: Accela Wikiを静的HTMLとして出力する方法を説明します。
---

# 静的サイト生成（SSG）

Accela Wikiは静的HTMLとして出力することができます。これにより、PHPが動作しない環境（GitHub Pages、Netlify、S3など）にもデプロイ可能です。

## ビルド

```bash
php app/bin/build
```

`/out`ディレクトリに静的ファイルが生成されます。

## 生成されるファイル

- **HTMLファイル** - 全ページが`.html`として出力
- **APIレスポンス** - `out/api/`以下にJSONが出力
- **アセット** - `assets/`ディレクトリがコピーされる
- **.htaccess** - 拡張子なしURLのためのリライトルール（Apache用）

## 注意事項

生成される`.htaccess`はApache環境向けです。GitHub PagesやNetlify等で拡張子なしURLを使いたい場合は、ファイルを`{name}.md`ではなく`{name}/index.md`として作成してください。

# Accela Wiki

[https://wiki.accela.in-green-spot.com](https://wiki.accela.in-green-spot.com)

マークダウンファイルを置くだけで動作するWikiシステムです。

- **PHPのみで動作**<br>Node.js不要で、レンタルサーバでも動作します。
- **データベース不要**<br>ファイルベースで完結します。
- **ビルド不要**<br>PHPのまま設置すれば公開されます。
- **AIと相性抜群**<br>AI用の仕様書を使って、マークダウンを自動生成することができます。

## クイックスタート

```bash
git clone https://github.com/accela-framework/wiki.git
cd wiki
composer install
```

## 動作環境

- PHP 8.2以上
- Webサーバー（Apache / Nginx）

## ディレクトリ構成

```
data/
├── index.md           → /
├── 01_page.md         → /page
└── 02_section/
    ├── index.md       → /section/
    └── 01_child.md    → /section/child
```

- ファイル名がURLにマッピング
- 数字プレフィックス（`01_`等）で並び順を制御
- プレフィックスはURLからは除外される

## AIでドキュメントを生成

`ai-docs/`ディレクトリにAI向けの仕様書が含まれています。
AIツール（Claude Code、Cursor等）に読み込ませることで、Wikiコンテンツを自動生成できます。

詳細は [AIを使った開発](https://wiki.accela.in-green-spot.com/ai/) を参照してください。

## ドキュメント

- [インストールガイド](https://wiki.accela.in-green-spot.com/installation)
- [基本的な使い方](https://wiki.accela.in-green-spot.com/guide/)
- [Accelaの機能](https://wiki.accela.in-green-spot.com/accela/)

## ライセンス

MIT

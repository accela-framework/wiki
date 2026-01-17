---
title: カスタマイズ
description: Accela Wikiのスタイルやレイアウトをカスタマイズする方法を説明します。
---

# カスタマイズ

## スタイル

CSSは`/assets/css/styles.css`にあります。CSS変数を使用しているため、色やフォントの変更が容易です。

```css
:root {
  --color-primary: #2563eb;      /* メインカラー */
  --color-text: #1f2937;         /* テキスト色 */
  --color-bg: #ffffff;           /* 背景色 */
  --sidebar-width: 280px;        /* サイドバー幅 */
}
```

## レイアウト

レイアウトは`/app/components/layout.html`で定義されています。
ヘッダー、サイドバー、メインコンテンツの構造を変更できます。

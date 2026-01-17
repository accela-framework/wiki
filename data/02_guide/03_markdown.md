---
title: マークダウン
description:
---

# マークダウン

標準的なマークダウン記法が使えます。

ライブラリ: [https://github.com/markedjs/marked](https://github.com/markedjs/marked)

## テキスト

### 太字
`**太字**`

### 斜体
`*斜体*`

### リンク
`[テキスト](URL)`

## 見出し

```markdown
# 見出し1
## 見出し2
### 見出し3
```

## リスト

```markdown
- 項目1
- 項目2
  - サブ項目
```

## テーブル

```markdown
| 列1 | 列2 |
|-----|-----|
| A   | B   |
| C   | D   |
```

## 引用

```markdown
> 引用文
```

## 画像

```markdown
![代替テキスト](画像URL)
```

## 水平線

```markdown
---
```

## コード

インラインコード: `` `code` ``

ブロックコード:
````markdown
```php
echo "Hello";
```
````

## 内部リンク

Wiki内の他のページへのリンクは、絶対パスで記述します。

```markdown
[基本的な使い方](/guide/basic-usage)
[トップページ](/)
```

ファイル名のプレフィックス（01_, 02_等）はURLには含めません。

## その他

外部リンクには自動で`target="_blank"`が付与されます。

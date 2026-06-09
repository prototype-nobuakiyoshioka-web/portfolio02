---
status: implemented
target: Portfolio Theme (WordPress)
mode: light
---

# Portfolio Theme — Design System

ライト基調 × 強いタイポグラフィをビジュアルとして使う方向性。

---

## 1. Design Tokens

### Colors

| Token | Value | 用途 |
|---|---|---|
| `--bg` | `#f8f7f4` | ページ背景（温かみのあるオフホワイト） |
| `--bg-alt` | `#f0ede8` | 画像プレースホルダー・セクション背景 |
| `--surface` | `#ffffff` | カード・パネル背景 |
| `--ink` | `#0d0d0d` | 本文・見出し |
| `--ink-sub` | `#888888` | サブテキスト・ラベル |
| `--line` | `#e2dfd9` | セパレーター・カード境界 |
| `--line-light` | `#ece9e4` | 薄めのライン |
| `--accent` | `#0d0d0d` | アクセント（このトークン1つを変えてテーマ変更可能） |

### Typography

```
font-family: 'Hanken Grotesk Variable', -apple-system, Hiragino Sans, Noto Sans JP, sans-serif
```

| Style | Size | Weight | 用途 |
|---|---|---|---|
| Hero | `clamp(5rem, 16vw, 18rem)` | 800 | トップヒーロー大見出し |
| Page H1 | `clamp(2.5rem, 7vw, 7rem)` | 800 | 下層ページH1 |
| H2 | `clamp(1.5rem, 3vw, 2.5rem)` | 700 | セクション見出し |
| H3 | 1.25rem | 700 | カード・アイテム見出し |
| Body | 1rem | 400 | 本文 |
| Label | 0.72rem | 700 | セクションラベル（大文字） |
| Mono | font-mono | 700 | 番号・カウンター |

### Layout

- **コンテンツ幅**: `1280px`
- **水平パディング**: `clamp(20px, 5vw, 64px)`
- **セクション間隔**: `clamp(80px, 12vw, 160px)`
- **ブレークポイント**: 900px（Tablet）、640px（SP）

---

## 2. Components

### Navigation
- 上部固定（sticky）、`backdrop-filter: blur(12px)` + 90%透明背景
- ブランド名: 左、ナビ: 右
- ナビリンク: UPPERCASE、0.78rem、font-weight 700

### Buttons
| Variant | 背景 | 文字 | 用途 |
|---|---|---|---|
| `.btn` | `--ink` | `--bg` | 主要アクション |
| `.btn--outline` | 透明 | `--ink` | サブアクション |

### Work Cards
- アスペクト比 3:4（フロントページ）/ 16:10（一覧ページ）
- ホバー: 画像 `scale(1.04)` のみ
- grayscaleは使用しない（カラー画像をそのまま表示）

### CTA Block
- ダーク背景（`--ink`）でリバース表示
- ページ最下部に配置

---

## 3. Motion

- scroll reveal: `opacity 0 → 1` + `translateY(24px → 0)`、GSAP ScrollTrigger
- ホバー: transition `200ms`
- `prefers-reduced-motion: reduce` を尊重

---

## 4. Change Log

- **2026-06-09**: 完全リビルド。ダークテーマ廃止、ライト × タイポグラフィ基調に移行。スライダー廃止、グリッドレイアウトに変更。

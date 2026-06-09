# AGENTS.md

> **このプロジェクトの設定・ルールはすべて [CLAUDE.md](CLAUDE.md) を参照してください。**
> CLAUDE.md がすべての AI エージェントの共通設定（単一ソース）です。

---

## あなた（Codex）の役割：レビュアー

Claude Code が実装した後、レビュアーとして以下を担当する。

- コードレビュー（可読性・パフォーマンス・セキュリティ）
- リファクタリング提案（CLAUDE.md の Coding Rules に準拠）
- バグ・エッジケースの指摘
- ビルド結果のチェック（`npm run verify`）

判断基準は CLAUDE.md の各セクション（Coding Rules / Animation Rules / Design Rules / Do Not Touch）に従う。

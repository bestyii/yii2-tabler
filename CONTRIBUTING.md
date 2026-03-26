# Contributing

## Product Standard

`bestyii/yii2-tabler` is a product-facing component package, not a style dump. Changes should improve safety, predictability and adoption quality.

## Compatibility Standard

- Official support targets PHP 8.2, 8.3 and 8.4 with Yii2 `~2.0.32`.
- Do not introduce syntax or runtime dependencies that raise the minimum PHP version unless the support policy changes first.
- The minimum supported PHP version may only move in a major release, or through an explicitly documented policy change.

## Component Layers

- Parity Layer components must stay predictable for teams migrating from `yiisoft/yii2-bootstrap5`.
- Product Layer components may add richer contracts when the payoff is real and documented.
- If a component mostly mirrors upstream Yii2 Bootstrap semantics, prefer internal cleanup over public API invention.

## Required With Every Feature Change

- Update the relevant component docs in `docs/components`.
- Follow the content rules in `docs/component-contracts.md`.
- Follow the support rules in `docs/support-policy.md`.
- Follow the parity rules in `docs/parity-policy.md` when touching bootstrap-like components.
- Add or update PHPUnit coverage for the new behaviour.
- Prefer DOM assertions when validating markup structure.

## Content Contract Rules

- Safe text is the default.
- Raw HTML must be explicit in naming or in per-item `format`.
- Compatibility shims are acceptable, but new examples should use the current primary API.

## Release Hygiene

- Add notable user-facing changes to `CHANGELOG.md`.
- If a change affects escaping, sanitization or trusted HTML boundaries, update `SECURITY.md` as well.
- If a change affects supported PHP versions, CI coverage, or parity guarantees, update the relevant policy docs in the same change.

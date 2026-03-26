# Contributing

## Product Standard

`bestyii/yii2-tabler` is a product-facing component package, not a style dump. Changes should improve safety, predictability and adoption quality.

## Required With Every Feature Change

- Update the relevant component docs in `docs/components`.
- Follow the content rules in `docs/component-contracts.md`.
- Add or update PHPUnit coverage for the new behaviour.
- Prefer DOM assertions when validating markup structure.

## Content Contract Rules

- Safe text is the default.
- Raw HTML must be explicit in naming or in per-item `format`.
- Compatibility shims are acceptable, but new examples should use the current primary API.

## Release Hygiene

- Add notable user-facing changes to `CHANGELOG.md`.
- If a change affects escaping, sanitization or trusted HTML boundaries, update `SECURITY.md` as well.

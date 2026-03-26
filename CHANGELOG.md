# Changelog

## Unreleased

- Lowered the package support floor to PHP 8.2 and aligned CI around 8.2, 8.3 and 8.4.
- Enabled PHPUnit coverage metadata and added a dedicated CI coverage artifact job plus a README CI badge.
- Added support policy, parity policy and a 1.0 roadmap to document compatibility and release expectations.
- Made the package test harness resolve vendor and runtime paths from the package root so standalone clones and temp copies can run the suite reliably.
- Added explicit product-level component contract documentation.
- Made `Table` and `AdvancedTable` prefer explicit `format` semantics with safe text defaults.
- Hardened `Popover` defaults for text content, sanitization and encoded trigger labels.
- Added explicit HTML aliases for `Card` content slots.
- Split `TablerExtrasAsset` into narrower asset bundles and made `Flag` / `Payment` self-register their own CSS.
- Expanded tests around DOM structure and safety defaults.

---
title: Component Contracts
description: Product-level rules for content safety, HTML slots, tests and docs in bestyii/yii2-tabler.
status: maintained
source: docs/component-contracts.md
package: bestyii/yii2-tabler
---

# Component Contracts

`bestyii/yii2-tabler` is optimized for backend product work, which means every widget has to be predictable under real data and real templates.

## Component Layers

- The package has two layers: a Parity Layer for bootstrap-like widgets and a Product Layer for richer Tabler-specific components.
- Parity Layer work should preserve the public API, behavior model and migration expectations of `yiisoft/yii2-bootstrap5` wherever practical.
- Product Layer work may introduce stronger content contracts, typed shortcuts and explicit asset ownership when the value is clear and documented.
- Internal refactoring is welcome, but user-facing invention belongs in Product Layer components, not in parity-first widgets.

## Content Rules

- Text properties are safe by default. Names like `title`, `subtitle`, `label`, `emptyText` and similar scalar text fields should render as text.
- Raw HTML must be explicit. New code should prefer names like `contentHtml`, `headerHtml`, `footerHtml` and `titleHtml`.
- Buffered `begin()/end()` output is treated as HTML by design because it is used to compose widget markup.
- Collection-like APIs should use `format` instead of ambiguous booleans. `Table` and `AdvancedTable` use `FORMAT_TEXT` and `FORMAT_HTML`.
- Legacy compatibility flags such as `encode` may stay temporarily, but they should be documented as bridges, not as the primary API.

## Safety Defaults

- If a component accepts both plain text and HTML, plain text should be the default.
- If a component exposes a raw HTML slot, the documentation must say so explicitly.
- If JavaScript widgets allow HTML rendering, sanitization should default to the safer path unless the component documentation explains why not.

## Asset Ownership Rules

- Widget-owned visuals should self-register the smallest asset bundle they need.
- Page-level decorative or marketing assets should be registered explicitly by the page when no dedicated widget owns them.
- Compatibility aggregate bundles may remain, but new code should prefer the narrowest matching asset.

## Documentation Rules

- Every component page must explain which properties are text and which are HTML.
- Every new public shortcut or typed factory must be documented in the component page.
- Product-wide rules belong here or in `README.md`, not only in individual PR descriptions.

## Test Rules

- New rendering features need both a positive rendering test and a safety test.
- HTML-heavy components should prefer DOM assertions over plain substring checks.
- If a component introduces a new content contract, its tests and docs must be updated in the same change.

## Migration Rules

- Avoid silent behaviour changes unless the new default fixes a real product risk.
- When a legacy API is kept for compatibility, provide an explicit forward path in docs and examples.

---
title: 1.0 Roadmap
description: Definition of done for a 1.0-quality release of bestyii/yii2-tabler.
status: active
source: docs/roadmap-1.0.md
package: bestyii/yii2-tabler
---

# 1.0 Roadmap

Version 1.0 should mean that a modern Yii2 team can adopt the package without depending on author memory or ad-hoc source reading.

## Release Goals

- Officially support PHP 8.2, 8.3 and 8.4.
- Keep parity-first components stable and unsurprising for bootstrap migrants.
- Make content safety and asset ownership explicit package-level contracts.
- Prove representative preview pages in a browser, not only in string-based unit tests.

## Workstreams

### Platform and CI

- Keep the package installable and testable on PHP 8.2.
- Run stable and lowest-dependency lanes in CI.
- Ensure docs and policies are updated whenever support or safety promises change.

### Parity and Product Contracts

- Preserve parity for bootstrap-like widgets such as `ActiveField` and `ActiveForm`.
- Continue using explicit naming for raw HTML entry points in product-layer components.
- Avoid silent contract drift between docs, tests and runtime behavior.

### Proof and Validation

- Add browser-level smoke coverage for representative preview pages.
- Treat preview-lab pages as product contract fixtures, not just demos.
- Keep asset publication and DOM structure tests in the package test suite.

### Documentation and Adoption

- Maintain a clear support policy, parity policy and migration story.
- Expand cookbook-style examples for common admin, CRUD and dashboard pages.
- Keep the changelog versioned enough that upgrades can be planned, not guessed.

## Definition of Done

- CI proves PHP 8.2 through 8.4 compatibility.
- Support policy and parity policy are published and kept current.
- The package docs have a clear start path for new adopters.
- Key preview pages are covered by browser smoke checks.
- Parity-first components remain stable without unnecessary public reshaping.

---
title: Bootstrap Parity Policy
description: Rules for components that intentionally mirror yiisoft/yii2-bootstrap5 semantics.
status: maintained
source: docs/parity-policy.md
package: bestyii/yii2-tabler
---

# Bootstrap Parity Policy

Some components in `bestyii/yii2-tabler` are valuable precisely because they feel familiar to teams coming from `yiisoft/yii2-bootstrap5`.

## What Counts as Parity Layer

- Widgets whose public API, mental model and integration pattern intentionally stay close to upstream Yii2 Bootstrap.
- Typical examples include `ActiveForm`, `ActiveField`, `NavBar`, `Nav`, `LinkPager`, `Modal`, `Tabs`, `ButtonGroup` and related bootstrap-like helpers.

## Rules

- Do not invent new public concepts unless upstream parity clearly fails to solve a real product need.
- Do not split stable widgets into extra abstractions just to make the internals look cleaner.
- Prefer compatibility-preserving internal cleanup, targeted bug fixes and Tabler-specific rendering adjustments.
- Keep option names, usage shape and migration expectations aligned with the bootstrap baseline whenever practical.

## Allowed Enhancements

- Safer defaults when the previous behavior is risky.
- Better asset ownership and publishing behavior.
- More explicit documentation, stronger tests and internal refactoring without API churn.
- Tabler-specific visual markup that does not force users to relearn the component.

## Required Checks

- If a change touches a parity-first component, verify that public examples still read like Yii2 Bootstrap examples.
- Tests should focus on behavior preservation, not on pushing the component into a new abstraction model.
- Breaking parity must be treated as a product decision, not as an incidental refactor.

---
title: Support Policy
description: Official platform support, CI coverage and compatibility promises for bestyii/yii2-tabler.
status: maintained
source: docs/support-policy.md
package: bestyii/yii2-tabler
---

# Support Policy

`bestyii/yii2-tabler` targets modern Yii2 teams that need a stable package, not a moving demo.

## Official Support Matrix

- PHP 8.2, 8.3 and 8.4 are officially supported.
- Yii2 `~2.0.32` is the current framework target.
- Package support is validated through PHPUnit, PHPStan and ECS gates.

## CI Coverage

- PHPUnit runs on PHP 8.2, 8.3 and 8.4.
- The lowest supported dependency lane runs on PHP 8.2.
- Static analysis runs on the support floor and on the newest supported PHP.
- Coding style checks run on the support floor so new code stays parseable on PHP 8.2.

## Compatibility Promise

- Raising the minimum PHP version requires an explicit policy change and should normally happen only in a major release.
- New features must not rely on syntax or core APIs unavailable on the published support floor.
- Safety hardening is allowed when it fixes a real product risk, but the forward path must be documented.

## Stability Tiers

- Stable: production-ready APIs with backward-compatibility expectations.
- Beta: usable but still settling around edge cases or final naming.
- Experimental: intentionally flexible and not yet covered by a long-term compatibility promise.

## Dependency Strategy

- Runtime compatibility matters more than chasing the latest test stack.
- Dev tooling may be downgraded when needed to preserve the official PHP support floor.
- Lowest-dependency CI exists to detect overly optimistic version assumptions early.

# Security Policy

## Rendering Model

`bestyii/yii2-tabler` aims for safe-by-default text rendering and explicit HTML slots.

- Text properties such as `title` and `label` should render as text.
- Raw HTML should be opt-in through explicit names such as `contentHtml` or explicit per-item `format`.
- Legacy raw HTML entry points may remain for compatibility, but they should be documented clearly.

## Reporting

If you find a security issue in this package, report it privately to `hello@bestyii.com` with:

- affected component
- reproduction steps
- impact assessment
- suggested fix if available

Please avoid opening public issues for unpatched vulnerabilities.

# Project Development Guide

This repository contains a complete WordPress installation. The custom theme currently lives at `wp-content/themes/raju-theme`; WordPress core, bundled themes, and bundled plugins are also present.

## Project boundaries

- Never modify WordPress core files or directories, including the WordPress root, `wp-admin/`, and `wp-includes/`.
- Keep all custom development inside `wp-content/`. Prefer a purpose-built custom plugin for site functionality and a child theme or the existing custom theme for presentation changes.
- Treat bundled WordPress themes and third-party plugins as upstream code. Do not customize them directly; use a child theme, hooks, or a custom plugin instead.
- Never delete files unless the user has explicitly given permission to delete them.
- Before implementing requested changes, explain the intended changes and the files or areas they affect. Ask before installing dependencies or adding external packages.

## WordPress coding standards

- Follow the WordPress PHP Coding Standards and WordPress JavaScript and CSS coding conventions where applicable.
- Use WordPress APIs for settings, options, metadata, queries, internationalization, enqueueing, and database access instead of recreating their behavior.
- Prefix or namespace custom functions, classes, constants, hooks, handles, and global identifiers to avoid collisions. Use the project’s existing naming conventions when they are established.
- Add `ABSPATH` guards to directly accessible PHP entry files where appropriate. Keep files focused and organize related functionality in clear modules.
- Include translation functions for user-facing strings and use a consistent text domain for custom code.

## Secure PHP and data handling

- Treat all request data, options, metadata, and remote responses as untrusted. Validate and sanitize data on input, and escape it at output for its exact context (`esc_html()`, `esc_attr()`, `esc_url()`, or `wp_kses()` as appropriate).
- Use nonces to protect state-changing requests, and separately check capabilities with `current_user_can()`. A nonce is not authorization.
- Use `$wpdb->prepare()` for SQL containing variable data. Prefer WordPress APIs and avoid building SQL from untrusted strings.
- Avoid unsafe deserialization, dynamic code execution, and exposing secrets, credentials, or sensitive personal data. Keep secrets out of source control.
- For REST endpoints and AJAX handlers, validate inputs, enforce permissions, return appropriate status codes, and use WordPress response helpers.

## Clean and reusable code

- Keep functions and classes small, cohesive, and named for their purpose. Extract repeated logic into reusable helpers when that improves clarity.
- Prefer explicit dependencies and predictable return values. Avoid unnecessary global state, duplicated logic, deeply nested conditionals, and premature abstraction.
- Preserve existing behavior unless the requested change requires otherwise. Follow local patterns when sound, and explain intentional departures.
- Comment why non-obvious code exists; avoid comments that merely restate the code.

## HTML5, CSS3, and JavaScript

- Write semantic HTML5 with valid structure and meaningful elements. Keep content, presentation, and behavior separated where practical.
- Use maintainable CSS3, scoped selectors, and design tokens or theme settings for shared values. Avoid brittle selectors, unnecessary `!important`, and layout dependent on fixed viewport dimensions.
- Write modern, readable JavaScript and use WordPress-provided libraries and APIs where appropriate. Enqueue scripts and styles with WordPress functions, declare dependencies, and load assets only where needed.
- Avoid inline scripts and styles for application logic. Ensure interactive features still work without relying on color, hover, or pointer input alone.

## Responsive design

- Build mobile-first layouts that adapt fluidly to narrow and wide screens, with no unintended horizontal scrolling.
- Use flexible sizing, responsive images, and content-driven breakpoints. Check navigation, forms, media, and block layouts at common viewport widths.
- Respect user preferences such as reduced motion, and do not assume touch, mouse, or a particular screen orientation.

## WordPress hooks and filters

- Use actions and filters to extend WordPress rather than editing core or third-party code. Register callbacks with clear names and the correct priority and accepted-argument count.
- Use `add_action()` and `add_filter()` at an appropriate load point; avoid work during file inclusion when it can be deferred to a hook.
- Use narrowly scoped hooks, remove callbacks only when necessary, and document custom hooks intended for extension.
- For theme assets and theme setup, use the relevant theme hooks and WordPress enqueue APIs rather than hard-coded asset tags.

## Performance

- Avoid unnecessary database queries, repeated remote requests, and expensive work on every request. Cache costly reusable results with suitable invalidation.
- Enqueue only required assets, keep front-end scripts lean, and avoid loading admin-only code on the public site or vice versa.
- Use WordPress image functions and responsive image support. Set appropriate dimensions and loading behavior without lazy-loading the primary above-the-fold image unnecessarily.
- Measure before optimizing and preserve correctness, accessibility, and maintainability while improving speed.

## Accessibility

- Aim for WCAG 2.2 AA practices and use semantic landmarks, a logical heading order, descriptive link text, and labels for form controls.
- Ensure keyboard access, visible focus, sensible focus management, sufficient contrast, and accessible names and states for interactive controls.
- Provide useful text alternatives for meaningful images; use empty alternatives for decorative images. Do not communicate information through color alone.
- Honor reduced-motion preferences and test interactive flows with keyboard navigation and assistive-technology-friendly markup.

## Git workflow

- Inspect the working tree before editing and preserve unrelated user changes. Keep each change focused and review the diff before completion.
- Use descriptive branch and commit names when working with branches or commits. Do not rewrite shared history or force-push unless explicitly requested.
- Never commit credentials, environment-specific configuration, generated artifacts, or unrelated changes. Do not delete or overwrite user data without permission.

## Code review and verification

- Review changes for correctness, security, WordPress compatibility, accessibility, responsive behavior, performance, and unintended scope expansion.
- Run only relevant checks that are available in the repository, such as PHP linting, configured coding-standard checks, or focused manual verification. Do not install tools or dependencies without asking first.
- Report which checks were run and their results. If a check cannot run, state the limitation clearly; do not claim unperformed testing.
- Keep fixes within the requested scope and within custom `wp-content` code.

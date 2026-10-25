# Ruxfund

Ruxfund is a PHP-based crypto investment / fundraising-style web application. It provides a public marketing site, user registration and authentication, investment plan selection, referral tracking, wallet configuration, transaction summaries, and administrative controls.

This repository is best described as an MVP-style financial web application and a portfolio project. It demonstrates server-side PHP, relational database modeling, and a classic multi-page web app architecture. It is not presented here as a production-ready financial platform.

## Project status

Status: MVP / prototype / functional demo

This repository contains a working application structure and a database schema for a crypto-investment platform, but it still has important limitations:

- There is no verified public deployment URL in the repository.
- No automated test suite is present.
- The project currently relies on a legacy PHP architecture and custom database helpers rather than a modern framework.
- Security hardening should be completed before any real production deployment or public launch.

## Live demo

No verified live application URL was found in the repository or project metadata. Please run the app locally using the instructions below.

## Engineering highlights

- Server-side PHP business logic for auth, account management, deposits, withdrawals, and referral tracking
- PostgreSQL/Supabase schema designed for the app’s data model
- Investment-plan logic driven from database configuration instead of hard-coded values
- Referral-driven account acquisition and incentive model
- Session-based user flow and admin configuration patterns
- Deployment configuration for PHP hosting and Wasmer

## Features

### Implemented

- Public marketing landing page with investment messaging and pricing blocks
- User registration and login
- Referral and affiliate tracking
- Investment plan listing and account funding flow
- Withdrawal and transfer-related transaction handling
- Wallet address management
- KYC submission workflow
- FAQ/testimonial content management
- Admin dashboard and admin login flow
- PostgreSQL/Supabase schema and migration guidance
- Public and account-level investment plan navigation backed by the `plan` table
- Deposit selection and payment-instruction flow backed by configured `sitewallet` records

### Partially implemented or unclear

- Real crypto payment processing and bank/crypto settlement flows are not fully documented or proven in the codebase.
- Some transaction flows are modeled, but direct external blockchain or payment infrastructure integration appears limited to configuration and placeholder logic.
- Some admin and security flows still use older patterns that should be hardened before production use.

### Planned / not represented as complete

- Production-grade financial controls
- Real audit trail and compliance tooling
- Full automated testing pipeline
- Production deployment or monitoring setup

### Optional production integrations

Set `SMARTSUPP_KEY` in the Wasmer application environment to enable the Smartsupp live-chat loader. The integration is intentionally disabled when the key is absent; no demo chat account or hard-coded third-party key is included.

## Technology stack

### Frontend

- HTML
- CSS / SCSS
- JavaScript
- Bootstrap-style UI assets and custom PHP-rendered templates

### Backend

- PHP
- Custom procedural business logic in `includes/functions.php`
- Session-based auth flow

### Database

- PostgreSQL / Supabase
- Legacy MySQL references remain in some documentation and older SQL files

### Deployment / runtime

- PHP built-in server for local use
- Wasmer configuration (`wasmer.toml`)
- Apache-compatible deployment via `.htaccess`

## Architecture

This application is a classic server-rendered PHP web app. Pages are generated directly from PHP templates, and data is loaded from a PostgreSQL database through a custom compatibility layer.

```mermaid
flowchart LR
    User[Visitor / User] --> Browser[Web Browser]
    Browser --> App[PHP App Pages\nindex.php, auth/, user/]
    App --> Session[PHP Session + Server-side Logic]
    App --> DB[(PostgreSQL / Supabase)]
    App --> Email[Mail sending functions]
    App --> Ext[External crypto/market widgets]
    Admin[Admin User] --> App
```

## Default investment plans

The database defaults include Starter plus Growth, Pro, and Elite. The three added plans use the existing daily ROI interval (`calc = 24`): Growth is 2% per day for 14 days ($100–$4,999), Pro is 2.5% per day for 30 days ($5,000–$24,999), and Elite is 3% per day for 60 days ($25,000–$100,000). These are configured calculation rates, not guarantees or forecasts of actual investment performance. The current ROI implementation uses simple, non-compounding accrual.

Fresh installations receive the plans through `supabase_schema.sql` (PostgreSQL/Supabase) or `schema.sql` (legacy MySQL). For an existing database, apply the matching idempotent script once: `migrations/postgresql/20261025_add_growth_pro_elite_plans.sql` or `migrations/mysql/20261025_add_growth_pro_elite_plans.sql`. Existing plan rows, including Starter, are not updated by these scripts.

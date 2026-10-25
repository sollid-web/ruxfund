# Security policy

This project is not currently production-audited, and it should be treated as a prototype or MVP until a security review is completed.

## Reporting a security issue

Please do not open a public issue for security-sensitive findings. Instead, contact the repository owner privately through GitHub or another secure channel and describe:

- the issue
- affected files or endpoints
- reproduction steps
- risk assessment
- suggested mitigation

## Important security notes

- Keep all `.env` values local and untracked.
- Never commit credentials, tokens, or database secrets.
- Review admin and authentication flows before any public launch.
- Avoid exposing sensitive configuration through the front-end.
- Treat financial and transaction flows as high-risk areas requiring review.

## Current security posture

The app currently contains several legacy patterns that should be reviewed before production use, including older authentication assumptions and database setup patterns.

Until a proper review is complete, do not rely on this project as a production financial platform.

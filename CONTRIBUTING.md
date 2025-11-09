# Contributing Guide

## Git Flow Strategy (Solo Development)

This project uses a simplified Git Flow approach adapted for solo development with Semantic Versioning (SemVer).

### Branch Structure

- **`main`**: Production-ready code. Always stable and deployable.
- **`develop`**: Active development branch. Integration branch for features.
- **`feature/*`**: New features or enhancements.
- **`hotfix/*`**: Critical fixes for production issues.

### Workflow

#### 1. Starting a New Feature

```bash
# Make sure you're on develop and it's up to date
git checkout develop
git pull origin develop

# Create a new feature branch
git checkout -b feature/algorithm-o-constant

# Work on your feature, commit frequently
git add .
git commit -m "feat: add O(1) constant complexity examples"

# Push your feature branch
git push -u origin feature/algorithm-o-constant
```

#### 2. Completing a Feature

```bash
# Merge feature into develop
git checkout develop
git merge --no-ff feature/algorithm-o-constant

# Push updated develop
git push origin develop

# Delete local feature branch
git branch -d feature/algorithm-o-constant

# Delete remote feature branch (optional)
git push origin --delete feature/algorithm-o-constant
```

#### 3. Creating a Release

```bash
# When develop is stable and ready for release
git checkout develop
git pull origin develop

# Update version in package.json and composer.json
# Then commit version bump
git add .
git commit -m "chore: bump version to v1.0.0"

# Merge to main
git checkout main
git merge --no-ff develop

# Tag the release with SemVer
git tag -a v1.0.0 -m "Release v1.0.0: Initial public release"

# Push everything
git push origin main
git push origin develop
git push origin v1.0.0
```

#### 4. Hotfix for Production

```bash
# Create hotfix from main
git checkout main
git checkout -b hotfix/critical-bug-fix

# Fix the issue
git add .
git commit -m "fix: resolve critical security vulnerability"

# Bump patch version (e.g., 1.0.0 -> 1.0.1)
git commit -m "chore: bump version to v1.0.1"

# Merge to main
git checkout main
git merge --no-ff hotfix/critical-bug-fix
git tag -a v1.0.1 -m "Hotfix v1.0.1: Critical security patch"

# Merge back to develop
git checkout develop
git merge --no-ff hotfix/critical-bug-fix

# Push everything
git push origin main
git push origin develop
git push origin v1.0.1

# Delete hotfix branch
git branch -d hotfix/critical-bug-fix
```

## Semantic Versioning (SemVer)

Format: `MAJOR.MINOR.PATCH` (e.g., `1.2.3`)

- **MAJOR** (1.x.x): Breaking changes, incompatible API changes
- **MINOR** (x.1.x): New features, backward-compatible
- **PATCH** (x.x.1): Bug fixes, backward-compatible

### Version Bump Rules

- **Breaking change**: `1.0.0` → `2.0.0`
- **New feature**: `1.0.0` → `1.1.0`
- **Bug fix**: `1.0.0` → `1.0.1`

### Pre-release Versions

For development versions:
- `1.0.0-alpha.1`: Very early, unstable
- `1.0.0-beta.1`: Feature complete, testing phase
- `1.0.0-rc.1`: Release candidate, final testing

## Commit Message Convention

We follow [Conventional Commits](https://www.conventionalcommits.org/):

### Format

```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types

- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting, no logic change)
- `refactor`: Code refactoring (no feature/fix)
- `perf`: Performance improvements
- `test`: Adding or updating tests
- `chore`: Build process, dependencies, tooling
- `ci`: CI/CD configuration changes

### Examples

```bash
# New feature
git commit -m "feat(algorithms): add binary search O(log n) example"

# Bug fix
git commit -m "fix(theme): resolve dark mode toggle persistence issue"

# Documentation
git commit -m "docs(readme): update installation instructions"

# Breaking change
git commit -m "feat(api)!: change algorithm response format

BREAKING CHANGE: API now returns array instead of object"
```

## Branch Naming Convention

- Features: `feature/short-description`
- Hotfixes: `hotfix/short-description`

Examples:
- `feature/o-linear-algorithms`
- `feature/two-sum-example`
- `feature/dark-mode-toggle`
- `hotfix/navbar-mobile-menu`

## Current Version

Check `package.json` or `composer.json` for the current version.

## Quick Reference

```bash
# Daily workflow
git checkout develop
git pull origin develop
git checkout -b feature/my-feature
# ... work ...
git add .
git commit -m "feat: description"
git push -u origin feature/my-feature
git checkout develop
git merge --no-ff feature/my-feature
git push origin develop

# Release workflow
git checkout main
git merge --no-ff develop
git tag -a v1.x.x -m "Release message"
git push origin main --tags
```

## Protected Branches

On GitHub, consider protecting `main`:
1. Settings → Branches → Add rule
2. Branch name pattern: `main`
3. ✅ Require pull request reviews before merging (optional for solo dev)
4. ✅ Require status checks to pass
5. ✅ Include administrators

This prevents accidental direct pushes to production.

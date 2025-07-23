# Project Structure & Git Branching Strategy

## Repository Pattern & Architecture

This project follows the **Repository Pattern** for data access and implements a **screaming architecture**: each domain (e.g., animals, employees, services, auth) contains its own MVC (Models, Views, Controllers) structure. This approach ensures high modularity, clear separation of concerns, and scalability as the project grows.

## Folder Structure (Screaming Architecture Example)

```
app/
├── animals/
│   ├── models/
│   ├── controllers/
│   ├── views/
│   └── repositories/
├── employees/
│   ├── models/
│   ├── controllers/
│   ├── views/
│   └── repositories/
├── services/
│   ├── models/
│   ├── controllers/
│   ├── views/
│   └── repositories/
└── auth/
    ├── models/
    ├── controllers/
    ├── views/
    └── repositories/
```

## Git Branching Strategy

We use a **main branch** for each major feature or milestone, and create **sub-branches** for specific tasks. This ensures clean, organized, and traceable development.

### Main Branches
- `FE-AT_1.1` : Environment setup and configuration
- `FE-AT_1.2` : Interface layout
- `FE-AT_1.3` : Static and responsive interface development
- `FE-AT_1.4` : Dynamic interface development
- `BE-AT_2.1` : Relational database creation
- `BE-AT_2.2` : Data access components (SQL & NoSQL)
- `BE-AT_2.3` : Server-side business logic components
- `BE-AT_2.4` : Application deployment documentation

### Sub-Branching Convention
Each sub-branch is derived from a main branch and is named after the specific task or feature being developed. For example:

- From `FE-AT_1.3`, a sub-branch for design and responsivity would be:
  - `feature/design-and-responsivity`
- From `BE-AT_2.2`, a sub-branch for SQL repository implementation could be:
  - `feature/sql-repository-impl`

This approach allows for clear tracking of work, easy code reviews, and safe integration of new features.

## Best Practices
- Always create a new sub-branch for each task or feature.
- Use descriptive names for sub-branches (e.g., `feature/login-form-validation`).
- Merge sub-branches back into their main branch only after code review and testing.
- Keep the main branches stable and up-to-date with the latest changes.

---

If you have any questions about the structure or branching strategy, please refer to this document or contact the project maintainer.

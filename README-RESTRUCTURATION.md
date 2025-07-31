# Project Structure & Git Branching Strategy

## Repository Pattern & Architecture

This project follows the **Repository Pattern** for data access and implements a **screaming architecture**: each domain (e.g., animals, employees, services, auth) contains its own MVC (Models, Views, Controllers) structure. This approach ensures high modularity, clear separation of concerns, and scalability as the project grows.

## Folder Structure (Screaming Architecture Example)

Here is a more detailed view of the structure, showing example files within each domain:

```
app/
├── animals/
│   ├── controllers/
│   │   └── AnimalsController.php
│   ├── models/
│   │   └── Animal.php
│   ├── repositories/
│   │   └── AnimalRepository.php
│   └── views/
│       ├── index.php
│       └── show.php
├── employees/
│   ├── controllers/
│   │   └── EmployeesController.php
│   ├── models/
│   │   └── Employee.php
│   ├── repositories/
│   │   └── EmployeeRepository.php
│   └── views/
│       ├── dashboard.php
│       └── profile.php
├── services/
│   ├── controllers/
│   │   └── ServicesController.php
│   ├── models/
│   │   └── Service.php
│   ├── repositories/
│   │   └── ServiceRepository.php
│   └── views/
│       ├── index.php
│       └── edit.php
└── auth/
    ├── controllers/
    │   └── AuthController.php
    ├── services/
    │   └── AuthService.php
    └── views/
        └── login.php
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

## User Roles & Permissions System

This project implements a comprehensive role-based access control (RBAC) system with three main user types, each with specific permissions and responsibilities that reflect real-world zoo operations.

### 👥 **Role Definitions & Permissions**

#### 🔧 **ADMIN (Zoo Manager)**
- **User Management**: CRD (Create, Read, Delete) employee and veterinarian accounts
- **Configuration**: RU (Read, Update) zoo services and opening hours
- **Content Moderation**: RUD (Read, Update, Delete) testimonials and habitat suggestions (approve/reject)
- **Animal Management**: CRUD (Create, Read, Update, Delete) all animal data, R medical reports, RU habitats
- **Analytics**: R (Read) animal visit statistics and click data

#### 🏥 **VETERINARIAN**
- **Animal Care**: R (Read) all animal basic information
- **Medical Records**: CRU (Create, Read, Update) medical reports and prescriptions
- **Habitat Improvements**: CRU (Create, Read, Update) habitat improvement suggestions

#### 👷 **EMPLOYEE**
- **Content Review**: R (Read) medical reports (for dietary restrictions), RU (Read, Update) testimonial validation
- **Daily Operations**: RU (Read, Update) zoo services, RU animal feeding records

### 🔄 **Workflow Examples**

#### Habitat Improvement Suggestions:
1. **Veterinarian**: Creates improvement suggestion
2. **Admin**: Reviews and approves/rejects suggestion
3. **Employee**: Can view approved suggestions (if necessary)

#### Medical Care Process:
1. **Veterinarian**: Creates medical reports and prescriptions
2. **Employee**: Reads reports to understand dietary restrictions for feeding
3. **Admin**: Can access all medical data for oversight

### 🏗️ **Technical Implementation**

The system implements a **Hybrid RBAC (Role-Based Access Control)** architecture that combines traditional role-based permissions with direct user permissions for maximum flexibility.

#### **Hybrid Permission Structure:**
```
Traditional RBAC:
users ←→ roles ←→ roles_permissions ←→ permissions

Direct Permission Override:
users ←→ user_permissions ←→ permissions
```

#### **Real-World Use Cases:**
- **Temporary Coverage**: Admin can grant veterinarian permissions to an employee when the vet is sick
- **Special Assignments**: Give specific permissions without changing the user's primary role
- **Emergency Situations**: Quickly grant critical permissions during zoo emergencies
- **Expertise-Based Access**: Allow experienced employees additional permissions in their specialty areas

This hybrid architecture allows for:
- **Role-based permissions**: Standard permissions assigned by job role
- **User-specific overrides**: Temporary or permanent additional permissions per user
- **Operational flexibility**: Adapt to real-world staffing situations
- **Scalability**: Easy addition of new roles or permissions
- **Enterprise-grade security**: Granular control over who can do what and when

## Best Practices
- Always create a new sub-branch for each task or feature.
- Use descriptive names for sub-branches (e.g., `feature/login-form-validation`).
- Merge sub-branches back into their main branch only after code review and testing.
- Keep the main branches stable and up-to-date with the latest changes.

---

If you have any questions about the structure or branching strategy, please refer to this document or contact the project maintainer.

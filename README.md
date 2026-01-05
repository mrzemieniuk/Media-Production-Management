# Media Production Management

A backend system for managing media productions, assets, workflows, and production team roles.

## Project Overview

**Media Production Management** is a backend-oriented application designed to coordinate real-world media production processes.  
It provides a structured API for managing productions, tracking assets, assigning crew members, and monitoring progress across workflows.

The project focuses on **clean domain modeling**, **API-first design**, and **production-ready backend architecture**.

---

## Purpose of the Project

This project was created as a **portfolio application** to demonstrate:

- backend API design with **Symfony 8** and **API Platform**,
- domain-driven modeling for media production workflows,
- JWT-based authentication and role-based authorization,
- Dockerized development and deployment setup,
- scalable and extensible architecture for future features.

---

## Key Features

- Production lifecycle management
- Asset management linked to productions
- Crew and role assignment per production
- Metadata storage for assets and progress tracking
- RESTful API with automatic OpenAPI/Swagger documentation
- Secure authentication using JWT
- Fully containerized environment

---

## Domain Model

The system is built around the following core entities:

- **User**  
  Represents an authenticated system user with personal data and security roles.

- **Production**  
  The main entity representing a media production project.  
  Contains name, description, and status.

- **Asset**  
  A resource linked to a production (e.g. video file, graphic, audio).  
  Stores type, filename, status, and metadata.

- **ProductionMember**  
  A join entity connecting users with productions, defining their specific **crew position** within a project.

---

## Architecture

The project follows a **Resource-Oriented Architecture** using **API Platform**.

- **REST API**  
  Automatically generated endpoints for domain resources

- **Authentication**  
  JWT-based authentication via LexikJWTAuthenticationBundle

- **Authorization**  
  Role-based access control

- **Database**  
  Relational MySQL database for persistent storage

- **Containerization**  
  Docker for reproducible environments

---

## Tech Stack

- **Language**: PHP 8.4+
- **Framework**: Symfony 8.0
- **API**: API Platform 4.2
- **Database**: MySQL 8.4
- **Authentication**: JWT
- **Containerization**: Docker
- **Developer Tools**:
    - Doctrine ORM & Migrations
    - Foundry (fixtures)
    - Maker Bundle

---

## Setup Instructions

### Requirements

- Docker

### Running the Project

1. Clone the repository.
2. Start the containers:
   ```bash
   docker-compose up -d
   ```
3.	The backend container will:
- install Composer dependencies,
- generate JWT key pairs,
- run database migrations automatically on first startup.

API Access
- API endpoint:
http://localhost:8000/api
- Swagger / OpenAPI documentation:
http://localhost:8000/api/docs

---

## Example API Endpoints
- POST /api/auth – obtain a JWT token
- GET /api/productions – list productions
- GET /api/assets – list assets
- POST /api/assets - create a new asset
- PATCH /api/assets/1 - update an asset
- DELETE /api/assets/1 - delete an asset

---

## Database & Fixtures
- Database migrations are executed automatically on container startup.
- To manually load test data (fixtures):
```bash
  docker-compose exec backend php bin/console doctrine:fixtures:load
```

## Security & Authorization
- JWT-based authentication
- Role-based access control
- Designed for future extension with fine-grained permissions

---

## Planned Improvements (Roadmap)
- Workflow state machine for assets and productions
- Fine-grained permissions per crew role
- Audit logs and activity history
- File storage integration (S3-compatible)
- Background processing with Symfony Messenger

---

## Status

This project is actively developed and serves as a backend portfolio project showcasing modern Symfony and API Platform best practices.
# 🏭 Manufacturing Digital Core — Laravel 12 + Filament 4.1

## 📘 Overview

A modular, workflow-driven intranet built for **manufacturing enterprises**.  
It unifies **people**, **processes**, **documents**, and **decisions** under one architecture to achieve operational continuity, compliance, and continuous improvement.

---

## 🧱 Core Philosophy



> **People → Process → Knowledge → Intelligence**

| Layer | Focus | Technology |
|-------|--------|-------------|
| **People** | Job Post → Staff → User model | Laravel 12 + Spatie Permissions |
| **Process** | Workflow, BPMN, DMN | Workflow Engine Package |
| **Knowledge** | Documents, SOP, Records | DMS + Vector AI |
| **Intelligence** | AI-assisted reasoning | Ollama + pgvector |

---

## 🧩 Organizational Model

User → Staff → JobPost → Role / Permission


| Level | Description | Notes |
|--------|--------------|-------|
| **User** | System identity and login | Authenticates to one or more Filament panels |
| **Staff** | Human representation | Links user to HR data and job history |
| **Job Post** | Defined organizational role | Holds Spatie roles / permissions |
| **Role / Permission** | Accountability mapping | Mostly attached to Job Post, rarely to Staff directly |

**Stability Principle:**  
> Workflows, approvals, and requests are tied to **Job Posts**, not individual staff.  
> When a new staff fills the same Job Post, they inherit its authority and ongoing responsibilities.

---

## 🏗️ System Panels (Domains)

| Panel | Purpose |
|--------|----------|
| **Core** | Foundation models, settings, metrics, workflow registry |
| **Workflow** | BPMN / DMN / Task automation engine |
| **DMS** | Controlled document lifecycle + AI vector search |
| **Staff** | Self-service portal and manager tools |
| **HRM** | Workforce, job posts, payroll, evaluation |
| **EAM** | Asset & maintenance management |
| **ERP** | Procurement, costing, inventory |
| **MES** | Production execution & scheduling |
| **QAS** | Quality assurance & CAPA tracking |
| **LMS** | Learning management & certification |
| **Lobby** | External access (career, tender, product offering) |

---

## ⚙️ Core Packages and Tables

### 🧩 1. Core Package
**Purpose:** Shared foundation for IDs, roles, settings, metrics, attributes.  
**Tables:**
- `users`, `staff`, `job_posts`
- `attributes`, `staff_attributes`, `job_post_attributes`
- `roles`, `permissions`, `model_has_roles`, `role_has_permissions`
- `settings`, `metrics`, `events`, `snapshots`

---

### 🔁 2. Workflow Package
**Purpose:** Define and run workflows based on BPMN and DMN rules.  
**Tables:**
- `workflows` (template)
- `tasks` (steps)
- `task_actions` (reusable logic)
- `request_fulfilments` (instances)
- `decisions` (DMN rule tables)
- `decision_rules` and `decision_results`

---

### 📄 3. DMS (Package)
**Purpose:** Controlled document management and AI vector search.  
**Tables:**
- `documents`, `document_versions`
- `document_categories`, `document_tags`
- `vectors` (pgvector embeddings)
- `ai_queries` / `ai_sessions`

Integrates with **Ollama** for LLM-based querying and semantic search.

---

### 👥 4. Staff Package
**Purpose:** Employee portal for self-service and manager tools.  
**Features:** Requests, approvals, notifications, leave, claims.  
**Tables:**
- `staff_requests`
- `staff_links`
- `staff_communications`

---

### 🧍 5. HRM (Package)
**Purpose:** Workforce administration.  
**Tables:**
- `staff_profiles`
- `job_posts`
- `job_post_attributes`
- `performance_reviews`
- `qualification_test_specifications`
- `qualification_test_results`

---

### 🧰 6. EAM (Package)
**Purpose:** Asset and maintenance management.  
**Tables:**
- `assets`, `asset_types`
- `asset_properties`
- `maintenance_plans`
- `maintenance_logs`
- `contracts`, `warranties`

---

### 💰 7. ERP (Package)
**Purpose:** Enterprise resources and procurement.  
**Tables:**
- `vendors`, `products`, `purchase_orders`, `inventory`, `transactions`

---

### ⚙️ 8. MES (Package)
**Purpose:** Production execution system.  
**Tables:**
- `production_orders`, `operations`, `work_centers`, `schedules`, `production_logs`

---

### 🧪 9. QAS (Package)
**Purpose:** Quality Assurance and CAPA.  
**Tables:**
- `quality_standards`, `inspections`, `nonconformities`, `capa_actions`, `audit_records`

---

### 🎓 10. LMS (Package)
**Purpose:** Learning and development.  
**Tables:**
- `courses`, `modules`, `quizzes`, `questions`, `answers`
- `certificates`, `enrollments`, `grades`
- `job_post_learning_paths`

---

### 🌐 11. Lobby (Package)
**Purpose:** Public-facing portal for careers, tenders, and product showcase.  
**Tables:**
- `job_postings`, `tenders`, `product_offerings`, `rfqs`, `rfp_responses`

---

## 🧠 AI and Vector Integration

**Purpose:** Enhance knowledge management and decision support.  
- Vectorized content via `pgvector`  
- Chat-based assistant using **Ollama** locally  
- AI contexts: Documents, Processes, Tasks, Metrics  
- Stored embeddings per document and revision  

---

## 🔁 Mapping to Fundamental Manufacturing Problems

| Fundamental Problem | Architectural Solution | Core Packages |
|----------------------|------------------------|----------------|
| **Process inefficiency** | Workflow / BPMN / DMN for visibility and automation | `workflow`, `core` |
| **Data silos** | Unified Core and Shared ID model | `core`, `dms` |
| **HR misalignment** | Job Post → Staff → User structure with role stability | `core`, `hrm` |
| **Quality & traceability** | QAS + Document control + Audit trail | `qas`, `dms` |
| **Knowledge management** | DMS + Vector AI search | `dms`, `ai` |
| **Skill development** | LMS linked to Job Posts and qualification tests | `lms`, `hrm` |
| **Real-time insight** | Metrics + AI dashboards + decision rules | `core`, `workflow`, `ai` |

---

## 🧭 Strategic View

> This Laravel 12 + Filament 4.1 architecture forms a **digital operating system for manufacturing** —  
> connecting people, processes, knowledge, and AI to solve core pain points in efficiency, alignment, and quality.

---

**Designed By:** Ahmad Faros  
**Framework:** Laravel 12 + Filament 4.1  
**Purpose:** Foundation for Industry 4.0 Smart Factory Operations  

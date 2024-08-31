# Task Manager Application

A simple Laravel web application for managing tasks. Features include task creation, editing, deletion, reordering with drag and drop, and associating tasks with projects.

## Requirements

- PHP 8.0 or higher
- Composer
- MySQL
- Node.js (optional, for front-end assets)

## Setup

### 1. Clone the Repository

```bash
git clone https://github.com/shahgwalishah/task-manager.git

cd task-manager

composer install

cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=


php artisan key:generate

php artisan migrate


php artisan serve



## Usage


### 1. Task Management


Create Task: Use the form at the top of the task list to add a new task. Select a project and specify the task name.

Edit Task: Click the "Edit" link next to a task to update its details.

Delete Task: Click the "Delete" button next to a task to remove it.

Reorder Tasks: Drag and drop tasks to reorder them. The priority will be updated automatically.
Project Management (Bonus)

Create Project: Go to the project management section to add new projects.

Associate Tasks: When creating or editing tasks, select a project from the dropdown to associate it with the task.

Filter by Project: Tasks can be filtered by selecting a project from the dropdown.

### - Deployment

1. Set Up Environment Variables

Make sure to configure the .env file on the production server with appropriate values for database and application settings.







# Task Management API

A RESTful API for managing tasks, built with Laravel and MySQL. This API allows users to create, retrieve, update, and delete tasks while following best practices for clean and maintainable code.

---
## Features

- **Create a Task**: Add a new task with a title, description, priority, and due date.
- **Retrieve All Tasks**: Get a list of all tasks, sorted by creation date (descending).
- **Retrieve a Single Task**: Get details of a specific task by its ID.
- **Update a Task**: Modify the title, description, priority, or due date of a task.
- **Delete a Task**: Soft delete a task (optional).
- **Pagination**: Retrieve tasks in paginated form.
- **Validation**: Proper request validation for all endpoints.
- **Testing**: Includes unit tests for key endpoints.

---

## Technologies Used

- **Backend**: Laravel (PHP)
- **Database**: MySQL
- **Testing**: PHPUnit, Postman
- **Tools**: Composer, Git

---

## Installation

### Prerequisites

- PHP (>= 8.0)
- Composer
- MySQL
- Laravel (>= 11.x)

### Steps

1. **Clone the repository**:
   ```bash
   git clone https://github.com/kamemia/tasks-api
   cd tasks-api
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Set up the environment**:
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database credentials:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=task_management
     DB_USERNAME=root
     DB_PASSWORD=your_password
     ```

4. **Generate an application key**:
   ```bash
   php artisan key:generate
   ```

5. **Run migrations**:
   ```bash
   php artisan migrate
   ```

6. **Start the development server**:
   ```bash
   php artisan serve
   ```

7. **Access the API**:
   The API will be available at `http://localhost:8000/api`.

---

## API Endpoints

### 1. Create a Task
- **URL**: `POST /api/tasks`
- **Request Body**:
  ```json
  {
    "title": "Complete API Project",
    "description": "Build a task management API using Laravel",
    "priority": "high",
    "due_date": "2023-12-31 23:59:59"
  }
  ```
- **Response**:
  ```json
  {
    "id": 1,
    "title": "Complete API Project",
    "description": "Build a task management API using Laravel",
    "priority": "high",
    "due_date": "2023-12-31T23:59:59.000000Z",
    "created_at": "2023-10-01T12:00:00.000000Z",
    "updated_at": "2023-10-01T12:00:00.000000Z"
  }
  ```

### 2. Retrieve All Tasks
- **URL**: `GET /api/tasks`
- **Response**:
  ```json
  {
    "data": [
      {
        "id": 1,
        "title": "Complete API Project",
        "description": "Build a task management API using Laravel",
        "priority": "high",
        "due_date": "2023-12-31T23:59:59.000000Z",
        "created_at": "2023-10-01T12:00:00.000000Z",
        "updated_at": "2023-10-01T12:00:00.000000Z"
      }
    ],
    "links": {
      "first": "http://localhost:8000/api/tasks?page=1",
      "last": "http://localhost:8000/api/tasks?page=1",
      "prev": null,
      "next": null
    },
    "meta": {
      "current_page": 1,
      "from": 1,
      "last_page": 1,
      "path": "http://localhost:8000/api/tasks",
      "per_page": 10,
      "to": 1,
      "total": 1
    }
  }
  ```

### 3. Retrieve a Single Task
- **URL**: `GET /api/tasks/{id}`
- **Response**:
  ```json
  {
    "id": 1,
    "title": "Complete API Project",
    "description": "Build a task management API using Laravel",
    "priority": "high",
    "due_date": "2023-12-31T23:59:59.000000Z",
    "created_at": "2023-10-01T12:00:00.000000Z",
    "updated_at": "2023-10-01T12:00:00.000000Z"
  }
  ```

### 4. Update a Task
- **URL**: `PUT /api/tasks/{id}`
- **Request Body**:
  ```json
  {
    "title": "Updated Task Title"
  }
  ```
- **Response**:
  ```json
  {
    "id": 1,
    "title": "Updated Task Title",
    "description": "Build a task management API using Laravel",
    "priority": "high",
    "due_date": "2023-12-31T23:59:59.000000Z",
    "created_at": "2023-10-01T12:00:00.000000Z",
    "updated_at": "2023-10-01T12:05:00.000000Z"
  }
  ```

### 5. Delete a Task
- **URL**: `DELETE /api/tasks/{id}`
- **Response**: `204 No Content`

---

## Testing

### Unit Tests
Run the unit tests using the following command:
```bash
php artisan test
```

### Manual Testing
You can test the API using tools like [Postman](https://www.postman.com/) or `curl`.

---


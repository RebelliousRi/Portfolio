# Daily Planner Application - OOP Project

## Project Overview
This is a console-based Daily Planner Application developed as part of the CIT217 Object-Oriented Programming course. The application helps users manage and organize their daily tasks efficiently using OOP principles.

## Features Implemented

### File Handling
- Active tasks are saved to `active_tasks.dat`
- Completed tasks are saved to `completed_tasks.dat`
- Tasks are automatically loaded when the program starts
- Data persistence between program executions

### Search Functionality
- Search tasks by title (case-insensitive partial match)
- Search tasks by date (exact match)
- Results displayed in a user-friendly format

### Task Management
- Add new tasks with title, description, priority, and due date
- View all active tasks
- Mark tasks as completed
- View completed tasks
- Remove tasks
- Automatic task organization using Queue and Stack

## Project Structure
```
OOP Project/
├── src/
│   └── main/
│       └── java/
│           └── com/
│               └── planner/
│                   ├── Main.java
│                   ├── model/
│                   │   └── Task.java
│                   ├── service/
│                   │   └── TaskManager.java
│                   ├── ui/
│                   │   └── PlannerUI.java
│                   └── exception/
│                       └── TaskException.java
├── resources/
│   └── sample_tasks.txt
└── README.md
```

## How to Run
1. Navigate to the project directory
2. Compile the project:
   ```bash
   javac -d out src/main/java/com/planner/**/*.java
   ```
3. Run the application:
   ```bash
   java -cp out com.planner.Main
   ```

## Sample Data
The `resources` folder contains:
- `sample_tasks.txt`: Example tasks in human-readable format
- `active_tasks.dat`: Binary file containing active tasks (created when running the program)
- `completed_tasks.dat`: Binary file containing completed tasks (created when running the program)

## OOP Principles Demonstrated
1. **Encapsulation**
   - Private fields with public accessors in Task class
   - Data hiding in TaskManager service

2. **Inheritance**
   - TaskException extends RuntimeException
   - Custom exception handling hierarchy

3. **Polymorphism**
   - Different implementations for task management (Queue and Stack)
   - Interface-based design for extensibility

4. **Abstraction**
   - Clear separation of concerns
   - Modular design with distinct packages

## Error Handling
The application includes comprehensive error handling for:
- Invalid user inputs
- File I/O operations
- Empty collections
- Date parsing
- Task not found scenarios

## Group Members
[Add your group members' names here]

## Submission Date
19th May, 2025 
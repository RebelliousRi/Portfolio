/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package oop_final.project;

import java.util.List;
import java.util.Scanner;

public class Main {
    static Task_Queues activeTasks = new Task_Queues();
    static Stacking_Tasks completedTasks = new Stacking_Tasks();
    static Scanner input = new Scanner(System.in);

    public static void main(String[] args) {
        // First, try to load any existing completed tasks
        List<Task> loadedCompletedTasks = activeTasks.loadCompletedTasks();
        for (Task task : loadedCompletedTasks) {
            completedTasks.push(task);
        }

        // Then check if we need to load sample tasks
        if (activeTasks.isEmpty() && completedTasks.isEmpty()) {
            System.out.println("\nNo active or completed tasks found.");
            String choice = getStringInput("Would you like to load sample tasks? (yes/no): ").toLowerCase();
            
            if (choice.equals("yes") || choice.equals("y")) {
                List<Task> sampleTasks = TaskLoader.loadSampleTasks();
                if (!sampleTasks.isEmpty()) {
                    for (Task task : sampleTasks) {
                        activeTasks.enqueue(task);
                    }
                    System.out.println("Sample tasks loaded successfully!");
                } else {
                    System.out.println("No sample tasks were found to load.");
                }
            } else {
                System.out.println("Starting with empty task list.");
            }
        }

        int choice;
        do {
            displayMenu();
            choice = getIntInput("Enter your choice: ");

            try {
                processChoice(choice);
            } catch (Exception e) {
                System.out.println("Error: " + e.getMessage());
            }
        } while (choice != 7);
    }

    private static void displayMenu() {
        System.out.println("\n===== DAILY PLANNER MENU =====");
        System.out.println("1. Add New Task");
        System.out.println("2. View All Tasks");
        System.out.println("3. Mark Task as Completed");
        System.out.println("4. View Completed Tasks");
        System.out.println("5. Search Tasks by Title");
        System.out.println("6. Search Tasks by Date");
        System.out.println("7. Save and Exit");
    }

    private static void processChoice(int choice) {
        switch (choice) {
            case 1 -> addTask();
            case 2 -> viewAllTasks();
            case 3 -> markTaskAsCompleted();
            case 4 -> viewCompletedTasks();
            case 5 -> searchByTitle();
            case 6 -> searchByDate();
            case 7 -> {
                saveAndExit();
                System.out.println("Thank you for using Daily Planner!");
            }
            default -> System.out.println("Invalid choice. Please try again.");
        }
    }

    private static void addTask() {
        System.out.println("\n=== Add New Task ===");
        String title = getStringInput("Enter task title: ");
        String description = getStringInput("Enter task description: ");
        int priority = getIntInput("Enter priority (1-5): ");
        String dueDate = getStringInput("Enter due date (YYYY-MM-DD): ");

        Task newTask = new Task(title, description, priority, dueDate);
        activeTasks.enqueue(newTask);
        System.out.println("Task added successfully!");
    }

    private static void viewAllTasks() {
        System.out.println("\n=== Active Tasks ===");
        if (activeTasks.isEmpty()) {
            System.out.println("No active tasks found.");
        } else {
            activeTasks.printAll();
        }
    }

    private static void markTaskAsCompleted() {
        System.out.println("\n=== Mark Task as Completed ===");
        if (activeTasks.isEmpty()) {
            System.out.println("No tasks to complete.");
            return;
        }

        // Display all tasks with numbers
        System.out.println("\nSelect a task to mark as completed:");
        List<Task> allTasks = activeTasks.getAllTasks();
        for (int i = 0; i < allTasks.size(); i++) {
            System.out.println((i + 1) + ". " + allTasks.get(i));
        }

        // Get user choice
        int choice = getIntInput("\nEnter task number to complete (0 to cancel): ");
        if (choice == 0) {
            System.out.println("Operation cancelled.");
            return;
        }

        if (choice < 1 || choice > allTasks.size()) {
            System.out.println("Invalid task number. Please try again.");
            return;
        }

        // Remove the selected task and add it to completed tasks
        Task selectedTask = allTasks.get(choice - 1);
        if (activeTasks.removeTask(selectedTask)) {
            completedTasks.push(selectedTask);
            System.out.println("Task marked as completed: " + selectedTask.getTitle());
        } else {
            System.out.println("Failed to mark task as completed.");
        }
    }

    private static void viewCompletedTasks() {
        System.out.println("\n=== Completed Tasks ===");
        if (completedTasks.isEmpty()) {
            System.out.println("No completed tasks found.");
        } else {
            completedTasks.printAll();
        }
    }

    private static void searchByTitle() {
        System.out.println("\n=== Search Tasks by Title ===");
        String searchTitle = getStringInput("Enter title to search: ");
        List<Task> results = activeTasks.searchByTitle(searchTitle);
        
        if (results.isEmpty()) {
            System.out.println("No tasks found with that title.");
        } else {
            System.out.println("\nFound " + results.size() + " tasks:");
            for (Task task : results) {
                System.out.println(task);
            }
        }
    }

    private static void searchByDate() {
        System.out.println("\n=== Search Tasks by Date ===");
        String searchDate = getStringInput("Enter date to search (YYYY-MM-DD): ");
        List<Task> results = activeTasks.searchByDate(searchDate);
        
        if (results.isEmpty()) {
            System.out.println("No tasks found for that date.");
        } else {
            System.out.println("\nFound " + results.size() + " tasks:");
            for (Task task : results) {
                System.out.println(task);
            }
        }
    }

    private static void saveAndExit() {
        System.out.println("\nSaving tasks...");
        activeTasks.saveCompletedTasks(completedTasks.getAllTasks());
        System.out.println("Tasks saved successfully!");
    }

    private static String getStringInput(String prompt) {
        System.out.print(prompt);
        return input.nextLine();
    }

    private static int getIntInput(String prompt) {
        while (true) {
            try {
                System.out.print(prompt);
                return Integer.parseInt(input.nextLine());
            } catch (NumberFormatException e) {
                System.out.println("Invalid input. Please enter a number.");
            }
        }
    }
}

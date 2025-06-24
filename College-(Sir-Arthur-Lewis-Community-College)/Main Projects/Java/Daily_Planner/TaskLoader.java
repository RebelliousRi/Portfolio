package oop_final.project;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

public class TaskLoader {
    private static final String SAMPLE_TASKS_FILE = "Assignments/OOP Project/sample_tasks.txt";

    public static List<Task> loadSampleTasks() {
        List<Task> tasks = new ArrayList<>();
        try (BufferedReader reader = new BufferedReader(new FileReader(SAMPLE_TASKS_FILE))) {
            String line;
            while ((line = reader.readLine()) != null) {
                line = line.trim();
                if (line.isEmpty() || line.startsWith("Note:")) {
                    continue;
                }
                
                String[] parts = line.split("\\|");
                if (parts.length == 4) {
                    String title = parts[0].trim();
                    String description = parts[1].trim();
                    int priority = Integer.parseInt(parts[2].trim());
                    String dueDate = parts[3].trim();
                    tasks.add(new Task(title, description, priority, dueDate));
                }
            }
        } catch (IOException e) {
            System.out.println("Error loading sample tasks: " + e.getMessage());
        }
        return tasks;
    }
} 
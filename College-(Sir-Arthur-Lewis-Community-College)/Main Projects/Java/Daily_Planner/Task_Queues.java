/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package oop_final.project;

import java.io.*;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author saman
 */
public class Task_Queues {
    private Node head;
    private Node tail;
    private int count;
    private static final String DATA_DIR = "C:/Users/Arianna St John/Desktop/Stuff/NetBeans/oop_final_project/src/oop_final_project";
    private static final String ACTIVE_TASKS_FILE = DATA_DIR + "/active_tasks.dat";
    private static final String COMPLETED_TASKS_FILE = DATA_DIR + "/completed_tasks.dat";

    public Task_Queues() {
        head = tail = null;
        count = 0;
        createDataDirectory();
        loadTasks();
    }

    private void createDataDirectory() {
        File dataDir = new File(DATA_DIR);
        if (!dataDir.exists()) {
            boolean created = dataDir.mkdirs();
            if (!created) {
                System.err.println("Warning: Could not create data directory at: " + DATA_DIR);
            }
        }
    }

    public void enqueue(Task task) {
        Node newNode = new Node(task);
        if (head == null) {
            head = tail = newNode;
        } else {
            tail.next = newNode;
            tail = newNode;
        }
        count++;
        saveTasks();
    }

    public Task dequeue() {
        if (isEmpty()) {
            System.out.println("Queue is empty.");
            return null;
        }
        Task task = head.data;
        head = head.next;
        if (head == null) tail = null;
        count--;
        saveTasks();
        return task;
    }

    public boolean isEmpty() {
        return count == 0;
    }

    public int size() {
        return count;
    }

    public void printAll() {
        Node current = head;
        while (current != null) {
            System.out.println(current.data);
            current = current.next;
        }
    }

    public List<Task> searchByTitle(String title) {
        List<Task> results = new ArrayList<>();
        Node current = head;
        while (current != null) {
            if (current.data.getTitle().toLowerCase().contains(title.toLowerCase())) {
                results.add(current.data);
            }
            current = current.next;
        }
        return results;
    }

    public List<Task> searchByDate(String date) {
        List<Task> results = new ArrayList<>();
        Node current = head;
        while (current != null) {
            if (current.data.getDueDate().equals(date)) {
                results.add(current.data);
            }
            current = current.next;
        }
        return results;
    }

    private void saveTasks() {
        try (ObjectOutputStream oos = new ObjectOutputStream(new FileOutputStream(ACTIVE_TASKS_FILE))) {
            List<Task> tasks = new ArrayList<>();
            Node current = head;
            while (current != null) {
                tasks.add(current.data);
                current = current.next;
            }
            oos.writeObject(tasks);
            System.out.println("Active tasks saved to: " + ACTIVE_TASKS_FILE);
        } catch (IOException e) {
            System.err.println("Error saving active tasks: " + e.getMessage());
        }
    }

    @SuppressWarnings("unchecked")
    private void loadTasks() {
        try (ObjectInputStream ois = new ObjectInputStream(new FileInputStream(ACTIVE_TASKS_FILE))) {
            List<Task> loadedTasks = (List<Task>) ois.readObject();
            for (Task task : loadedTasks) {
                enqueue(task);
            }
            System.out.println("Active tasks loaded from: " + ACTIVE_TASKS_FILE);
        } catch (IOException | ClassNotFoundException e) {
            System.out.println("No existing active tasks file found. Starting with empty queue.");
        }
    }

    public void saveCompletedTasks(List<Task> completedTasks) {
        try (ObjectOutputStream oos = new ObjectOutputStream(new FileOutputStream(COMPLETED_TASKS_FILE))) {
            oos.writeObject(completedTasks);
            System.out.println("Completed tasks saved to: " + COMPLETED_TASKS_FILE);
        } catch (IOException e) {
            System.err.println("Error saving completed tasks: " + e.getMessage());
        }
    }

    @SuppressWarnings("unchecked")
    public List<Task> loadCompletedTasks() {
        try (ObjectInputStream ois = new ObjectInputStream(new FileInputStream(COMPLETED_TASKS_FILE))) {
            List<Task> tasks = (List<Task>) ois.readObject();
            System.out.println("Completed tasks loaded from: " + COMPLETED_TASKS_FILE);
            return tasks;
        } catch (IOException | ClassNotFoundException e) {
            System.out.println("No existing completed tasks file found. Starting with empty list.");
            return new ArrayList<>();
        }
    }

    public List<Task> getAllTasks() {
        List<Task> tasks = new ArrayList<>();
        Node current = head;
        while (current != null) {
            tasks.add(current.data);
            current = current.next;
        }
        return tasks;
    }

    public boolean removeTask(Task taskToRemove) {
        if (isEmpty()) {
            return false;
        }

        // If the task to remove is at the front
        if (head.data.equals(taskToRemove)) {
            head = head.next;
            if (head == null) {
                tail = null;
            }
            count--;
            return true;
        }

        // Search for the task in the rest of the queue
        Node current = head;
        while (current.next != null) {
            if (current.next.data.equals(taskToRemove)) {
                current.next = current.next.next;
                if (current.next == null) {
                    tail = current;
                }
                count--;
                return true;
            }
            current = current.next;
        }

        return false;
    }
}


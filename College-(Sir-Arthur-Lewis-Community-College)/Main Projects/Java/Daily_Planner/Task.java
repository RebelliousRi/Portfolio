/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package oop_final.project;

import java.io.Serializable;

/**
 *
 * @author saman
 */

public class Task implements Serializable {
    private static final long serialVersionUID = 1L;
    private String title;
    private String description;
    private int priority;
    private String dueDate;

    public Task(String title, String description, int priority, String dueDate) {
        this.title = title;
        this.description = description;
        this.priority = priority;
        this.dueDate = dueDate;
    }

    // Getters and setters
    public String getTitle() { return title; }
    public String getDescription() { return description; }
    public int getPriority() { return priority; }
    public String getDueDate() { return dueDate; }

    public void setTitle(String title) { this.title = title; }
    public void setDescription(String description) { this.description = description; }
    public void setPriority(int priority) { this.priority = priority; }
    public void setDueDate(String dueDate) { this.dueDate = dueDate; }

    public boolean isUrgent() {
        return false; 
    }

    @Override
    public String toString() {
        return "[Title: " + title + ", Description: " + description + ", Priority: " + priority + ", Due: " + dueDate + "]";
    }
}



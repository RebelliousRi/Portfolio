/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package oop_final.project;

/**
 *
 * @author saman
 */
public class Urgent_Tasks extends Task {
    public Urgent_Tasks(String title, String description, int priority, String dueDate) {
        super(title, description, priority, dueDate);
    }

    @Override
    public boolean isUrgent() {
        return true;
    }

    @Override
    public String toString() {
        return "[URGENT] " + super.toString();
    }
}

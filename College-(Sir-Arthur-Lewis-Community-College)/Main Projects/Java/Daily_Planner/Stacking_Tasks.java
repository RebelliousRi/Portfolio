/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package oop_final.project;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author saman
 */
public class Stacking_Tasks {
    private Node top;
    private int count;

    public Stacking_Tasks() {
        top = null;
        count = 0;
    }

    public void push(Task task) {
        Node newNode = new Node(task);
        newNode.next = top;
        top = newNode;
        count++;
    }

    public Task pop() {
        if (isEmpty()) {
            System.out.println("Stack is empty.");
            return null;
        }
        Task task = top.data;
        top = top.next;
        count--;
        return task;
    }

    public boolean isEmpty() {
        return count == 0;
    }

    public int size() {
        return count;
    }

    public void printAll() {
        Node current = top;
        while (current != null) {
            System.out.println(current.data);
            current = current.next;
        }
    }

    public List<Task> getAllTasks() {
        List<Task> tasks = new ArrayList<>();
        Node current = top;
        while (current != null) {
            tasks.add(current.data);
            current = current.next;
        }
        return tasks;
    }
}


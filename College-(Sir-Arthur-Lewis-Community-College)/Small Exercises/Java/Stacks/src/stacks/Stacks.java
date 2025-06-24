/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package stacks;

public class Stacks {
    protected Node top;
    protected int count;
    
    public Stacks() {
        this.top = null;
        this.count = 0;
        
    }
    
    public void push(int data) {
        Node newNode = new Node(data);
        
        newNode.next = top;
        top = newNode;
        count++;
    }
    
    public int pop() {
        if (top == null) {
            System.out.println("Error! Stack is empty");
            return 0;
        } else {
            int poppedValue = top.data;
            top = top.next;
            count--;
            return poppedValue;
            
        }
    }
    
    public int peek() {
        if (top == null) {
            System.out.println("Error! Stack is empty");
            return 0;
        }
        return top.data;
    }
    
    public boolean isEmpty() {
        if (top == null) {
            System.out.println("Stack is empty.");
            return true;
        } else {
            return false;
        }
    }
    
    public int length() {
        return count;
    }
}

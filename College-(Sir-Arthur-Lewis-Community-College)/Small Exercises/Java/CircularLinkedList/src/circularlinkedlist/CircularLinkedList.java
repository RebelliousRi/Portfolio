/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package circularlinkedlist;

/**
 *
 * @author Arianna St John
 */
public class CircularLinkedList {

    Node head;

    public CircularLinkedList() {
        this.head = null;

    }

    public void insert(int data) {

        Node newNode = new Node(data);

        if (head == null) {
            head = newNode;
            head.next = head;

        } else {
            Node current = head;

            while (current.next != head) {
                current = current.next;
            }
            newNode.next = head;
            current.next = newNode;
        }
    }

    public void display() {
        Node current = head;
          if (head == null) {
            System.out.println("Linked list is empty.");
        }      
        do{
            System.out.println(current.data);
            current = current.next;               
            
}while(current != head);
        }


    public int length() {
        Node current = head;
        int length = 0;

        if (current == null) {
            return 0;
        }

        do {

            length++;
            current = current.next;

        } while (current != head);

        return length;

    }

    // inserting at a specific position
    public void insertAt(int position, int data) {
        Node current = head;
        Node newNode = new Node(data);

        if (position -1 > length()) {
                System.out.println("Out of range.");
}else{
            if (position == 0){
                
                newNode.next = head;
            head = newNode;
                
            }else {
                
               int currentpos = 0; 
               
             while (currentpos < position - 1 && current.next != head) {
                current = current.next;
                currentpos++;

            }            if (current.next == null) {
                System.out.println("Out of range.");
            } else {
                newNode.next = current.next;
                current.next = newNode;
            }                            
            }
                  
        }
       


        }

    public void delete(int value) {
        Node current = head;

        if (length() == 0) {
            System.out.println("Error, node is empty");
            return;
        }
        if (head.data == value) {
            head.next = head;
            return;
        }

        while (current.next != head && current.next.data != value) {
            current = current.next;

        }
        if (current.next == head) {
            System.out.println("Value not found");
        } else {
            current.next = current.next.next;
        }
    }
    
    public void replace(int oldValue, int newValue){
        
        Node current = head;
        boolean found = false;
        
                while (current.next != head) {
                    if (current.data == oldValue) {
            current.data = newValue;
            found = true;
        } else {
                     current = current.next;   
                    }

        }
                            if (!found) {
System.out.println(oldValue +" was not found");
        }
    }
    }
    
    
    

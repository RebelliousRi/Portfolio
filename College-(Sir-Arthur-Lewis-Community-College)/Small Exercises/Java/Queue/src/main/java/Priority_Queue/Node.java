/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Priority_Queue;

/**
 *
 * @author Arianna St John
 */
public class Node {
    //Atttributes 
    int data; 
    int priority; 
    Node next; 
    
    //Constructor
    public Node(int data, int priority){
        this.data=data; 
        this.priority=priority;
        this.next=null;
    }
    
}
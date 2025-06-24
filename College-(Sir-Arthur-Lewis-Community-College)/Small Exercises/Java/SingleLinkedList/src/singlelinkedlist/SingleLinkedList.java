/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package singlelinkedlist;

/**
 *
 * @author Arianna St John
 */
public class SingleLinkedList {

    Node head;
    public SingleLinkedList (){
        this.head = null;
        
    }
    
    public void insert(int data){
        
        Node newNode = new Node(data);
                
                if(head == null){
                    head = newNode;
                    
                }else{
                    Node current = head;
                    while(current.next != null){
                        current = current.next;
                    }
                    current.next = newNode;
                }
    }
    
    public void display(){
        Node current = head;
        if(head == null){
                                System.out.println("Linked list is empty.");
                    }
                            while(current != null){
                                System.out.println(current.data);
                        current = current.next;
                    }
                                                        

    }
    
    //inserting at a specific position
    public void insertAt(int position, int data){
    
        Node newNode = new Node(data);
        
        if (position == 0){
        
        newNode.next = head;
        head = newNode;
    }else{
             Node current = head;
            int currentpos = 0;
            //-1 is just for users since normal people start counting at 1
            while(currentpos < position - 1 && current.next!=null){
                current = current.next;
                currentpos++;
                
            }
            
            if (current.next==null){
                System.out.println("Out of range.");
            } else {
                newNode.next = current.next;
                current.next = newNode;
            } 
        }
}
    public void delete (int value){
    if(head == null){
        System.out.println("Error, node is empty");
    }
        if(head.data == value){
            head.next = head;
            return;
    }
        
        Node current = head;
                    while(current.next !=null && current.next.data !=value){
                current = current.next;
                
            }
                         if (current.next==null){
                System.out.println("Value not found");
            }     else {
                             current.next = current.next.next;
                         }  
}
}

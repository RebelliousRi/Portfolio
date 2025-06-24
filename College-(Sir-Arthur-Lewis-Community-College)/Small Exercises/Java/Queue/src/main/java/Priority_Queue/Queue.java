/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package Priority_Queue;

import Dynamic_Queue.*;

/**
 *
 * @author Arianna St John
 */

public class Queue {

    //Attributes
    Node head;
    Node tail;
    int count;

    //Constructors
    public Queue() {
        head = null;
        tail = null;
        count = 0;
    }

    public boolean isEmpty() {
        if (head == null) {
            return true;
        } else {
            return false;
        }
    }

    public int size() {
        return count;
    }
    
    public void enqueue(int data, int priority){
        Node newNode = new Node(data, priority); 
        
        if(count == 0){
            head = newNode;
            tail = newNode; 
        }else{
            Node current =head;
            
            if(head.priority< newNode.priority){
                
                newNode.next = head;
                return;
                
            }

            while (current.next != null && current.next.priority >= newNode.priority){
                
                current = current.next;
            }
            
          newNode.next = current.next;
        current.next = newNode;          
            
        
   
                if(current.next == null){
            tail = newNode; 
        }
}
        count++;
    }
    
    public int dequeue(){
        if(isEmpty()){
            System.out.println("Error!  Queue is empty");
        }else{
            int dequeued = head.data; 
            head=head.next; 
            count--;
            if (head==null){
                tail=null;
            }
            return dequeued;
        }
        return 0;
    }
    
    public int peekFront(){
        if(isEmpty()){
            System.out.println("Error!  Queue is empty");
            return 0;
        }else{
            return head.data;
        }
    }
     
    public int peekBack(){
        if(isEmpty()){
            System.out.println("Error!  Queue is empty");
            return 0;
        }else{
            return tail.data;
        }
    }

}


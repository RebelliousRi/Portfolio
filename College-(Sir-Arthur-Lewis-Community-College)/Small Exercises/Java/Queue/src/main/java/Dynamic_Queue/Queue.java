/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package Dynamic_Queue;

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
    
    public void enqueue(int data){
        Node newNode = new Node(data); 
        
        if(isEmpty()){
            head = newNode;
            tail = newNode; 
        }else{
            tail.next=newNode;
            tail = newNode;
        }
        count++;
    }
    
    public int dequeue(){
        if(isEmpty()){
            System.out.println("Error!  Queue is empty");
            return 0;
        }else{
            int dequeued = head.data; 
            head=head.next; 
            count--;
            if (head==null){
                tail=null;
            }
            return dequeued;
        }
        
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


/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package doublelinkedlist;

/**
 *
 * @author Arianna St John
 */
public class DoubleLinkedList {

    Node head;
    Node tail;
    
    public DoubleLinkedList (){
        this.head = null;
          this.tail = null;      
    }
    
    
        public void insertAtFront(int data){
        
        Node newNode = new Node(data);
        
        //if there are no nodes in the list
                
                if(head == null){
                    head = newNode;
                    tail = newNode;
                    return;
                    
                }
                        //if there are already nodes in the list
                

                    Node current = head;

                    newNode.next = current;
                    current.prev = newNode;
                    head = newNode;
                    

    }
    
    public void insertAtEnd(int data){
        
        Node newNode = new Node(data);
        
        //if there are no nodes in the list
                
                if(head == null){
                    head = newNode;
                    tail = newNode;
                    return;
                    
                }
                        //if there are already nodes in the list
                

                    Node current = tail;

                    current.next = newNode;
                    newNode.prev = current;
                    tail = newNode;
                    

    }
    
        //inserting at a specific position
    public void insertAt(int position, int data){
    
        Node newNode = new Node(data);
        
        if (position == 0){
            
            insertAtFront(data);
            
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
                newNode.prev = current;
                current.next.prev = newNode;
                current.next = newNode;
                
            } 
        }
}
    
    public void displayFromFront(){
        Node current = head;
        if(head == null){
                                System.out.println("Linked list is empty.");
                    }
                            while(current != null){
                                System.out.println(current.data);
                        current = current.next;
                    }
                                                        

    }
    
        public void displayFromEnd(){
        Node current = tail;
        if(head == null){
                                System.out.println("Linked list is empty.");
                    }
                            while(current != null){
                                System.out.println(current.data);
                        current = current.prev;
                    }
                                                        

    }
    

    
    
        public void replace(int oldValue, int newValue){
        
        Node current = head;
        boolean found = false;
        
                while (current.next != null) {
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
        
        
            public int length() {
        Node current = head;
        int length = 0;

        while (current != null) {
length++;
            current = current.next;
        }
        
        return length;

    }
    
    
    
    public void delete1 (int value){
    if(head == null){
        System.out.println("Error, node is empty");
        return;
    }        
    
    Node current = head;
                    while(current.next !=null && current.data !=value){
                current = current.next;
                
            }
                         if (current.next==null){
                System.out.println("Value not found");
                return;
            } 
                         
                   if(current.prev == null){
            head = current.next;

    }else
                   
        if(current.next == null){
        current.prev.next = null;
        current.prev = tail;
            return;
    } else {
        
        current.next.prev = current.prev;
        current.prev.next = current.next;
        return;
    }     
  
        

}
    
    
     public void delete (int value){
    if(head == null){
        System.out.println("Error, node is empty");
        return;
    }        Node current = head;
                    while(current.next !=null && current.data !=value){
                current = current.next;
                
            }
                         if (current.next==null){
                System.out.println("Value not found");
                return;
            } 
        if(head.data == value){
            head.next = head;
            return;
    } else         if(tail.data == value){
            tail.prev = tail;
            return;
    } else {
        
        current.next.prev = current.prev;
        current.prev.next = current.next;
        return;
    }   
        
}
}

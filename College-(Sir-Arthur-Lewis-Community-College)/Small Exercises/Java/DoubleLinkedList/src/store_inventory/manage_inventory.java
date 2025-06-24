/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package store_inventory;

/**
 *
 * @author Arianna St John
 */
public class manage_inventory {

    Node head;
    Node tail;
    
    public manage_inventory (){
        this.head = null;
          this.tail = null;      
    }
    
    
        public void insertAtFront(int product_id, String product_name, int quantity, Double price){
        
        Node newNode = new Node(product_id, product_name, quantity, price);
        
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
    
    public void insertAtEnd(int product_id, String product_name, int quantity, Double price){
        
        Node newNode = new Node(product_id, product_name, quantity, price);
        
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
    public void insertAt(int position, int product_id, String product_name, int quantity, Double price){
    
        Node newNode = new Node(product_id, product_name, quantity, price);
        
        if (position == 0){
            
            insertAtFront(product_id, product_name, quantity, price);
            
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
                                System.out.println(current.product_id);
                        current = current.next;
                    }
                                                        

    }
    
        public void displayFromEnd(){
        Node current = tail;
        if(head == null){
                                System.out.println("Linked list is empty.");
                    }
                            while(current != null){
                                System.out.println(current.product_id);
                        current = current.prev;
                    }
                                                        

    }
    

    
    
        public void replace(int oldValue, int newValue){
        
        Node current = head;
        boolean found = false;
        
                while (current.next != null) {
                    if (current.product_id == oldValue) {
            current.product_id = newValue;
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
                    while(current.next !=null && current.product_id !=value){
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
                    while(current.next !=null && current.product_id !=value){
                current = current.next;
                
            }
                         if (current.next==null){
                System.out.println("Value not found");
                return;
            } 
        if(head.product_id == value){
            head.next = head;
            return;
    } else         if(tail.product_id == value){
            tail.prev = tail;
            return;
    } else {
        
        current.next.prev = current.prev;
        current.prev.next = current.next;
        return;
    }   
        
}
     
     public Node search(int product_id){
             
            Node current = head;
                    while(current.next !=null && current.product_id !=product_id){
                current = current.next;
                
            }  
                    
                                             if (current.next==null){
                System.out.println(product_id + " was not found in inventory");
                return null;
            }
                                             
            System.out.println("Product found: ");   
            System.out.println("Product ID: " + current.product_id +
            "\nProduct Name: " + current.product_name +
                    "\nQuantity In Stock: " + current.quantity +
                            "\nProduct Price: " + current.price);
            return current;
     }
     
     public void updateStock(int value, int product_id) {
    
    Node current = search(product_id);
    
    current.quantity += value;
    System.out.println("Stock update. New wuantity: "+current.quantity);   
    
}
     
     public int totalInventory(){
         
         int total= 0;
         
         Node current = head;
         
                            while(current != null){
                                total+= (current.quantity*current.price);
                        current = current.next;
                    }
                          
         return 0;
     }
     
}

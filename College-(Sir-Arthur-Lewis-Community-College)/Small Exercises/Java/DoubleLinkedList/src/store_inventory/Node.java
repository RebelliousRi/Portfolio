/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package store_inventory;

/**
 *
 * @author Arianna St John
 */
public class Node {
    protected int product_id;
    protected String product_name;
    protected int quantity;
    protected Double price;

    protected Node next;
        protected Node prev;

    
    public Node (int product_id, String product_name, int quantity, Double price){
        this.product_id = product_id;
         this.product_name = product_name;       
           this.quantity = quantity;
                   this.price = price;
        this.next = null;
        this.next = prev;
    }
}
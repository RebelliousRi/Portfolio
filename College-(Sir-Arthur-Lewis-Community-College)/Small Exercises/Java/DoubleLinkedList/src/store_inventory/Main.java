/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package store_inventory;

/**
 *
 * @author Arianna St John
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        
        manage_inventory inv = new manage_inventory();
        
        inv.insertAtEnd(1, "Laptop", 5, 1200.00);
        inv.insertAtEnd(1, "Phone", 10, 800.00);
        inv.insertAtEnd(1, "Tablet", 7, 450.00);
        
        inv.search(2);
        
        System.out.println("");
        inv.updateStock(5, 2);
        
        System.out.println(inv.totalInventory());
        
        
    }
    
}

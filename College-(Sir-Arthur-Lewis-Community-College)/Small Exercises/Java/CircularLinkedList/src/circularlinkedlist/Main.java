/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package circularlinkedlist;

/**
 *
 * @author Arianna St John
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

        CircularLinkedList list = new CircularLinkedList();
        
        list.insert(1);
        list.insert(2);
        list.insert(3);
        list.insert(5);
        list.display();
        
        list.insertAt(5, 4);
        System.out.println("New list");
        list.display();
    }
    
}

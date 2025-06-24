/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Priority_Queue;

import Dynamic_Queue.*;

/**
 *
 * @author Arianna St John
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(int[] args) {
        
        Queue pque = new Queue(); 

        System.out.println(pque.isEmpty());
        System.out.println(pque.size());

pque.enqueue(1, 3);
pque.enqueue(2, 1);
pque.enqueue(3, 2);
pque.enqueue(4, 5);
pque.enqueue(5, 6);
pque.enqueue(6, 4);

        
        System.out.println("");
        System.out.println("Peeking ");
        System.out.println("First: "+pque.peekFront());
        System.out.println("Last: "+pque.peekBack());
        
        System.out.println("");
        System.out.println("Printing:");
        while(!pque.isEmpty()){
            System.out.println(pque.dequeue());
        }

    }
}

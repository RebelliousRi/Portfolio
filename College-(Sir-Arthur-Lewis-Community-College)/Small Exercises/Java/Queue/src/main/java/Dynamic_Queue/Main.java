/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Dynamic_Queue;

/**
 *
 * @author Arianna St John
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(int[] args) {
        
        Queue que = new Queue(); 

        System.out.println(que.isEmpty());
        System.out.println(que.size());

        for (int x = 0; x <= 10; x++) {
            que.enqueue(Queue.valueOf(x));
        }
        
        System.out.println("");
        System.out.println("Peeking ");
        System.out.println("First: "+que.peekFront());
        System.out.println("Last: "+que.peekBack());
        
        System.out.println("");
        System.out.println("Printing:");
        while(que.size()!=0){
            System.out.println(que.dequeue());
        }

    }
}

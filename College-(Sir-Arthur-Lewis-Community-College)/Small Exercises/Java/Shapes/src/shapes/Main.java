/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package shapes;

/**
 *
 * @author Arianna St John
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        //object creation
Circle cir = new Circle ("red" , 6);
Rectangle rec = new Rectangle ("blue", 5, 4);

System.out.println("Circle colour: " +cir.colour);
System.out.println("Rectangle colour: " +rec.colour);

    }
    
}

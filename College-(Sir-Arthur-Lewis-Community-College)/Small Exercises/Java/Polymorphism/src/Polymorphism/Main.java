/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Polymorphism;

/**
 *
 * @author Arianna St John
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Calculator calc = new Calculator(); 
   
        System.out.println(calc.add(8,5));
        System.out.println(calc.add(3,5,4));
        System.out.println(calc.add(10.0, 1));
        System.out.println(calc.add(7.3,2.7));
        System.out.println(calc.add("1","4"));
    }
    
}

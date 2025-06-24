/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package abstraction;

/**
 *
 * @author Arianna St John
 */
public class Dog implements Animal{
    
   @Override 
   public void sound(){
       System.out.println("The Dog barks");
   }
   
    @Override 
   public void eat(){
       System.out.println("The Dog is eating rice");
   }
   
    @Override 
   public void sleep(){
       System.out.println("The Dog sleeps on the couch");
   }
}

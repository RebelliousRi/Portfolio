/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package inheritance;

/**
 *
 * @author Arianna St John
 */
public class Person {
    private String name; 
    protected int age; 
    
    public Person(String name, int Personage){
        this.name=name; 
        age=Personage;
    }
    
    public void display(){
        System.out.println("Name: "+ name);
        System.out.println("Age: "+age);
    }
}
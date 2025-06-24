/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package inheritance;

/**
 *
 * @author Arianna St John
 */
public class Student extends Person{
    //Attributes of sub class Student 
    private String id; 
    private String major; 
    
    public Student(String name, String id, String major,int age){
        super(name,age);
        this.major=major; 
        this.id=id;
    }
    
    @Override
    public void display(){
        super.display(); 
        System.out.println("Student ID: "+id);
        System.out.println("Major: "+major);
    }
    
}

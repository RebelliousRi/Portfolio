/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package exercise_4;

/**
 *
 * @author Arianna St John
 */
public abstract class User {
    
        //atributes
      protected String name;  
    protected int sid, id;

    
    //constructor
public User(String name, int sid){

this.name = name;   
this.sid = sid;

}

    public String getName() {
        return name;
    }
    
public abstract void displayInfo();
    
}

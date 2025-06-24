/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package exercise_4;

/**
 *
 * @author Arianna St John
 */
public abstract class Item {
    
    //atributes
    protected int id;
    protected String title;
    
    
    //constructor
public Item(int id, String title){

this.id = id;
this.title = title;

}

    public String getTitle() {
        return title;
    }

public abstract void displayInfo();
    
}

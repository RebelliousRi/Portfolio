/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package school;

/**
 *
 * @author Arianna St John
 */
public class Courses {   
    private String CID; 
    private String name;
    private String description;
    protected Lecturers Lecturers;

    
    public Courses(String CID, String name, String description){     
        this.CID=CID; 
        this.name=name; 
        this.description=description; 
    }
}

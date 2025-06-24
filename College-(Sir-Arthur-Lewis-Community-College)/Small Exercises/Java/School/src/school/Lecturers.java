/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package school;

/**
 *
 * @author Arianna St John
 */
public class Lecturers extends Person {
    
       protected String LID; 

    public Lecturers(String LID, String fname, String lname, String gender, String email) {
        super(fname, lname, gender, email);
        this.LID=LID;
    }


}

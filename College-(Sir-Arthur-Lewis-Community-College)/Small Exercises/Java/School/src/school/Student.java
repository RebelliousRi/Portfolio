/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package school;

/**
 *
 * @author Arianna St John
 */
public class Student extends Person {
    
       protected String SID; 

    public Student(String SID, String fname, String lname, String gender, String email) {
        super(fname, lname, gender, email);
        this.SID=SID;
    }
    
        @Override
    public String getDescription() {
        return "Student ID: " + SID + "Name: " + fname + " " + lname + ", Gender: " + gender + ", email: " + email;
    }


}
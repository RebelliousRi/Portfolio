/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class Student extends Person {
    public static final String Freshman = "Freshman", Sophomore = "Sophomore", Junior = "Junior",Senior = "Senior";

    private String studentStat;

    public Student(String name, String address, String phoneNo, String email, String classStatus) {
        super(name, address, phoneNo, email);
        this.studentStat = studentStat;
    }

    @Override
    public String toString() {
        return "Role: Student, Name: " + name + ", Status: " + studentStat;
    }
}

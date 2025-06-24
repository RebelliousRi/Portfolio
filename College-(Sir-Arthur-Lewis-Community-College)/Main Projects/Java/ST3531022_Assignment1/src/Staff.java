/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class Staff extends Employee {
    private String title;

    public Staff(String name, String address, String phoneNo, String email, String office, double salary, String dateHired, String title) {
        super(name, address, phoneNo, email, office, salary, dateHired);
        this.title = title;
    }

    @Override
    public String toString() {
        return "Role: Staff, Name: " + name + ", Title: " + title;
    }
}
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class Person {
    protected String name, address, phoneNo, email;

    public Person(String name, String address, String phoneNo, String email) {
        this.name = name;
        this.address = address;
        this.phoneNo = phoneNo;
        this.email = email;
    }

    @Override
    public String toString() {
        return "Role: Person, Name: " + name;
    }
}
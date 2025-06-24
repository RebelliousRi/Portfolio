/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class Employee extends Person {
    protected String office, dateHired;
    protected double salary;

    public Employee(String name, String address, String phoneNo, String email, String office, double salary, String dateHired) {
        super(name, address, phoneNo, email);
        this.office = office;
        this.salary = salary;
        this.dateHired = dateHired;
    }

    @Override
    public String toString() {
        return "Role: Employee, Name: " + name + ", Salary: $" + salary;
    }
}
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class Main {

    /**
     * @param args the command line arguments
     */
 public static void main(String[] args) {
        System.out.println("\nNumber 1\n");
        Stock ORCLStock = new Stock("ORCL", "Oracle Corporation");
        ORCLStock.setPrevCloPrice(34.5);
        ORCLStock.setCurPrice(34.35);
        ORCLStock.displayStockInfo();

        System.out.println("\n~~~~~~~~~~~~~~~~~~~~~~\n");
        
        System.out.println("\nNumber 2\n");

        Person john = new Person("John Doe", "123 Main St", "123-456-7890", "john@example.com");
        Student jane = new Student("Jane Smith", "456 Oak St", "234-567-8901", "jane@example.com", Student.Junior);
        Employee alice = new Employee("Alice Johnson", "789 Pine St", "345-678-9012", "alice@example.com", "A101", 50000, "2022-06-15");
        Faculty bob = new Faculty("Dr. Bob", "101 Elm St", "456-789-0123", "bob@example.com", "B202", 80000, "2018-09-01", "9 AM - 5 PM", "Professor");
        Staff mike = new Staff("Mr. Mike", "789 Birch St", "567-890-1234", "mike@example.com", "C303", 40000, "2020-11-10", "Admin");

        System.out.println(john);
        System.out.println(jane);
        System.out.println(alice);
        System.out.println(bob);
        System.out.println(mike);

        System.out.println("\n~~~~~~~~~~~~~~~~~~~~~~\n");
        
        System.out.println("\nNumber 3\n");

        Book gatsby = new Book("The Great Gatsby", "F. Scott Fitzgerald", 1925, 180);
        Magazine natgeo = new Magazine("National Geographic", "National Geographic Society", 2024, 12);
        DVD wbros = new DVD("Inception", "Warner Bros", 2010, 148);

        System.out.println(gatsby.getDescription());
        System.out.println(natgeo.getDescription());
        System.out.println(wbros.getDescription());
    }
}

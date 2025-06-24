/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package exercise_4;

/**
 *
 * @author Arianna St John
 */
import java.util.ArrayList;
import java.util.List;
public class Borrower extends User{
    
    //atributes
    private List<Item> borrowedItems;
    
        //constructor
    public Borrower(String name, int sid) {
        super(name, sid);
        this.borrowedItems = new ArrayList<>();
    }

    public void borrowItem(Item item) {
        borrowedItems.add(item);
        System.out.println(getName() + " borrowed: " + item.getTitle());
    }

    public void returnItem(Item item) {
        if (borrowedItems.remove(item)) {
            System.out.println(getName() + " returned: " + item.getTitle());
        } else {
            System.out.println(getName() + " has not borrowed: " + item.getTitle());
        }
    }

    public void displayBorrowedItems() {
        System.out.println(getName() + "'s Borrowed Items:");
        if (borrowedItems.isEmpty()) {
            System.out.println("No borrowed items.");
        } else {
            for (Item item : borrowedItems) {
                item.displayInfo();
            }
        }
    }

    @Override
    public void displayInfo() {
        System.out.println("Borrower Name: " + getName());
        displayBorrowedItems();
    }
}

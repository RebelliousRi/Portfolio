/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package exercise_4;

/**
 *
 * @author Arianna St John
 */
import java.util.ArrayList;
import java.util.List;
class Library {
    private List<Item> items;
    private List<Borrower> borrowers;

    public Library() {
        items = new ArrayList<>();
        borrowers = new ArrayList<>();
    }

    public void addItem(Item item) {
        items.add(item);
        System.out.println("Added item: " + item.getTitle());
    }

    public void addUser(Borrower borrower) {
        borrowers.add(borrower);
        System.out.println("Added borrower: " + borrower.getName());
    }

    public Item searchItem(String title) {
        for (Item item : items) {
            if (item.getTitle().equalsIgnoreCase(title)) {
                return item;
            }
        }
        return null;
    }

    public Borrower searchBorrower(String name) {
        for (Borrower borrower : borrowers) {
            if (borrower.getName().equalsIgnoreCase(name)) {
                return borrower;
            }
        }
        return null;
    }

    public static void main(String[] args) {
        Library library = new Library();

        // Adding Books
        Book book1 = new Book(1, "Harry Potter", "J.K. Rowling", "Fantasy");
        Book book2 = new Book(2, "To Kill a Mockingbird", "Harper Lee", "Classic");
        library.addItem(book1);
        library.addItem(book2);

        // Adding Borrowers
        Borrower borrower1 = new Borrower("Alice", 100);
        Borrower borrower2 = new Borrower("Bob", 101);
        library.addUser(borrower1);
        library.addUser(borrower2);

        // Borrowing Items
        borrower1.borrowItem(book1);
        borrower2.borrowItem(book2);

        // Returning Items
        borrower1.returnItem(book1);

        // Display Borrowers and Their Borrowed Books
        borrower1.displayInfo();
        borrower2.displayInfo();
    }
}

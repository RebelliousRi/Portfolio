/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class Book extends LibraryItem {
    private int noPages;

    public Book(String title, String authour, int pubYear, int noPages) {
        super(title, authour, pubYear);
        this.noPages = noPages;
    }

    @Override
    public String getDescription() {
        return "Book: " + title + " by " + authour + ", " + pubYear + ", " + noPages + " pages.";
    }
}

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public abstract class LibraryItem {
    protected String title, authour;
    protected int pubYear;

    public LibraryItem(String title, String authour, int pubYear) {
        this.title = title;
        this.authour = authour;
        this.pubYear = pubYear;
    }

    public abstract String getDescription();
}

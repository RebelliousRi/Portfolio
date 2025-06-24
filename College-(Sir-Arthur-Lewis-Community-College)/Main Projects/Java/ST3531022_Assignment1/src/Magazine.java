/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class Magazine extends LibraryItem {
    private int issueNo;

    public Magazine(String title, String publisher, int pubYear, int issueNo) {
        super(title, publisher, pubYear);
        this.issueNo = issueNo;
    }

    @Override
    public String getDescription() {
        return "Magazine: " + title + " published by " + authour + ", " + pubYear + ", Issue No. " + issueNo;
    }
}
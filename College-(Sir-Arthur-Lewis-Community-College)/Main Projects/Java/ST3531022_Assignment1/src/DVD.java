/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class DVD extends LibraryItem {
    private int duration;

    public DVD(String title, String producer, int pubYear, int duration) {
        super(title, producer, pubYear);
        this.duration = duration;
    }

    @Override
    public String getDescription() {
        return "DVD: " + title + " produced by " + authour + ", " + pubYear + ", " + duration + " minutes.";
    }
}
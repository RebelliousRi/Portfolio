/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package exercise_4;

/**
 *
 * @author Arianna St John
 */
public class Book extends Item{
    
    //atributes
    protected String authour, genre;
    
        //constructor
public Book(int id, String title, String authour, String genre){
super (id, title);
this.authour = authour;
this.genre = genre;

}
  
@Override
public void displayInfo(){

        System.out.println("Book Id: " + id);
        System.out.println("Title: "+title);
                System.out.println("Authour: "+ authour);
        System.out.println("Genre: "+genre);
    
}
    
}

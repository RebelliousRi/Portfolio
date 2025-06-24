/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package shapes;

/**
 *
 * @author Arianna St John
 */

public class Rectangle extends Shapes {

//atributes
protected double length;
protected double width;

//constructor
public Rectangle(String colour, double length, double width){

super(colour);
this.length = length;
this.width = width;

}

public double peri(){

return 2*(length+width);

}

public double area(){

    return length*width;
    
    }


}


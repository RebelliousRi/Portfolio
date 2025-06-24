/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package shapes;
/**
 *
 * @author Arianna St John
 */


public class Circle extends Shapes {

//atributes
protected double radius;

//constructor
public Circle(String colour, double radius){

super(colour);
this.radius = radius;

}

public double circum(){

return 2*3.142*radius;

}


}

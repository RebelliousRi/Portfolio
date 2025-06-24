/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package shapes;

/**
 *
 * @author Arianna St John
 */
public class Triangle extends Shapes{
    //Attribues 
    protected double side1;
    protected double side2;
    protected double side3;
    
    public Triangle(String colour, double side1,double side2, double side3){
        super(colour); 
        this.side1=side1;
        this.side2=side2;
        this.side3=side3;
    }
    
    public double peri(){

return side1+side2+side3;

}
    
}


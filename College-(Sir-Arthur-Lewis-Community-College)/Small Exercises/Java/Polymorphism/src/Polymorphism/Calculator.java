/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Polymorphism;
/**
 *
 * @author Arianna St John
 */
public class Calculator {
  
    public int add(int a, int b){
        return 1+a+b; 
    }
    
    public int add(int a, int b, int c){
        return 2+a+b+c; 
    }
    
    public double add(double a, int b){
        return 3+a+b; 
    }
    public double add(double a, double b){
        return 4+a+b; 
    }
    public String  add(String a, String b){
        return "String: "+a+b; 
    }
}
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
import java.util.Scanner;

public class JMSales {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        double[][] sales = {
            
            {2400, 3500, 2000},
            {1500, 7000, 1000},
            {600, 450, 2100},
            {790, 240, 500},
            {1000, 1000, 1000},
            {6300, 7000, 8000},
            {1300, 450, 700},
            {2700, 5500, 6000},
            {4700, 4800, 4900},
            {1200, 1300, 400},
        };
         
        double[][] bonus = new double[10][2];
        double[] monthlySales = new double[3];
        double bRate;
        double total = 0;

        System.out.println("Enter the bonus rate: ");
        bRate = scanner.nextDouble();
        
        
          for (int i = 0; i < 10; i++) {
            for (int j = 0; j < 3; j++) {
total += sales[i][j];   

            }
                bonus[i][0] = total;
                bonus[i][1] = total+bRate;
            total = 0;
        }      
          
                    for (int j = 0; j < 3; j++) {
            for (int i = 0; i < 10; i++) {
total += sales[i][j];   
                
            }
monthlySales[j] = total;
            total = 0;
        }     
        
           System.out.println("January \t\t February \t\t March");
                        for (int i = 0; i < 3; i++) {
System.out.println(monthlySales[i] + "\t\t"); 
                
            }   
             System.out.println("\n\n");
             System.out.println("Sales person number \t\t Total sales \t\t Bonus");
         
                         for (int i = 0; i < 10; i++) {
                             System.out.println((i+1));
                                         for (int j = 0; j < 3; j++) {
System.out.println("\t\t\t\t" + bonus[i][j]);    

            }
                         }

                
            }
             
        }
package arrays;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
import java.util.Scanner;
public class Arrays {
    
   /*int[][] arrayname = new int[m][n];
    int[][] myArray = new int[3][4];

    int[][] arrayName = { {initialValues}, … {initialValues} };
int[][] myArray = { {1, 2, 3}, {4, 5, 6}, {7, 8, 9} };

//This creates a two-dimensional array with 3 rows and 3 columns, where the first row contains the values 1, 2, and 3, the second row contains the values 4, 5, and 6, and the third row contains the values 7, 8, and 9.

arrayName[rowIndex][columnIndex];

	 for (int i = 0; i < myArray.length; i++) {
    		for (int j = 0; j < myArray[i].length; j++) {
        		System.out.print(myArray[i][j] + " ");
    		}
    	System.out.println();
	} 
    int[][] quantitites = { {0, 0,}, {0, 0,}, {7, 0,} , {0, 0,}};

public void Assign(){
int quantities[2][0] = 7;    }*/

    Scanner scan = new Scanner( System.in);
    
int[][] myQuantitites = new int[4][2];

public int[][] propmt(){

 for (int x = 0; x < 4; ++x){

 for (int y = 0; y<2; ++y){
     
 System.out.println("Enter the row: " +(x+1)+ "Enter the column: " +(y+1)+ "=");
 
 myQuantities[x][y] = scan.nextInt();
    
 }

}

 } 

    void prompt() {
        throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
    }
}

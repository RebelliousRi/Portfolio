/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */


/**
 *
 * @author Arianna St John
 */

import java.util.Scanner;

public class Airplane_Tickets
{
  public static void main( String [] args )
  {

//atributes
int NumCoach;
int NumFirst;
int PriceCoach = 90;
int PriceFirst = 125;
int MoneyCoach;
int MoneyFirst;

     Scanner scan = new Scanner( System.in );

System.out.println("Enter the number of coach passengers");
NumCoach = scan.nextInt( );
System.out.println("Enter the number of first class passengers");
NumFirst = scan.nextInt( );

System.out.println();

MoneyCoach = NumCoach*PriceCoach;
MoneyFirst = NumFirst*PriceFirst;

System.out.println("The total money made from coach tickets is $" + MoneyCoach);
System.out.println("The total money made from first class tickets is $" + MoneyFirst);
  
  }
}


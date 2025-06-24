/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
import java.util.Scanner;

public class Temperature {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int[][] temperatures = new int[7][2];
        int sumHigh = 0, sumLow = 0;
        int highestTemp = Integer.MIN_VALUE;
        int lowestTemp = Integer.MAX_VALUE;

        for (int day = 0; day < 7; day++) {
            System.out.print("Enter the highest temperature for day " + (day + 1) + ": ");
            temperatures[day][0] = scanner.nextInt();
            System.out.print("Enter the lowest temperature for day " + (day + 1) + ": ");
            temperatures[day][1] = scanner.nextInt();

            // Add to sum for average calculation
            sumHigh += temperatures[day][0];
            sumLow += temperatures[day][1];

            // Check for highest and lowest temperature
            if (temperatures[day][0] > highestTemp) {
                highestTemp = temperatures[day][0];
            }
            if (temperatures[day][1] < lowestTemp) {
                lowestTemp = temperatures[day][1];
            }
        }

        // Calculate averages
        double avgHigh = sumHigh / 7;
        double avgLow = sumLow / 7;

        // Display results
        System.out.println("\n=== Temperature Report ===");
        System.out.printf("Average High Temperature: " + avgHigh + "°C\n");
        System.out.printf("Average Low Temperature: " + avgLow + "°C\n");
        System.out.println("Highest Recorded Temperature: " + highestTemp + "°C");
        System.out.println("Lowest Recorded Temperature: " + lowestTemp + "°C");

        scanner.close();
    }
}


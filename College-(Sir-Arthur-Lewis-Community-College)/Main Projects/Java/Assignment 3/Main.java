package assignment3;

import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("=== Exercise 1: Checking for Positive Numbers ===");
        try {
            // Create a sample file with mixed numbers
            String filename = "numbers.txt";
            FileWriter writer = new FileWriter(filename);
            writer.write("-5\n-3\n-1\n0\n2\n-4\n7\n-8\n0\n-10"); // Mix of positive, negative, and zero
            writer.close();
            
            System.out.println("Sample file 'numbers.txt' created with mixed numbers.");
            System.out.print("Would you like to use the sample file? (yes/no): ");
            String choice = scanner.nextLine().toLowerCase();
            
            if (choice.equals("yes") || choice.equals("y")) {
                System.out.println("Using sample file 'numbers.txt'...\n");
                ExceptionExercises.checkPositiveNumbers(filename);
            } else {
                System.out.print("Please enter the path to your own file: ");
                String customFile = scanner.nextLine();
                System.out.println();
                ExceptionExercises.checkPositiveNumbers(customFile);
            }
        } catch (IOException e) {
            System.out.println("Error creating sample file: " + e.getMessage());
        } finally {
            scanner.close();
        }

        System.out.println("\n=== Exercise 2: Checking for Even Numbers ===");
        int[] numbers = {2, 4, 6, 7, 8, 10}; // Note: 7 is odd
        for (int num : numbers) {
            try {
                ExceptionExercises.checkEvenNumber(num);
            } catch (OddNumberException e) {
                System.out.println("Error: " + e.getMessage());
            }
        }

        System.out.println("\n=== Exercise 3: Checking for Vowels ===");
        String[] testStrings = {
            "Hello",      // contains vowels
            "World",      // contains vowels
            "Rhythm",     // no vowels
            "Fly",        // no vowels
            "AEIOU",      // all vowels
            ""           // empty string
        };

        for (String str : testStrings) {
            try {
                ExceptionExercises.checkVowels(str);
            } catch (NoVowelsException e) {
                System.out.println("Error: " + e.getMessage());
            }
        }
    }
} 
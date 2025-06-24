/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */

/**
 *
 * @author Arianna St John
 */
public class Stock {
    private String symbol, name;
    private double prevCloPrice, curPrice;

    // Constructor
    public Stock(String symbol, String name) {
        this.symbol = symbol;
        this.name = name;
    }

    // Setters
    public void setPrevCloPrice(double price) {
        this.prevCloPrice = price;
    }

    public void setCurPrice(double price) {
        this.curPrice = price;
    }

    // Method to calculate percentage change
    public double getChangePer() {
        return ((curPrice - prevCloPrice) / prevCloPrice) * 100;
    }

    // Display stock info
    public void displayStockInfo() {
        System.out.println("Stock: " + name + " (" + symbol + ")");
        System.out.println("Previous Closing Price: $" + prevCloPrice);
        System.out.println("Current Price: $" + curPrice);
        System.out.printf("Price Change: %.2f%%\n", getChangePer());
    }
}

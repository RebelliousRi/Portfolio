/*Program groceryBill

This program prompts the user to input the prices of 5 items, calculates and prints the total cost
Created by : Arianna St.John
Date : 27/02/24*/

#include <iostream>
using namespace std;

int main(){

    float total = 0;
    float prices = 0;
    int x = 0;

    while (x < 5){
        cout << "Enter the price of the item: " << "\t\t\t\t";
        cin >> prices;
        total = total+prices;
        x ++;
    }

    cout << "\n";
    cout << "The total amount spent on the 5 items is:" << "\t";
    cout << total << endl;

return 0;}
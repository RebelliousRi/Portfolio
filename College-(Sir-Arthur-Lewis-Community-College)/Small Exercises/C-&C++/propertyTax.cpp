/*Program propertyTax

This program prompts the user to input the value of a property, calculates and prints the property tax on it
Created by : Arianna St.John
Date : 30/01/24*/

#include <iostream>
using namespace std;

int main(){

    const float taxValue = 1.75;
    float propValue = 0;
    float tax = 0;

    cout << "Enter the property's value:" << "\t";
    cin >> propValue;
    tax = (propValue / 100) * taxValue;
    cout << "\n";
    cout << "The total tax is   " << "\t\t\t" << tax << endl;
    cout << "\n";

return 0;}
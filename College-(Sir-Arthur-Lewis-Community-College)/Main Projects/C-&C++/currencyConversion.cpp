/*Program currencyConversion

This program prompts the user to input an amount of money and converts the Eastern Caribbean Dollar to another currency
Created by : Arianna St.John
Date : 15/02/24*/

#include <iostream>
using namespace std;

int main(){

    short number = 0;
    float amount = 0;
    float converted = 0;

    cout << "Enter the amount you want to convert:" << "\t\t";
    cin >> amount;
    cout << "\n";
    cout << "Currency Conversion" << endl;
    cout << "\n";
    cout << "1 = United States Dollar" << endl;
    cout << "2 = Canadian Dollar" << endl;
    cout << "3 = Euro" << endl;
    cout << "4 = Indian Rupee" << endl;
    cout << "5 = Japanese Yen" << endl;
    cout << "6 = Mexican Peso" << endl;
    cout << "7 = South African Rand" << endl;
    cout << "8 = British Pound" << endl;
    cout << "\n";
    cout << "Choose the currency you want to convert to:" << "\t";
    cin >> number;
    cout << "\n";

    switch (number){

        case 1:
            converted = amount * 2.7;
            cout << "EC " << amount << " = USD " << converted;
        break;

        case 2:
            converted = amount * 2;
            cout << "EC " << amount << " = CAD " << converted;
        break;

        case 3:
            converted = amount * 2.92;
            cout << "EC " << amount << " = EUR " << converted;
        break;

        case 4:
            converted = amount * 0.033;
            cout << "EC " << amount << " = INR " << converted;
        break;

        case 5:
            converted = amount * 0.018;
            cout << "EC " << amount << " = JPY " << converted;
        break;

        case 6:
            converted = amount * 0.16;
            cout << "EC " << amount << " = MXN " << converted;
        break;

        case 7:
            converted = amount * 0.14;
            cout << "EC " << amount << " = ZAR " << converted;
        break;
        
        case 8:
            converted = amount * 3.41;
            cout << "EC " << amount << " = GBP " << converted;
        break;

        default:
            cout << "Invalid currency";

    }

    cout << "\n";

return 0;}

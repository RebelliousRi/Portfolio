/*Program studentAges

This program allows a user to deposit, withdraw and inquire to a bank account
Created by : Arianna St.John
Date : 14/03/24*/

#include <iostream>
using namespace std;

int main(){

    string stop = " ";
    char funct = ' ';
    float deposit = 0;
    float withdrawal = 0;
    float total = 0;

    cout << "Bank Of St. John" << endl;
    cout << "\n";
    cout << "To deposit into the account, press:   " << "\t\t\t\t" << "D" << endl;
    cout << "To withdraw from the account, press:  " << "\t\t\t\t" << "W" << endl;
    cout << "To inquire about the account, press:  " << "\t\t\t\t" << "I" << endl;
    cout << "When you are done, press: " << "\t\t\t\t\t\t\t" << "S" << endl;
    cout << "\n";

    do {
        cout << "Choose your function: " << "\t\t\t\t\t\t\t\t";
        cin >> funct;
        cout << "\n";

        switch (funct){

            case 'D':
                cout << "Enter the amount you wish to wish to deposit: " << "\t\t";
                cin >> deposit;
                total = total + deposit;
                cout << "\n";
            break;

            case 'W':
                cout << "Enter the amount you wish to wish to withdraw:" << "\t\t";
                cin >> withdrawal;
                total = total - withdrawal;
                cout << "\n";
            break;

            case 'I':
                cout << "The total balance is " << "\t\t\t\t\t\t\t\t";
                cout << total << endl;
                cout << "\n";
            break;

            case 'S':
                cout << "Thank you for choosing Bank Of St.John!" << "\t";
                stop = "stop";
            break;

            default:
                cout << "Invalid function entered." << endl;
                cout << "\n";

        }

    } while (stop != "stop");

    cout << "\n";

return 0;}
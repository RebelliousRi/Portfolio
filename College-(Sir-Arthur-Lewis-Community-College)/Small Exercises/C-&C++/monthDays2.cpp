 /*Program monthDays2

This program prompts the user to input a month and a year, determines and prints the number of days in that month
Created by : Arianna St.John
Date : 02/04/24*/ 

#include <iostream>
using namespace std;

int main (){

    short year = 0;
    short days = 0;
    short month = 0;

    cout << "Months Of The Year" << endl;
    cout << "\n";
    cout << "1 = January" << endl;
    cout << "2 = February" << endl;
    cout << "3 = March" << endl;
    cout << "4 = April" << endl;
    cout << "5 = May" << endl;
    cout << "6 = June" << endl;
    cout << "7 = July" << endl;
    cout << "8 = August" << endl;
    cout << "9 = September" << endl;
    cout << "10 = October" << endl;
    cout << "11 = November" << endl;
    cout << "12 = December" << endl;
    cout << "\n";
    cout << "Enter the month:" << "\t";
    cin >> month;
    cout << "\n";
    cout << "Enter the year:" << "\t\t";
    cin >> year;
    cout << "\n";

    switch (month){

        case 1:
            cout << "January has 31 days.";
        break;

        case 2:

            if (year % 4 == 0){
                cout << "February has 29 days.";
            }
            else {
                cout << "February has 28 days.";
            }

        break;

        case 3:
            cout << "March has 31 days.";
        break;

        case 4:
            cout << "April has 30 days.";
        break;

        case 5:
            cout << "May has 31 days.";
        break;

        case 6:
            cout << "June has 30 days.";
        break;

        case 7:
            cout << "July has 31 days.";
        break;

        case 8:
            cout << "August has 31 days.";
        break;

        case 9:
            cout << "September has 30 days.";
        break;

        case 10:
            cout << "October has 31 days.";
        break;

        case 11:
            cout << "November has 30 days.";
        break;

        case 12:
            cout << "December has 31 days.";
        break;

        default:
            cout << "Invalid month entered, select a number from 1-12.";
    }

    cout << "\n";

return 0;}
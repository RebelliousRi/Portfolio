/*Program whichDay2

This program prompts the user to input a number from 1-7 and prints a specific day
Created by : Arianna St.John
Date : 15/02/24*/

#include <iostream>
using namespace std;

int main(){

short number = 0;

cout << "Enter a number from 1-7:" << "\t";
cin >> number;
cout << "\n";

switch (number){

    case 1:
        cout << "The day is Sunday";
    break;

    case 2:
        cout << "The day is Monday";
    break;

    case 3:
        cout << "The day is Tuesday";
    break;

    case 4:
        cout << "The day is Wednesday";
    break;

    case 5:
        cout << "The day is Thursday";
    break;

    case 6:
        cout << "The day is Friday";
    break;

    case 7:
        cout << "The day is Saturday";
    break;

    default:
        cout << "Selection out of range";

}

cout << "\n";

return 0;}
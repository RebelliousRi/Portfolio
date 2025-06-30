/*Program racePlaces

This program prompts the user to input a number from 1-5 and prints a place depending on it
Created by : Arianna St.John
Date : 20/02/24*/

#include <iostream>
using namespace std;

int main(){

    short number = 0;

    cout << "Enter a number from 1-5:" << "\t";
    cin >> number;
    cout << "\n";

    switch (number){

        case 1:
            cout << "Bronze";
        break;

        case 2:
            cout << "Bronze";
        break;

        case 3:
            cout << "Silver";
        break;

        case 4:
            cout << "Gold";
        break;

        case 5:
            cout << "Gold";
        break;

        default:
            cout << "Invalid ID";
        
    }

    cout << "\n";

return 0;}
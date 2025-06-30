 /* Program racePlaces2

This program prompts the user to input a participant's position, determines and prints the medal they received
Created by : Arianna St.John
Date : 29/03/24*/ 

#include <iostream>
using namespace std;

int main(){

    short position = 0;

    cout << "International Olympic Committee" << endl;
    cout << "\n";
    cout << "Assigned Position Numbers" << endl;
    cout << "\n";
    cout << "1 = First" << endl;
    cout << "2 = Second" << endl;
    cout << "3 = Third" << endl;
    cout << "4 = Fourth" << endl;
    cout << "5 = Fifth" << endl;
    cout << "6 = Sixth" << endl;
    cout << "\n";
    cout << "Enter the participant's position:" << "\t";
    cin >> position;
    cout << "\n";

    switch (position){
        
        case 1:
            cout << "Congratulations you have won a Gold medal.";
        break;

        case 2:
            cout << "Congratulations you have won a Silver medal.";
        break;

        case 3:
            cout << "Congratulations you have won a Bronze medal.";
        break;

        case 4:
            cout << "You almost won a medal better luck next time!";
        break;

        case 5:
            cout << "You almost won a medal better luck next time!";
        break;

        case 6:
            cout << "See you again.";
        break;

        default:
            cout << "Invalid position entered." << endl;
            cout << "Please enter a number from 1-6." << endl;
            
    }

    cout << "\n";

return 0;}
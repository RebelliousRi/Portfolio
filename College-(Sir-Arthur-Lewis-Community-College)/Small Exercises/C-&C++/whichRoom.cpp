/*Program whichRoom

This program prompts the user to input the number of attendants for a meeting, determines and prints which meeting room to use
Created by : Arianna St.John
Date : 15/02/24*/

#include <iostream>
using namespace std;

int main(){

    short attendants = 0;

    cout << "Enter the number of attendants:" << "\t";
    cin >> attendants;
    cout << "\n"; 

    if (attendants >= 75){
        cout << "Use the Kanton room.";
    } 
    else if (attendants >= 40 && attendants < 75){
        cout << "Use the Harris room.";
    } 
    else if (attendants >= 10 && attendants < 40){
        cout << "Use the small conference room.";
    } 
    else if (attendants < 10){
        cout << "Cancel the seminar.";
    }

    cout << "\n";

return 0;}
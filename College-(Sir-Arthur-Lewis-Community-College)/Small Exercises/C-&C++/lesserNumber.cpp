/*Program lesserNumber

This program prompts the user to input a pair of numbers and determines the lesser one
Created by : Arianna St.John
Date : 08/02/24*/

#include <iostream>
using namespace std;

int main(){

    float numbA = 0;
    float numbB = 0;

    cout << "Enter the first number: " << "\t";
    cin >> numbA;
    cout << "Enter the second number:" << "\t";
    cin >> numbB;
    cout << "\n";

    if (numbA < numbB){
        cout << "The lesser number is:  " << "\t" << numbA << endl;
    }
    else {
        cout << "The lesser number is:  " << "\t" << numbB << endl;
    }

    cout << "\n";

return 0;}
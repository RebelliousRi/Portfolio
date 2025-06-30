/*Program multiplicationTable

This program prompts the user to input a multiplicand and prints a multiplication table based on it
Created by : Arianna St.John
Date : 12/03/24*/

#include <iostream>
using namespace std;

int main(){

    float product = 0;
    float multiC = 0;
    float multiP;

    cout << "Enter the multiplicand:" << "\t";
    cin >> multiC;

    for (multiP = 1; multiP <= 12; multiP++){
        product = multiC * multiP;
        cout << multiC << " * " << multiP << " = " << product << endl;
    }

    return 0;}
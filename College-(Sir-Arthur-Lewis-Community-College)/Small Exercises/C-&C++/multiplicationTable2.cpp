/*Program multiplicationTable2

This program prints multiplication tables from 6 to 9
Created by : Arianna St.John
Date : 28/03/24*/

#include <iostream>
#include <iomanip>
using namespace std;

int main(){

    int multiC [4] = {6, 7, 8, 9};
    int product [4];
    int x = 0;

    cout << "Multiplication table for the numbers 6 to 9\n\n";

    for (x = 0; x <= 12; x++){

        for (int i = 0; i < 4; i++) {
            product [i] = multiC [i] * x;
            cout << setw(2) << multiC [i] << " * " << setw(2) << x << " = " << setw(3) << product [i] << "\t";
        }

        cout << endl;
    }

    return 0;}
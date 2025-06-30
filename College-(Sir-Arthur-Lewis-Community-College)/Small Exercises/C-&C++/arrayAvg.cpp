/*Program arrayAvg

This program prompts the user to input 5 numbers, calculates and prints the sum and average
Created by : Arianna St.John
Date : 27/02/24*/

#include <iostream>
using namespace std;

int main(){

    int num [5];
    int sum = 0;
    float avg = 0;
    int x = 0;

    for (x = 0; x < 5; x ++){
        cout << "Enter the numbers:" << "\t";
        cin >> num [x];
        sum = sum + num [x];
        cout << "\n";
    }

    avg = sum / 5;
    cout << "The sum is:" << "\t\t\t";
    cout << sum << endl;
    cout << "The average is:" << "\t\t";
    cout << avg << endl;

return 0;}
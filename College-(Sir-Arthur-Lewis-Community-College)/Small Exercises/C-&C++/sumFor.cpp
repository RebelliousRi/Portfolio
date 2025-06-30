/*Program rewardPoints

This program prompts the user to enter 5 numbers, calculates and prints the sum
Created by : Arianna St.John
Date : 27/02/24*/

#include <iostream>

using namespace std;

int main(){

    float sum = 0;
    float num;
    float x = 0;

    for (x = 0; x < 5; x ++){
        cout << "Enter Number:" << "\t\t\t\t\t\t\t";
        cin >> num;
        sum = sum + num;
        cout << "\n";
    }

    cout << "\n";
    cout << "The sum of the " << x << " number you entered is:" << "\t";
    cout << sum << endl;

return 0;}
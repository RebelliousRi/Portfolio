/*Program rewardPoints

This program prompts the user to input a set of numbers, terminated by 0,  calculates and prints the sum
Created by : Arianna St.John
Date : 27/02/24*/

#include <iostream>

using namespace std;

int main(){

    float sum = 0;
    float num;
    float x = 0;

    do {
        cout << "To End Program Enter 0." << endl;
        cout << "To continue adding enter the number:" << "\t\t";
        cin >> num;
        cout << "\n";
        sum = sum+num;
    } while (num != 0);

    cout << "\n";
    cout << "The sum of the " << x << " numbers you entered is:" << "\t";
    cout << sum << endl;

return 0;}
/*Program rewardPoints

This program prompts the user to enter a group of numbers, terminated by 0, calculates and prints the sum
Created by : Arianna St.John
Date : 27/02/24*/

#include <iostream>

using namespace std;

int main(){

    float sum = 0;
    float num;
    float x = 0;

    cout << "To End Program Enter 0." << endl;
    cout << "To continue adding enter the number:" << "\t\t";
    cin >> num;
    cout << "\n";

    while (num != 0){
        sum = sum+num;
        cout << "To End Program Enter 0." << endl;
        cout << "To continue adding enter the number:" << "\t\t";
        cin >> num;
        cout << "\n";
        x ++;
    }

    cout << "\n";
    cout << "The sum of the " << x << " numbers you entered is:" << "\t";
    cout << sum << endl;

return 0;}
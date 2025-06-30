/*Program avgAge

This program prompts the user to input the ages of 10 students, calculates and prints the sum and average age
Created by : Arianna St.John
Date : 27/02/24*/

#include <iostream>
using namespace std;

int main(){

    int age [10];
    int sum = 0;
    float avg = 0;
    int x = 0;

    for (x = 0; x < 10; x ++){
        cout << "Enter the ages of the students:" << "\t";
        cin >> age [x];
        sum = sum + age [x];
        cout << "\n";
    }

    for (x = 0; x < 10; x ++){
        cout << "Student's " << x + 1 << " age is:" << "\t\t\t\t" << age [x] << "\t";
        cout << "\n";
        cout << "\n";
    }

    avg = sum / 10;
    cout << "The sum of all the ages is:" << "\t\t";
    cout << sum << endl;
    cout << "The average as is:" << "\t\t\t\t";
    cout << avg << endl;

return 0;}
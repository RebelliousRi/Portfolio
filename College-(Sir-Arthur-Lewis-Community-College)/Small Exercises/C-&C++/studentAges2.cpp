/*Program studentAges2

This program prompts the user to input the ages and names of students and prints it
Created by : Arianna St.John
Date : 28/03/24*/

#include <iostream>
using namespace std;

int main(){

    int age [15];
    string name [15];
    int sum = 0;
    float avg = 0;
    int x = 0;

    for (x = 0; x < 15; x ++){
        cout << "Enter student " << x + 1 << "'s name" << "\t";
        cin >> name [x];
        cout << "Enter student " << x + 1 << "'s age" << "\t";
        cin >> age [x];
        sum = sum+age [x];
        cout << "\n";
    }

    for (x = 0; x < 15; x ++){
        cout << name [x] << " is " << age [x] << " years old"<< "\t";
        cout << "\n";
        cout << "\n";
    }

    avg = sum / 10;
    cout << "The sum of all the ages is" << "\t";
    cout << sum << endl;
    cout << "The average age is     	" << "\t";
    cout << avg << endl;

return 0;}
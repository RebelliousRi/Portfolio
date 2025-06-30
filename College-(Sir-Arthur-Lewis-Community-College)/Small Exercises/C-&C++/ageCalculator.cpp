/*Program ageCalculator

This program prompts the user to input their birth year, calculates and outputs their age
Created by : Arianna St.John
Date : 30/01/24*/

#include <iostream>
using namespace std;

int main(){

    const short cYear = 2025;
    short bYear = 0;
    short age = 0;

    cout << "Enter birth year:" << "\t";
    cin >> bYear;
    age = cYear - bYear;
    cout << "\n";
    cout << "The user is " << age << " years old.";
    cout << "\n";

return 0;}
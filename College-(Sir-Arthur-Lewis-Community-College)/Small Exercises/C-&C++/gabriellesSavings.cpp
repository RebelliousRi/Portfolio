/*Program gabriellesSavings

This program prompts the user to input their salary and savings percent, calculates and prints their total amount saved
Created by : Arianna St.John
Date : 31/01/24*/

#include <iostream>
using namespace std;

int main(){

    const short bonus = 150;
    int totalSalary = 0;
    short salary = 0;
    float salarySaved = 0;
    float salaryPercent = 0;

    cout << "Enter your salary: " << "\t\t\t";
    cin >> salary;
    cout << "Enter your savings percent" << "\t";
    cin >> salaryPercent;
    totalSalary = salary * 12;
    salarySaved = ((totalSalary * salaryPercent) / 100) + bonus;
    cout << "\n";
    cout << "Your total salary is:   " << "\t";
    cout << totalSalary << endl;
    cout << "The amount saved is:" << "\t\t";
    cout << salarySaved << endl;
    cout << "\n";

return 0;}
 /*Program budgetCalculator

This program prompts the user to input their salary and their different spendings, calculates and prints the percentage saved and used
Created by : Arianna St.John
Date : 06/02/24*/ 

#include<iostream>
using namespace std;

int main(){

    float salary = 0;
    float utilities = 0;
    float electricity = 0;
    float water = 0;
    float groceries = 0;
    float food = 0;
    float meat = 0;
    float gas = 0;
    float vehicle = 0;
    float cooking = 0;
    float leisure = 0;
    float utilitiesPercent = 0;
    float groceriesPercent = 0;
    float gasPercent = 0;
    float leisurePercent = 0;
    float totalSpent = 0;
    float totalPercent = 0;
    float totalSaved = 0;
    float savedPercent = 0;

    cout << "Enter your salary:   " << "\t\t\t\t\t\t\t\t\t\t";
    cin >> salary; cout << endl;
    cout << "Enter how much was spent on electricity: " << "\t\t\t\t\t";
    cin >> electricity; cout<< endl;
    cout << "Enter how much was spent on water:   " << "\t\t\t\t\t\t";
    cin >> water; cout << endl;
    cout << "Enter how much was spent on food:" << "\t\t\t\t\t\t\t";
    cin >> food; cout << endl;
    cout << "Enter how much was spent on meat:" << "\t\t\t\t\t\t\t";
    cin >> meat; cout << endl;
    cout << "Enter how much was spent on vehicle gas: " << "\t\t\t\t\t";
    cin >> vehicle; cout << endl;
    cout << "Enter how much was spent on cooking gas: " << "\t\t\t\t\t";
    cin >> cooking; cout << endl;
    cout << "Enter how much was spent on leisure activities:  " << "\t\t\t";
    cin >> leisure; cout << endl;
    utilities = electricity + water;
    groceries = food + meat;
    gas = vehicle + cooking;
    totalSpent = utilities + groceries + gas + leisure;
    totalSaved = salary - totalSpent;
    utilitiesPercent = (utilities / salary) * 100;
    groceriesPercent = (groceries / salary) * 100;
    gasPercent = (gas / salary) * 100;
    leisurePercent = (leisure / salary) * 100;
    totalPercent = (totalSpent / salary) * 100;
    savedPercent = (totalSaved / salary) * 100;
    cout << "\n";
    cout << "The total utilities is:" << "\t\t\t\t\t\t\t\t\t\t";
    cout << utilities << endl;
    cout << "The total groceries is:" << "\t\t\t\t\t\t\t\t\t\t";
    cout << groceries << endl;
    cout << "The total gas is:" << "\t\t\t\t\t\t\t\t\t\t\t";
    cout << gas << endl;
    cout << "The total leisure is:" << "\t\t\t\t\t\t\t\t\t\t";
    cout << leisure << endl;
    cout << "\n";
    cout << "The percentage of the budget spent on utilities is:  " << "\t\t";
    cout << utilitiesPercent << endl;
    cout << "The percentage of the budget spent on groceries is:  " << "\t\t";
    cout << groceriesPercent << endl;
    cout << "The percentage of the budget spent on gas is:" << "\t\t\t\t";
    cout << gasPercent << endl;
    cout << "The percentage of the budget spent leisure activities is:" << "\t";
    cout << leisurePercent << endl;
    cout << "The percentage of the budget spent is:   " << "\t\t\t\t\t";
    cout << totalPercent << endl;
    cout << "The percentage of the budget saved is:   " << "\t\t\t\t\t";
    cout << savedPercent << endl;

return 0; }
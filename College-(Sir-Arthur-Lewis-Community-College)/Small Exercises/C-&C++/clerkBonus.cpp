/*Program clerkBonus

This program prompts the user to input the clerk's sales, determines their bonus, calculates and prints it and their salary
Created by : Arianna St.John
Date : 16/02/24*/

#include <iostream>
using namespace std;

int main(){

    int cheque = 2500;
    float sales = 0;
    float bonus = 0;
    float salary = 0;

    cout << "Enter the clerk's sales:" << "\t";
    cin >> sales;

    if (sales > 2500){
        bonus = sales * 0.05;
    } 
    else if (sales >= 1500){
        bonus = sales * 0.02;
    } 
    else if (sales >= 750){
        bonus = sales * 0.015;
    } 
    else {
        bonus = 0;
    }

    salary = cheque + bonus;
    cout << "\n";
    cout << "The clerk's bonus is:" << "\t\t";
    cout << bonus << endl;
    cout << "The clerk's salary is:" << "\t\t";
    cout << salary << endl;
    cout << "\n";

return 0;}
/*Program salesCommission

This program prompts the user to input the sales of an employee, determine and prints their commission
Created by : Arianna St.John
Date : 16/02/24*/

#include <iostream>
using namespace std;

int main(){
 
    float sales = 0;
    float commission = 0;

    cout << "Enter the employee's sales: " << "\t";
    cin >> sales;

    if (sales >= 0 && sales <= 20000){
        commission = sales * 0.05;
    } 
    else if (sales > 20000 && sales <= 50000){
        commission = (sales * 0.07) + 1000;
    } 
    else if (sales > 50000){
        commission = (sales * 0.10) + 3100;
    }

    cout << "\n";
    cout << "The employee's commission is:" << "\t";
    cout << commission << endl;
    cout << "\n";

return 0;}
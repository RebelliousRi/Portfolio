/*Program seminarFee2

This program prompts the user to input the age of an indivdual and their membership status, determines and prints their seminar fee
Created by : Arianna St.John
Date : 16/02/24*/

#include <iostream>
using namespace std;

int main(){

    short age = 0;
    char member = ' ';
    short fee = 0;

    cout << "Enter the person's age:  " << "\t\t\t\t";
    cin >> age;
    cout << "Enter the person's membership status:" << "\t";
    cin >> member;

    if (age < 65 && member=='n' || member=='N'){
        fee = 20;
    } 
    else if (age >= 65 && member=='n' || member=='N'){
        fee = 15;
    } 
    else if (age < 65 && member=='m' || member=='M'){
        fee = 10;
    }
    else if (age >= 65 && member=='m' || member=='M'){
        fee = 5;
    }

    cout << "\n";
    cout << "Their seminar fee is: " << "\t\t\t\t\t";
    cout << fee << endl;
    cout << "\n";

return 0;}
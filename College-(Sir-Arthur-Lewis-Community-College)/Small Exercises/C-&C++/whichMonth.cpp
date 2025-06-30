/*Program whichMonth

This program prompts the user to input a number from 1-12 and prints a specific month
Created by : Arianna St.John
Date : 08/02/24*/

#include <iostream>
using namespace std;

int main(){

    short number = 0;
    short jan = 1;
    short feb = 2;
    short mar = 3;
    short apr = 4;
    short may = 5;
    short jun = 6;
    short jul = 7;
    short aug = 8;
    short sep = 9;
    short oct = 10;
    short nov = 11;
    short dec = 12;

    cout << "Enter a number from 1-7:" << "\t";
    cin >> number;
    cout << "\n";

    if (number==1){
        cout << "The month is January";
    }
    else if (number==2){
        cout << "The month is February";
    }
    else if (number==3){
        cout << "The month is March";
    }
    else if (number==4){
        cout << "The month is April";
    }
    else if (number==5){
        cout << "The month is May";
    }
    else   if (number==6){
        cout << "The month is June";
    }
    else if (number==7){
        cout << "The month is July";
    }
    else  if (number==8){
        cout << "The month is August";
    }
    else  if (number==9){
        cout << "The month is September";
    }
    else  if (number==10){
        cout << "The month is October";
    }
    else if (number==11){
        cout << "The month is November";
    }
    else  if (number==12){
        cout << "The month is December";
    }

    cout << "\n";

return 0;}
/*Program whichDay

This program prompts the user to input a number from 1-7 and prints a specific day
Created by : Arianna St.John
Date : 15/02/24*/

#include <iostream>
using namespace std;

int main(){

    short number = 0;

    cout << "Enter a number from 1-7:" << "\t";
    cin >> number;
    cout << "\n";

    if (number==1){
        cout << "The day is Sunday";
    }
    else if (number==2){
        cout << "The day is Monday";
    }
    else if (number==3){
        cout << "The day is Tuesday";
    }
    else if (number==4){
        cout << "The day is Wednesday";
    }
    else  if (number==5){
        cout << "The day is Thursday";
    }
    else  if (number==6){
        cout << "The day is Friday";
    }
    else  if (number==7){
        cout << "The day is Saturday";
    }

    cout << "\n";

return 0;}
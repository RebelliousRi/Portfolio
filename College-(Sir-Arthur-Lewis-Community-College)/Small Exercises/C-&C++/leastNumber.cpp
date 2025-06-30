/*Program leastNumber

This program prompts the user to input a trio of numbers, determines and prints the one with the least value
Created by : Arianna St.John
Date : 13/02/24*/

#include <iostream>
using namespace std;

int main(){

    float numb1 = 0;
    float numb2 = 0;
    float numb3 = 0;
    float least = 0;

    cout << "Enter the first number:   " << "\t\t\t";
    cin >> numb1;
    cout << "Enter the second number:  " << "\t\t\t";
    cin >> numb2;
    cout << "Enter the third number:   " << "\t\t\t";
    cin >> numb3;

    if (numb1 < numb2 && numb1 < numb3){
        least = numb1;
    } 
    else if (numb2 < numb1 && numb2 < numb3){
        least = numb2;
    } 
    else if (numb3 < numb1 && numb3 < numb2){
        least = numb3;
    }

    cout << "\n";
    cout << "The number with the least value is:" << "\t";
    cout << least << endl;
    cout << "\n";

return 0;}
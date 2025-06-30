/*Program circleCalculations

This program prompts the user to input the radius of a cricle, calculates and prints its diameter and circumference
Created by : Arianna St.John
Date : 01/02/24*/

#include <iostream>
using namespace std;

int main(){

    const double piValue = 22 / 7;
    double radius = 0;
    double diameter = 0;
    double circumference = 0;
    cout << "Enter the circle's radius:" << "\t\t";
    cin >> radius;
    diameter = radius * 2;
    circumference = piValue * diameter;
    cout << "\n";
    cout << "The circle's diameter' is:" << "\t\t";
    cout <<  diameter << endl;
    cout << "The circle's circumference is:" << "\t";
    cout <<  circumference << endl;
    cout << "\n";

return 0;}
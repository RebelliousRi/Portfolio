/*Program areaPeri

This program prompts the user to input the length and width of a rectangle, calculates and prints its area and perimeter
Created by : Arianna St.John
Date : 01/02/24 */

#include <iostream>
using namespace std;

int main(){

    float width = 0;
    float length = 0;
    float peri = 0;
    float area = 0;

    cout << "Enter the rectangle's width: " << "\t";
    cin >> width;
    cout << "Enter the rectangle's length:" << "\t";
    cin >> length;
    peri = (length * 2) + (width * 2);
    area = length * width;
    cout << "\n";
    cout << "The rectangle's area is:" << "\t\t";
    cout << area << endl;
    cout << "The rectangle's perimeter is:" << "\t";
    cout <<  peri << endl;
    cout << "\n";

return 0;}
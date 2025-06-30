/*Program trioHeights

This program prompts the user to input the heoghts of three people, calculates and prints the average height
Created by : Arianna St.John
Date : 27/02/24*/

#include <iostream>
using namespace std;

int main(){

    float height1 = 0;
    float height2 = 0;
    float height3 = 0;
    float total = 0;
    float avg = 0;

    cout << "Enter the height of the first person: " << "\t";
    cin >> height1;
    cout << "Enter the height of the second person:" << "\t";
    cin >> height2;
    cout << "Enter the height of the third person: " << "\t";
    cin >> height3;
    total = height1 + height2 + height3;
    avg = total / 3;
    cout << "\n";
    cout << "The total height is:   " << "\t\t\t\t\t";
    cout <<  total << endl;
    cout << "The average height is: " << "\t\t\t\t\t";
    cout <<  avg << endl;
    cout << "\n";

return 0;}
/*Program silviasPizza

This program prompts the user to input the total number of pizzas for each type, calculates and prints the total numbeer of pizzas sold and the percentage each type contributed to it
Created by : Arianna St.John
Date : 30/01/24*/

#include <iostream>
using namespace std;

int main(){

    short small = 0;
    short medium = 0;
    short large = 0;
    short family = 0;
    double smallPercent = 0;
    double mediumPercent = 0;
    double largePercent = 0;
    double familyPercent = 0;
    short total = 0;

    cout << "Enter the number of small pizzas:   " << "\t\t\t";
    cin >> small;
    cout << "Enter the number of medium pizzas:  " << "\t\t\t";
    cin >> medium;
    cout << "Enter the number of large pizzas:   " << "\t\t\t";
    cin >> large;
    cout << "Enter the number of family pizzas:  " << "\t\t\t";
    cin >> family;
    std::cout.precision(2);
    std::cout.setf(std::ios::fixed);
    total = small + medium + large + family;
    smallPercent = (small * 100) / total;
    mediumPercent = (medium * 100) / total;
    largePercent = (large * 100) / total;
    familyPercent = (family * 100) / total;
    cout << "\n";
    cout << "The total number of pizzas sold is:  " << "\t\t\t";
    cout << total << endl;
    cout << "The percentage of pizzas that are small are: " << "\t";
    cout << smallPercent << endl;
    cout << "The percentage of pizzas that are medium are:" << "\t";
    cout << mediumPercent << endl;
    cout << "The percentage of pizzas that are large are: " << "\t";
    cout << largePercent << endl;
    cout << "The percentage of pizzas that are family are:" << "\t";
    cout << familyPercent << endl;
    cout << "\n";

return 0;}
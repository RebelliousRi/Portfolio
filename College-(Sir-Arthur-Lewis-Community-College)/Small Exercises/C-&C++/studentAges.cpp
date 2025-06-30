/*Program studentAges

This program will print the ages of 10 students
Created by : Arianna St.John
Date : 27/02/24*/

#include <iostream>
using namespace std;

int main(){

    int age [10] = {16, 17, 18, 19, 20, 21, 22, 23, 24, 25};
    int x = 0;

    for (x = 0; x < 10; x ++){
        cout << "Student's " << x << " age is " << age [x] << "\t";
        cout << "\n";
    }

return 0;}
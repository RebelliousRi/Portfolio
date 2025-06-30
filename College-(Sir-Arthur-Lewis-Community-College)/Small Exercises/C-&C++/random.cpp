/*Program studentAges

This program generates and prints a random number
Created by : Arianna St.John
Date : 27/02/24*/

#include <cstdlib>
#include <ctime>
#include <iostream>
using namespace std;

int main(){

    srand((unsigned) time(0));
    int randomN;
    cout << "Generating Number..." << endl;
    randomN = (rand() % 100) + 0;
    cout << "Number generated is: "<< randomN << endl;

    //Clears the screen
    //system("CLS");

return 0;}
//This program is generates a random number between 1 and 100.

//Libraries
#include <cstdlib>
#include <ctime>
#include <iostream>

using namespace std;

int main() {
    //randomizer  this line of code should only be used once
    srand((unsigned) time(0));
    //Declaration of Variables
    int randomN;

    cout <<"Generating Number:  " << endl;

    //Saving
    randomN = (rand() % 100) + 0;

    cout <<"Number generated is: "<< randomN << endl;


    //Clears the screen
    //system("CLS");

    return 0;
  }


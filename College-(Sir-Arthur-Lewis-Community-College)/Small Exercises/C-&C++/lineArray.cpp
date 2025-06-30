/*Program lineArray

This program stores each line of a text file as a member of an array and prints them
Created by : Arianna St.John
Date : 02/05/24/*/

#include <iostream>
#include <fstream>
using namespace std;

int main(){

    ifstream file("input.txt");

    if (file.is_open()){
        string myArray[5];

        for (int i = 0; i < 5; i++){
            getline(file, myArray [i]);
        }

        for (int i = 0; i < 5; i++){
            cout << myArray [i] << endl;
        }

        file.close();
    } else {
        cerr << "Unable to open file." << endl;
    }

return 0;}
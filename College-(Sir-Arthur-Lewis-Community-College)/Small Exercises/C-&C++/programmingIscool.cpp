 /*Program programmingIscool

This program prints the contents of a text file
Created by : Arianna St.John
Date : 09/04/24*/ 

#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main(){

    string line = " ";
    ifstream file("programmingIscool.txt");

    if (file.is_open()){

        while (getline(file, line)){
            cout << line << endl;
        }

    }
    else {
   	    cerr << "Unable to open file." << endl;
    }

    file.close();

return 0;}
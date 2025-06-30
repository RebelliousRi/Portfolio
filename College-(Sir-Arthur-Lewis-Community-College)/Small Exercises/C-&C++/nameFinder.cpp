/*Program nameFinder

This program prompts the user to input a person's first name, searches for it within a text file and prints their last name
Created by : Arianna St.John
Date : 01/05/24*/

#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main(){

    string fname, lname, inputName;
    ifstream openFile("john.txt");

    if (openFile.is_open()) {
        cout << "Enter the first name you would like to search:\t";
        cin >> inputName;
        cout << "\n";

        while (openFile >> fname >> lname) {
            if (fname == inputName) {
                cout << "Last name: " << lname << endl;
                openFile.close();
                return 0;
            }
        }

        cout << "Name not found" << endl;
        openFile.close();
        
    } else {
        cerr << "Unable to open file" << endl;
    }

return 0;}
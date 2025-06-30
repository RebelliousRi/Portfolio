/*Program lineArray2

This program stores each line of a text file as a member of an array and prints them
Created by : Arianna St.John
Date : 02/05/24/*/

#include <iostream>
#include <fstream>
#define MAX_LINES 5
using namespace std;

int main(void){

    ifstream file;
    string array [MAX_LINES];
    int lines = 0;

    file.open("input.txt");

    if (file.fail()){
        cout << "File failed to open." << endl;
    return 1;}

    while (! file.eof()){
        getline(file, array[lines]);
        lines ++;

        if (lines == MAX_LINES){
            cout << "Max storage reached" << endl;
        break;}

    }

    file.close();

    for (int i = 0; i < lines; i++)
    cout << array [i] << endl;

return 0;}
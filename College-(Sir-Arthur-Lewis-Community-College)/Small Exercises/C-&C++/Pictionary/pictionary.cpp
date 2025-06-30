 /*Program pictionary

This program prints a random word from a text file
Created by : Arianna St.John
Date : 29/03/24*/ 

#include <iostream>
#include <cstdlib>
#include <ctime>
#include <fstream>
using namespace std;

int main(){

    int line_no;
    srand((unsigned) time(0));
    line_no = (rand() % 30) + 1;
    ifstream file;

    if (line_no <= 0){
        cout << "Line number must be >= 1" << endl;
    return 1;}

    file.open("pictionary.txt");

    if (file.fail()){
        cout << "File failed to open." << endl;
    return 1;}

    int current_line = 0;
    string line;

    while (! file.eof()){
        current_line ++;
        getline(file, line);
        if (current_line == line_no)
        break;}

    if (current_line < line_no){
        cout << "Line not found!" << endl;
        cout << "\n";
    }
    else {
        {cout << "Line: " << line << endl;}
    }

    file.close();

return 0;}
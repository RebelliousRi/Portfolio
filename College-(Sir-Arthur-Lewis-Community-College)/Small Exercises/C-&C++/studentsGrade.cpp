 /*Program studentsGrade

This program prompts the user to create a file and input students' names and grades into it
Created by : Arianna St.John
Date : 09/04/24*/ 

#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main(){

    string fname = " ";
    string lname = " ";
    char grade = ' ';
    int con = 1;

    ofstream outFile;
    outFile.open("grades.txt", fstream::app);

    if (! outFile){
  	    cerr << "Error! Unable to open file." << endl;
    }
    else {
   	    cout << "File successfully created!" << endl;
    }

    while (con != 0){
        cout << "\n";
        cout << "Enter the student's first name: " << "\t\t";
        cin >> fname;
        cout << "\n";
        cout << "Enter the student's last name:  " << "\t\t";
        cin >> lname;
        cout << "\n";
        cout << "Enter the student's grade (A, B, C, D, E, F):" << "\t";
        cin >> grade;
        cout << "\n";
        cout << "Enter 0 to stop:" << "\t\t\t\t\t\t\t";
        cin >> con;
        outFile << fname << "\t\t" << lname << "\t\t" << grade << endl;
        outFile << "\n";
    }

    cout << "\n";
    cout << "File successfully written to!" << endl;
    outFile.close();

return 0;}
/*Program presentStudents

This program allows a user to create a file and prompts them to input student data into it
Created by : Arianna St.John
Date : 09/04/24*/

#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main(){

    string fname = " ";
    string lname = " ";
    char status = ' ';
    int con = 1;

    ofstream outFile;
    outFile.open("attendance.txt", fstream::app);

    if (! outFile){
       cerr << "Error! Unable to open file." << endl;
    } 
    else {
        cout << "File successfully created!" << endl;
    }

    while (con != 0){
        cout << "\n";
        cout << "Enter your first name" << "\t";
        cin >> fname;
        cout << "\n";
        cout << "Enter your last name" << "\t";
        cin >> lname;
        cout << "\n";
        cout << "Enter P for present and A for absent" << "\t";
        cin >> status;
        cout << "\n";
        cout << "Enter 0 to stop" << "\t";
        cin >> con;
        outFile << fname << "\t\t" << lname << "\t\t" << status << endl;
        outFile << "\n";
    }

    cout << "\n";
    cout << "File successfully written to!" << endl;
    outFile.close();

return 0;}
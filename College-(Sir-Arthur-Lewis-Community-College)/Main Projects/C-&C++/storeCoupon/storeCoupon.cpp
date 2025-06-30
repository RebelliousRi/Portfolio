/*Program arrayAvg

This program prompts the user to search for a coupon in a text file and prints it
Created by : Arianna St.John
Date : 17/04/24*/

#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main(){

    string line;
    string coupon;
    string disc;
    int found;
    ifstream openFile ("coupon.txt");

    if (openFile.is_open()){
        cout << "Enter the coupon you would like to search" << "\t";
        cin >> coupon;
        cout << "\n";

        while (getline (openFile, line) ){

            if ((found = line.find(coupon, 0)) != string::npos){
                cout << line;
                cout << "\n";
                return 0;
            }

        }

        cout << "Coupon not found" << endl;
        cout << "\n";
        openFile.close();
    } else {
        cout << "Unable to open file";
        cout << "\n";
    }

return 0;}
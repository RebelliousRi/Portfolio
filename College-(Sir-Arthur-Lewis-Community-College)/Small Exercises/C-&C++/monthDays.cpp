/*Program monthDays

This program prompts the user to input a month and a year, determines and prints the number of days in that month
Created by : Arianna St.John
Date : 02/04/24*/

#include <iostream>

using namespace std;

int main(){

    short year = 0;
    short days = 0;
    string month = " ";
    string months [12] = {"January", "March", "May", "July", "", "October", "December", "April", "June", "September", "November", "February"};
    string months2 [12] = {"january", "march", "may", "july", "august", "0ctober", "december", "april", "june", "september", "november", "february"};

    cout << "Enter the year:" << "\t";
    cin >> year;
    cout << "Enter the month:" << "\t";
    cin >> month;
    cout << "\n";

    if (month==months[0] || month==months2[0] || month==months[1] || month==months2[1] || month==months[2] || month==months2[2] || month==months[3] || month==months2[3] || month==months[4] || month==months2[4] || month==months[5] || month==months2[5] || month==months[6] || month==months2[6]){
        cout << "The number of days " << month << " has is 31";
    }
    else if (month==months[7] || month==months2[7] || month==months[8] || month==months2[8] || month==months[9] || month==months2[9] || month==months[10] || month==months2[10]){
        cout << "The number of days " << month << " has is 30";
    } 
    else if (month==months[11] || month==months2[11]){

        if (year % 4 == 0){
            cout << "The number of days " << month << " has is 29";
        } 
        else {
            cout << "The number of days " << month << " has is 28";
        }

    }
    
    cout << "\n";

return 0;}
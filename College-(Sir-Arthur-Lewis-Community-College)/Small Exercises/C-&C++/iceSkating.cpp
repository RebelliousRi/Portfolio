/*Program iceSkating

This program prompts the user to input the scors of an ice skater, calculates and prints their total and average
Created by : Arianna St.John
Date : 12/03/24*/

#include <iostream>
using namespace std;

int main(){

    int judges = 0;
    int score = 0;
    int sum = 0;
    double avg = 0;
    float x = 0;

    cout << "Enter the number of judges on the panel:   " << "\t\t";
    cin >> judges;
    cout << "\n";

    for (x = 0; x < judges; x ++){
        cout << "Enter the skater's score:  " << "\t\t\t\t\t\t";
        cin >> score;
        sum = sum + score;
        cout << "\n";
    }

    avg = sum / judges;
    cout << "\n";
    cout << "The number of scores the skater received is:" << "\t";
    cout << judges << endl;
    cout << "Their total score is:   " << "\t\t\t\t\t\t";
    cout << sum << endl;
    cout << "Their average score is: " << "\t\t\t\t\t\t";
    cout << avg << endl;

return 0;}
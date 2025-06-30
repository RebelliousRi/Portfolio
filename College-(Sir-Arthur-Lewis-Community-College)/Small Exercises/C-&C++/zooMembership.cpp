 /* Program zooMembership

This program prompts the user to input the number of people who purchased different zoo memberships, calculates and prints the total revenue made
Created by : Arianna St.John
Date : 05/02/24 */ 

#include<iostream>
using namespace std;

int main(){

    short individualAmt = 0;
    short dualAmt = 0;
    short familyAmt = 0;
    int totalRev = 0;
    int individualRev = 0;
    int dualRev = 0;
    int familyRev = 0;

    cout << "Enter the number of people for individual memberships:" << "\t";
    cin >> individualAmt;
    cout << "Enter the number of people for dual memberships:  " << "\t\t";
    cin >> dualAmt;
    cout << "Enter the number of people for family memberships:" << "\t\t";
    cin >> familyAmt;
    individualRev = (individualAmt * 99);
    dualRev = (dualAmt * 175);
    familyRev = (familyAmt * 225);
    totalRev = individualRev + dualRev + familyRev;
    cout << "\n";
    cout << "The total individual revenue is:  " << "\t\t\t\t\t\t";
    cout << individualRev << endl;
    cout << "The total dual revenue is:" << "\t\t\t\t\t\t\t\t";
    cout << dualRev << endl;
    cout << "The total family revenue is:  " << "\t\t\t\t\t\t\t";
    cout << familyRev << endl;
    cout << "The total revenue is: " << "\t\t\t\t\t\t\t\t\t";
    cout << totalRev << endl;

return 0;}
/*Program rewardPoints

This program prompts the user to input a customer's membership status, determines and prints their reward points based on it
Created by : Arianna St.John
Date : 20/02/24*/

#include <iostream>
using namespace std;

int main(){

    short number = 0;
    float reward = 0;
    float purchase = 0;

    cout << "Membership Types" << endl;
    cout << "\n";
    cout << "1 = Standard" << endl;
    cout << "2 = Plus" << endl;
    cout << "3 = Premium" << endl;
    cout << "\n";
    cout << "Enter the customer's membership status:" << "\t";
    cin >> number;
    cout << "Enter the customer's monthly purchases:" << "\t";
    cin >> purchase;

    switch (number){

    case 1:

        if (purchase < 75){
            reward = purchase * 0.05;
        }
        else if (purchase >= 75 && purchase <= 149.99){
            reward = purchase * 0.075;
        }
        else if (purchase >= 150){
            reward = purchase * 0.1;
        }

    break;

    case 2:

        if (purchase < 150){
            reward = purchase * 0.06;
        }
        else if (purchase >= 150){
            reward = purchase * 0.13;
        }

    break;

    case 3:

        if (purchase < 200){
            reward = purchase * 0.04;
        }
        else if (purchase >= 200){
            reward = purchase * 0.15;
        }

    break;

    default:
        cout << "Invalid membership";

    }

    cout << "\n";
    cout << "The customer's reward points are:" << "\t\t";
    cout << reward << endl;
    cout << "\n";

return 0;}
/*This program will display a multiplication table based on a multiplicand

Written by : Arianna St. John Date : 12/03/24*/

#include <iostream>

using namespace std;

int main () {

        //Declaring Variables

        float product = 0;
        float multiC = 0;
        float multiP = 1;
        float x = 0;
        //Counter variable

        //Loop

        for (x=0;x<10;x++){

            cout<<"Enter the multiplicand" <<"\t";
            cin>>multiC;

            multiC*multiP = product;

            cout<<multiC "*" <<multiP" = " <<product;

            multiP = multiP+1;

            cout<<"\n";

        }


        return 0; }

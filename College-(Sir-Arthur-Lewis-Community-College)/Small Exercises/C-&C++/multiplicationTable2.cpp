/*This program will display multiplication tables from 6 to 9

Written by : Arianna St. John Date : 28/03/24*/

#include <iostream>

using namespace std;

int main () {

        //Declaring Variables

        int multiC[4] = {6,7,8,9};
        int product[4];
        int x = 0;
        //Counter variable


        cout<<"Multiplication table for the numbers 6 to 9";

        cout<<"\n";
        cout<<"\n";

        //Loop

        for (x=0;x<13;x++){

            product[0] = multiC[0]*x;
            product[1] = multiC[1]*x;
            product[2] = multiC[2]*x;
            product[3] = multiC[3]*x;

            cout<<multiC[0] <<"*" <<x <<" = " <<product[0] <<"\t";
            cout<<multiC[1] <<"*" <<x <<" = " <<product[1] <<"\t";
            cout<<multiC[2] <<"*" <<x <<" = " <<product[2] <<"\t";
            cout<<multiC[3] <<"*" <<x <<" = " <<product[3] <<"\t";

        }


        return 0; }

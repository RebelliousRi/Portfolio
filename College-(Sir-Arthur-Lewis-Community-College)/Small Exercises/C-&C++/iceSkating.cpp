/*This program will calculate the total score for an ice skater

Written by : Arianna St. John Date : 12/03/24*/

#include <iostream>

using namespace std;

int main () {

        //Declaring Variables

        int judges = 0;
        int score = 0;
        int sum = 0;
        double = 0;
        float x = 0;
        //Counter variable

        //Loop

        cout<<"Enter the number of judges on the panel   " <<"\t";
        cin>>judges;

        cout<<"\n";

        for (x=0;x<judges;x++){

            cout<<"Enter the skater's score              " <<"\t";
            cin>>score;

            sum = sum+score;

            cout<<"\n";

        }

        //Calculates the average

        avg = sum/judges;

        //Displays the sum and average

        cout<<"\n";

        cout<<"The number of scores the skater received is" <<"\t";
        cout<<judges <<endl;
        cout<<"Their total score is                       " <<"\t";
        cout<<sum <<endl;
        cout<<"Their average score is                     " <<"\t";
        cout<<avg <<endl;

        return 0; }

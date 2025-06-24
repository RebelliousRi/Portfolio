/*This program will find the largest number in a group

Written by : Arianna St. John Date : 27/02/24*/

#include <iostream>

using namespace std;

int main () {

    //Declaring Variables

    int num [6] = {5,4,9,12,8,7};
    int largest = 0;
    int x = 0;
    //Counter variable

    //Determines the largest number

    if (num[0]>num[1] && num[0]>num[2] && num[0]>num[3] && num[0]>num[4] && num[0]>num[5]){
        largest = num[0];

    } else

    if (num[1]>num[0] && num[1]>num[2] && num[1]>num[3] && num[1]>num[4] && num[1]>num[5]){
        largest = num[1];

    } else

    if (num[2]>num[0] && num[2]>num[1] && num[2]>num[3] && num[2]>num[4] && num[2]>num[5]){
        largest = num[2];

    } else

    if (num[3]>num[0] && num[3]>num[1] && num[3]>num[2] && num[3]>num[4] && num[3]>num[5]){
        largest = num[3];

    } else

    if (num[4]>num[0] && num[4]>num[1] && num[4]>num[2] && num[4]>num[3] && num[4]>num[5]){
        largest = num[4];

    } else

    if (num[5]>num[0] && num[5]>num[1] && num[5]>num[2] && num[5]>num[3] && num[5]>num[4]){
        largest = num[5];

    }

    cout<<"The largest number is" <<"\t";
    cout<<largest <<endl;



        return 0; }

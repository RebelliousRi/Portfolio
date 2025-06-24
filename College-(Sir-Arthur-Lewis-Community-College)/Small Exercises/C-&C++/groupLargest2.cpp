/*This program will find the largest number in a group

Written by : Arianna St. John Date : 27/02/24*/

#include <iostream>

using namespace std;

int main ()
{

	//Declaring Variables

	int num [6] = {5,4,9,12,8,7};
	int largest = 0;
	int x = 0;
	//Counter variable

	//Determines the largest number


	for (x=0; x<5; x++){

    	if (largest<num[x]){

    	largest = num[x];

    	}
	}

	cout<<"The largest number is" <<"\t";
	cout<<largest <<endl;


return 0;}

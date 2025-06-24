/*This program will allow a user to create a file and add data into it

Written by : Arianna St. John Date : 09/04/24*/

#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int main () {

    string fname = " ";
    string lname = " ";
    int con = 1;

    ofstream outFile;
    outFile.open("group.txt", fstream::app);

    //Testing if the file is open

    if (!outFile){

  	 cerr<<"Error! Unable to open file." <<endl;

    }else{

   	 cout<<"File successfully created!" <<endl;

    }

    while (con!=0){

    cout<<"\n";
    cout<<"Enter their first name" <<"\t";
    cin>>fname;
    cout<<"\n";
    cout<<"Enter their last name" <<"\t";
    cin>>lname;
    cout<<"\n";
    cout<<"Enter 0 to stop" <<"\t";
    cin>>con;

    outFile<<fname <<"\t" <<lname <<endl;
    outFile<<"\n";

    }



    cout<<"\n";
    cout<<"File successfully written to!" <<endl;

    outFile.close();

  return 0;}

/*This program will display a file

Written by : Arianna St. John Date : 09/04/24*/

#include <iostream>
#include <fstream>
#include <string>

using namespace std;

int main () {

    string line = " ";

    ifstream file("Numbers.txt");

    //Testing if the file is open

    if (file.is_open()){

        while (getline(file, line)){

            cout<<line <<endl;

        }

    }else{

        cerr<<"Unable to open file." <<endl;

    }

    file.close();

  return 0;}

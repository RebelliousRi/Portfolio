/*Program ageFinder

This program prompts the user to input a person's name, searches for it within in a text file and prints their age
Created by : Arianna St.John
Date : 17/04/24*/

#include <iostream>
#include <fstream>
#include <string>
using namespace std;

int main(){

	string line;
	string name;
	int found;
	ifstream openFile ("age.txt");

	if (openFile.is_open()){

	cout << "Enter the name you would like to search:" << "\t";
	cin >> name;
	cout << "\n";

	while (getline (openFile, line) ){
		
		if ((found = line.find(name, 0)) != string::npos){
			cout << line;
			cout << "\n";
			return 0;
		}

	}

	cout << "Name not found." << endl;
	openFile.close();

	}
	else {
		cout << "Unable to open file.";
	}

return 0;}
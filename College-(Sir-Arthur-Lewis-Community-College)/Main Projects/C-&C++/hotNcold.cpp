 /*Program hotNcold

This program prompts the user to input a number in order to guess one which was randomly generated, determines whether the user is hot or cold in their guess and prints a message
Created by : Arianna St.John
Date : 29/03/24*/ 

#include <cstdlib>
#include <ctime>
#include <iostream>
using namespace std;

int main(){

	srand((unsigned) time(0));
	int randN;
	int guess = 0;
	int turns = 1;
	int x;
	int no1 = 0;
	int no2 = 0;
	int diff = 0;
	string cont = " ";
	randN = (rand() % 100) + 0;

	cout << "\n";
	cout << "Welcome To Hot N Cold!!!" << endl;
	cout << "\n";
	cout << "Enter START to play!" << "\t";
	cin >> cont; cout << endl;
	cout << "\n";
	cout << "The rules are simple! Just guess a randomly generated number from 1-100!" << endl;
	cout << "\n";
	cout << "But don't worry with each incorrect guess you will receive a hint telling you if you are hot, warm or cold!" << endl;
	cout << "\n";
	cout << "Time to play!!!" << endl;
    cout << "\n";
	cout << "READY!" << endl;
    cout << "\n";
	cout << "SET!" << endl;
    cout << "\n";
	cout << "GOOOOO!!!" << endl;

    while (cont != "STOP"){
        cout << "\n";
        cout << "The random number has been generated! Please enter a guess." << "\t";
        cin >> guess; cout << endl;

        if (guess > randN){
            no1 = guess;
            no2 = randN;
        } 
        else {
            no1 = randN;
            no2 = guess;
        }

        diff = no1-no2;

        if (guess == randN){
            cout << "\n";
            cout << "CONGRATULATIONS! The random number has been guessed!!!" << endl;
            cout << "\n";
            cout << "You found it in " << turns << " turns!" << endl;
            cout << "\n";
            cout << "To end the game enter STOP." << "\t";
            cin >> cont; cout<< endl;
            cout << "\n";
            cout << "Enter anything to continue." << endl;
        } 
        else {
            cout << "Oops. Your guess is incorrect, please try again." << endl;
            cout << "Here is a hint to help." << endl;
            cout << "\n";

            if (diff <= 5){
                cout<< "Really Hot!!!" << endl;
            } 
            else if (diff <= 10 && diff > 5){
                cout << "Hot" << endl;
            } 
            else if (diff <= 25 && diff > 10){
                cout << "Warm" << endl;
            } 
            else {
                cout << "Cold" << endl;
            }

        }

        turns ++;

    }

return 0;}
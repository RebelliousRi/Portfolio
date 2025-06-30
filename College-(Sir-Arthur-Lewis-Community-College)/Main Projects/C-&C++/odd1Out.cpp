 /*Program odd1Out

This program allows 2 teams of users to participate in a game where they have to pick the odd one out from a list of names, titles or objects. The first to achieve 20 points wins.
Created by : Arianna St.John
Date : 26/04/24*/ 


#include <iostream>
#include <fstream>
#include <string>
#include <cstdlib>
#include <ctime>
using namespace std;

int main(){

    string cont = " ";
    string odd;
    string lineQ;
    string lineC;
    string lineA;
    int current_line = 0;
    int rounds= 1;
    int score1 = 0;
    int score2 = 0;
    int wrong1 = 0;
    int wrong2 = 0;
    int line_no = 0;
    float x = 0;

    cout << "Welcome To Odd One Out!!!" << endl;
	cout << "\n";
	cout << "Enter START to play!" << "\t";
	cin >> cont; cout << endl;
	cout << "\n";
	cout << "The rules are simple! A group of items will be displayed." << endl;
	cout << "\n";
	cout << "It is your job to find the odd one out using the process of elimination and your deduction skills." << endl;
	cout << "\n";
    cout << "You will gain two points if you guess correctly. If you guess wrongly the opposing team has an opportunity to steal the question for one point." << endl;
	cout << "\n";
    cout << "Two incorrect guesses during your turn results in you losing a point." << endl;
	cout << "\n";
	cout << "Also if your guess has spaces, substitute them with dashes instead." << endl;
	cout << "\n";
	cout << "\n";
	cout << "Time to play!!!" << endl;
    cout << "\n";
	cout << "READY!" << endl;
    cout << "\n";
	cout << "SET!" << endl;
    cout << "\n";
	cout << "GOOOOO!!!" << endl;

    while (score1!=20 && score2!=20){

        cout << "\n";
        cout << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
        cout << "\n";
        cout << "\n";
        cout << "\n";
        cout << "Round " << rounds << endl;
        cout << "\n";
        cout << "Team 1's score is " << score1;
        cout << "\n";
        cout << "\n";
        cout << "Team 2's score is " << score2;
        cout << "\n";
        cout << "\n";
        cout << "\n";
        cout << "It is Team 1's turn";
        cout << "\n";
        cout << "\n";

        //Team 1's turn
    {

        srand((unsigned) time(0));
        line_no = (rand() % 30) + 1;

        //Taking the question, answer and category for Team 1's turn.
        ifstream fileQ("Questions.txt");
        ifstream fileA("Answers.txt");
        ifstream fileC("Theme.txt");

        for (int i = 1; i <= line_no; ++i){
            getline(fileQ, lineQ);
            getline(fileA, lineA);
            getline(fileC, lineC);
        }

        fileQ.close();
        fileA.close();
        fileC.close();

        cout << lineQ << endl;
        cout << "\n";
        cout << "Choose the odd one out!" << "\t";
        cin >> odd; cout << endl;
        cout<< "\n";

        if (odd == lineA){
            cout << "Congratulations Team 1 you guessed correctly!" << endl;
            cout << "\n";
            cout << "It is now Team 2's turn!" << endl;
            cout << "\n";
            cout << "\n";
            score1 = score1+2;
        }
        else if (odd != lineA){
            cout << "Unfortunately Team 1 you guessed incorrectly." << endl;
            cout << "\n";
            wrong1++;

            if (wrong1 == 2){
                cout << "You have now guessed incorrectly twice and lost a point" << endl;
                cout << "\n";
                score1 = score1-1;
                wrong1 = 0;
            }

            cout << "Team 2 can now steal!" << endl;
            cout << "\n";
            cout << "Choose the odd one out!" << "\t";
            cin >> odd; cout<< endl;
            cout << "\n";

            if (odd == lineA){
                cout << "Congratulations Team 2 you guessed correctly!" << endl;
                cout << "\n";
                cout << "It is now your turn!" << endl;
                cout << "\n";
                score2 = score2+1;
            }
            else if (odd != lineA){
                cout << "Unfortunately Team 2 you guessed incorrectly." << endl;
                cout << "\n";
                cout << "No one gets the point." << endl;
                cout << "\n";
                cout << "The category was " << lineC << endl;
                cout << "\n";
                cout << "The answer was " << lineA << endl;
                cout << "\n";
                cout << "\n";
                cout << "It is now Team 2's turn!" << endl;
                cout << "\n";
            }

        }

    }

        //Team 2's turn
    {

        srand((unsigned) time(0));
        line_no = (rand() % 30) + 1;

        //Taking the question,answer and category for Team 1's turn.
        ifstream fileQ("Questions.txt");
        ifstream fileA("Answers.txt");
        ifstream fileC("Theme.txt");

        for (int i = 1; i <= line_no; ++i){
            getline(fileQ, lineQ);
            getline(fileA, lineA);
            getline(fileC, lineC);
        }

        fileQ.close();
        fileA.close();
        fileC.close();

        cout << lineQ << endl;
        cout << "\n";
        cout << "Choose the odd one out!" << "\t";
        cin >> odd; cout << endl;
        cout << "\n";

        if (odd == lineA){
            cout << "Congratulations Team 2 you guessed correctly!" << endl;
            cout << "\n";
            cout << "It is now Team 1's turn!" << endl;
            cout << "\n";
            cout << "\n";
            score2 = score2+2;
        }
        else {
            cout << "Unfortunately Team 2 you guessed incorrectly." << endl;
            cout << "\n";
            wrong2 ++;

            if (wrong2 == 2){
                cout << "You have now guessed incorrectly twice and lost a point" << endl;
                cout << "\n";
                score2 = score2-1;
                wrong2 = 0;
            }

            cout << "Team 1 can now steal!" << endl;
            cout << "\n";
            cout << "Choose the odd one out!" << "\t";
            cin >> odd; cout << endl;
            cout << "\n";

            if (odd == lineA){
                cout << "Congratulations Team 1 you guessed correctly!" << endl;
                cout << "\n";
                cout << "It is now your turn!" << endl;
                cout << "\n";
                score1 = score1+1;
            }
            else {
                cout << "Unfortunately Team 1 you guessed incorrectly." << endl;
                cout << "\n";
                cout << "No one gets the point." << endl;
                cout << "\n";
                cout << "The category was " << lineC << endl;
                cout << "\n";
                cout << "The answer was " << lineA << endl;
                cout << "\n";
            }

        }

    }

    rounds++;

    }

    if (score1 == 20){
        cout << "\n";
        cout << "Congratulations Team 1 you have won Odd One Out!!!!" << endl;
        cout << "\n";
    } 
    else if (score2 == 20){
        cout << "\n";
        cout << "Congratulations Team 2 you have won Odd One Out!!!!" << endl;
        cout << "\n";
    }

return 0;}
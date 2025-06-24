/*This program will allow a user to deposit, withdraw and inquire to a bank account

Written by : Arianna St. John Date : 14/03/24*/

#include <iostream>

using namespace std;

int main () {

        //Declaring Variables

        string stop = " ";
        char funct = ' ';
        float deposit = 0;
        float withdrawal = 0;
        float total = 0;

        cout<<"Bank Of St.John" <<endl;

        cout<<"\n";

        cout<<"To deposit into the account press                   D" <<endl;
        cout<<"To withdraw from the account press                  W" <<endl;
        cout<<"To inquire about the account press                  I" <<endl;
        cout<<"When you are done press                             S" <<endl;

        cout<<"\n";


        //Loop

        do{

            cout<<"Choose your function                             ";
            cin>>funct;

            cout<<"\n";

            switch (funct){

                case 'D':
                cout<<"Enter the amount you wish to wish to deposit " <<"\t";
                cin>>deposit;

                total = total+deposit;

                cout<<"\n";
                break;

                case 'W':
                cout<<"Enter the amount you wish to wish to withdraw" <<"\t";
                cin>>withdrawal;

                total = total-withdrawal;

                cout<<"\n";
                break;

                case 'I':
                cout<<"The total balance is                         " <<"\t";
                cout<<total <<endl;
                cout<<"\n";
                break;

                case 'S':
                cout<<"Thank you for choosing Bank Of St.John" <<"\t";
                stop = "stop";
                break;

                default:
                cout<<"Invalid function entered" <<endl;
                cout<<"\n";

            }

        }while (stop!= "stop");

    cout<<"\n";

return 0; }

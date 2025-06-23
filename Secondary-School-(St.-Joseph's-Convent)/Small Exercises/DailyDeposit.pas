Program DailyDeposit;

{This program prompts the user to input the amount deposited by a number of customer, calculates and outputs the total and average amount}
{Created by : Arianna St.John}
{Date : 10/23/2022}

Var
    Amount, Total, Average : Real;
    Customers : Integer;
Begin
    Total := 0;
    Customers := 0;
    Write ('Enter the amount deposited by a number of customers: ');
    Readln (Amount);
    While Amount <> 0 
    Do
    Begin
        Total := Total + Amount;
        Customers := Customers + 1;
        Write ('Enter the amount deposited by a number of customers: ');
        Readln (Amount);
    End;
    Average := Total / Customers;
    Writeln ('The total amount is: ', Total : 0 : 2);
    Writeln ('The average amount is: ', Average : 0 : 2);
End.
Program DataEntry;

{This program prompts the user to enter the amount of each account for a number of accounts, calculates and prints the total}
{Created by : Arianna St.John}
{Date : 09/12/2022}

Var
    Amount, Total : Real;
Begin
    Total := 0;
    Write ('Enter the amount of money in each account: ');
    Readln (Amount);
    While Amount <= 1000000 
    Do
    Begin
        Total := Total + Amount;
        Write ('Enter the amount of money in each account: ');
        Readln (Amount);
    End;
    Writeln ('The total amount amount of money is: ', Total);
End.
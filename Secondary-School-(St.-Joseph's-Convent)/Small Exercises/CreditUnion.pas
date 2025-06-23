Program CreditUnion;

{This program prompts the user to input a share and a deposit, calculates the interest amount and total savings and outputs the interest amount and total savings}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Share, Deposit, Interest, Savings: Real;
Begin
    Write ('Enter a share and deposit: ');
    Readln (Share, Deposit);
    If Share > 25000 
    Then
        Interest := Share * 0.04
    Else
        Interest := Share * 0.03;
        Savings := Interest + Share + Deposit;
    Writeln ('The total savings is: ', Savings : 0 : 2);
    Writeln ('The interest amount is: ', Interest : 0 : 2);
End.
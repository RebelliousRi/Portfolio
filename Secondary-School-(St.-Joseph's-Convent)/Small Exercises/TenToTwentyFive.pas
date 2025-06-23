Program TenToTwentyFive;

{This program prompts the user to input integers from 10 to 25, calculates and prints the sum}
{Created by : Arianna St.John}
{Date : 10/23/2022}

Var
    Numbers, Range, Total : Integer;
Begin
    Total := 0;
    For Range := 10 to 25 
    Do
    Begin
        Write ('Enter a number from 10 to 25: ');
        Readln (Numbers);
        Total := Total + Numbers;
    End;
    Writeln('The sum is: ', Total);
End.
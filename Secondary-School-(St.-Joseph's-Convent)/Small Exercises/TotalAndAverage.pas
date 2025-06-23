Program TotalAndAverage;

{This program prompts the user to input a positive integer for the ending value and a certain amount of numbers, calculates and prints the total and average}
{Created by : Arianna St.John}
{Date : 09/06/2022}

Var
    Numbers, N : Integer;
    OtherNum, Total, Average : Real;
Begin
    Total := 0;
    Write ('Enter a positive integer for the ending value: ');
    Readln (N);
    For Numbers := 1 to N 
    Do
    Begin
        Write ('Enter a Number: ');
        Readln (OtherNum);
        Total := Total + OtherNum;
    End;
    Average := Total / N;
    Writeln ('The total is: ', Total : 0 : 2);
    Writeln ('The average is: ', Average : 0 : 2);
End.
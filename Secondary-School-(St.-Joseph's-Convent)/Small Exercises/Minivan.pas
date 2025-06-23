Program Minivan;

{This program prompts the user to input the number of passengers who traveled for each day in January on a minivan, calculates and prints the daily and monthly revenue}
{Created by : Arianna St.John}
{Date : 10/17/2022}

Var
    Passengers, Days : Integer;
    Daily, Monthly : Real;
    Begin
    Monthly := 0;
    For Days := 1 to 31 
    Do
    Begin
        Write ('Enter the number of passengers who traveled for each day in January on a minivan: ');
        Readln (Passengers);
        Daily := Passengers * 1.25;
        Monthly := Monthly + Daily;
        Writeln ('The daily revenue is: ', Daily : 0 : 2);
    End;
    Writeln ('The monthly revenue is: ', Monthly : 0 : 2);
End.
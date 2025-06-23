Program HoursCalculated;

{This program prompts the user to input the number of days in a month, calculates and outputs the number of hours in the month}
{Created by : Arianna St.John}
{Date : 25/10/2/21}

Var
    Days, Hours : Integer;
Begin
    Write ('Enter the number of days in a month: ');
    Readln (Days);
    Hours := Days * 24;
    Writeln ('The number of hours in the month is: ', Hours);
End.